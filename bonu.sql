-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 oct. 2022 à 21:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bonu`
--

-- --------------------------------------------------------

--
-- Structure de la table `fav`
--

DROP TABLE IF EXISTS `fav`;
CREATE TABLE IF NOT EXISTS `fav` (
  `idf` int(5) NOT NULL AUTO_INCREMENT,
  `idu` int(5) NOT NULL,
  `idp` int(10) NOT NULL,
  PRIMARY KEY (`idf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fav`
--

INSERT INTO `fav` (`idf`, `idu`, `idp`) VALUES
(1, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `idm` int(5) NOT NULL AUTO_INCREMENT,
  `idsend` int(10) NOT NULL,
  `idrec` int(10) NOT NULL,
  `mess` varchar(300) NOT NULL,
  `dates` datetime NOT NULL,
  PRIMARY KEY (`idm`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`idm`, `idsend`, `idrec`, `mess`, `dates`) VALUES
(1, 1, 2, 'test', '2022-10-25 16:09:29'),
(2, 1, 2, 'coucou', '2022-10-25 16:29:58'),
(3, 2, 1, 'YAYYYY\r\n', '2022-10-25 16:38:01'),
(5, 1, 2, 'OUAIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIISSSSSSSSSSSSSSSSSSSSSS', '2022-10-25 16:38:59'),
(8, 1, 2, 'oue', '2022-10-25 16:42:40'),
(9, 1, 2, 'oue', '2022-10-25 16:43:04'),
(10, 1, 2, 'attends', '2022-10-25 17:04:55'),
(11, 1, 2, 'pour test', '2022-10-25 17:05:01'),
(12, 1, 2, 'zer', '2022-10-25 17:10:58'),
(13, 1, 2, 'a', '2022-10-25 19:17:51'),
(14, 1, 2, 'e', '2022-10-25 19:17:54'),
(15, 1, 2, 'e', '2022-10-25 19:17:57'),
(16, 2, 1, 'test', '2022-10-25 19:35:56'),
(17, 2, 2, 'coucou', '2022-10-25 19:37:07'),
(18, 2, 2, 'e', '2022-10-25 21:14:18'),
(19, 1, 2, 'allez', '2022-10-25 21:14:49'),
(20, 1, 2, 'oue', '2022-10-25 21:14:52'),
(21, 2, 1, 'oue', '2022-10-25 21:15:36');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `idp` int(10) NOT NULL AUTO_INCREMENT,
  `idu` int(5) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `descri` varchar(1500) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `photo1` varchar(50) NOT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `etat` varchar(25) NOT NULL,
  `vu` int(5) NOT NULL,
  `dates` datetime NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idp`, `idu`, `nomp`, `descri`, `prix`, `photo1`, `photo2`, `photo3`, `etat`, `vu`, `dates`) VALUES
(6, 2, 'Parthénon', 'Propriété un peu délabré suite aux pillage des britanniques, ce magnifique Parthénon a une vue incroyable sur la ville d\'Athène en Grèce!', '500000.00', 'produit/2-Parthénon.jpg', 'produit/2-Parthénon2.jpg', 'produit/2-Parthénon3.jpg', 'Mauvais état', 64, '2022-10-24 13:56:28'),
(7, 2, 'Poudlard', 'Vend très belle propriété, Poudlard possède sept étages et plusieurs hautes tours, ainsi qu\'un grand parc comprenant un lac, une forêt et plusieurs serres à des fins botaniques. Outre ses nombreuses salles de classes, dans lesquelles des cours de sortilèges, de potions, de métamorphose, d\'histoire de la magie ou encore de défense contre les forces du Mal sont dispensés par des sorciers qualifiés, le château de Poudlard regorge de pièces étranges, comme la Grande salle et son plafond magique, les salles communes, la grande bibliothèque, la mystérieuse Salle sur demande ou encore la légendaire Chambre des secrets. Un grand nombre de passages dissimulés, d\'escaliers et de portraits de peinture mouvants rendent l\'établissement assez mystérieux, voire quelquefois potentiellement dangereux pour des enfants en bas âge.', '75000000.00', 'produit/2-Poudlard.jpg', 'produit/2-Poudlard2.jpg', 'produit/2-Poudlard3.jpg', 'Bon état', 2, '2022-10-24 13:58:07'),
(8, 2, 'Pyramide', 'Tombeaux à vendre en entier, à récupérer sur place.', '80000000.00', 'produit/2-Pyramide.jpg', 'produit/2-Pyramide2.jpg', 'produit/2-Pyramide3.jpg', 'Etat satisfaisant', 256, '2022-10-24 13:58:53'),
(10, 2, 'Amphithéâtre', 'Je vends mon amphithéâtre car j\'ai arrêté le théâtre.', '800000.00', 'produit/2-Amphithéâtre.jpg', 'produit/2-Amphithéâtre2.jpg', 'produit/2-Amphithéâtre3.jpg', 'Etat satisfaisant', 1, '2022-10-24 14:07:34'),
(11, 2, 'Venus de Milo', 'Je vends la Vénus de Milo qui est une statue en marbre représentant la déesse Vénus retrouvée dans l\'île grecque de Milo en avril 1820, sans ses bras. C\'est une œuvre originale de l\'époque hellénistique, créée vers 150-130 av. JC. PS : Je l\'ai volé au Louvre.', '40000.00', 'produit/2-Venus de Milo.jpg', 'produit/2-Venus de Milo2.jpg', NULL, 'Bon état', 102, '2022-10-24 15:34:21'),
(12, 2, 'Chambord', 'Le château de Chambord est un château situé dans la commune de Chambord, à 17 km de Blois dans le département du Loir-et-Cher, en région Centre-Val de Loire.\r\n', '35250000.00', 'produit/2-Chambord.jpg', 'produit/2-Chambord2.jpg', 'produit/2-Chambord3.jpg', 'Bon état', 142, '2022-10-24 15:36:19'),
(13, 2, 'Statuette Grecque', 'Statuette d\'un soldat grecque.', '150.00', 'produit/2-Statuette Grecque.jpg', 'produit/2-Statuette Grecque2.jpg', 'produit/2-Statuette Grecque3.jpg', 'Très bon état', 1, '2022-10-24 15:38:13'),
(14, 2, 'Statue de Perseus', 'Scène où Perseus tue Méduse.', '19500.00', 'produit/2-Statue de Perseus.jpg', 'produit/2-Statue de Perseus2.jpg', 'produit/2-Statue de Perseus3.jpg', 'Etat satisfaisant', 1, '2022-10-24 15:52:27'),
(15, 2, 'Statue Athéna', 'Statue de la déesse d\'Athéna.', '25000.00', 'produit/2-Statue Athéna.jpg', 'produit/2-Statue Athéna2.jpg', '', 'Etat satisfaisant', 0, '2022-10-24 15:53:31'),
(16, 1, 'Triforce', 'Vend Triforce car je n\'arrive pas trouver le Royaume d\'Hyrule. La légende raconte que celui qui touchera la Triforce réunie pourra réaliser tous ses désirs. Si son cœur est bon, Hyrule vivra l’âge d’or. Si son cœur est mauvais, les ténèbres recouvriront le monde. Dans le cas où la personne n\'a pas l\'équilibre entre les trois forces constituant la Triforce, à savoir la force, la sagesse et le courage, elle se divisera en lui laissant le fragment lui correspondant le mieux.', '8523.00', 'produit/1-Triforce.jpg', 'produit/1-Triforce2.jpg', 'produit/1-Triforce3.jpg', 'Très bon état', 1, '2022-10-24 15:57:05'),
(17, 1, 'Anneau Unique', '\" Je cherche a me débarrasser de cet anneau, cela fait 3mois que les nazgûls me pourchassent.Mettez le dans le feu et l\'anneau scintillera. « Trois Anneaux pour les rois elfes sous le ciel,\r\nSept pour les seigneurs nains dans leurs demeures de pierre,\r\nNeuf pour les hommes mortels destinés au trépas,\r\nUn pour le Seigneur des Ténèbres sur son sombre trône,\r\nAu pays de Mordor où s\'étendent les ombres\r\nUn Anneau pour les gouverner tous\r\nUn Anneau pour les trouver\r\nUn Anneau pour les amener tous,\r\nEt dans les ténèbres les lier\r\nAu pays de Mordor où s\'étendent les ombres. »\"', '2.00', 'produit/1-Anneau Unique.jpg', 'produit/1-Anneau Unique2.jpg', 'produit/1-Anneau Unique3.jpg', 'Très bon état', 1, '2022-10-24 15:58:02'),
(18, 1, 'Armure Grecque', 'Une armure Grecque rien de plus.', '500.00', 'produit/1-Armure Grecque.jpg', 'produit/1-Armure Grecque2.jpg', 'produit/1-Armure Grecque3.jpg', 'Très bon état', 1, '2022-10-24 16:02:03'),
(19, 1, 'Bouclier Grecque', 'Bouclier de guerre antique de l’Empire macédonien durant la Grèce Antique avec symbole d’Alexandre le Grand.', '180.00', 'produit/1-Bouclier Grecque.jpg', 'produit/1-Bouclier Grecque2.jpg', 'produit/1-Bouclier Grecque3.jpg', 'Bon état', 1, '2022-10-24 16:02:56'),
(20, 1, 'Masque de Bataille Romain', 'Ancien masque de bataille romain. Ergonomique et confortable à porter durant les bataille. Longueur du masque 20 cm ou 8 pouces, largeur 16, 5 cm 6,5 pouces. Il est fait pour qu’il puisse être porté par les femmes et les hommes.', '85.00', 'produit/1-Masque de Bataille Romain.jpg', 'produit/1-Masque de Bataille Romain2.jpg', 'produit/1-Masque de Bataille Romain3.jpg', 'Bon état', 0, '2022-10-24 16:03:57'),
(21, 1, 'Dague Romaine', 'La dague peut être portée facilement durant les batailles.', '50.00', 'produit/1-Dague Romaine.jpg', 'produit/1-Dague Romaine2.jpg', 'produit/1-Dague Romaine3.jpg', 'Très bon état', 1, '2022-10-24 16:04:47'),
(22, 1, 'Casque et Armure de l\'Antiquité', 'Casque de guerre corinthien de l’Antiquité armure de fin. Le casque de style corinthien est apparu à la fin du 8ème siècle avant JC et restent en usage jusqu’à la période classique.', '460.00', 'produit/1-Casque et Armure de l\'Antiquité.jpg', 'produit/1-Casque et Armure de l\'Antiquité2.jpg', 'produit/1-Casque et Armure de l\'Antiquité3.jpg', 'Très bon état', 0, '2022-10-24 16:07:40'),
(23, 4, 'Masque Noir Anubis', 'Dieu égyptien des enfers à tête de chacal qui guide et protège les âmes des morts, et le dieu de l’embaumement, qui préside à la momification et aux rituels funéraires. Il est le gardien des morts et de la nécropole.', '240.00', 'produit/4-Masque Noir Anubis.jpg', 'produit/4-Masque Noir Anubis2.jpg', 'produit/4-Masque Noir Anubis3.jpg', 'Bon état', 0, '2022-10-24 16:09:09'),
(24, 4, 'Casque Roi Médiéval', 'Casque royal médiéval avec tête de lion et couronne. Le mot couronne est connu sous le grec ancien signifiant « couronne pour la décoration et le prix ». La couronne est un symbole d’identification et de distinction.', '380.00', 'produit/4-Casque Roi Médiéval.jpg', 'produit/4-Casque Roi Médiéval2.jpg', 'produit/4-Casque Roi Médiéval3.jpg', 'Bon état', 0, '2022-10-24 16:10:12'),
(25, 4, 'Armure Epaules et Tête Médiéval', 'Armure de combat portée par l’infâme Immortel « The Kurgan ». Vu sur les champs de l’Écosse médiévale, le Kurgan portait un casque comme celui-ci dans le cadre de son imposante armure osseuse animale lors de la grande bataille entre le clan MacLeod et le clan Fraser.', '105.00', 'produit/4-Armure Epaules et Tête Médiéval.jpg', 'produit/4-Armure Epaules et Tête Médiéval2.jpg', 'produit/4-Armure Epaules et Tête Médiéval3.jpg', 'Très bon état', 0, '2022-10-24 16:10:58'),
(26, 4, 'Casque du Roi Leonidas Spartiate', 'Le casque spartiate est étroitement lié aux cités-États grecques qui gardaient les forteresses et les villes étaient la responsabilité des Spartiates. Ils étaient connus pour leur magnifique force physique et mentale, ils étaient très dévoués à la guerre, tout comme le casque.', '126.00', 'produit/4-Casque du Roi Leonidas Spartiate.jpg', 'produit/4-Casque du Roi Leonidas Spartiate2.jpg', 'produit/4-Casque du Roi Leonidas Spartiate3.jpg', 'Très bon état', 0, '2022-10-24 16:11:59'),
(27, 3, 'Vase grec', 'Fabriqué et peint à la main en Grèce. Dimensions approximatives : Hauteur : 17 cm. Largeur : 9 cm. Poids net : 244 g\r\n', '50.00', 'produit/3-Vase grec.jpg', 'produit/3-Vase grec2.jpg', '', 'Très bon état', 0, '2022-10-24 16:13:49'),
(28, 3, 'Couronne de Roi en Argent', 'Ancienne couronne avec une patine d’argent ancien.\r\n', '123.00', 'produit/3-Couronne de Roi en Argent.jpg', 'produit/3-Couronne de Roi en Argent2.jpg', 'produit/3-Couronne de Roi en Argent3.jpg', 'Bon état', 0, '2022-10-24 16:15:05'),
(29, 3, 'Coupe Grecque', 'Coupe Grecque datant de la seconde moitié de la Grèce Antique.', '90.00', 'produit/3-Coupe Grecque.jpg', 'produit/3-Coupe Grecque2.jpg', 'produit/3-Coupe Grecque3.jpg', 'Etat satisfaisant', 0, '2022-10-24 16:16:01'),
(30, 3, 'Sculture Grecque Sphinx', 'Dans la tradition grecque, le sphinx a les hanches d’un lion, parfois avec les ailes d’un grand oiseau, et le visage d’un humain. Il est mythifié comme traître et impitoyable.', '71.00', 'produit/3-Sculture Grecque Sphinx.jpg', 'produit/3-Sculture Grecque Sphinx2.jpg', 'produit/3-Sculture Grecque Sphinx3.jpg', 'Mauvais état', 0, '2022-10-24 16:17:06'),
(31, 3, 'Bracelet Grecque en bronze', 'Tout au long de l’Antiquité, le dauphin était étroitement associé à Aphrodite, déesse de l’amour et de la beauté et à Poséidon, dieu de la mer. Le dauphin est souvent représenté dans l’art minoen et grec ancien comme une créature douce et intelligente: un mammifère qui vit dans la mer et relie donc le monde humain avec le monde élémentaire de la nature.', '62.00', 'produit/3-Bracelet Grecque en bronze.jpg', 'produit/3-Bracelet Grecque en bronze2.jpg', 'produit/3-Bracelet Grecque en bronze3.jpg', 'Bon état', 0, '2022-10-24 16:18:05'),
(32, 3, 'Sculture Tête buste Grecque', 'Sculpture de la tête et du buste de la déesse de la santé.', '69.00', 'produit/3-Sculture Tête buste Grecque.jpg', 'produit/3-Sculture Tête buste Grecque2.jpg', 'produit/3-Sculture Tête buste Grecque3.jpg', 'Bon état', 0, '2022-10-24 16:19:14'),
(33, 3, 'Statue Romaine en marbre', 'Statue Déesse Romaine en marbre, 30cm de hauteur et 18cm de largeur.', '89.00', 'produit/3-Statue Romaine en marbre.jpg', 'produit/3-Statue Romaine en marbre2.jpg', 'produit/3-Statue Romaine en marbre3.jpg', 'Très bon état', 0, '2022-10-24 16:19:58'),
(34, 3, 'Pendentif Grecque en argent', 'D’un côté quadrige galopant conduit par un charretier, tenant l’aiguillon et couronné par des Nike volantes. De l’autre côté Tête d’Artémis cheveux liés avec une couronne de feuilles de maïs, quatre dauphins autour. Il a été fabriqué en Grèce, le diamètre est de 19 mm et pèse environ 4,5 g.', '31.00', 'produit/3-Pendentif Grecque en argent.jpg', 'produit/3-Pendentif Grecque en argent2.jpg', 'produit/3-Pendentif Grecque en argent3.jpg', 'Bon état', 0, '2022-10-24 16:21:00'),
(35, 3, 'Bague Grecque en bronze', 'Symbole de royauté, de dignité, de courage et de force. Les lions figuraient en bonne place dans l’art et la littérature de la Grèce antique. Dans l’Iliade d’Homère, des héros tels qu’Achille sont comparés au lion dans des moments de pouvoir et de sauvagerie effrénés.', '52.00', 'produit/3-Bague Grecque en bronze.jpg', 'produit/3-Bague Grecque en bronze2.jpg', 'produit/3-Bague Grecque en bronze3.jpg', 'Bon état', 0, '2022-10-24 16:21:59'),
(36, 3, 'Bague Grecque en argent 2 Lions', 'Symbole de royauté, de dignité, de courage et de force. Les lions figuraient en bonne place dans l’art et la littérature de la Grèce antique. Dans l’Iliade d’Homère, des héros tels qu’Achille sont comparés au lion dans des moments de pouvoir et de sauvagerie effrénés.', '47.00', 'produit/3-Bague Grecque en argent 2 Lions.jpg', 'produit/3-Bague Grecque en argent 2 Lions2.jpg', 'produit/3-Bague Grecque en argent 2 Lions3.jpg', 'Bon état', 0, '2022-10-24 16:22:49'),
(40, 3, 'Statue Romaine en marbre', 'Statue Déesse Romaine en marbre.', '89.00', 'produit/3-Statue Romaine en marbre.jpg', 'produit/3-Statue Romaine en marbre2.jpg', 'produit/3-Statue Romaine en marbre3.jpg', 'Très bon état', 0, '2022-10-24 16:51:16'),
(41, 3, 'Bague Grecque en bronze', 'Symbole de royauté, de dignité, de courage et de force. Les lions figuraient en bonne place dans l’art et la littérature de la Grèce antique. Dans l’Iliade d’Homère, des héros tels qu’Achille sont comparés au lion dans des moments de pouvoir et de sauvagerie effrénés.', '52.00', 'produit/3-Bague Grecque en bronze.jpg', 'produit/3-Bague Grecque en bronze2.jpg', 'produit/3-Bague Grecque en bronze3.jpg', 'Bon état', 0, '2022-10-24 16:55:59');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `idt` int(10) NOT NULL AUTO_INCREMENT,
  `idp` int(10) NOT NULL,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`idt`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`idt`, `idp`, `tag`) VALUES
(2, 6, 'Immobilier'),
(3, 7, 'Immobilier'),
(4, 8, 'Immobilier'),
(5, 10, 'Immobilier'),
(6, 12, 'Immobilier'),
(8, 13, 'Statue'),
(9, 14, 'Statue'),
(10, 15, 'Statue'),
(11, 33, 'Statue'),
(12, 27, 'Décoration'),
(13, 29, 'Décoration'),
(14, 30, 'Décoration'),
(15, 32, 'Décoration'),
(16, 16, 'Armes'),
(17, 17, 'Armes'),
(18, 18, 'Armes'),
(19, 19, 'Armes'),
(20, 20, 'Armes'),
(21, 21, 'Armes'),
(22, 22, 'Armes'),
(23, 23, 'Armes'),
(24, 24, 'Armes'),
(25, 25, 'Armes'),
(26, 26, 'Armes'),
(27, 28, 'Accessoires'),
(28, 31, 'Accessoires'),
(29, 34, 'Accessoires'),
(30, 35, 'Accessoires'),
(31, 36, 'Accessoires'),
(40, 11, 'Statue');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idu` int(5) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `adresse` varchar(60) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `anniv` varchar(50) NOT NULL,
  `note` int(2) NOT NULL,
  `grade` int(1) NOT NULL,
  PRIMARY KEY (`idu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idu`, `prenom`, `nom`, `mail`, `mdp`, `pseudo`, `genre`, `adresse`, `cp`, `ville`, `tel`, `anniv`, `note`, `grade`) VALUES
(1, 'Leo', 'T', 'leo@gmail.com', 'a0fb33afae3a86e9195bdcd25f3f32f9', 'leo', 'Licorne', 'Rue du cul', '75015', 'Paris', '1234567890', '14/17/2002', 0, 1),
(2, 'Audran', 'R', 'audran@gmail.com', 'c1350339e1f307b7988d114c53c68b93', 'audran', 'Licorne', 'rue du 92', '75015', 'Paris', '1234567890', '14/17/2002', 0, 1),
(3, 'Nathan', 'N', 'nathan@gmail.com', 'e7830c356afa5738671713ca5e9b094e', 'nathan', 'Licorne', 'rue de Melun', '75015', 'Melun', '1234567890', '14/17/2002', 0, 1),
(4, 'Matteo', 'P', 'matteo@gmail.com', 'f3caa7e61ff3f1ec28840b53806d73ff', 'matteo', 'Licorne', 'rue du rer A', '75015', 'Paris', '1234567890', '14/17/2002', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
