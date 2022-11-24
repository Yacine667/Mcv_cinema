<?php ob_start();?>

<p class="intro">Ce genre a <?= $requete->rowCount() ?> films</p>

    <table class="movie">
        <thead>
            <tr>
                <th class="column">Films</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($requete->fetchAll() as $genre) { ?>
                    <tr>
                        <td class="lineMovie"><?=$genre["titre"] ?></td>
                    </tr>
            <?php } ?>   
        </tbody>
    </table>

    <?php

    $titre = $genre["libelle"];
    $titre_secondaire = $genre["libelle"];
    $contenu = ob_get_clean();
     require "view/template.php";

    ?> 