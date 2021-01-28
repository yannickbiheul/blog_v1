<?php

// Requête SQL pour afficher les articles de la catégorie informatique
$requeteMusique = $db->query(
    "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article, c.id AS id_categorie 
    FROM articles AS a
    LEFT JOIN categories AS c
    ON c.id = a.categorie
    WHERE c.id = 3
    ORDER BY date_creation 
    DESC"
    );

?>