<?php $title = htmlspecialchars($article['titre_article']); ?>

<?php ob_start(); ?>

    <!-- AFFICHER ARTICLE -->

    <main id="afficherArticle">

    <div class="unArticle">

        <div class="articleHeader">
        
            <div class="articleTitre">
                <h2><?= $article['titre_article'] ?></h2>
            </div>
            <div class="articleInfos">
                <small><i class="fas fa-user"></i><?= $article['auteur_article'] ?></small>
                <br>
                <small><i class="far fa-clock"></i><?= $article['date_creation_fr'] ?></small>
            </div>
        </div>
        <hr>
        <div class="articleContent">
            <p><?= nl2br($article['article_contenu']) ?></p>
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

    while ($comment = $comments->fetch()) {

    ?>
       
    <div class="carteCommentaire">
        <h4><?= $comment['auteur'] ?></h4>
        <small><i class="fas fa-clock"></i><?= $comment['date_commentaire_fr'] ?></small>
        <div class="commentaire">
            <p><?= nl2br($comment['commentaire']) ?></p>
        </div>
        <hr>
    </div>
        

    <?php
    }

    ?>

    </div>

<?php $content = ob_get_clean(); ?>
    
<?php require('template.php');