<?php

ob_start()

?>

<p class="intro">Il y a <?= $requete->rowCount() ?> réalisateurs</p>

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
            foreach($requete->fetchAll() as $real) { ?>
                <tr>

                <td class="lineMovie"><a href="index.php?action=detReal&id=<?= $real['id_realisateur']?>"><?=$real["nom_personnage"] ?></td>

                <td class="lineMovie"><?= $real["prenom_personnage"] ?></td>

                <td class="lineMovie"><?= $real["date_naissance"] ?></td>

                <td class="lineMovie"><?= $real["sexe"] ?></td>
                <td class="lineMovie"><img src="<?=$real["photo_personnage"] ?>" alt=""></td>

                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des réalisateurs";
$titre_secondaire = "Liste des réalisateurs";

$contenu = ob_get_clean();

require "view/template.php";