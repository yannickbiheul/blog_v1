<?php

require('models/model.php');

// Afficher les 5 derniers articles
function listLastArticles() {
    $articles = getLastArticles();
    require('views/viewAccueil.php');
}

// Afficher un article et ses commentaires
function article() {
    $article = getArticle($_GET['id']);
    $comments = getComments($_GET['id']);
    require('views/viewArticle.php');
}
