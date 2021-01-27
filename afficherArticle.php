<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
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

    <header>
        <a href="index.php" class="titreSite">Deskad</a>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="#">Articles</a>
            <a href="#">Inscription / Connexion</a>
        </nav>
    </header>

    <main id="afficherArticle">

    <?php
    
    // Afficher l'article
    $req = $db->prepare(
        "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, a.contenu AS article_contenu, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article 
        FROM articles AS a 
        WHERE id = ?"
    );
    $req->execute(array($_GET['id']));

    while ($donnees = $req->fetch()) {

    ?>

    <div class="unArticle">

        <div class="articleHeader">
            <div class="articleTitre">
                <h2><?= $donnees['titre_article'] ?></h2>
            </div>
            <div class="articleInfos">
                <small><i class="fas fa-user"></i><?= $donnees['auteur_article'] ?></small>
                <small><i class="far fa-clock"></i><?= $donnees['date_creation_fr'] ?></small>
            </div>
        </div>
        <hr>
        <div class="articleContent">
            <p><?= $donnees['article_contenu'] ?></p>
        </div>
                        
    </div>

    <?php
    }
    $req->closeCursor();
    ?>

    

    
        <!-- <div class="ajoutCommentaire">
            <h3>Commentaires</h3>
            <form>
                <input type="text" placeholder="Votre pseudo">
                <textarea placeholder="Votre commentaire"></textarea>
                <input type="submit" value="Envoyer">
            </form>
        </div> -->
    <div class="commentaires">
        <?php

        // Afficher les commentaires
        $req = $db->query(
            "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS   categorie_article, c.id_article AS id_commentaire_article, c.auteur AS auteur_commentaire, c.commentaire AS commentaire_commentaire, DATE_FORMAT(c.date_commentaire, 'Le %d/%m/%Y à %Hh%i') AS date_commentaire_fr 
            FROM commentaires AS c
            LEFT JOIN articles AS a
            ON c.id_article = a.id"
        );

        while ($donnees = $req->fetch()) {
        ?>
    
        <div class="afficheCommentaires">
            <div class="carteCommentaire">
                <h4><?= $donnees['auteur_commentaire'] ?></h4>
                <small><i class="fas fa-clock"></i><?= $donnees['date_commentaire_fr'] ?></small>
                <div class="commentaire">
                    <p><?= $donnees['commentaire_commentaire'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
        $req->closeCursor();
    ?>

    

    <footer>
    
    </footer>

    </main>

    <?php

        $req->closeCursor();

    ?>
    

    <!-- JAVASCRIPT -->
    <script src='js/main.js'></script>
</body>
</html>