<?php
// reservation.php

// Affiche les erreurs pendant le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connexion.php'; // fichier qui définit $pdo

$errors  = [];
$success = false;
$form_data = $_POST ?? [];

// Récupération des services (seulement les colonnes qui existent vraiment)
try {
    $services = $pdo->query("SELECT id, nom FROM services ORDER BY nom")
                    ->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $errors[] = "Erreur chargement services : " . $e->getMessage();
    $services = [];
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $service_id = filter_input(INPUT_POST, 'service_id', FILTER_VALIDATE_INT);
    $date_rdv   = trim($_POST['date_rdv']   ?? '');
    $heure_rdv  = trim($_POST['heure_rdv']  ?? '');
    $prenom     = trim($_POST['prenom']     ?? '');
    $nom        = trim($_POST['nom']        ?? '');
    $email      = trim($_POST['email']      ?? '');
    $telephone  = trim($_POST['telephone']  ?? '');

    // Validation de base
    if (!$service_id || !$date_rdv || !$heure_rdv || !$prenom || !$nom || !$email) {
        $errors[] = "Tous les champs obligatoires doivent être remplis.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresse email invalide.";
    }
    elseif (strtotime($date_rdv) < strtotime(date('Y-m-d'))) {
        $errors[] = "La date ne peut pas être dans le passé.";
    }
    else {
        // Vérification si le créneau est déjà pris (version simple)
        $stmt = $pdo->prepare("
            SELECT COUNT(*) 
            FROM reservations 
            WHERE date_rdv = ? AND heure_rdv = ?
        ");
        $stmt->execute([$date_rdv, $heure_rdv]);
        
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Ce créneau est déjà réservé.";
        }
        else {
            // Insertion
            try {
                $stmt = $pdo->prepare("
                    INSERT INTO reservations 
                    (service_id, date_rdv, heure_rdv, nom_client, email_client, telephone, statut)
                    VALUES (?, ?, ?, ?, ?, ?, 'en_attente')
                ");
                $stmt->execute([
                    $service_id,
                    $date_rdv,
                    $heure_rdv,
                    trim("$prenom $nom"),
                    $email,
                    $telephone ?: null
                ]);

                $success = true;
                $form_data = []; // reset formulaire après succès
            }
            catch (PDOException $e) {
                $errors[] = "Erreur lors de l'enregistrement : " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réserver – IT Beauty</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; padding-bottom: 3rem; }
    .card { border: none; border-radius: 12px; overflow: hidden; }
    .btn-primary { background: #9f7aea; border-color: #9f7aea; }
    .btn-primary:hover { background: #7c3aed; border-color: #7c3aed; }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-7 col-xl-6">

      <h2 class="text-center mb-4 fw-bold text-dark">Prendre rendez-vous</h2>

      <?php if ($success): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Rendez-vous enregistré !</strong><br>
          Nous vous contacterons rapidement pour confirmer.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <?php if ($errors): ?>
        <div class="alert alert-danger">
          <ul class="mb-0">
            <?php foreach ($errors as $err): ?>
              <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div class="card shadow-lg">
        <div class="card-body p-4 p-md-5">

          <form method="post" novalidate>

            <!-- Service -->
            <div class="mb-4">
              <label class="form-label fw-bold">Prestation *</label>
              <select name="service_id" class="form-select form-select-lg" required>
                <option value="">Choisir une prestation</option>
                <?php foreach ($services as $s): ?>
                  <option value="<?= $s['id'] ?>" <?= ($form_data['service_id'] ?? '') == $s['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($s['nom']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Date + Heure -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold">Date *</label>
                <input type="date" name="date_rdv" class="form-control form-control-lg"
                       min="<?= date('Y-m-d') ?>"
                       value="<?= htmlspecialchars($form_data['date_rdv'] ?? '') ?>"
                       required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold">Heure *</label>
                <input type="time" name="heure_rdv" class="form-control form-control-lg"
                       min="09:00" max="19:00" step="1800"
                       value="<?= htmlspecialchars($form_data['heure_rdv'] ?? '') ?>"
                       required>
              </div>
            </div>

            <!-- Nom / Prénom -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label class="form-label fw-bold">Prénom *</label>
                <input type="text" name="prenom" class="form-control form-control-lg"
                       value="<?= htmlspecialchars($form_data['prenom'] ?? '') ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold">Nom *</label>
                <input type="text" name="nom" class="form-control form-control-lg"
                       value="<?= htmlspecialchars($form_data['nom'] ?? '') ?>" required>
              </div>
            </div>

            <!-- Email + Téléphone -->
            <div class="mb-4">
              <label class="form-label fw-bold">Email *</label>
              <input type="email" name="email" class="form-control form-control-lg"
                     value="<?= htmlspecialchars($form_data['email'] ?? '') ?>" required>
            </div>

            <div class="mb-4">
              <label class="form-label fw-bold">Téléphone</label>
              <input type="tel" name="telephone" class="form-control form-control-lg"
                     maxlength="10" placeholder="06XXXXXXXX"
                     value="<?= htmlspecialchars($form_data['telephone'] ?? '') ?>">
            </div>

            <!-- Bouton -->
            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold">
              CONFIRMER LE RENDEZ-VOUS
            </button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
