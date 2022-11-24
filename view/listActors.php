<?php ob_start(); ?>

<p class="intro">Il y a <?= $requete->rowCount() ?> acteurs</p>

<table class="movie">
    <thead>
        <tr>
            <th class="column">Nom</th>
            <th class="column">Prénom</th>
            <th class="column">Date de naissance</th>
            <th class="column">Sexe</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actor) { ?>
                <tr>
                    <td class="lineMovie"><a href="index.php?action=detActor&id=<?= $actor['id_acteur']?>"><?=$actor["nom_personnage"]  ?></a></td>
                    <td class="lineMovie"><?= $actor["prenom_personnage"] ?></td>
                    <td class="lineMovie"><?= $actor["date_naissance"] ?></td>
                    <td class="lineMovie"><?= $actor["sexe"] ?></td>
                    <td class="lineMovie"><img src="<?=$actor["photo_personnage"] ?>" alt=""></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des acteurs";
$titre_secondaire = "Liste des acteurs";
$contenu = ob_get_clean();

require "view/template.php";