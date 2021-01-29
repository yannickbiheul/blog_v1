<?php

    // Afficher l'article
    $requeteArticle = $db->prepare(
        "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, a.contenu AS article_contenu, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article 
        FROM articles AS a 
        WHERE id = ?"
    );
    $requeteArticle->execute(array($_GET['id']));

    // Vérifier l'existence de l'article
    $verifArticle = $db->query("SELECT MAX(id) from articles");

?>