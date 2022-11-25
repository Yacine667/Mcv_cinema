<?php

namespace Controller;
use Model\Connect;

class CinemaController {


    public function listFilms() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT titre, annee_sortie_fr, id_film, affiche
            FROM film
        ");      


        require "view/listFilms.php";
    }

    public function listGenre() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
            SELECT libelle, id_genre
            FROM genre
        ");        


        require "view/listGenre.php";
    }

    public function listActors() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personnage,prenom_personnage,date_naissance,sexe, id_acteur, photo_personnage
        FROM personnage 
        INNER JOIN acteur ON personnage.id_personnage = acteur.id_personnage
        ");        


        require "view/listActors.php";
    }

    public function listReal() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personnage,prenom_personnage,date_naissance,sexe, id_realisateur, photo_personnage
        FROM personnage 
        INNER JOIN realisateur ON personnage.id_personnage = realisateur.id_personnage
        ");        


        require "view/listReal.php";
    }

    public function listRealisateur() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_personnage,prenom_personnage,date_naissance,sexe, id_realisateur 
        FROM personnage 
        INNER JOIN realisateur ON personnage.id_personnage = realisateur.id_personnage
        ");
        $requetegenre = $pdo->query("
        SELECT libelle, id_genre
        FROM genre");        


        require "view/addFilm.php";
    }

    public function listRole() {

        $pdo = Connect::seConnecter();
        $requete = $pdo->query("
        SELECT nom_role, id_role
        FROM role
        ");        

        require "view/listRole.php";
    }

    public function detActor($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
        SELECT titre, nom_personnage, prenom_personnage, sexe, date_naissance, id_acteur, photo_personnage
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
            SELECT id_film, titre, duree, annee_sortie_fr, synopsis, nom_personnage, prenom_personnage, nom_role,affiche
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
            SELECT libelle, id_genre, titre,affiche
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
            SELECT nom_role,nom_personnage, prenom_personnage, titre, id_acteur, photo_role
            FROM role
            NATURAL JOIN personnage
            NATURAL JOIN acteur
            NATURAL JOIN film
            NATURAL JOIN jouer
            WHERE id_role = :id
        ");
        $requete->execute(["id"=> $id]);

        require "view/detRole.php";
    }

    public function detReal($id) {

        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("
            SELECT titre, nom_personnage, prenom_personnage, sexe, date_naissance, id_realisateur, photo_personnage
            FROM film
            NATURAL JOIN personnage
            NATURAL JOIN realisateur
            WHERE id_realisateur = :id
        ");
        $requete->execute(["id"=> $id]);

        require "view/detReal.php";
    }

    public function formAddActor()
    {
        require 'view/addActor.php';
    }

    public function addPersonnage()
    {
        $nom_personnage = filter_input(INPUT_POST,'nom_personnage',FILTER_SANITIZE_SPECIAL_CHARS);

        $prenom_personnage = filter_input(INPUT_POST,'prenom_personnage',FILTER_SANITIZE_SPECIAL_CHARS);

        $date_naissance = filter_input(INPUT_POST,'date_naissance',FILTER_SANITIZE_SPECIAL_CHARS);

        $sexe = filter_input(INPUT_POST,'sexe',FILTER_SANITIZE_SPECIAL_CHARS);;
        
        $pdo = Connect::seConnecter();
        $requetePersonnage = $pdo->prepare("INSERT INTO personnage (nom_personnage, prenom_personnage, date_naissance, sexe)  VALUES(:nom_personnage,:prenom_personnage,:date_naissance,:sexe)");
        $requetePersonnage->execute([
            "nom_personnage" => $nom_personnage,
            "prenom_personnage" => $prenom_personnage,
            "date_naissance" => $date_naissance,
            "sexe" => $sexe
        ]);

    }

    public function addActor()
    {
        $pdo = Connect::seConnecter();
        $requetePersonnage = $pdo->query("INSERT INTO acteur(id_personnage) 
        SELECT MAX(id_personnage) FROM personnage");

        header("location:index.php?action=formAddActor");
    }

    public function formAddReal()
    {
        require 'view/addReal.php';
    }

    public function addReal()
    {
        $pdo = Connect::seConnecter();
        $requetePersonnage = $pdo->query("INSERT INTO realisateur(id_personnage) 
        SELECT MAX(id_personnage) FROM personnage");

        header("location:index.php?action=formAddReal");
    }

    public function formAddGenre()
    {
        require 'view/addGenre.php';
    }

    public function addGenre()
    {

        $libelle = filter_input (INPUT_POST,'libelle',FILTER_SANITIZE_SPECIAL_CHARS);

        $pdo = Connect::seConnecter();
        $requeteGenre = $pdo->prepare("INSERT INTO genre (libelle) VALUES(:libelle)");
        $requeteGenre->execute(['libelle' => $libelle]);

        header("location:index.php?action=formAddGenre");
    }

    public function formAddFilm()
    {
        require 'view/addFilm.php';
    }

    public function addFilm()
    {
        
        $titre = filter_input(INPUT_POST,'titre',FILTER_SANITIZE_SPECIAL_CHARS);
        
        $annee_sortie_fr = filter_input(INPUT_POST,'annee_sortie_fr',FILTER_SANITIZE_NUMBER_INT);        

        $duree = filter_input(INPUT_POST,'duree',FILTER_SANITIZE_NUMBER_INT);

        $synopsis = filter_input(INPUT_POST,'synopsis',FILTER_SANITIZE_SPECIAL_CHARS);

        $realisateur = filter_input(INPUT_POST,'realisateur',FILTER_SANITIZE_SPECIAL_CHARS);
        
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("INSERT INTO film (titre,annee_sortie_fr,duree,synopsis,id_realisateur)
        VALUES(:titre,:annee_sortie_fr,:duree,:synopsis,:id_realisateur)");
        $requete->execute([
            'titre' => $titre,
            'annee_sortie_fr' => $annee_sortie_fr,
            'duree' => $duree,
            'synopsis' => $synopsis,
            'id_realisateur' => $realisateur            
        ]);
        
        header("location:index.php?action=formAddFilm");
    }
    public function choixGenre($genre)
    {
        $pdo = Connect::seConnecter();
        $requete = $pdo->prepare("INSERT INTO posseder (id_film,id_genre) 
        VALUES((SELECT MAX(id_film) FROM film),:genre)");
        $requete->execute(['genre' => $genre]);
    }


}

    
