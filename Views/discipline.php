<!-- Modal -->
<div class="modal fade modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ajout de disciplines</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="GroupDiscipline">Groupe de Discipline:</label>
          <input type="text" class="form-control" id="GroupDiscipline" placeholder="Nom du groupe" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="CodeGroup">Code du groupe</label>
          <input type="text" class="form-control" id="CodeGroup" placeholder="Code du groupe" autocomplete="off">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary continuer">Continuer</button>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="container mt-4">
  <h1 class="text-center">Gestion des disciplines</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <label for="niveauSelect">Niveau :</label>
      <select class="form-control" id="niveauSelect" onchange="chargerClasses()">
        <option value="">Choisir un niveau</option>
        <option value="Enseignement Primaire">Enseignement Primaire</option>
        <option value="Enseignement secondaire inferieur">Enseignement secondaire inferieur</option>
        <option value="Enseignement secondaire superieur">Enseignement secondaire superieur</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="classeSelect">Classe :</label>
      <select class="form-control" id="classeSelect" onclick="chargerGroupeDiscipline()">
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <label for="groupeSelect">Groupe de discipline :</label>
      <select class="form-control modalController" id="groupeSelect" onchange="chargerDiscipline()">
      </select>
    </div>
    <div class="col-md-6">
      <label for="disciplineSelect">Discipline :</label>
      <div class="div d-flex">
        <input type="text" class="form-control" id="disciplineSelect" placeholder="Ajouter une discipline" autocomplete="off"><button class="btn btn-primary ml-1 addBtn" onclick="AjouterDiscipline()">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- discipline -->
<div class="container">
  <h1>Liste des discipline de la classe de <span id="nomClasse" class="text-danger"></span></h1>
  <p class="text-danger">Decochez une discipline pour la supprimer de la classe</p>
  <hr>
  <div class="listeDesDiscipline row">
  </div>
</div>
<div class="row">
  <div class="fixed-bottom d-flex justify-content-end">
    <button type="button" class="btn btn-primary mb-4 mr-4 updatebtn" disabled onclick="DeleteDiscipline()">Mettre à jour</button>
  </div>
</div>
<script>
  const listeNiveau = document.querySelector('#niveauSelect');
  const listeClasse = document.querySelector('#classeSelect');
  const listeGroupe = document.querySelector('#groupeSelect');
  const listeDiscipline = document.querySelector('#disciplineSelect');
  const nomClasse = document.querySelector('#nomClasse');
  const listeDesDiscipline = document.querySelector('.listeDesDiscipline');
  const updatebtn = document.querySelector('.updatebtn');
  const modal = document.querySelector('.modal');
  const groupeDisciplineInput = document.querySelector('#GroupDiscipline');
  const codeGroupInput = document.querySelector('#CodeGroup');
  const continuer = document.querySelector('.continuer');
  const nouveauDiscipline = document.querySelector('#nouveauDiscipline');
  const addBtn = document.querySelector('.addBtn');

  continuer.addEventListener('click', () => {
    $('#myModal').modal('hide');
  });


  function chargerClasses() {
    let niveau = listeNiveau.value;
    fetch('http://localhost:10000/getTypesClasses')
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données : ' + response.status);
        }
        return response.json();
      })
      .then(data => {
        listeClasse.innerHTML = '';
        const tableauClasses = {
          "Enseignement Primaire": data.primaire,
          "Enseignement secondaire inferieur": data.college,
          "Enseignement secondaire superieur": data.lycee,
        };
        listeDesDiscipline.innerHTML = '';
        tableauClasses[niveau]?.forEach(classe => {
          listeClasse.innerHTML += `<option value="${classe.nom}">${classe.nom}</option>`;
          nomClasse.innerHTML = listeClasse.value;
        });
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message);
      });
  }
  listeClasse.addEventListener('change', () => {
    nomClasse.innerHTML = listeClasse.value;
  });

  function chargerGroupeDiscipline() {
  let classe = listeClasse.value;
  let url = 'http://localhost:10000/discipline/getDatas';
  let groupesDeDisciplineDejaAjoutes = [];

  fetch(url)
    .then(response => {
      if (!response.ok) {
        throw new Error('Erreur lors de la récupération des données : ' + response.status);
      }
      return response.json();
    })
    .then(data => {
      listeGroupe.innerHTML = '<option value="nouveau" id="nouveauDiscipline">Nouveau</option>';
      listeDiscipline.innerHTML = '';
      data.forEach(discipline => {
        if (discipline.nom == classe) {
          if (!groupesDeDisciplineDejaAjoutes.includes(discipline.groupe_discipline)) {
            listeGroupe.innerHTML += `<option value="${discipline.groupe_discipline}">${discipline.groupe_discipline}</option>`;
            groupesDeDisciplineDejaAjoutes.push(discipline.groupe_discipline);
          }
        }
      });

      // Vérifier si la liste contient uniquement l'option "Nouveau"
      if (listeGroupe.length === 1 && listeGroupe.value === 'nouveau') {
        $('#myModal').modal('show');
      }
    })
    .catch(error => {
      console.error('Erreur lors de la récupération des données :', error.message);
    });
}


  function chargerDiscipline() {
    let classe = listeClasse.value;
    let groupe = listeGroupe.value;
    let url = 'http://localhost:10000/discipline/getDatas';
    fetch(url)
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données : ' + response.status);
        }
        return response.json();
      })
      .then(data => {
        listeDiscipline.innerHTML = '';
        listeDesDiscipline.innerHTML = '';
        let anyUnchecked = false;
        data.forEach(discipline => {
          if (discipline.nom == classe) {
            const isChecked = true;
            listeDesDiscipline.innerHTML += `
          <div class="col-md-4 mb-3">
            <input type="checkbox" class="discipline" id="${discipline.discipline}" name="${discipline.discipline}" value="${discipline.discipline}" ${isChecked ? 'checked' : ''}/>
            <label for="${discipline.discipline}" class="${isChecked ? '' : 'text-danger'}">${discipline.discipline} (${discipline.code})</label>
          </div>
        `;
            if (!isChecked) {
              anyUnchecked = true;
            }
          }
        });
        const checkboxes = document.querySelectorAll('.discipline');
        checkboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function() {
            const label = this.nextElementSibling;
            if (this.checked) {
              label.classList.remove('text-danger');
            } else {
              label.classList.add('text-danger');
            }
            const checked = document.querySelectorAll('.discipline:checked');
            if (checked.length < checkboxes.length) {
              updatebtn.disabled = false;
            } else {
              updatebtn.disabled = true;
            }
          });
        });

        if (anyUnchecked) {
          updatebtn.disabled = false;
        } else {
          updatebtn.disabled = true;
        }
        if (groupeSelect.value === "nouveau") {
          $('#myModal').modal('show');
        } else {
          $('#myModal').modal('hide');
        }
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message);
      });
  }

  function DeleteDiscipline() {
    let classe = listeClasse.value
    let groupe = listeGroupe.value
    let url = 'http://localhost:10000/discipline/delete'
    let data = {
      nom: classe,
      groupe_discipline: groupe,
      disciplines: []
    };
    const unchecked = document.querySelectorAll('.discipline:not(:checked)')
    unchecked.forEach(checkbox => {
      data.disciplines.push(checkbox.value)
    });
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
          'Content-Type': 'application/json'
        },
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données : ' + response.status)
        }
        return response.json()
      })
      .then(data => {
        if (data.status == 'success') {
          showBootstrapAlert('Discipline supprimée avec succès', 'alert-success')
          groupeSelect.value = "";
          chargerDiscipline()
        } else {
          alert('Erreur lors de la suppression de la discipline')
        }
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message)
      });
  }

  function AjouterDiscipline() {
    let classe = listeClasse.value;
    let groupe = groupeDisciplineInput.value;
    let code = codeGroupInput.value;
    let discipline = listeDiscipline.value;
    let url = 'http://localhost:10000/discipline/add';
    let data = {
      nom: classe,
      groupe_discipline: groupe,
      code: code,
      discipline: discipline
    };
    fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
          'Content-Type': 'application/json'
        },
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des données : ' + response.status);
        }
        return response.json();
      })
      .then(data => {
        if (data.status == 'success') {
          showBootstrapAlert('Discipline ajoutée avec succès', 'alert-success');
          groupeSelect.value = "";
          chargerDiscipline();
        } else {
          if (data.message == 'duplicate') {
            showBootstrapAlert('Discipline déjà existante', 'alert-danger');
            return;
          }
          showBootstrapAlert("Erreur lors de l'ajout de la discipline", 'alert-danger');
        }
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message);
      });
  }

  function showBootstrapAlert(message, alertClass) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert ${alertClass} position-fixed top-0 start-0 m-3`;
    alertDiv.innerHTML = message;
    document.body.appendChild(alertDiv);
    setTimeout(() => {
      alertDiv.remove();
    }, 5000);
  }
</script>