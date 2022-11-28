<?php 

ob_start()

?>

<p class="intro">Il y a <?= $requete->rowCount() ?> genres</p>

<table class="movie">
    <thead>
        <tr>
            <th class="column">Libelle</th>          
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre) { ?>
                <tr>

                <td class="lineMovie"><a href="index.php?action=detGenre&id=<?= $genre['id_genre']?>"><?=$genre["libelle"] ?></td>  

                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";

$contenu = ob_get_clean();

require "view/template.php";