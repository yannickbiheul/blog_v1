<?php
ob_start();
$title = 'Deskad | ' . $post['title'];
?>

<div class="container">

    <br>
    <h1 class="d-flex justify-content-center"><?= $post['title'] ?></h1>
    <br>

    <div class="row d-flex justify-content-center">
        <small class="text-muted"><?= $post['creation_date'] ?></small>
        <h5><?= $post['resume'] ?></h5>
        <img class="rounded float-start" style="width: 40%;min-width:260px;margin:40px;" src="assets/images/<?= $post['image'] ?>" alt="<?= $post['image'] ?>">
        <br>
        <p><?= nl2br($post['content']) ?></p>
    </div>
    
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>