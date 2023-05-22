<?php include_once '../Views/nav.php' ?>

<div class="container py-4">
  <h1 class="text-center mb-4">Gestion des élèves</h1>
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Liste des élèves</h2>
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Ajouter un élève</button>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Niveau</th>
            <th>Classe</th>
            <th>Année scolaire</th>
            <th>Matricule</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($params['eleves'] as $eleve) : ?>
            <tr>
              <td><?= $eleve->nom ?></td>
              <td><?= $eleve->prenom ?></td>
              <td><?= $eleve->niveau ?></td>
              <td><?= $eleve->classe ?></td>
              <td>
                <span><?= $eleve->debut_annee_scolaire ?></span>
                <span>-</span>
                <span><?= $eleve->fin_annee_scolaire ?></span>
              </td>
              <td><?= $eleve->matricule ?></td>
              <td>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $eleve->id ?>">Modifier</button>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal<?= $eleve->id ?>">Supprimer</button>
              </td>
            </tr>
            <!-- supprimer -->
            <div class="modal fade" id="deleteModal<?= $eleve->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel<?= $eleve->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel<?= $eleve->id ?>">Supprimer un élève</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cet élève ?</p>
                  </div>
                  <div class="modal-footer">
                    <form method="POST">
                      <input type="hidden" name="eleve_id" value="<?= $eleve->id ?>">
                      <input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- modifier -->
            <div class="modal fade" id="editModal<?= $eleve->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?= $eleve->id ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel<?= $eleve->id ?>">Modifier un élève</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="eleve" method="POST">
                      <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="modNomEleve" value="<?= $eleve->nom ?>">
                      </div>
                      <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" class="form-control" id="prenom" name="modPrenomEleve" value="<?= $eleve->prenom ?>">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="modNiveauEleve">
                          <option value="Enseignement Primaire">Enseignement Primaire</option>
                          <option value="Enseignement Secondaire Inferieur">Enseignement Secondaire Inferieur</option>
                          <option value="Enseignement Secondaire Superieur">Enseignement Secondaire Superieur</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="niveau">Matricule</label>
                        <input type="text" class="form-control" id="niveau" name="modMatriculeEleve" value="<?= $eleve->matricule ?>">
                      </div>
                      <div class="form-group">
                        <label for="classe">Classe</label>
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                          </div>
                          <select class="custom-select " id="classe" name="modClasseEleve">
                            <option selected>Choisir une classe</option>
                            <?php foreach ($params['classes'] as $classe) : ?>
                              <option value="<?= $classe->id ?>"><?= $classe->nom ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="annee">Année scolaire :</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Options</label>
                          </div>
                          <select class="custom-select" id="annee" name="modAnneeEleve">
                            <option selected>Choisir une année scolaire</option>
                            <?php foreach ($params['annees'] as $annee) : ?>
                              <option value="<?= $annee->id ?>"><?= $annee->debut_annee_scolaire ?>-<?= $annee->fin_annee_scolaire ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="modEleve_id" value="<?= $eleve->id ?>">
                    <input type="submit" class="btn btn-primary" value="Enregistrer" name="modify">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- ajouter -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Ajouter un élève</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="eleve" method="POST">
            <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nomEleve">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom :</label>
              <input type="text" class="form-control" id="prenom" name="prenomEleve">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01" name="niveauEleve">
                <option selected>Choisir un niveau</option>
                <option value="Enseignement Primaire">Enseignement Primaire</option>
                <option value="Enseignement Secondaire Inferieur">Enseignement Secondaire Inferieur</option>
                <option value="Enseignement Secondaire Superieur">Enseignement Secondaire Superieur</option>
              </select>
            </div>
            <div class="form-group">
              <label for="niveau">Matricule</label>
              <input type="text" class="form-control" id="niveau" name="matriculeEleve">
            </div>
            <div class="form-group">
              <label for="classe">Classes</label>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Options</label>
                </div>
                <select class="custom-select " id="classe" name="classeEleve">
                  <option selected>Choisir une classe</option>
                  <?php foreach ($params['classes'] as $classe) : ?>
                    <option value="<?= $classe->id ?>"><?= $classe->nom ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="annee">Année scolaire :</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Options</label>
                </div>
                <select class="custom-select" id="annee" name="anneeEleve">
                  <option selected>Choisir une année scolaire</option>
                  <?php foreach ($params['annees'] as $annee) : ?>
                    <option value="<?= $annee->id ?>"><?= $annee->debut_annee_scolaire ?>-<?= $annee->fin_annee_scolaire ?></option>
                  <?php endforeach; ?>
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