<?php
ob_start();
$title = 'Deskad | Articles';
?>

<div class="container" style="padding-top:80px;">

    <br>
    <h1 class="d-flex justify-content-center">Articles</h1>
    <br>

    <div class="row d-flex justify-content-center">
    <?php
    foreach ($posts as $post) {
        ?>
            <div class="card" style="width: 20rem; margin: 20px">
                <div class="card-header">
                    <?= $post['name_category'] ?>
                </div>
                <img src="assets/images/<?= $post['image_post'] ?>" class="card-img-top" alt="<?= $post['image_post'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title_post'] ?></h5>
                    <p class="card-text"><?= $post['resume_post'] ?></p>
                    <p><small><?= $post['creation_date_fr'] ?></small></p>
                    <a href="index.php?action=post&params=<?= $post['id_post'] ?>" class="btn btn-primary">Voir</a>
                </div>
            </div>
        <?php
    }
    ?>
    </div>
    
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>