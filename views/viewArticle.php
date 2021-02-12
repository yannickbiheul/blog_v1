<?php

include 'inc/header.php';
// include 'inc/nav.php';
// var_dump($post);

?>

    <!-- AFFICHER ARTICLE -->

    <main id="afficherArticle">

    <div class="unArticle">

        <div class="articleHeader">
        
            <div class="articleTitre">
                <h2><?= $post['titre_article'] ?></h2>
            </div>
            <div class="articleInfos">
                <small><i class="fas fa-user"></i><?= $post['auteur_article'] ?></small>
                <br>
                <small><i class="far fa-clock"></i><?= $post['date_creation_fr'] ?></small>
            </div>
        </div>
        <hr>
        <div class="articleContent">
            <p><?= nl2br($post['article_contenu']) ?></p>
        </div>
                        
    </div>

    <!-- AJOUTER COMMENTAIRE -->
 
    <div class="ajoutCommentaire" id="lesCommentaires">
        <h3>Commentaires</h3>
        <form action="commentaire_post.php?id=<?= $_GET['id'] ?>" method="POST">
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </div>

    <!-- LISTE DES COMMENTAIRES -->

    <div class="commentaires">
    <?php

    while ($donnees = $requeteCommentaires->fetch()) {

    ?>
       
        <div class="carteCommentaire">
            <h4><?= $donnees['auteur'] ?></h4>
            <small><i class="fas fa-clock"></i><?= $donnees['date_commentaire_fr'] ?></small>
            <div class="commentaire">
                <p><?= nl2br($donnees['commentaire']) ?></p>
            </div>
            <hr>
        </div>
        

    <?php
    }
    $requeteCommentaires->closeCursor();


    ?>

    </div>
    
<?php include 'footer.php' ?>