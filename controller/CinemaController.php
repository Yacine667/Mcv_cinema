<?php

namespace Controller;
use Model\Connect;

class CinemaController {

    /**
     * Lister les films
     */
    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT titre, annee_sortie_fr FROM film
        ");

        


        require "view/listFilms.php";
    }

    public function listGenre() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT libelle FROM genre
        ");

        


        require "view/listGenre.php";
    }


    
}