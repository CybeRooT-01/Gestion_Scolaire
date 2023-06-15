<div class="container">
    <?php if ($params['cycle'] == 'elementaire') : ?>
        <h1>Liste des classes primaires</h1>
    <?php elseif ($params['cycle'] == 'secondaireInferieur') : ?>
        <h1>Liste des classes Secondaire Inférieur</h1>
    <?php elseif ($params['cycle'] == 'secondaireSuperieur') : ?>
        <h1>Liste des classes Secondaire Supérieur</h1>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php foreach ($params['active'] as $annee) : ?>
                    <a class="nav-link d-inline-block mb-2 bg-primary text-white" href="/annee">Année Scolaire: <?= $annee->annee_scolaire ?></a>
                <?php endforeach; ?>
            </div>
            <div class="col-md-3 d-flex justify-content-end align-items-center">
                <a href="/classe"><i class="fa-solid fa-plus mt-5" style="color: #1a58bc;"></i></a>
            </div>
        </div>
    </div>
    <ul class="list-group">
        <?php foreach ($params['classes'] as $classe) : ?>
            <?php foreach ($params['active'] as $annee) : ?>
                <?php if ($annee->annee_scolaire == $classe->anee) : ?>
                    <li class="list-group-item bg-light mb-3 text-center">
                        <a href="/classe/liste/<?= $classe->id ?>" class="fs-9 d-block text-dark text-decoration-none">
                            <?= $classe->nom ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
</div>
