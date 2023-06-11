<div class="container mt-4">
    <a href="" class="btn"></a>
    <h2>Coefficients / Ponderations</h2>
    <div class="container text-center mb-2">
        <a href="/classe/liste/<?= $params['idclasse'] ?>" class="btn btn-primary"><?= $params['className']->nom ?></a>
        <a href="/discipline/gestion" class="btn btn-primary">Gerer les disciplines</a>
    </div>
    <table class="table">
        <thead class="text-center">
            <tr>
                <th>Discipline</th>
                <th>Ressources</th>
                <th>Examens</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['disciplines'] as $discipline) : ?>
                <tr>
                    <td><?= $discipline->discipline ?></td>
                    <td>
                        <input type="number" class="form-control ressource" value="">
                    </td>
                    <td>
                        <input type="number" class="form-control examen" value="">
                    </td>
                    <td>
                        <input type="hidden" class="id" value="<?= $discipline->id_discipline ?>" >
                        <input type="hidden" class="coefid" value="<?=$discipline->coef_id?>">
                        <button type="button" class="btn btn-danger btn-sm btnDelete">&times;</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="container text-center">
        <button type="button" class="btn btn-primary update" onclick="updateDiscipline()">Mettre a jour</button>
    </div>
</div>
<script>
const btnDelete = document.querySelectorAll('.btnDelete');
btnDelete.forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.previousElementSibling.value;
        let data = {
            id: parseInt(id)
        };
        let url = 'http://localhost:10000/coef/delete/';
        fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'success') {
                    this.parentElement.parentElement.remove();
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    })
});
function updateDiscipline() {
    const inputs = document.querySelectorAll('input');
    let data ={
        ressources: [],
        examens: [],
        id: []
    };
    let hasError = false;
    inputs.forEach(input => {
        if (input.classList.contains('ressource')) {
            const ressourceValue = input.value.trim() !== '' ? parseInt(input.value) : 20;
            if (isNaN(ressourceValue)) {
                showBootstrapAlert('Les données de ressource sont invalides', 'alert-danger');
                hasError = true;
            } else {
                data.ressources.push(ressourceValue);
            }
        }
        if (input.classList.contains('examen')) {
            const examenValue = input.value.trim() !== '' ? parseInt(input.value) : 20;
            if (isNaN(examenValue)) {
                showBootstrapAlert("Les données d'examen sont invalides", 'alert-danger');
                hasError = true;
            } else {
                data.examens.push(examenValue);
            }
        }
        if (input.classList.contains('coefid')) {
            data.id.push(parseInt(input.value));
        }
    });
    if (hasError) {
        return;
    }
    let url = 'http://localhost:10000/coef/update/';
    fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.status == 'success') {
                showBootstrapAlert(data.message, 'alert-success');
            } else {
                showBootstrapAlert(data.message, 'alert-danger');
            }
        })
        .catch((error) => {
            console.error('Error:', error);
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