<?php
ob_start();
$title = 'Deskad | Accueil';
?>

<section id="accueil">
    <div class="banniere container-fluid">
        <h1>Deskad</h1>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Quoi d'neuf ?
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
        <p>Le 6 avril 2021</p>
        <li>Ajout de la page météo ! (penser à accepter la géolocalisation.)</li>
        <br>
        <p>Le 3 avril 2021</p>
        <li>Ajout formulaire commentaire page Article</li>
        <br>
        <p>Le 2 avril 2021</p>
        <li>Ajout page articles</li>
        <li>Ajout page Article</li>
        <br>
        <p>le 1 avril 2021</p>
        <li>Possibilité de se connecter</li>
        <li>Formulaire de contact fonctionnel</li>
        <li>Enregistrement article dans base de données (admin)</li>
        <br>
        <p>Le 31 mars 2021</p>
        <li>Possibilité de s'inscrire et modifier ses données.</li>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>

<div id="lastPosts" class="container d-flex justify-content-center flex-wrap" style="padding: 20px;">
<?php
    if (isset($lastPosts)) {
    foreach ($lastPosts as $lastPost) {
        ?>
            <div class="card" style="width: 20rem ; margin: 20px;color:#333;">
                <img src="assets/images/<?= $lastPost['image'] ?>" class="card-img-top" alt="<?= $lastPost['image'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $lastPost['title'] ?></h5>
                    
                    <a href="index.php?action=post&params=<?= $lastPost['id'] ?>" class="btn btn-primary">Voir</a>
                </div>
            </div>
        <?php
    }
  }
    ?>
</div>
</section>

<?php
$content = ob_get_clean();
require('views/template.php');
?>