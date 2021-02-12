<?php

require('models/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getArticle($_GET['id']);
    $comments = getComments($_GET['id']);
    require('views/viewArticle.php');
} else {
    echo 'Erreur : aucun identifiant d\'article envoyé !';
}