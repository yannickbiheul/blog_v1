<?php
ob_start();
$title = 'Accueil';
?>

<section id="accueil">
    <div class="banniere container-fluid">
        <h1>Accueil</h1>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#333">Quoi d'neuf sur le site ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="color:#333">
      <ul>
        <p>Le 31 mars 2021</p>
        <li>Les articles ne sont pas prêts.</li>
        <li>La page à propos n'est pas prête.</li>
        <li>La page contact n'est pas prête.</li>
        <li>On peut s'inscrire et modifier nos données.</li>
        <li>On ne peut pas encore se connecter.</li>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</section>

<?php
$content = ob_get_clean();
require('views/template.php');
?>