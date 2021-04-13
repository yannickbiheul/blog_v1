<?php
ob_start();
$title = $post['title_post'];
?>

<div class="container" style="padding-top:80px;">

    <!-- TITRE ET INFOS -->

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1><?= $post['title_post'] ?></h1>
            <small><?= $post['firstname_user'] ?> <?= $post['lastname_user'] ?>, <?= $post['creation_date_fr'] ?></small>
        </div>
    </div>

    <!-- RÉSUMÉ ET IMAGE -->

    <div class="row d-flex justify-content-center" style="margin-top:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h2><?= $post['resume_post'] ?></h2>
            <img src="assets/images/<?= $post['image_post'] ?>" alt="Illustration">
        </div>
    </div>

    <!-- CONTENU -->

    <div class="row d-flex justify-content-center" style="margin-top:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <?= $post['content_post'] ?>
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
            <form action="index.php?action=getCommentDatas&params=<?= $post['id_post'] ?>" method="POST">
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

    <!-- COMMENTAIRES -->

    <div class="row d-flex justify-content-center" style="margin-top:40px;margin-bottom:40px;">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <?php
            if (isset($commentDatas)) {
                foreach ($commentDatas as $commentData) {
                ?>
                    <p><strong><?= $commentData['pseudo'] ?></strong>, <?= $commentData['date_comment_fr'] ?></p>
                    <p><?= $commentData['comment'] ?></p>
                <?php
                }
            }
            ?>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>