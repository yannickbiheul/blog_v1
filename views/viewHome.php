<?php
ob_start();
$title = 'Deskad | Accueil';
?>

<section id="accueil">
    <div class="banniere container-fluid">
        <h1>Deskad</h1>
        

        <!-- Button trigger modal -->

<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Quoi d'neuf ?
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color:#333">Quoi d'neuf sur le site ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="color:#333">
      <ul>
        <p>Le 03 aout 2021</p>
            <li>Début du suivi de création de blog en Symfony</li>
        <br>
        <p>Le 22 avril 2021</p>
            <li>Ajout section Gallery</li>
        <br>
        <p>Le 14 avril 2021</p>
          <li>Modifs formulaire ajout article (admin).</li>
          <li>Ajout article Alex Kidd.</li>
          <li>Ajout d'un footer (pied de page) avec liens vers GitHub et Facebook</li>
        <br>
        <p>Le 13 avril 2021</p>
          <li>On peut maintenant laisser des commentaires sous les articles.</li>
          <li>Modifications page d'accueil.</li>
          <li>La météo fonctionne sur mobile.</li>
          <li>Ajout page "À propos".</li>
          <li>Problème de doublon image résolu quand on ajoute un article (admin).</li>
        <br>
        <p>Le 12 avril 2021</p>
          <li>Ajout du badge catégorie sur chaque article.</li>
          <li>L'inscription et la connexion se font désormais sur la même page.</li>
        <br>
        <p>Le 7 avril 2021</p>
          <li>Ajout de l'article Cahier des charges.</li>
        <br>
        <p>Le 6 avril 2021</p>
          <li>Ajout de la page météo (penser à accepter la géolocalisation.)</li>
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
            <div class="card" style="width:260px;margin:20px;color:#333;box-shadow:4px 4px 4px #000">
              <div class="card-header">
                <?= $lastPost['name_category'] ?>
              </div>
                <img src="assets/images/<?= $lastPost['image_post'] ?>" class="card-img-top" alt="<?= $lastPost['image_post'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $lastPost['title_post'] ?></h5>
                    <p><?= $lastPost['resume_post'] ?></p>
                    <p><small><?= $lastPost['creation_date_fr'] ?></small></p>
                    <a href="index.php?action=post&params=<?= $lastPost['id_post'] ?>" class="btn btn-primary">Voir</a>
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