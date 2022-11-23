<?php ob_start(); ?>

<p>Informations sur le film</p>


    <table>
        <thead>
            <tr>
               
                <th>Date de sortie</th>
                <th>Durée</th>
                <th>Nom Acteur</th>
                <th>Prénom Acteur</th>
                <th>Rôle</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $film) { ?>
                    <tr>
         
                        <td><?=$film["annee_sortie_fr"] ?></td>
                        <td><?=$film["duree"] ?></td>
                        <td><?=$film["nom_personnage"] ?></td>
                        <td><?=$film["prenom_personnage"] ?></td>
                        <td><?=$film["nom_role"] ?></td>
                        <td><img height="100px" src="<?=$film["affiche"] ?>" alt=""></td>
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
