<div class="container mt-4">
    <a href="" class="btn"></a>
    <h2>Coefficients / Ponderations</h2>
    <div class="container text-center mb-2">
        <a href="/classe/liste/<?=$params['idclasse']?>" class="btn btn-primary"><?=$params['className']->nom?></a>
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
              <button type="button" class="btn btn-danger btn-sm">&times;</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="container text-center">
        <button type="button" class="btn btn-primary">Mettre a jour</button>
    </div>
  </div>