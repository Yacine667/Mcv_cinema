<?php ob_start();?>

<p>Ce réalisateur a réalisé <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>SEXE</th>
                <th>NAISSANCE</th>
                <th>TITRE FILMS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $real) { ?>
                    <tr>
                        <td><?=$real["nom_personnage"] ?></td>
                        <td><?=$real["prenom_personnage"] ?></td>
                        <td><?=$real["sexe"] ?></td>
                        <td><?=$real["date_naissance"] ?></td>
                        <td><?=$real["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php
    
  
    $titre = "informations réalisateur";
    $titre_secondaire = "informations du realisateur";

    require "view/template.php";

    ?> 