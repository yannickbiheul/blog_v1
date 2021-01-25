<?php

try {
    $connexion = new PDO("mysql:host=localhost; dbname=login", "root", "");
} catch (PDOException $erreur) {
    echo "Problème à la connexion : " . $erreur->getMessage();
}


?>



<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Mon Blog</title>
    <!-- DESCRIPTION -->
    <meta name='description' content='1ère version du blog'>
    <!-- CSS -->
    <link rel='stylesheet' href='css/main.css'>
    <!-- GOOGLE FONTS -->
    <!-- Roboto -->
    <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>
    <!-- Quicksand -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Quicksand&display=swap' rel='stylesheet'>
    <!-- Bangers -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link href='https://fonts.googleapis.com/css2?family=Bangers&display=swap' rel='stylesheet'>
    <!-- FONTAWESOME -->
    <script src='https://kit.fontawesome.com/29ef46100e.js' crossorigin='anonymous'></script>
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
</head>

<body>

    <main>
        <h1>Liste des articles</h1>

        <div class="article">
            <div class="articleHeader">
                <div class="articleInfos">
                    <p><i class="fas fa-user"></i>Auteur</p>
                    <p><i class="far fa-clock"></i>Date</p>
                </div>
                <div class="articleTitre">
                    <h2>Titre</h2>
                </div>
            </div>
            <hr>
            <div class="articleContent">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore maiores nam ad reiciendis vitae corporis provident libero exercitationem sequi, inventore nobis nostrum voluptatum optio vero alias rem dolores necessitatibus eligendi voluptatem quod odio quisquam? Voluptates corrupti enim, cupiditate laudantium officiis, voluptate ratione necessitatibus laboriosam quaerat sequi numquam reprehenderit quod vel! Eaque magnam qui dolorem voluptatibus est tempora voluptas et amet autem, animi quis facilis fugit exercitationem iure, omnis rerum hic nostrum natus laborum corporis eligendi. Quam quia sint nesciunt iusto repudiandae inventore animi aliquam ex eum obcaecati, delectus minus ducimus est perferendis atque nisi accusamus, repellat hic quas? Deserunt, provident!</p>
                <a class="comments" href="#"><p><i class="fas fa-comment-dots"></i>Commentaires</p></a>
            </div>
        </div>

    </main>
    

    <!-- JAVASCRIPT -->
    <script src='js/main.js'></script>
</body>
</html>