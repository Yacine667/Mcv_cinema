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


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema`;

-- Listage de la structure de la table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `id_personnage` int(11) NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `Acteur_Personnage_FK` (`id_personnage`),
  CONSTRAINT `Acteur_Personnage_FK` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.acteur : ~7 rows (environ)
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

-- Listage de la structure de la table cinema. film
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

-- Listage des données de la table cinema.film : ~8 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `annee_sortie_fr`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Le seigneur des anneaux : la Communauté de lanneau', '2001', 228, NULL, NULL, 'https://fr.web.img6.acsta.net/medias/nmedia/00/02/16/27/69218096_af.jpg', 2),
	(2, 'Prisoners', '2013', 153, NULL, NULL, 'https://images.affiches-et-posters.com//albums/3/5576/affiche-film-prisoners-3567.jpg', 1),
	(3, 'Blade Runner', '2019', 153, NULL, NULL, 'https://antreducinema.fr/wp-content/uploads/2020/04/BLADE-RUNNER-2049-scaled.jpg', 1),
	(4, 'DUNE', '2021', 155, NULL, 5, 'https://fr.web.img2.acsta.net/r_1280_720/pictures/21/10/07/11/00/4629229.jpg', 1),
	(5, 'Le Parrain II', '1974', 112, NULL, NULL, 'https://musicart.xboxlive.com/7/6d295200-0000-0000-0000-000000000002/504/image.jpg?w=1920&h=1080', 3),
	(6, 'Gran Torino', '2019', 112, NULL, NULL, 'https://www.ecranlarge.com/uploads/image/001/132/jpj2ot0gcj9n7s5lrag11hahgcw-062.jpg', 5),
	(7, 'Alien, le huitième passager', '1979', 117, NULL, NULL, 'https://www.ecranlarge.com/uploads/image/001/121/l8ces84jndflnfbnmxdlryalvi6-831.jpg', 4),
	(34, 'Captain Fantastic', '2000', 110, 'Dans les forêts reculées du nord-ouest des Etats-Unis, vivant isolé de la société, un père dévoué a consacré sa vie toute entière à faire de ses six jeunes enfants d’extraordinaires adultes. Mais quand le destin frappe sa famille, ils doivent abandonner ce paradis qu’il avait créé pour eux. La découverte du monde extérieur va l’obliger à questionner ses méthodes d’éducation et remettre en cause tout ce qu’il leur a appris.', 3, 'https://m.media-amazon.com/images/I/91oDhHjXh5L._AC_SL1500_.jpg', 2);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.genre : ~5 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'Science-fiction'),
	(2, 'Fantasy'),
	(3, 'Gangsters'),
	(4, 'Thriller'),
	(5, 'Drame');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinema. jouer
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

-- Listage des données de la table cinema.jouer : ~10 rows (environ)
/*!40000 ALTER TABLE `jouer` DISABLE KEYS */;
INSERT INTO `jouer` (`id_film`, `id_role`, `id_acteur`) VALUES
	(34, 1, 8),
	(4, 2, 1),
	(4, 3, 2),
	(2, 4, 6),
	(1, 5, 1),
	(2, 6, 3),
	(3, 7, 4),
	(6, 8, 5),
	(6, 9, 2),
	(7, 10, 2);
/*!40000 ALTER TABLE `jouer` ENABLE KEYS */;

-- Listage de la structure de la table cinema. personnage
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_personnage` varchar(20) NOT NULL,
  `prenom_personnage` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `photo_personnage` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.personnage : ~13 rows (environ)
/*!40000 ALTER TABLE `personnage` DISABLE KEYS */;
INSERT INTO `personnage` (`id_personnage`, `nom_personnage`, `prenom_personnage`, `date_naissance`, `sexe`, `photo_personnage`) VALUES
	(1, 'Villeneuve', 'Denis', '1967-10-03', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/a/a4/Denis_Villeneuve_by_Gage_Skidmore.jpg'),
	(2, 'Jackson', 'Peter', '1961-10-31', 'Homme', 'https://fr.web.img3.acsta.net/pictures/14/12/04/10/39/195496.jpg'),
	(3, 'Coppola', 'Francis', '1939-10-31', 'Homme', 'https://m.media-amazon.com/images/M/MV5BMTM5NDU3OTgyNV5BMl5BanBnXkFtZTcwMzQxODA0NA@@._V1_.jpg'),
	(4, 'Scott', 'Ridley', '1937-11-30', 'Homme', 'https://fr.web.img3.acsta.net/pictures/14/12/10/16/47/273365.jpg'),
	(5, 'Chalamet', 'Timothée', '1997-01-30', 'Homme', 'https://media.vogue.fr/photos/61aa03d08b6ff17160dc2a0b/master/pass/GettyImages-1347362857.jpg'),
	(6, 'Young', 'Sean', '1972-11-12', 'Femme', 'https://flxt.tmsimg.com/assets/58380_v9_ba.jpg'),
	(7, 'Davis', 'Viola', '1987-07-24', 'Femme', 'https://fr.web.img6.acsta.net/pictures/15/07/02/15/47/518778.jpg'),
	(8, 'Weaver', 'Sigourney', '1949-10-08', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Sigourney_Weaver_by_Gage_Skidmore.jpg/1200px-Sigourney_Weaver_by_Gage_Skidmore.jpg'),
	(9, 'Eastwood', 'Clint', '1957-02-17', 'Homme', 'https://fr.web.img2.acsta.net/pictures/15/10/15/16/51/136406.jpg'),
	(10, 'Huppert', 'Isabelle', '1953-06-16', 'Femme', 'https://fr.web.img3.acsta.net/pictures/17/05/24/15/48/259657.jpg'),
	(15, 'Law', 'Jude', '1970-07-24', 'Homme', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Jude_Law_2018.jpg/640px-Jude_Law_2018.jpg'),
	(17, 'Campion', 'Jane', '1999-07-24', 'Femme', 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Jane_Campion_DNZM_%28cropped%29.jpg'),
	(18, 'Ross', 'Matt', '1980-10-15', 'Homme', 'https://fr.web.img5.acsta.net/pictures/16/05/17/16/37/376992.jpg');
/*!40000 ALTER TABLE `personnage` ENABLE KEYS */;

-- Listage de la structure de la table cinema. posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `posseder_Film0_FK` (`id_film`),
  CONSTRAINT `posseder_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `posseder_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.posseder : ~9 rows (environ)
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

-- Listage de la structure de la table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_personnage` int(11) NOT NULL,
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personnage` (`id_personnage`),
  CONSTRAINT `Realisateur_Personnage_FK` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.realisateur : ~7 rows (environ)
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

-- Listage de la structure de la table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(20) NOT NULL,
  `photo_role` varchar(255) DEFAULT 'https://static.vecteezy.com/system/resources/previews/003/611/119/original/do-not-record-images-no-photography-sign-free-vector.jpg',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema.role : ~10 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id_role`, `nom_role`, `photo_role`) VALUES
	(1, 'Rick Deckard', 'https://m.media-amazon.com/images/I/51nvjmKYNPL._AC_SY780_.jpg'),
	(2, 'Rachel', 'https://media.vogue.fr/photos/61fbe5d12b662c3bc39db1f3/3:4/w_2411,h_3216,c_limit/MSDBLRU_EC023.jpg'),
	(3, 'Paul', 'https://cdnb.artstation.com/p/assets/images/images/030/318/801/large/brian-taylor-paul.jpg?1600250795'),
	(4, 'Ellen', 'https://fr.web.img5.acsta.net/r_1280_720/medias/nmedia/18/35/90/74/18892821.jpg'),
	(5, 'Legolas', 'https://static.wikia.nocookie.net/seigneur-des-anneaux/images/4/43/Legolas_greenleaf_orlando_bloom_lotr_by_push_pulse-d5vcniw.jpg/revision/latest?cb=20140416201846&path-prefix=fr'),
	(6, 'Patricia', 'https://i.pinimg.com/736x/d0/a3/cb/d0a3cbaa2599a25eaf1b332b855eb992--patricia-arquette-fashion-women.jpg'),
	(7, 'Ellen Ripley', 'https://fr.web.img5.acsta.net/r_1280_720/medias/nmedia/18/35/90/74/18892821.jpg'),
	(8, 'William', 'https://img-4.linternaute.com/_wkQy-C9pR9XZOrrBOMvi7tGdB8=/2020x/smart/7efacb88dd324b83b172e3cac395fe76/ccmcms-linternaute/11914321.jpg'),
	(9, 'Samantha', 'https://1.bp.blogspot.com/-YxaPP9-GETg/X9dzktSrUcI/AAAAAAAAnjE/vhLKOP6Nx-EgR7nG2_l0zsNcwgs68-dWwCLcBGAsYHQ/s2048/%2BPatricia%2BKell%2B%25284%2529.JPG'),
	(10, 'Duc leto', 'https://sm.ign.com/t/ign_fr/screenshot/o/oscar-isaa/oscar-isaac-as-duke-leto-atreides-in-warner-bros-pictures-an_e1gp.620.jpg');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
