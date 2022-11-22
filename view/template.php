<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    
    <link rel="stylesheet" href="public/style.css">
    <title><?= $titre ?></title>
</head>

<div class="barNav">
    <div class="barNav1">
        <nav>

            <ul>
                    <li class="list"><a class="list"href="index.php?action=listFilms"> Liste Des Films</a></li>
                    <li class="list"><a class="list" href="index.php?action=listGenre"> Liste Des Genres</a></li>
                    <li class="list"><a class="list" href="index.php?action=listActors"> Liste Des Acteurs</a></li>
                    <li class="list"><a class="list" href="index.php?action=listReal"> Liste Des Réalisateurs</a></li>
                    <li class="list"><a class="list" href="index.php?action=listRole"> Liste Des Rôles</a></li>
            </ul>

    </div>

    <h1 class="uk-heading-divider"> PDO Cinema</h1>

    <div class="barNav2">

            <ul>
                    <li class="list"><a class="list" href="index.php?action=formAddActor">Ajouter Acteur</a></li>
                    <li class="list"><a class="list" href="index.php?action=formAddReal">Ajouter Réalisateur</a></li>
                    <li class="list"><a class="list" href="index.php?action=formAddFilm">Ajouter Film</a></li>
                    <li class="list"><a class="list" href="index.php?action=formAddGenre">Ajouter Genre</a></li>
            </ul>

        </nav>
    </div>
</div>
<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">                
                <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
    
</body>
</html>