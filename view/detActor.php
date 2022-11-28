<?php 

ob_start();

$detActor = $requeteActor->fetch();?>

<p class="info"> <?=$detActor["date_naissance"];?>
<p class="info"> <?=$detActor["sexe"];?>

<div class="lineMovie">
    <img src="<?=$detActor["photo_personnage"] ?>" alt="">
    </div>

<p class="intro">Films dans lesquels il a joué :</h2>
<table class="movie">
    <thead></thead>
        <tr>
            <th class="column">Titre</th>
            <th class="column">Affiche</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $actor) { ?>
                <tr>

                    <td class="lineMovie"><a href="index.php?action=detFilm&id=<?= $actor['id_film']?>"><?= $actor["titre"] ?></a></td>

                    <td class="lineMovie"><img src="<?=$actor["affiche"] ?>" alt=""></td>

                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = $actor["nom_personnage"]." ".$actor["prenom_personnage"];
$titre_secondaire = $actor["nom_personnage"]." ".$actor["prenom_personnage"];

$contenu = ob_get_clean();

require "view/template.php";