<?php

ob_start()
?>
<form action="index.php" method="GET">
    <input type="text" class="form-control" name="action" value="addFilm" readonly hidden>
    <div class="form-group">
        <label for="nomInput">Titre</label>
        <input type="text" class="form-control" id="nomInput" name="titre" required>
    </div>
    <div class="form-group">
        <label for="dateInput">Date de sortie</label>
        <input type="date" class="form-control" id="dateInput" name="annee_sortie_fr" required>
    </div>
    <div class="form-group">
        <label for="timeInput">Duree en minute</label>
        <input type="number" class="form-control" id="timeInput" name="duree" required>
    </div>
    <div class="form-group">
        <label for="synopsisInput">Resumée</label>
        <textarea type="number" class="form-control" id="synopsisInput" name="synopsisInput" required></textarea>
    </div>
    <div class="form-group">
        <label for="selReal">Realisateur:</label>
        <select class="form-control" id="selReal" name="realisateur">
            <?php
            foreach ($requete as $real) { ?>
                <option value="<?= $real['id_realisateur'] ?>"><?php echo $real['nom_personnage'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="selGenre">Genre:</label>
        <select class="form-control" id="selGenre" name="genre" multiple>
            <?php
            foreach ($requetegenre as $genre) {
                 ?>
                <option value="<?= $genre['id_genre'] ?>"><?php echo $genre['libelle']  ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "Ajouter un film";
$titre_secondaire = "Ajouter un film";
$contenu = ob_get_clean();
require "view/template.php";
?>