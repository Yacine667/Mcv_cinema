<?php ob_start(); ?>

<p class="intro">Informations sur le film</p>


    <table>
        <thead>
            <tr>
               
                <th class="column">Date de sortie</th>
                <th class="column">Durée</th>
                <th colspan="2" class="column">Acteur</th>
                
                <th class="column">Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $film) { ?>
                    <tr>
         
                        <td class="lineMovie"><?=$film["annee_sortie_fr"] ?></td>
                        <td class="lineMovie"><?=$film["duree"] ?></td>
                        <td class="lineMovie"><?=$film["nom_personnage"] ?></td>
                        <td class="lineMovie"><?=$film["prenom_personnage"] ?></td>
                        <td class="lineMovie"><?=$film["nom_role"] ?></td>
                        <td class="lineMovie"><img src="<?=$film["affiche"] ?>" alt=""></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
  
    $titre = $film["titre"];
    $titre_secondaire = $film["titre"];
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
