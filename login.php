<?php

session_start();

require_once "../config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if ($user === ADMIN_USER && $pass === ADMIN_PASS) {

        $_SESSION["admin"] = true;

        header("Location: index.php");
        exit;

    } else {

        $error = "Erreur";

    }
}