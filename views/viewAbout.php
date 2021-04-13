<?php
ob_start();
$title = 'Deskad | À propos';
?>

<div class="container" style="padding-top:80px">
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-6">
            <h1 class="d-flex justify-content-center">À propos de moi</h1>
        </div>
    </div>
    <div class="row d-flex justify-content-center flex-wrap">
        <div class="row d-flex justify-content-center" style="margin-top: 40px;">
            <img src="assets/images/moi.jpg" class="img-thumbnail" alt="Moi" style="width:250px;">
        </div>
        <div class="row d-flex flex-column justify-content-center align-items-center" style="margin-top: 40px;">
            <div class="col col-lg-6">
                <p>Je m'appelle Yannick Biheul, j'ai 39 ans et j'habite à Quimper, dans le Finistère.</p>
                <p>Je suis interessé par les nouvelles technologies, le cinéma, la musique et les jeux vidéo.</p>
                <p>Après un BAC PRO de maintenance en électroménager, je me suis dirigé dans la vente en passant un BEP à l'Afpa de Lorient, pour ensuite travailler pendant 17 ans chez un équipementier automobile en tant qu'opérateur et pilote de production.</p>
                <p>Attiré par le côté création, interaction et automatisation du développement web, je décide d'entamer une reconversion dans ce domaine en 2020.</p>
                <p>Je suis actuellement en formation Développeur Web à l'Afpa de Brest.</p>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-6 d-flex justify-content-center" style="margin-top: 40px;">
            <a href="https://www.yannickbiheul.com/" target="_blank" class="btn btn-primary" style="margin-bottom:40px;">Ma page</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>