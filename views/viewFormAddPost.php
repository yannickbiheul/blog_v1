<?php
ob_start();
$title = 'Deskad | Ajouter Article';
?>

<div class="container">
    
    <br>
    <h1 class="d-flex justify-content-center">Ajouter Article</h1>
    <?php
        if (isset($errors)) {
            ?>
                <p style="color:red"><?= $errors[0] ?></p>
            <?php
        }
        if (isset($successSend)) {
            ?>
                <p style="color:green"><?= $successSend ?></p>
            <?php
        }
    ?>
    <br>
    <form action="index.php?action=pullPost" method="POST" enctype="multipart/form-data">
        <select class="form-select" aria-label="Default select example" name="id_categories">
            <option selected>Choisir une catégorie</option>
            <option value="1">Informatique</option>
            <option value="2">Tourisme</option>
            <option value="3">Musique</option>
        </select>
        <br>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Résumé</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="resume"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contenu</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a type="button" href="index.php?action=home" class="btn btn-danger">Annuler</a>
    </form>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>