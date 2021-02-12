<?php

// Connexion à la base de données
function dbConnect() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "root");
        return $db;
    } catch (PDOException $erreur) {
        echo "Problème à la connexion : " . $erreur->getMessage();
    }
}


// Récupération des 5 derniers articles
function getLastArticles() {
    $db = dbConnect();
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


// Récupération d'un article
function getArticle($postId) {
    $db = dbConnect();
    $req = $db->prepare(
        "SELECT a.id AS id_article, a.titre AS titre_article, a.auteur AS auteur_article, a.contenu AS article_contenu, DATE_FORMAT(a.date_creation, 'Le %d/%m/%Y à %Hh%i') AS date_creation_fr, a.categorie AS categorie_article 
        FROM articles AS a 
        WHERE id = ?"
    );
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}


// Récupération des commentaires
function getComments($postId) {
    $db = dbConnect();
    $comments = $db->prepare(
    "SELECT id, id_article, auteur, commentaire, DATE_FORMAT(date_commentaire, 'Le %d/%m/%Y à %Hh%i') AS date_commentaire_fr FROM commentaires WHERE id_article = ? ORDER BY date_commentaire DESC"
    );
    $comments->execute(array($postId));

    return $comments;
}

