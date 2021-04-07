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
            <div class="card" style="width: 15rem; margin: 20px">
                <img src="assets/images/<?= $post['image'] ?>" class="card-img-top" alt="<?= $post['image'] ?>">
                <span class="badge bg-secondary"><?= $post['id_categories'] ?></span>
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= $post['resume'] ?></p>
                    <a href="index.php?action=post&params=<?= $post['id'] ?>" class="btn btn-primary">Voir</a>
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