<?php
ob_start();
$title = 'Deskad | Gallery';
?>

<div class="container-fluid" id="gallery" style="margin-top:80px;">

<div class="row d-flex justify-content-center">

    <div class="col col-lg-6 d-flex justify-content-center" style="gap:10px;">
    
        <div class="card" style="width: 18rem;box-shadow: 4px 4px 4px #ccc;">
            <div class="card-body d-flex justify-content-center align-items-center">
                <?php if (isset($_SESSION['pseudo'])) {?>
                <a href="index.php?action=formGallery" class="btn btn-primary">Ajouter photo</a>
                <?php } else { ?>
                <a href="index.php?action=formSignup" class="btn btn-primary">Connectez-vous pour poster une photo !</a>
                <?php } ?>
            </div>
        </div>

        <?php foreach ($galleries as $gallery) {?>
        <div class="card" style="width: 18rem;box-shadow: 4px 4px 4px #ccc;">
            <img src="assets/images/<?= $gallery['gallery_photo'] ?>" class="card-img-top" alt="<?= $gallery['gallery_photo'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $gallery['gallery_title']; ?></h5>
                <p class="card-text">Ajouté par : <?= $gallery['pseudo_user']; ?> </p>
                <p class="card-text"><?= $gallery['creation_date_fr']; ?></p>
                <a href="index.php?action=viewPhoto&params=<?= $gallery['id_categories']; ?>" class="btn btn-primary">VOIR</a>
            </div>
        </div>
        <?php } ?>

    </div>

</div>

</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>