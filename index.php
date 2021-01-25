<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=blog", "root", "");
} catch (PDOException $erreur) {
    echo "Problème à la connexion : " . $erreur->getMessage();
}

?>



<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Mon Blog</title>
    <!-- DESCRIPTION -->
    <meta name='description' content='1ère version du blog'>
    <!-- CSS -->
    <link rel='stylesheet' href='css/main.css'>
    <!-- GOOGLE FONTS -->
    <!-- Roboto -->
    <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
    <!-- Quicksand -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Quicksand&display=swap' rel='stylesheet'>
    <!-- Bangers -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Bangers&display=swap' rel='stylesheet'>
    <!-- FONTAWESOME -->
    <script src='https://kit.fontawesome.com/29ef46100e.js' crossorigin='anonymous'></script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
</head>

<body>

    <main>
        <h1>Liste des articles</h1>

        <?php
            $req = $db->query("SELECT id, titre, auteur, contenu, DATE_FORMAT(date_creation, 'Le %d/%m/%Y') AS date_creation_fr FROM articles ORDER BY date_creation DESC LIMIT 0,5");

            while ($donnees = $req->fetch()) {
                ?>

                    <div class="article">
                        <div class="articleHeader">
                            <div class="articleInfos">
                                <p><i class="fas fa-user"></i><?= $donnees['auteur'] ?></p>
                                <p><i class="far fa-clock"></i><?= $donnees['date_creation_fr'] ?></p>
                            </div>
                            <div class="articleTitre">
                                <h2><?= $donnees['titre'] ?></h2>
                            </div>
                        </div>
                        <hr>
                        <div class="articleContent">
                            <p><?= $donnees['contenu'] ?></p>
                            <a class="comments" href="#"><p><i class="fas fa-comment-dots"></i>Lire</p></a>
                        </div>
                        
                    </div>

                <?php
            }
        ?>

    </main>
    

    <!-- JAVASCRIPT -->
    <script src='js/main.js'></script>
</body>
</html>