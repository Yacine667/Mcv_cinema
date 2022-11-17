<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
</head>

<nav>
    <a href="index.php?action=listFilms"> Liste Des Films</a>
    <a href="index.php?action=listGenre"> Liste Des Genres</a>
    <a href="index.php?action=listActors"> Liste Des Acteurs</a>
    <a href="index.php?action=listReal"> Liste Des Réalisateurs</a>
    <a href="index.php?action=listRole"> Liste Des Rôles</a>
</nav>

<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <main>
            <div id="contenu">
                <h1 class="uk-heading-divider"> PDO Cinema</h1>
                <h2 class="uk-heading-bullet"><?= $titre_secondaire ?></h2>
                <?= $contenu ?>
            </div>
        </main>
    </div>
    
</body>
</html>