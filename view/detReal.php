<?php ob_start();?>

<p class="intro">Ce réalisateur a réalisé <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th class="column">Sexe</th>
                <th class="column">Date de naissance</th>
                <th class="column">Réalisations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $real) { ?>
                    <tr>
                        <td class="lineMovie"><?=$real["sexe"] ?></td>
                        <td class="lineMovie"><?=$real["date_naissance"] ?></td>
                        <td class="lineMovie"><?=$real["titre"] ?></td>
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