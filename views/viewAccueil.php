<?php $title = "Deskad | Accueil" ?>

<?php ob_start(); ?>

<main id="main_accueil">

    <section id="banniere">
        <h1>Deskad</h1>
        <p>Bienvenue sur mon blog, inconnu !</p>
        <div class="boutons">
            <a href="#">Inscription / Connexion</a>
        </div>
        <div id="testjs"></div>
    </section>

    <section id="articles">

        <div class="containerArticles">

            <div class="article">
                <h2>Derniers articles</h2>
                <span id="iconeDroite">👉</span>
            </div>

            <?php
                // Parcours des données de la requête
                while ($data = $articles->fetch()) {
            ?>

            <a href="index.php?action=article&amp;id=<?= $data['id_article'] ?>"><div class="article">
                <div class="titreArticle" style="
                background: linear-gradient(45deg, rgba(0, 0, 0, 0.3)50%, rgba(0, 0, 0, 0.3)50%), url(images/<?= $data['id_categorie'] ?>.jpg);
                background-size: cover;
                background-position: center;">
                    <h3><?= $data['titre_article'] ?></h3>
                </div>
                <div class="infosArticle">
                    <small><i class="fas fa-user"></i><?= $data['auteur_article'] ?></small>
                    <small><i class="fas fa-clock"></i><?= $data['date_creation_fr'] ?></small>
                </div>
            </div></a>

            <?php
                }
                $articles->closeCursor();
            ?>

        </div>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php');