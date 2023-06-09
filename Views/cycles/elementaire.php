<div class="container">
    <h1>Liste des classes primaires</h1>
    <div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($params['active'] as $annee) : ?>
                <a class="nav-link d-inline-block mb-2 bg-primary text-white" href="/annee">Année Scolaire: <?= $annee->annee_scolaire ?></a>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3 d-flex justify-content-end align-items-center">
<a href="/classe"><i class="fa-solid fa-plus" style="color: #1a58bc;"></i></a>
        </div>
    </div>
</div>
    <ul class="list-group">
            <li class="list-group-item bg-light mb-3 text-center ">
        <?php foreach ($params['cycle'] as $primaires) : ?>
            <a href="/liste/nom=<?= $primaires->nom ?>" class="fs-9 d-block text-dark text-decoration-none">
                <?php foreach ($params['active'] as $annee) : ?>
                    <?php if ($annee->annee_scolaire == $primaires->anee) : ?>
                        <?= $primaires->nom ?>
                    <?php endif; ?>
            <?php endforeach; ?>
                </a>
        <?php endforeach; ?>

            </li>
    </ul>
</div>
</body>
</html>