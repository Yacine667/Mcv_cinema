<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> films</p>

<table class="uk">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année de sortie</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $film) { ?>
                <tr>
                <td><a href="index.php?action=detFilm&id=<?= $film['id_film']?>"><?=$film["titre"] ?></a></td>
                <td><?= $film["annee_sortie_fr"] ?></td>
                <td><img height="100px" src="<?=$film["affiche"] ?>" alt=""></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";
$contenu = ob_get_clean();

require "view/template.php";