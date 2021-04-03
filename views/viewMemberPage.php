<?php
ob_start();
$title = "Deskad | " . $_SESSION['pseudo'];

?>
    

<section id="member-page">
    <div class="container container-member" style="padding-top:80px;">
        <div class="card" style="width: 20rem;">
        <img src="assets/images/user.png" class="card-img-top" alt="user">
        <div class="card-body">
            <h5 class="card-title"><?= $_SESSION['pseudo'] ?></h5>
            <ul>
                <li class="card-text">Prénom : <?= $_SESSION['firstname'] ?></li>
                <li class="card-text">Nom : <?= $_SESSION['lastname'] ?></li>
                <li class="card-text">Pseudo : <?= $_SESSION['pseudo'] ?></li>
                <li class="card-text">Email : <?= $_SESSION['email'] ?></li>
                <li class="card-text">Mot de passe : ******</li>
                <li class="card-text">Inscrit le : <?= $_SESSION['signup_date'] ?></li>
            </ul>
            <a href="index.php?action=formSetUser" class="btn btn-primary">Modifier</a>
            <a href="index.php?action=endSession" class="btn btn-danger">Se déconnecter</a>
        </div>
</div>
    </div>
</section>

<?php

$content = ob_get_clean();
require('views/template.php');
?>