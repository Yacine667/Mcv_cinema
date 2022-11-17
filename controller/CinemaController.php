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

    public function listActors() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personne,prenom_personne,date_naissance,sexe FROM personne INNER JOIN acteur ON personne.id_personne = acteur.id_personne
        ");        


        require "view/listActors.php";
    }

    public function listReal() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personne,prenom_personne,date_naissance,sexe FROM personne INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne
        ");        


        require "view/listReal.php";
    }

    public function listRole() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_role FROM role
        ");        


        require "view/listRole.php";
    }


    
}