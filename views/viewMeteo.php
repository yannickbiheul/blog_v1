<?php
ob_start();
$title = 'Deskad | Météo';
?>

<div class="container-fluid" id="container-meteo">
    
    <h1 class="d-flex justify-content-center">Météo</h1>

    <div class="bloc-meteo">

        <div class="bloc-logo-info">

            <div class="bloc-logo">
                <img src="assets/images/jour/04d.svg" alt ="logo temps" class="logo-meteo">
            </div>

            <div class="bloc-info">
                <p class="temps">Couvert</p>
                <p class="temperature">15°</p>
                <p class="localisation">Quimper</p>
            </div>

        </div>

        <div class="heure-bloc-prevision">
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
            </div>
        </div>

        <div class="jour-prevision-bloc">
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
            <div class="bloc-j">
                <p class="jour-prevision-nom"></p>
                <p class="jour-prevision-temp"></p>
            </div>
        </div>

    </div>
</div>

<?php
$content = ob_get_clean();
require('views/template.php');
?>