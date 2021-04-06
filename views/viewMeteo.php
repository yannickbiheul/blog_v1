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
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
            </div>
            <div class="bloc-h">
                <p class="heure-nom-prevision"></p>
                <p class="heure-prevision-valeur"></p>
                <div class="bloc-icone">
                    <img src="" alt="logo temps" class="heure-prevision-icone">
                </div>
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