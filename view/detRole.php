<?php ob_start();?>

<p class="intro">Ce role a été joué par <?= $requete->rowCount() ?> acteurs</p>

    <table class="movie">
        <thead>
            <tr>
                <th class="column">FILM</th>
                <th colspan="2" class="column">Acteur</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $role) { ?>
                    <tr>
                        <td class="lineMovie"><?=$role["titre"] ?></td>
                        <td class="lineMovie"><?=$role["nom_personnage"] ?></td>
                        <td class="lineMovie"><?=$role["prenom_personnage"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    $titre = $role["nom_role"];
    $titre_secondaire = $role["nom_role"];
    $contenu = ob_get_clean();

    require "view/template.php";

    ?> 