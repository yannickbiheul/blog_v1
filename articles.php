<?php

include 'connexionDB.php';
include 'requeteInformatique.php';
include 'requeteTourisme.php';
include 'requeteMusique.php';
include 'header.php';
include 'nav.php'; 

?>

<main id="main_articles">

    <section id="informatique">
        <div class="titreSection">
            <h2>Informatique</h2>
        </div>
        <div class="containerArticles">
            <?php
                // Parcours des données de la requête
                while ($donnees = $requeteInformatique->fetch()) {
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
            ?>
        </div>
    </section>

    <section id="tourisme">
        <div class="titreSection">
            <h2>Tourisme</h2>
        </div>
        <div class="containerArticles">
                <?php
                // Parcours des données de la requête
                while ($donnees = $requeteTourisme->fetch()) {
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
            ?>
        </div>
    </section>

    <section id="musique">
        <div class="titreSection">
            <h2>Musique</h2>
        </div>
        <div class="containerArticles">
                <?php
                // Parcours des données de la requête
                while ($donnees = $requeteMusique->fetch()) {
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
            ?>
        </div>
    </section>

</main>


<?php include 'footer.php' ?>