<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?= $title ?></title>
    <!-- DESCRIPTION -->
    <meta name='description' content=''>
    <!-- CSS -->
    <link rel='stylesheet' href='assets/css/main.css'>
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
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?action=home">Deskad</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?action=posts">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=about">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=formContact">Contact</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['pseudo'])) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=formSignup">Inscription</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=formSignin">Connexion</a>
                            </li>
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=memberPage"><?= $_SESSION['pseudo'] ?></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['admin']) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=formAddPost">Ajouter article</a>
                        </li>
                        <?php
                    }
                    ?>
        </ul>
    </div>
  </div>
</nav>

    <main>
        <?= $content ?>
    </main>


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>