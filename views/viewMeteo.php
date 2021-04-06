<?php
ob_start();
$title = 'Deskad | Météo';
?>

<div class="container-fluid" id="container-meteo">

    <div class="bloc-meteo">

        <div class="overlay-icone-chargement">
            <img src="assets/images/chargement/circles.svg" alt="logo chargement">
        </div>

        <h1 class="d-flex justify-content-center">Météo</h1>

        <div class="bloc-logo-info">

            <div class="bloc-logo">
                <img src="" alt="logo temps" class="logo-meteo">
            </div>

            <div class="bloc-info">
                <p class="temps"></p>
                <p class="temperature"></p>
                <!-- <p class="localisation"></p> -->
            </div>

        </div>

        <div class="heure-bloc-prevision">
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <img src="" alt="logo heure" class="logo-heure">
                <p class="heure-prevision-valeur"></p>
            </div>
        </div>

        <div class="jour-prevision-bloc">
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <img src="" alt="logo jour" class="logo-jour">
                <p class="jour-prevision-temp"></p>
            </div>
        </div>

    </div>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>