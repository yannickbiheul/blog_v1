<?php
ob_start();
$title = 'Deskad | Météo';
?>

<div class="container-fluid" id="container-meteo">

    <div class="overlay-icone-chargement">
        <img src="assets/images/chargement/circles.svg" alt="logo chargement">
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col col-lg-6">
            <h1 class="d-flex justify-content-center">Météo</h1>
        </div>
    </div>
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col col-lg-6 d-flex justify-content-center" style="width:260px;">
            <img src="" alt="logo temps" class="logo-meteo" style="width: 200px;">
        </div>
        <div class="col col-lg-6 d-flex flex-column justify-content-center align-items-center">
            <p class="temps" style="font-size:3rem;"></p>
            <p class="temperature" style="font-size:2rem;"></p>
        </div>
    </div>
    <br>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3 col-md-3 d-flex flex-column justify-content-center align-items-center">
            <p class="heure-nom-prevision d-flex justify-content-center"></p>
            <img src="" alt="logo heure" class="logo-heure d-flex justify-content-center">
            <p class="heure-prevision-valeur d-flex justify-content-center"></p>
        </div>
    </div>
    <br>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
        <div class="col col-lg-3">
            <p class="jour-prevision-nom d-flex justify-content-center"></p>
            <img src="" alt="logo jour" class="logo-jour d-flex justify-content-center">
            <p class="jour-prevision-temp d-flex justify-content-center"></p>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>