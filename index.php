<?php

// Connexion à la base de données
try {
    $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
} catch (PDOException $erreur) {
    echo "Problème à la connexion : " . $erreur->getMessage();
}

// Requête SQL pour afficher les 5 derniers articles
$req = $db->query(
    "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article, c.id AS id_categorie 
    FROM articles AS a
    LEFT JOIN categories AS c
    ON c.id = a.categorie
    ORDER BY date_creation 
    DESC LIMIT 0,5"
    );

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

    <main id="main_accueil">

        <header>
            <a href="index.php" class="titreSite">Deskad</a>
            <nav>
                <a href="index.php">Accueil</a>
                <a href="#">Articles</a>
                <a href="#">Inscription / Connexion</a>
            </nav>
        </header>

        <section id="banniere">
            <h1>Deskad</h1>
            <p>Bienvenue sur mon blog, inconnu !</p>
            <div class="boutons">
                <a href="#">Inscription / Connexion</a>
            </div>
        </section>

        <section id="articles">

            <div class="containerArticles">

                <div class="article">
                    <h2>Derniers articles</h2>
                    <span id="iconeDroite">👉</span>
                </div>

                <?php
                    // Parcours des données de la requête
                    while ($donnees = $req->fetch()) {
                ?>

                <a href="afficherArticle.php?id=<?= $donnees['id_article'] ?>"><div class="article">
                    <div class="titreArticle" style="
                    background: linear-gradient(45deg, rgba(0, 0, 0, 0.3)50%, rgba(0, 0, 0, 0.3)50%), url(images/<?= $donnees['id_categorie'] ?>.jpg);
                    background-size: cover;
                    background-position: center;">
                        <h3><?= $donnees['titre_article'] ?></h3>
                    </div>
                    <div class="infosArticle">
                        <small><i class="fas fa-user"></i><?= $donnees['auteur_article'] ?></small>
                        <small><i class="fas fa-clock"></i><?= $donnees['date_creation_fr'] ?></small>
                    </div>
                </div></a>

                <?php
                    }
                    $req->closeCursor();
                ?>

            </div>
        </section>

        <footer>
            <p>Footer</p>
        </footer>

    </main>

    

    <!-- JAVASCRIPT -->
    <script src='js/main.js'></script>
</body>
</html>