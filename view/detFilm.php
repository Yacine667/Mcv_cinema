<?php ob_start(); ?>

<p>Informations sur le film</p>

    <table>
        <thead>
            <tr>
                <th>TITRE</th>
                <th>DATE DE SORTIE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $film) { ?>
                    <tr>
                        <td><?=$film["titre"] ?></td>
                        <td><?=$film["annee_sortie_fr"] ?></td>
                        <td><?=$film["duree"] ?></td>
                        <td><?=$film["nom_personnage"] ?></td>
                        <td><?=$film["prenom_personnage"] ?></td>
                        <td><?=$film["nom_role"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
  
    $titre = "Liste des films";
    $titre_secondaire = "Liste des films";
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 
