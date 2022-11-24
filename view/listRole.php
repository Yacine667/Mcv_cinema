<?php ob_start(); ?>

<p class="intro">Il y a <?= $requete->rowCount() ?> rôles</p>

<table class="movie">
    <thead>
        <tr>
            <th class="column">Rôle</th>            
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requete->fetchAll() as $role) { ?>
                <tr>
                <td class="lineMovie"><a href="index.php?action=detRole&id=<?= $role['id_role']?>"><?=$role["nom_role"] ?></td>                  
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();

require "view/template.php";