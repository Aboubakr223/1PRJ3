<?php
require "connexion.php"; // connexion à la BDD

$errors = [];
$success = "";

// Récupération des services pour la liste déroulante
$services = $pdo->query("SELECT id, nom FROM services")->fetchAll(PDO::FETCH_ASSOC);

// Créneaux disponibles pour simplifier (ex: 09h00 à 17h00 tous les jours, créneaux de 30min)
$creneaux = [
    "09:00", "09:30", "10:00", "10:30",
    "11:00", "11:30", "12:00", "12:30",
    "13:00", "13:30", "14:00", "14:30",
    "15:00", "15:30", "16:00", "16:30",
    "17:00", "17h30", "18h00", "18h30", "19h00"
];

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $service_id = $_POST['service_id'] ?? null;
    $date_rdv = $_POST['date_rdv'] ?? null;
    $heure_rdv = $_POST['heure_rdv'] ?? null;
    $nom_client = trim($_POST['nom_client'] ?? "");
    $prenom_client = trim($_POST['prenom_client'] ?? "");
    $email_client = trim($_POST['email_client'] ?? "");
    $telephone = trim($_POST['telephone'] ?? "");

    // Validation simple
    if (!$service_id || !$date_rdv || !$heure_rdv || !$nom_client || !$prenom_client || !$email_client) {
        $errors[] = "Veuillez remplir tous les champs obligatoires.";
    } elseif (!filter_var($email_client, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email invalide.";
    } else {
        // Vérifier si le créneau est déjà pris
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE date_rdv=? AND heure_rdv=? AND service_id=?");
        $stmt->execute([$date_rdv, $heure_rdv, $service_id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $errors[] = "Ce créneau est déjà réservé. Veuillez choisir un autre horaire.";
        } else {
            // Insérer la réservation
            $stmt = $pdo->prepare("INSERT INTO reservations 
                (service_id, date_rdv, heure_rdv, nom_client, email_client, telephone, statut)
                VALUES (?, ?, ?, ?, ?, ?, 'confirme')");
            $stmt->execute([$service_id, $date_rdv, $heure_rdv, $nom_client." ".$prenom_client, $email_client, $telephone]);

            $success = "Réservation confirmée !";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation Salon</title>
</head>
<body>

<h2>Réserver un service</h2>

<?php if ($errors): ?>
    <ul style="color:red;">
        <?php foreach($errors as $e) echo "<li>$e</li>"; ?>
    </ul>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="post">
    <label>Service :</label>
    <select name="service_id" required>
        <option value="">-- Sélectionnez --</option>
        <?php foreach($services as $s): ?>
            <option value="<?= $s['id'] ?>" <?= (isset($service_id) && $service_id==$s['id'])?"selected":"" ?>>
                <?= htmlspecialchars($s['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Date :</label>
    <input type="date" name="date_rdv" value="<?= htmlspecialchars($date_rdv ?? "") ?>" required>
    <br><br>

    <label>Heure :</label>
    <select name="heure_rdv" required>
        <option value="">-- Sélectionnez --</option>
        <?php foreach($creneaux as $c): ?>
            <option value="<?= $c ?>" <?= (isset($heure_rdv) && $heure_rdv==$c)?"selected":"" ?>>
                <?= $c ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>Nom :</label>
    <input type="text" name="nom_client" value="<?= htmlspecialchars($nom_client ?? "") ?>" required>
    <br><br>

    <label>Prénom :</label>
    <input type="text" name="prenom_client" value="<?= htmlspecialchars($prenom_client ?? "") ?>" required>
    <br><br>

    <label>Email :</label>
    <input type="email" name="email_client" value="<?= htmlspecialchars($email_client ?? "") ?>" required>
    <br><br>

    <label strlen = 10>Téléphone :</label>
    <input type="tel" name="telephone" value="<?= htmlspecialchars($telephone ?? "") ?>">
    <br><br>

    <button type="submit">Réserver</button>
</form>

</body>
</html>

