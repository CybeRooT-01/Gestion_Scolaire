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
                        <input type="number" class="form-control" value="">
                    </td>
                    <td>
                        <input type="number" class="form-control" value="">
                    </td>
                    <td>
                        <input type="hidden" value="<?= $discipline->id_discipline ?>">
                        <button type="button" class="btn btn-danger btn-sm btnDelete">&times;</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="container text-center">
        <button type="button" class="btn btn-primary">Mettre a jour</button>
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

</script>