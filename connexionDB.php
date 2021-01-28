<?php

    // Connexion à la base de données
    try {
        $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
    } catch (PDOException $erreur) {
        echo "Problème à la connexion : " . $erreur->getMessage();
    }

?>