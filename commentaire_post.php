<?php

// Connexion à la base de données
try {
    $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
} catch (PDOException $erreur) {
    echo "Problème à la connexion : " . $erreur->getMessage();
}

// Entrer les données dans la base
$req = $db->prepare("INSERT INTO commentaires (id_article, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())");
$req->execute(array($_GET['id'], $_POST['pseudo'], $_POST['commentaire']));

// Redirection vers la page Article
header('Location: afficherArticle.php?id=' . $_GET["id"] . '#lesCommentaires');

?>