-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table cinema1. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `Acteur_Personnage_FK` (`id_personnage`),
  CONSTRAINT `Acteur_Personnage_FK` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.acteur : ~8 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `id_personnage`) VALUES
	(1, 5),
	(2, 6),
	(3, 7),
	(4, 8),
	(5, 9),
	(6, 10),
	(8, 15);
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `annee_sortie_fr` year(4) NOT NULL,
  `duree` int(11) NOT NULL,
  `synopsis` text,
  `note` tinyint(4) DEFAULT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `Film_Realisateur_FK` (`id_realisateur`),
  CONSTRAINT `Film_Realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.film : ~7 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie_fr`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Le seigneur des anneaux : la Communauté de lanneau', '2001', 228, NULL, NULL, NULL, 2),
	(2, 'Prisoners', '2013', 153, NULL, NULL, NULL, 1),
	(3, 'Blade Runner', '2019', 153, NULL, NULL, NULL, 1),
	(4, 'DUNE', '2021', 155, NULL, 5, NULL, 1),
	(5, 'Le Parrain II', '1974', 112, NULL, NULL, NULL, 3),
	(6, 'Gran Torino', '2019', 112, NULL, NULL, NULL, 5),
	(7, 'Alien, le huitième passager', '1979', 117, NULL, NULL, NULL, 4),
	(34, 'Captain Fantastic', '2000', 110, 'Dans les forêts reculées du nord-ouest des Etats-Unis, vivant isolé de la société, un père dévoué a consacré sa vie toute entière à faire de ses six jeunes enfants d’extraordinaires adultes. Mais quand le destin frappe sa famille, ils doivent abandonner ce paradis qu’il avait créé pour eux. La découverte du monde extérieur va l’obliger à questionner ses méthodes d’éducation et remettre en cause tout ce qu’il leur a appris.', 3, '', 2);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.genre : ~5 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'science-fiction'),
	(2, 'Fantasy'),
	(3, 'Gangsters'),
	(4, 'Thriller'),
	(5, 'drame');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_role`,`id_acteur`),
  KEY `jouer_Role0_FK` (`id_role`),
  KEY `jouer_Acteur1_FK` (`id_acteur`),
  CONSTRAINT `jouer_Acteur1_FK` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `jouer_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `jouer_Role0_FK` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.jouer : ~9 rows (environ)
/*!40000 ALTER TABLE `jouer` DISABLE KEYS */;
INSERT INTO `jouer` (`id_film`, `id_role`, `id_acteur`) VALUES
	(4, 3, 1),
	(4, 3, 2),
	(2, 4, 6),
	(1, 5, 1),
	(2, 6, 3),
	(3, 7, 4),
	(7, 7, 2),
	(6, 8, 5),
	(6, 9, 2),
	(4, 10, 8);
/*!40000 ALTER TABLE `jouer` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. personnage
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_personnage` varchar(20) NOT NULL,
  `prenom_personnage` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(10) NOT NULL,
  PRIMARY KEY (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.personnage : ~12 rows (environ)
/*!40000 ALTER TABLE `personnage` DISABLE KEYS */;
INSERT INTO `personnage` (`id_personnage`, `nom_personnage`, `prenom_personnage`, `date_naissance`, `sexe`) VALUES
	(1, 'Villeneuve', 'Denis', '1967-10-03', 'homme'),
	(2, 'Jackson', 'Peter', '1961-10-31', 'homme'),
	(3, 'Coppola', 'Francis', '1939-10-31', 'homme'),
	(4, 'Scott', 'Ridley', '1937-11-30', 'homme'),
	(5, 'Chalamet', 'Timothée', '1997-01-30', 'homme'),
	(6, 'Young', 'Sean', '1972-11-12', 'femme'),
	(7, 'Davis', 'Viola', '1987-07-24', 'femme'),
	(8, 'Weaver', 'Sigourney', '1949-10-08', 'femme'),
	(9, 'Eastwood', 'Clint', '1957-02-17', 'homme'),
	(10, 'Huppert', 'Isabelle', '1953-06-16', 'femme'),
	(15, 'Law', 'Jude', '1970-07-24', 'homme'),
	(17, 'Campion', 'Jane', '1999-07-24', 'femme'),
	(18, 'Ross', 'Matt', '1980-10-15', 'homme');
/*!40000 ALTER TABLE `personnage` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `posseder_Film0_FK` (`id_film`),
  CONSTRAINT `posseder_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `posseder_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.posseder : ~9 rows (environ)
/*!40000 ALTER TABLE `posseder` DISABLE KEYS */;
INSERT INTO `posseder` (`id_genre`, `id_film`) VALUES
	(2, 1),
	(3, 1),
	(4, 2),
	(1, 3),
	(1, 4),
	(3, 5),
	(5, 6),
	(1, 7),
	(5, 34);
/*!40000 ALTER TABLE `posseder` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_personnage` int(11) NOT NULL,
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personnage` (`id_personnage`),
  CONSTRAINT `Realisateur_Personnage_FK` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.realisateur : ~7 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_personnage`, `id_realisateur`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(9, 5),
	(17, 11),
	(18, 12);
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la table cinema1. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.role : ~9 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Rick Deckard'),
	(2, 'Rachel'),
	(3, 'Paul'),
	(4, 'Ellen'),
	(5, 'Legolas'),
	(6, 'Patricia'),
	(7, 'Ellen Ripley'),
	(8, 'William'),
	(9, 'Samantha'),
	(10, 'Duc leto');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
