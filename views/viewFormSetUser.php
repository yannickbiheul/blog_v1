<?php
ob_start();
$title = 'Deskad | Modifier son compte';
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
            
            <form method="POST" action="index.php?action=update">
                <h2>Modifier</h2>
                <div class="row">
                    <div class="col-md">
                        <label for="firstname" class="form-label">Nouveau Prénom</label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="firstnameHelp" name="firstname" value="<?= $_SESSION['firstname'] ?>">
                        <div id="firstnameHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="lastname" class="form-label">Nouveau Nom</label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="lastnameHelp" name="lastname" value="<?= $_SESSION['lastname'] ?>">
                        <div id="lastnameHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="pseudo" class="form-label">Nouveau Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp" name="pseudo" value="<?= $_SESSION['pseudo'] ?>">
                        <div id="pseudoHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="email" class="form-label">Nouvel Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= $_SESSION['email'] ?>">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="password" class="form-label">Nouveau Mot de passe</label>
                        <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password">
                        <div id="passwordHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="cpassword" class="form-label">Confirmation nouveau mot de passe</label>
                        <input type="password" class="form-control" id="cpassword" aria-describedby="cpasswordHelp" name="cpassword">
                        <div id="cpasswordHelp" class="form-text"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Envoyer</button>
                <a type="button" href="index.php?action=memberPage" class="btn btn-danger">Annuler</a>
            </form>

        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require('views/template.php');
?>