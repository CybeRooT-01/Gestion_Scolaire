<div class="container">
    <div class="container mb-2">
        <h1 class="text-center">Liste de des eleves de la classe <br>
            <?php foreach ($params['active'] as $annee) : ?>
                <p class="mb-2"><?= $params['classe']->nom ?><a class="nav-link d-inline-block" href="/annee">(<?= $annee->annee_scolaire ?>)</a></p>
            <?php endforeach; ?>
        </h1>
        <h4 class="m-0 p-0 text-center">Effectif: <?= $params['effectif'] ?></h4>
        <h4 class="m-0 p-0 text-center">Moyenne Classe: </h4>
    </div>
    <div class="container mb-2">
        <div class="row align-items-end">
            <div class="col-auto">
                <a href="/niveau/classe/<?= $params['cycleID'] ?>" class="btn btn-danger mr-2">Retour</a>
            </div>
            <div class="col-auto">
                <a href="/classe/coef/<?= $params['id'] ?>" class="btn btn-primary">Coef</a>
            </div>
            <div class="col">
                <label for="selectLabel" class="d-flex align-items-center mb-2">Discipines:</label>
                <select class="form-select discipline" id="selectLabel" style="height: 30px; width:150px; border:2px solid black; border-radius:10px" onchange="chargerNoteMax()">
                    <option value="">Choisir</option>
                    <?php foreach ($params['disciplines'] as $discipline) : ?>
                        <option value="<?= $discipline->discipline_id ?>"><?= $discipline->discipline ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <p class="text-center d-inline-block m-0 p-0" style="width: 130px;">semestre</p> <br>
                <a class="nav-link d-inline-block semestre" href="#" style="font-size: 1.2rem;" idSemestre=""><?= $params['activeSemester'] ?></a>
            </div>
            <div class="col">
                <label for="selectLabel3" class="d-flex align-items-center mb-2">Note de:</label>
                <select class="form-select noteDe" id="selectLabel3" style="height: 30px; width:150px; border:2px solid black; border-radius:10px">
                    <option value="">Choisir</option>
                    <option value="1">ressources</option>
                    <option value="2">examen</option>
                </select>
            </div>
        </div>
    </div>
    <div class="list-group border-primary">
        <?php foreach ($params['active'] as $annee) : ?>
            <?php foreach ($params['eleve'] as $primaires) : ?>
                <?php if ($annee->annee_scolaire == $primaires->annee_scolaire) : ?>
                    <div class="row mb-3 ">
                        <div class="col-9">
                            <a href="#" idEleve="<?= $primaires->id ?>" class="fs-9 text-dark text-decoration-none pl-3 eleve" style="background-color: #eff5f5; height:40px; display:flex; align-items: center;">
                                <?= $primaires->prenom ?>
                                <?= $primaires->nom ?>
                            </a>
                        </div>
                        <div>
                            <div class="col-3 d-flex align-items-center noteZone">
                                <input type="number" class="form-control noteRessource" placeholder="note" style="width: 90px; height: 40px; position: absolute; visibility:hidden; top:5px">
                                <input type="number" class="form-control noteExame" placeholder="note" style="width: 90px; height: 40px; position: absolute; visibility:hidden; top:5px">
                            </div>
                            <div class="mt-2" style="display:flex; justify-content:center; align-items: end; font-size:28px; position: relative; left:105px; top:-8px">/ <span class="max"></span></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <div class="row d-flex justify-content-end ">
        <button style="margin-right:180px" class="btn btn-primary" onclick="EnregistrerNote()">Enregistrer</button>
    </div>
</div>
<script>
    const zoneDeNote = document.querySelectorAll('.noteZone');
    const disciplineInput = document.querySelector('.discipline');
    const semestre = document.querySelector('.semestre');
    const noteDeInput = document.querySelector('.noteDe');
    const eleves = document.querySelectorAll('.eleve')

    const examNote = document.querySelectorAll('.noteExame');
    const ressourceNote = document.querySelectorAll('.noteRessource');

    function chargerNoteMax() {
        console.log(disciplineInput.value)
        url = "http://localhost:10000/liste/maxNote";
        fetch(url)
            .then(response => response.json())
            .then(datas => {
                const maxContent = document.querySelectorAll('.max');
                maxContent.forEach(element => {
                    element.textContent = "...";
                });
                datas.forEach(data => {
                    if (parseInt(data.discipline_id) === parseInt(disciplineInput.value)) {
                        noteDeInput.addEventListener('change', () => {
                            if (noteDeInput.value === "1") {
                                ressourceNote.forEach(ressourceInput => {
                                    ressourceInput.style.visibility = 'visible';
                                    examNote.forEach(examInput => {
                                        examInput.style.visibility = 'hidden';
                                    });
                                });
                                maxContent.forEach(element => {
                                    element.textContent = data.ressource;
                                    console.log(data.ressource);
                                });
                            } else if (noteDeInput.value === "2") {
                                examNote.forEach(examInput => {
                                    examInput.style.visibility = 'visible';
                                    ressourceNote.forEach(ressourceInput => {
                                        ressourceInput.style.visibility = 'hidden';
                                    });
                                });
                                maxContent.forEach(element => {
                                    element.textContent = data.Examen;
                                });
                            }
                        });
                    }
                });
            });
    }
examNote.forEach(examInput => {
    examInput.addEventListener('input', () => {
        if (examInput.value !== "") {
            examInput.classList.add('Exam_changed');
        }
    });
});

ressourceNote.forEach(ressourceInput => {
    ressourceInput.addEventListener('input', () => {
        if (ressourceInput.value !== "") {
            ressourceInput.classList.add('Ressource_changed');
        }
    });
});

function EnregistrerNote() {
    let url = "http://localhost:10000/liste/ajout";
    let datas = {
        idEleve: [],
        idDiscipline: disciplineInput.value,
        semestre: semestre.getAttribute('idSemestre'),
        noteRessource: [],
        noteExamen: [],
    };

    eleves.forEach(eleve => {
        let idEleve = eleve.getAttribute('idEleve');
        let nearInput1 = eleve.parentElement.parentElement.children[1].children[0].children[0]
        let nearInput2 = eleve.parentElement.parentElement.children[1].children[0].children[1]
        if (nearInput1.value !== "" || nearInput2.value !== "") {
            datas.idEleve.push(idEleve);
        }
    });
    let examChanged = document.querySelectorAll('.Exam_changed');
    examChanged.forEach(examNote => {
        let noteExamen = examNote.value;
        datas.noteExamen.push(noteExamen);
    });
    let ressourceChanged = document.querySelectorAll('.Ressource_changed');
    ressourceChanged.forEach(ressourceNote => {
        let noteRessource = ressourceNote.value;
        datas.noteRessource.push(noteRessource);
    });
    fetch(url, {
            method: "POST",
            body: JSON.stringify(datas),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response =>{
            if(!response.ok){
                throw new Error("Erreur");
            }
            return response.json();
        })
        .then(datas => {
            console.log(datas);
        });
}

</script>