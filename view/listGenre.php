<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> genres</p>

<table class="uk-table uk-table-stripped">
    <thead>
        <tr>
            <th>Libelle</th>          
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $genre) { ?>
                <tr>
                    <td><?= $genre["libelle"] ?></td>                    
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des genres";
$titre_secondaire = "Liste des genres";
$contenu = ob_get_clean();

require "view/template.php";