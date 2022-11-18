<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> réalisateurs</p>

<table class="uk-table uk-table-stripped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $real) { ?>
                <tr>
                <td><a href="index.php?action=detReal&id=<?= $real['id_realisateur']?>"><?=$real["nom_personnage"] ?></td>
                    <td><?= $real["prenom_personnage"] ?></td>
                    <td><?= $real["date_naissance"] ?></td>
                    <td><?= $real["sexe"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";
$contenu = ob_get_clean();

require "view/template.php";