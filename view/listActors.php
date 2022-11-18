<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> acteurs</p>

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
            foreach($requete->fetchAll() as $actor) { ?>
                <tr>
                    <td><a href="index.php?action=detActor&id=<?= $actor['id_acteur']?>"><?=$actor["nom_personnage"]  ?></a></td>
                    <td><?= $actor["prenom_personnage"] ?></td>
                    <td><?= $actor["date_naissance"] ?></td>
                    <td><?= $actor["sexe"] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();

require "view/template.php";