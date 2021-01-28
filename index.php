<?php

include 'connexionDB.php';
include 'requeteDerniersArticles.php';
include 'header.php';

?>

<main id="main_accueil">

    <?php include 'nav.php'; ?>

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

<?php include 'footer.php' ?>