<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&family=Sono:wght@300&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="public/style.css">
    <title><?= $titre ?></title>
</head>


        <nav class="nav1">
            
            <a href="index.php?action=formAddActor">Ajouter Acteur</a>
            <a href="index.php?action=formAddReal">Ajouter Réalisateur</a>
            <a href="index.php?action=formAddFilm">Ajouter Film</a>
            <a href="index.php?action=formAddGenre">Ajouter Genre</a>
            
        </nav>       

    <h1> PDO Cinema</h1>

    <button type="button" arria-label="toggleCurtainNav1" class="nav_toggler1">
            <span class="line l1"></span>
            <span class="line l2"></span>
            <span class="line l3"></span>
        </button>


        <nav class="nav2">
            
            <a href="index.php?action=listFilms"> Liste Des Films</a>
            <a href="index.php?action=listGenre"> Liste Des Genres</a>
            <a href="index.php?action=listActors"> Liste Des Acteurs</a>
            <a href="index.php?action=listReal"> Liste Des Réalisateurs</a>
            <a href="index.php?action=listRole"> Liste Des Rôles</a>
            
        </nav>

        <button type="button" arria-label="toggleCurtainNav" class="nav_toggler">
            <span class="line l1"></span>
            <span class="line l2"></span>
            <span class="line l3"></span>
        </button>
        


<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">                
                <h2 class="titlePage"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>


<script src="public/script.js"></script>
</body>
</html>