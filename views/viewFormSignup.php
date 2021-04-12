<?php
ob_start();
$title = 'Deskad | Inscription';
?>

<section id="connect" class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 inscription">

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


    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 inscription">

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
            
            <form method="POST" action="index.php?action=signup">
                <h2>Inscription</h2>
                <div class="row">
                    <div class="col-md">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="firstnameHelp" name="firstname">
                        <div id="firstnameHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="lastnameHelp" name="lastname">
                        <div id="lastnameHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp" name="pseudo">
                        <div id="pseudoHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password">
                        <div id="passwordHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="cpassword" class="form-label">Confirmation mot de passe</label>
                        <input type="password" class="form-control" id="cpassword" aria-describedby="cpasswordHelp" name="cpassword">
                        <div id="cpasswordHelp" class="form-text"></div>
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