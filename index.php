<?php


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
            $ctrlCinema->addPersonne($nom_personnage, $prenom_personnage, $date_naissance, $sexe);
            $ctrlCinema->addActor();
            break;

        case 'formAddReal':
            $ctrlCinema->formAddReal();
            break;
        case 'ajoutRealisateur':
            $ctrlCinema->addPersonne($nom_personnage, $prenom_personnage, $date_naissance, $sexe);
            $ctrlCinema->addReal();
            break;

        case 'formAddGenre':
            $ctrlCinema->formAddGenre();
            break;
        case 'addGenre':
            $ctrlCinema->addGenre($libelle);
            break;

        case 'formAddFilm':
            $ctrlCinema->formAddFilm();
            break;
        case 'ajoutFilm':
            $ctrlCinema->addFilm($titre, $annee_sortie_fr, $duree, $synopsis, $realisateur);
            $ctrlCinema->choixGenre($genre);
            break;

    }

}

?>