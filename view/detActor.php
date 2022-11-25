<?php ob_start(); ?>


<table class="movie">
    <thead>
        <tr>
            <th class="column">Date de naissance</th>
            <th class="column">Sexe</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $film = $actor->fetch()?>?>
                <tr>
                    <td class="lineMovie"><?= $actor["date_naissance"] ?></td>
                    <td class="lineMovie"><?= $actor["sexe"] ?></td>
                    <td class="lineMovie"><img src="<?=$actor["photo_personnage"] ?>" alt=""></td>
                </tr>
    </tbody>
</table>

<?php

$titre = $actor["nom_personnage"]." ".$actor["prenom_personnage"];
$titre_secondaire = $actor["nom_personnage"]." ".$actor["prenom_personnage"];
$contenu = ob_get_clean();

require "view/template.php";