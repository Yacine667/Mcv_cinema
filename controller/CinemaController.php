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
        SELECT nom_personnage,prenom_personnage,date_naissance,sexe FROM personnage INNER JOIN acteur ON personnage.id_personnage = acteur.id_personnage
        ");        


        require "view/listActors.php";
    }

    public function listReal() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personnage,prenom_personnage,date_naissance,sexe FROM personnage INNER JOIN realisateur ON personnage.id_personnage = realisateur.id_personnage
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

    public function detActor($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT titre, nom_personnage, prenom_personnage, sexe, date_naissance, id_acteur
        FROM jouer
        NATURAL JOIN personnage
        NATURAL JOIN acteur
        NATURAL JOIN film
        WHERE id_acteur = :id
        ");
        $requete->execute(["id"=> $id]);        

        require "view/detActor.php";
    }

    public function detFilm($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT id_film, titre, duree, annee_sortie_fr, synopsis, nom_personnage, prenom_personnage, nom_role
            FROM jouer
            LEFT JOIN acteur ON jouer.id_acteur = acteur.id_acteur
            NATURAL JOIN film
            NATURAL JOIN personnage
            NATURAL JOIN role 
            WHERE id_film = :id
        ");
        $requete->execute(["id"=> $id]);

        require "view/detFilm.php";
    }

    public function detGenre($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT libelle, id_genre, titre
            FROM film
            NATURAL JOIN genre
            NATURAL JOIN posseder
            WHERE id_genre = :id
        ");
        $requete->execute(["id"=> $id]);

        require "view/detGenre.php";
    }

    public function detRole($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT nom_role,nom_personnage, prenom_personnage, titre, id_acteur
            FROM role
            NATURAL JOIN personne
            NATURAL JOIN acteur
            NATURAL JOIN film
            NATURAL JOIN jouer
            WHERE id_role = :id
        ");
        $requete->execute(["id"=> $id]);

        // On relie à la vue qui nous intéresse
        require "view/detRole.php";
    }

    public function detReal($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT titre, nom_personnage, prenom_personnage, sexe, date_naissance, id_realisateur
            FROM film
            NATURAL JOIN personnage
            NATURAL JOIN realisateur
            WHERE id_realisateur = :id
        ");
        $requete->execute(["id"=> $id]);

        require "view/detReal.php";
    }

    
}