<?php
ob_start();
$title = $photo['title_gallery'];
?>

<div class="container-fluid" style="padding-top:80px;">

    <!-- TITRE ET INFOS -->

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1><?= $photo['title_gallery'] ?></h1>
            <small><?= $photo['pseudo_user'] ?>, <?= $photo['creation_date_fr'] ?></small>
        </div>
    </div>

    <!-- IMAGE -->

    <div class="row d-flex justify-content-center" style="margin-top:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <a href="assets/images/<?= $photo['photo_gallery'] ?>">
                <img src="assets/images/<?= $photo['photo_gallery'] ?>" alt="<?= $photo['photo_gallery'] ?>" style="width:90%;">
            <a>
        </div>
    </div>

    <!-- FORMULAIRE COMMENTAIRES -->

    <?php
    if (isset($_SESSION['pseudo'])) {
    ?>
    <div class="row d-flex justify-content-center" style="margin-top:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
        <?php
        if (isset($errors)) {
            ?>
                <p style="color:red;"><?= $errors ?></p>
            <?php
        }
        ?>
            <form action="index.php?action=getCommentDatas&params=<?= $photo['id_gallery'] ?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $_SESSION['pseudo'] ?>" name="pseudo">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Votre commentaire</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
    <br>
    <?php
    } else {
    ?>
    <div class="row d-flex justify-content-center" style="margin-top:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <p>Vous devez être connecté pour poster un commentaire !</p>
            <a href="index.php?action=formSignup" class="btn btn-primary">Connexion</a>
        </div>
    </div>
    <?php
    }
    ?>
    <br>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>