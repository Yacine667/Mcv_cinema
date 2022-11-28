<?php ob_start();
$detReal = $requeteReal->fetch();
echo $detReal["date_naissance"]."<br>";
echo $detReal["sexe"];
?>
<img height="200px" src="<?=$detReal["photo_personnage"] ?>" alt="">

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

                        <td class="lineMovie"><?=$real["titre"] ?></td>
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