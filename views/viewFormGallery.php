<?php
ob_start();
$title = 'Deskad | Ajouter Photo';
?>

<div class="container" style="padding-top:80px;">
    
    <br>
    <h1 class="d-flex justify-content-center">Ajouter Photo</h1>
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
    <form action="index.php?action=createPhotoDatas" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>

        <br>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titre</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>

        <br>

        <select class="form-select" aria-label="Default select example" name="id_categories">
            <option selected>Catégorie</option>
            <?php
            foreach ($dataCategories as $data) {
            ?>
            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
            <?php
            }
            ?>
        </select>

        <br>

        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a type="button" href="index.php?action=home" class="btn btn-danger">Annuler</a>
    </form>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>