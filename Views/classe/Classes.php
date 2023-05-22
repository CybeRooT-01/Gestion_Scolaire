<?php include_once '../Views/nav.php'; ?>
<div class="container py-4">
  <h1 class="text-center mb-4">Gestion des classes</h1>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Liste des classes</h2>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter une classe</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Niveau</th>
            <th>Type de cycle</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($params['classes'] as $classe) : ?>
            <tr>
              <td><?= $classe->nom ?></td>
              <td><?= $classe->niveau ?></td>
              <td><?= $classe->type_cycle ?></td>
              <td>
                <div class="d-flex justify-content-start">
                  <button class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#editModal<?= $classe->id ?>" name="<?= $classe->type_cycle ?>">Modifier</button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $classe->id ?>">Supprimer</button>
                </div>
              </td>
            </tr>
            <!-- Modal de modifi d'un classe -->
            <div class="modal fade" id="editModal<?= $classe->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $classe->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $classe->id ?>">Modifier une classe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="classe" method="post">
                      <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="Modnom">
                      </div>
                      <select class="custom-select mb-3" id="inputGroupSelect01" name="Modniveau">
                        <option selected>Choisir un niveau.</option>
                        <option value="CI">CI</option>
                        <option value="CP">CP</option>
                        <option value="CE1">CE1</option>
                        <option value="CE2">CE2</option>
                        <option value="CM1">CM1</option>
                        <option value="CM2">CM2</option>
                        <option value="6eme">6ème</option>
                        <option value="5eme">5ème</option>
                        <option value="4eme">4ème</option>
                        <option value="3eme">3ème</option>
                        <option value="2nd">2nd</option>
                        <option value="1ère">1ère</option>
                        <option value="Terminale">Terminale</option>
                      </select>
                      <select class="custom-select" id="inputGroupSelect01" name="Modcycle">
                        <option selected>Choisir un type de cycle</option>
                        <option value="Enseignement Primaire">Enseignement Primaire</option>
                        <option value="Enseignement Secondaire Inferieur">Enseignement Secondaire Inferieur</option>
                        <option value="Enseignement Secondaire Superieur">Enseignement Secondaire Superieur</option>
                      </select>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="idModify" value="<?= $classe->id ?>">
                    <input type="submit" name='modify' class="btn btn-primary" value="Modifier">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal<?= $classe->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $classe->id ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel<?= $classe->id ?>">Confirmation de suppression</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Êtes-vous sûr de vouloir supprimer cette classe ?</p>
          </div>
          <div class="modal-footer">
            <form action="classe" method="POST">
              <input type="hidden" name="idClasse" value="<?= $classe->id ?>">
              <button type="submit" class="btn btn-danger">Supprimer</button>
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
<!-- Modal ajouter -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Ajouter une classe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="classe" method="POST">
          <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>
          <div class="form-group">
            <label for="niveau">Niveau :</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="niveau">
                <option selected>Choisir un niveau.</option>
                <option value="CI">CI</option>
                <option value="CP">CP</option>
                <option value="CE1">CE1</option>
                <option value="CE2">CE2</option>
                <option value="CM1">CM1</option>
                <option value="CM2">CM2</option>
                <option value="6eme">6ème</option>
                <option value="5eme">5ème</option>
                <option value="4eme">4ème</option>
                <option value="3eme">3ème</option>
                <option value="2nd">2nd</option>
                <option value="1ère">1ère</option>
                <option value="Terminale">Terminale</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="cycle">Type de cycle :</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="cycle">
                <option selected>Choisir un type de cycle</option>
                <option value="Enseignement Primaire">Enseignement Primaire</option>
                <option value="Enseignement Secondaire Inferieur">Enseignement Secondaire Inferieur</option>
                <option value="Enseignement Secondaire Superieur">Enseignement Secondaire Superieur</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Enregistrer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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