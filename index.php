<?php

//$nom_personnage = (isset($_GET["nom_personnage"])) ? $_GET["nom_personnage"] : null;

//$prenom_personnage = (isset($_GET["prenom_personnage"])) ? $_GET["prenom_personnage"] : null;

//$date_naissance = (isset($_GET["date_naissance"])) ? $_GET["date_naissance"] : null;

//$sexe = (isset($_GET["sexe"])) ? $_GET["sexe"] : null;

//$libelle = (isset($_GET["libelle"])) ? $_GET["libelle"] : null;

/*$titre = (isset($_GET["titre"])) ? $_GET["titre"] : null;

$annee_sortie_fr = (isset($_GET["annee_sortie_fr"])) ? $_GET["annee_sortie_fr"] : null;

$duree = (isset($_GET["duree"])) ? $_GET["duree"] : null;

$synopsis = (isset($_GET["synopsis"])) ? $_GET["synopsis"] : null;

$realisateur = (isset($_GET["realisateur"])) ? $_GET["realisateur"] : null;*/

$genre = (isset($_GET["genre"])) ? $_GET["genre"] : null;


use Controller\CinemaController;

spl_autoload_register(function ($class_name){
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();

$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ( $_GET["action"]) {

        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "detFilm" : $ctrlCinema->detFilm($id); break;

        case "listActors" : $ctrlCinema->listActors(); break;
        case "detActor" : $ctrlCinema->detActor($id); break;

        case "listGenre" : $ctrlCinema->listGenre(); break;
        case "detGenre" : $ctrlCinema->detGenre($id); break;

        case "listReal" : $ctrlCinema->listReal(); break;
        case "detReal" : $ctrlCinema->detReal($id); break;

        case "listRole" : $ctrlCinema->listRole(); break;
        case "detRole" : $ctrlCinema->detRole($id); break;

        case 'formAddActor':
            $ctrlCinema->formAddActor();
            break;
        case 'addActor':
            $ctrlCinema->addPersonnage();
            $ctrlCinema->addActor();
            break;

        case 'formAddReal':
            $ctrlCinema->formAddReal();
            break;
        case 'addReal':
            $ctrlCinema->addPersonnage();
            $ctrlCinema->addReal();
            break;

        case 'formAddGenre':
            $ctrlCinema->formAddGenre();
            break;
        case 'addGenre':
            $ctrlCinema->addGenre();
            break;

        case 'formAddFilm':
            $ctrlCinema->listRealisateur();
            break;
        case 'addFilm':            
            $ctrlCinema->addFilm();
            break;

    }

}

?>