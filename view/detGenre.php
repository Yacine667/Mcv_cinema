<?php ob_start();?>

<p>Ce genre a <?= $requete->rowCount() ?> films</p>

    <table>
        <thead>
            <tr>
                <th>FILMS</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $genre) { ?>
                    <tr>
                        <td><?=$genre["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php

    $titre = $genre["libelle"];
    $titre_secondaire = "informations du genre";
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 