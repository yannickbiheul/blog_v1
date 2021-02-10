<?php

include 'connexionDB.php';

// Entrer les données dans la base
$req = $db->prepare("INSERT INTO commentaires (id_article, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())");
$req->execute(array($_GET['id'], $_POST['pseudo'], $_POST['commentaire']));

// Redirection vers la page Article
header('Location: afficherArticle.php?id=' . $_GET["id"] . '#lesCommentaires');

?>