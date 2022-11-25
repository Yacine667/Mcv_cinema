<?php ob_start(); ?>

<p class="intro">Informations sur le film</p>


    <table class="movie">
        <thead>
            <tr>
               
                <th class="column">Date de sortie</th>
                <th class="column">Durée en minutes</th>
                <th class="column">Affiche</th>

            </tr>
        </thead>
        <tbody>
            <?php
                
                    $film = $requete->fetch()?>
                    <tr>
         
                        <td class="lineMovie"><?=$film["annee_sortie_fr"] ?></td>
                        <td class="lineMovie"><?=$film["duree"] ?></td>
                        <td class="lineMovie"><img src="<?=$film["affiche"] ?>" alt=""></td>
                    </tr>
            
        </tbody>
    </table>

    <?php
  
    $titre = $film["titre"];
    $titre_secondaire = $film["titre"];
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
