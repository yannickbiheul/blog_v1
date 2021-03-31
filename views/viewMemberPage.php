<?php
ob_start();
$title = 'Page Membre';

?>
    

<section id="member-page">
    <div class="container container-member">
        <div class="card" style="width: 25rem;">
        <img src="assets/images/user.png" class="card-img-top" alt="user">
        <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['pseudo'] ?></h5>
            <p class="card-text">Prénom : <?= $_SESSION['firstname'] ?></p>
            <p class="card-text">Nom : <?= $_SESSION['lastname'] ?></p>
            <p class="card-text">Pseudo : <?= $_SESSION['pseudo'] ?></p>
            <p class="card-text">Email : <?= $_SESSION['email'] ?></p>
            <p class="card-text">Mot de passe : ******</p>
            <a href="index.php?action=endSession" class="btn btn-danger">Se déconnecter</a>
            <a href="index.php?action=formSetUser" class="btn btn-primary">Modifier</a>
        </div>
</div>
    </div>
</section>

<?php

$content = ob_get_clean();
require('views/template.php');
?>