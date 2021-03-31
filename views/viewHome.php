<?php
ob_start();
$title = 'Accueil';
?>

<section id="accueil">
    <div class="banniere container-fluid">
        <h1>Accueil</h1>
    </div>
</section>

<?php
$content = ob_get_clean();
require('views/template.php');
?>