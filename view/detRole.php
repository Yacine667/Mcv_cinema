<?php ob_start();?>

<p>Ce role a été joué par <?= $requete->rowCount() ?> acteurs</p>

    <table>
        <thead>
            <tr>
                <th>FILM</th>
                <th>Acteur</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $role) { ?>
                    <tr>
                        <td><?=$role["titre"] ?></td>
                        <td><?=$role["nom_personnage"] ?></td>
                        <td><?=$role["prenom_personnage"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
    $titre = "informations sur le genre";
    $titre_secondaire = "informations du genre";
    $contenu = ob_get_clean();

    require "view/template.php";

    ?> 