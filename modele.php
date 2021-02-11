<?php

function getLastArticles() {
    // Connexion à la base de données
    try {
        $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "root");
    } catch (PDOException $erreur) {
        echo "Problème à la connexion : " . $erreur->getMessage();
    }

    $req = $db->query(
    "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article, c.id AS id_categorie 
    FROM articles AS a
    LEFT JOIN categories AS c
    ON c.id = a.categorie
    ORDER BY date_creation 
    DESC LIMIT 0,5"
    );

    return $req;
}

?>