<div class="container py-4">
  <h1 class="text-center mb-4">Gestion des années scolaires</h1>
  <!-- ajout -->
  <form action="/annee/create" method="POST">
    <div class="form-group">
      <label for="annee">Année Scolaire :</label>
      <input type="text" class="form-control" id="annee" name="annee" autocomplete="off">
    </div>
    <div class="modal-footer">
      <input type="submit" class="btn btn-primary" value="Ajouter">
    </div>
  </form>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Liste des années scolaires</h2>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end mb-3">
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Année scolaire</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($params['annees'] as $annee) : ?>
            <tr>
              <td><?= $annee->annee_scolaire ?></td>
              <td><?= $annee->status ?></td>
              <td>
                <div class="d-flex justify-content-left">
                  <div>
                    <?php if ($annee->status == 'inactive') : ?>
                    <button class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#deleteModal<?= $annee->id ?>">Supprimer</button>
                    <?php endif; ?>
                  </div>
                  <div>
                    <form action="/annee/change" method="post">
                      <?php if($annee->status == 'active'): ?>
                        <input type="submit" class="btn btn-warning btn-sm text-white" name="active" value="<?=$annee->status?>" disabled>
                      <?php else: ?>
                        <input type="hidden" name="statid" value="<?= $annee->id ?>">
                        <input type="submit" class="btn btn-warning btn-sm text-white" name="active" value="activer">
                      <?php endif; ?>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
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
            <form action="/annee/delete" method="POST">
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
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
