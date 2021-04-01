<?php
ob_start();
$title = 'Deskad | Contact';
?>

<section id="connect" class="container">
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
            
            <form method="POST" action="index.php?action=contact">
                <h2>Contact</h2>
                <div class="row">
                    <div class="col-md">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="firstnameHelp" name="firstname" 
                        value="<?php
                        if (isset($_SESSION['firstname'])) {
                            echo $_SESSION['firstname'];
                        } else {
                            echo '';
                        }
                        ?>">
                        <div id="firstnameHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="lastnameHelp" name="lastname" 
                        value="<?php
                        if (isset($_SESSION['lastname'])) {
                            echo $_SESSION['lastname'];
                        } else {
                            echo '';
                        }
                        ?>">
                        <div id="lastnameHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" 
                        value="<?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        } else {
                            echo '';
                        }
                        ?>">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="col-md">
                        <label for="cemail" class="form-label">Confirmer Email</label>
                        <input type="email" class="form-control" id="cemail" aria-describedby="cemailHelp" name="cemail" 
                        value="<?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        } else {
                            echo '';
                        }
                        ?>">
                        <div id="cemailHelp" class="form-text"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Votre message</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
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