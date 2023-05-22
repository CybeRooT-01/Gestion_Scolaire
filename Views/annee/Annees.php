<?php include_once '../Views/nav.php' ?>
<div class="container py-4">
  <h1 class="text-center mb-4">Gestion des années scolaires</h1>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Liste des années scolaires</h2>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter une année scolaire</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th> Debut Année scolaire</th>
            <th> Fin Année scolaire</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($params['annees'] as $annee) : ?>
            <tr>
              <td><?= $annee->debut_annee_scolaire ?></td>
              <td><?= $annee->fin_annee_scolaire ?></td>
              <td>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $annee->id ?>">Modifier</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $annee->id ?>">Supprimer</button>
              </td>
            </tr>
            <div class="modal fade" id="editModal<?= $annee->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $annee->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Modifier une année scolaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                      <div class="form-group">
                        <label for="annee">Année De depart :</label>
                        <input type="text" class="form-control" id="annee" name="updtateDepart">
                        <label for="annee">Année de fin :</label>
                        <input type="text" class="form-control" id="annee" name="updatefin">
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="idYear" value="<?= $annee->id ?>">
                        <input type="submit" class="btn btn-primary" value="Modifier">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <!-- suppression -->
    <div class="modal fade" id="deleteModal<?= $annee->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Supprimer une année scolaire</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer cette année scolaire ?</p>
          </div>
          <div class="modal-footer">
            <form method="POST">
              <input type="submit" class="btn btn-danger" value="Supprimer">
              <input type="hidden" value="<?= $annee->id ?>" name="deleteYear">
            </form>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </tbody>
  </table>
  </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Ajouter une année scolaire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-group">
            <label for="annee">Debut Année scolaire :</label>
            <input type="number" class="form-control" id="annee" name="debut_annee">
            <label for="annee">Fin Année scolaire :</label>
            <input type="number" class="form-control" id="annee" name="fin_annee">
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Enregistrer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>