<?php 

ob_start()

?>

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
                        
                        <td class="lineMovie"><a href="index.php?action=detFilm&id=<?= $role['id_film']?>"><?=$role["titre"] ?></a></td>

                        <td class="lineMovie"><a href="index.php?action=detActor&id=<?= $role['id_acteur']?>"><?=$role["nom_personnage"] ?></a></td>

                        <td class="lineMovie"><a href="index.php?action=detActor&id=<?= $role['id_acteur']?>"><?=$role["prenom_personnage"] ?></a></td>

                        <td class="lineMovie"><img src="<?=$role["photo_role"] ?>" alt=""></td>

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