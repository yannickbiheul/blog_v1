<?php

// Afficher les commentaires
$requeteCommentaires = $db->prepare(
    "SELECT id, id_article, auteur, commentaire, DATE_FORMAT(date_commentaire, 'Le %d/%m/%Y à %Hh%i') AS date_commentaire_fr FROM commentaires WHERE id_article = ? ORDER BY date_commentaire DESC"
);
$requeteCommentaires->execute(array($_GET['id']));

?>