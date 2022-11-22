<?php ob_start() ?>
<form action="index.php?action=addGenre" method="POST">
    <input type="text" class="form-control" name="action" value="addGenre" readonly hidden>
    <div class="form-group">
        <label for="nomInput">Libellé</label>
        <input type="text" class="form-control" id="nomInput" placeholder="Ex : Comédie, Thriller ..." name="libelle" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<?php

$titre = "Ajouter un genre";
$titre_secondaire = "Ajouter un genre";
$contenu = ob_get_clean();
require "view/template.php";
?>