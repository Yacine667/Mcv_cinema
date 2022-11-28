<?php 

ob_start();

$detReal = $requeteReal->fetch()

?>

<p class="info"><?= $detReal["date_naissance"] ?>
<p class="info"><?= $detReal["sexe"]; ?>

<div class="lineMovie">
    <img src="<?=$detReal["photo_personnage"] ?>" alt="">
</div>

<p class="intro">Ce réalisateur a réalisé <?= $requete->rowCount() ?> films</p>

    <table class="movie">
        <thead>
            <tr>
                <th class="column">Réalisations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $real) { ?>
                    <tr>

                        <td class="lineMovie"><a href="index.php?action=detFilm&id=<?= $real['id_film']?>"><?=$real["titre"] ?></a></td>

                        <td class="lineMovie"><img src="<?=$real["affiche"] ?>" alt=""></td>

                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
  
    $titre = $real["nom_personnage"]." ".$real["prenom_personnage"];
    $titre_secondaire = $real["nom_personnage"]." ".$real["prenom_personnage"];

    $contenu = ob_get_clean();

    require "view/template.php";

    ?> 