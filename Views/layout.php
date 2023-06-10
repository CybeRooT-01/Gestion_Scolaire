<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <?php if (isset($params['styles'])) : ?>
        <link rel="stylesheet" href="<?= $params['styles']  ?>">
    <?php endif ?>
    <title></title>
</head>
<body>
    <header style="position: absolute; top:0; right:0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])): ?>
            <p class="btn btn-primary mr-4 mt-3" ><?= $_SESSION['user']['nom']?></p>
            <a class="navbar-brand" href="/niveau">Accueil</a>
            <a class="navbar-brand" href="/logout">Deconnexion</a>
            <?php endif; ?>
        </nav>
    </header>
    <!-- <?= $content ?> -->
</body>
<?php if (isset($params['scripts'])) : ?>
        <script src="<?= $params['scripts']  ?>"></script>
    <?php endif ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>