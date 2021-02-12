<?php

require('controllers/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'viewAccueil') {
        listLastArticles();
    } else if ($_GET['action'] == 'article') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            article();
        } else {
            echo 'Erreur : aucun identifiant d\'article envoyé';
        }
    }
} else {
    listLastArticles();
}



