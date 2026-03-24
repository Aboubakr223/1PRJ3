<?php
// includes/mail.php

function envoyerEmail($to, $sujet, $nom_client, $service_id, $date_rdv, $heure_rdv) {
    // Lire le template HTML
    $template = file_get_contents(__DIR__ . '/../templates/email_template.html');

    // Remplacer les variables dynamiques
    $template = str_replace('{{nom_client}}', htmlspecialchars($nom_client), $template);
    $template = str_replace('{{service}}', htmlspecialchars($service), $template);
    $template = str_replace('{{date}}', htmlspecialchars($date_rdv), $template);
    $template = str_replace('{{heure}}', htmlspecialchars($heure_rdv), $template);

    // Headers pour HTML
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: Salon <salon@test.com>\r\n";

    // Envoi email
    return mail($to, $sujet, $template, $headers);
}

// Fonction pour envoyer au client et au salon
function envoyerConfirmation($nom_client, $email_client, $service, $date_rdv, $heure) {
    // Email client
    envoyerEmail($email_client, "Confirmation de votre réservation", $nom_client, $service, $date, $heure);

    // Email salon (notification)
    $email_salon = "salon@test.com";
    envoyerEmail($email_salon, "Nouvelle réservation", $nom_client, $service, $date_rdv, $heure_rdv);
}
?>