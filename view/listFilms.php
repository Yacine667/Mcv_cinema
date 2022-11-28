<?php 

ob_start()

?>

<p class="intro">Il y a <?= $requete->rowCount() ?> films</p>

<table class="movie">
    <thead>
        <tr>
            <th class="column">Titre</th>
            <th class="column">Année de sortie</th>           
        </tr>
    </thead>
    <tbody>
        
        <?php
            foreach($requete->fetchAll() as $film) { ?>
        <tr>

                <td class="lineMovie"><a href="index.php?action=detFilm&id=<?= $film['id_film']?>"><?=$film["titre"] ?></a></td>

                <td class="lineMovie"><?= $film["annee_sortie_fr"] ?></td>

                <td class="lineMovie"><img src="<?=$film["affiche"] ?>" alt=""></td>
            
        </tr>
            
            <?php } ?>
            
    </tbody>
</table>

<?php

$titre = "Liste des films";
$titre_secondaire = "Liste des films";

$contenu = ob_get_clean();

require "view/template.php";