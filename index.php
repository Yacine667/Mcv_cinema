<?php

session_start();

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

        case 'updateLike':
            $ctrlCinema->updateLike($id);
            break;
    }

}

?>