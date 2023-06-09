<style>
  .custom-link {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    height: 100px;
    line-height: 50px;
    background-color: #f8f9fa;
    text-align: left;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s;
    font-size: 2em;
  }

  .custom-link:hover {
    background-color: #ddd;
    text-decoration: none;
    color: #333;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="main">Cyber School</a>
  <?php foreach ($params['active'] as $annee) : ?>
    <a class="nav-link d-inline-block mb-2 bg-primary text-white" href="/annee">Année Scolaire: <?= $annee->annee_scolaire ?></a>
  <?php endforeach; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

</nav>
<div class="container">
  <div class="row">
    <div class="col-12 mb-5">
      <a href="/niveau/elementaire" class="custom-link">Elementaire</a>
    </div>
    <div class="col-12 mb-5">
      <a href="/niveau/moyen" class="custom-link">Moyen</a>
    </div>
    <div class="col-12 mb-5">
      <a href="/niveau/secondaire" class="custom-link td-none">Secondaire</a>
    </div>
  </div>
</div>