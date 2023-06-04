<div class="container">
    <h1>Ajouter une discipline</h1>
    <form action="/discipline/ajout" method="POST">
      <div class="form-group">
        <label for="niveauSelect">Niveau :</label>
        <select class="form-control" id="niveauSelect" onchange="chargerClasses()">
          <option value="">Choisir un niveau</option>
          <option value="Enseignement Primaire">Enseignement Primaire</option>
          <option value="Enseignement secondaire inferieur">Enseignement secondaire inferieur</option>
          <option value="Enseignement secondaire superieur">Enseignement secondaire superieur</option>
        </select>
      </div>
      <div class="form-group">
        <label for="classeSelect">Classe :</label>
        <select class="form-control" id="classeSelect" name="classe"></select>
      </div>
      <div class="form-group">
        <label for="disciplineInput">Discipline :</label>
        <input type="text" class="form-control" id="disciplineInput" placeholder="Nom de la discipline" name="discipline">
      </div>
      <div class="form-group">
        <label for="groupeInput">Groupe :</label>
        <input type="text" class="form-control" id="groupeInput" placeholder="Groupe de la discipline" name="groupe">
      </div>
      <div class="form-group">
        <label for="codeInput">Code :</label>
        <input type="text" class="form-control" id="codeInput" placeholder="Code de la discipline" name="code">
      </div>
      <button type="submit" class="btn btn-primary"  name="ajouter">Ajouter</button>
    </form>
  </div>
  <script>
    
    function chargerClasses() {
    const listeNiveau = document.querySelector('#niveauSelect');
    const listeClasse = document.querySelector('#classeSelect');
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
        tableauClasses[niveau]?.forEach(classe => {
          listeClasse.innerHTML += `<option value="${classe.id}">${classe.nom}</option>`;
        });
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des données :', error.message);
      });
  }
  </script>