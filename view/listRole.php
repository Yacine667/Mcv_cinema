<?php ob_start(); ?>

<p class="uk-label uk-label-warning">Il y a <?= $requete->rowCount() ?> rôles</p>

<table class="uk-table uk-table-stripped">
    <thead>
        <tr>
            <th>Rôle</th>            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $role) { ?>
                <tr>
                <td><a href="index.php?action=detRole&id=<?= $role['id_role']?>"><?=$role["nom_role"] ?></td>                  
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();

require "view/template.php";