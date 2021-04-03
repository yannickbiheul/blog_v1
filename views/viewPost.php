<?php
ob_start();
$title = 'Deskad | ' . $post['title'];
?>

<div class="container">


    <br>
    
    <h1 class="d-flex justify-content-center" style="margin-top:80px"><?= $post['title'] ?></h1>
    <br>
    <?php
if (isset($fails)) {
    foreach ($fails as $fail) {
        echo "<p style='color:red'>$fail</p>";
    }
}
if (isset($fields)) {
    echo "<p style='color:red'>$fields</p>";
}
?>

    <div class="row d-flex justify-content-center" style="padding:10px;">
        <small class="text-muted"><?= $post['creation_date'] ?></small>
        <h5><?= $post['resume'] ?></h5>
        <img class="rounded float-start" style="width: 40%;min-width:260px;margin:40px;" src="assets/images/<?= $post['image'] ?>" alt="<?= $post['image'] ?>">
        <br>
        <p><?= nl2br($post['content']) ?></p>
    </div>

    <div class="row" style="margin:40px;" id="formComment">
    
        <form method="POST" action="index.php?action=checkComment&params=<?= $post['id'] ?>">
                <h2>Commentaire</h2>
                <div class="mb-3">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo" 
                    value="<?php
                    if (isset($_SESSION['pseudo'])) {
                        echo $_SESSION['pseudo'];
                    } else {
                        echo '';
                    }
                    ?>">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
    </div>
    
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>