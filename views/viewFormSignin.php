<?php
ob_start();
$title = 'Deskad | Connexion';
?>

<section id="connect" class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-lg inscription">

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
            
            <form method="POST" action="index.php?action=signin">
                <h2>Connexion</h2>
                <div class="row">
                    <div class="col-md">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password">
                        <div id="passwordHelp" class="form-text"></div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Envoyer</button>
                <a type="button" href="index.php?action=home" class="btn btn-danger">Annuler</a>
            </form>

        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require('views/template.php');
?>