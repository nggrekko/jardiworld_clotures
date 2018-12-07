-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 déc. 2018 à 21:49
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jardiworld_clotures`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'accessoires'),
(2, 'panneaux eden'),
(3, 'panneaux helsinki'),
(4, 'panneaux horizon'),
(5, 'panneaux miami'),
(6, 'panneaux rialto'),
(7, 'panneaux sanchez'),
(8, 'panneaux shanghai'),
(9, 'panneaux venise'),
(10, 'panneaux rivoli');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `caracteristiques` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `composants` varchar(255) DEFAULT '',
  `montage` varchar(255) DEFAULT '',
  `dimensions` varchar(255) DEFAULT '',
  `prix` float NOT NULL DEFAULT '1',
  `img_big` varchar(255) NOT NULL,
  `img_vignette` varchar(255) NOT NULL,
  `stock` int(11) DEFAULT '0',
  `consultations` int(11) DEFAULT '0',
  `ventes` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `caracteristiques`, `description`, `composants`, `montage`, `dimensions`, `prix`, `img_big`, `img_vignette`, `stock`, `consultations`, `ventes`, `category_id`) VALUES
(1, 'Support de poteaux a fixer', '50010', '', 'En acier galvanise', '', '', '90x90mm\r\nLargeur de la base 150mm', 2.25, '50010-big.jpg', '50010.jpg', 7, 19, 3, 1),
(2, 'Support de poteaux a fixer', '50011', '', 'En acier galvanise', '', '', '70x70mm\r\nLargeur de la base 150mm', 1.75, '50011-big.jpg', '50011.jpg', 5, 40, 5, 1),
(3, 'Kit de fixation', '50016', '', 'Blister 4 equerres\r\nKit de fixation de 4 equerres en L\r\nAcier galvanise\r\n8 vis', '', '', '', 1.69, '50016-big.jpg', '50016.jpg', 0, 83, 10, 1),
(4, 'Poteau 9 x 9', '50015', '', 'En pin sylvestre\r\nGarantie : 10 ANS', '', '', 'Poteau 9 x 9 x 200 mm', 1.47, '50015-big.jpg', '50015.jpg', 10, 84, 0, 1),
(5, 'Poteau 7 x 7', '50014', '', 'En pin sylvestre\r\nGarantie : 10 ANS', '', '', 'Poteau 7 x 7 x 200 mm', 2.68, '50014-big.jpg', '50014.jpg', 10, 6, 0, 1),
(6, 'Support de poteaux a enfoncer', '50013', '', 'Support a enfoncer\r\nEn acier galvanise', '', '', '70x70mm\r\nLongueur de la pointe 750mm', 2.1, '50013-big.jpg', '50013.jpg', 10, 6, 0, 1),
(7, 'Support de poteaux a enfoncer', '50012', '', 'Support a enfoncer\r\nEn acier galvanise', '', '', '90x90mm\r\nLongueur de la pointe 750mm', 1.1, '50012-big.jpg', '50012.jpg', 15, 3, 0, 1),
(8, 'Panneau Eden droit', '10020', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 9.79, '10020-big.jpg', '10020.jpg', 10, 0, 0, 2),
(9, 'Panneau Eden droit ajouré', '10021', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 6.99, '10021-big.jpg', '10021.jpg', 10, 0, 0, 2),
(10, 'Panneau Helsinki droit', '10090', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : Lames bombées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 1, '10090-big.jpg', '10090.jpg', 10, 0, 0, 3),
(11, 'Panneau Helsinki droit chapeau de gendarme', '10091', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : Lames bombées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 1.99, '10091-big.jpg', '10091.jpg', 0, 0, 0, 3),
(12, 'Panneau Horizon droit', '10010', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre lamellé-collé : 43 x 68 mm\r\nEtrésillons : 16 x 36 mm\r\nRemplissage : plexiglass d’épaisseur 6 mm', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 43 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 9.99, '10010-big.jpg', '10010.jpg', 15, 0, 0, 4),
(13, 'Panneau Horizon droit', '10011', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre lamellé-collé : 43 x 68 mm\r\nEtrésillons : 16 x 36 mm\r\nRemplissage : plexiglass d’épaisseur 6 mm', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 43 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 14.99, '10011-big.jpg', '10011.jpg', 20, 0, 0, 4),
(14, 'Panneau Miami droit', '10030', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 36 x 75 mm\r\nRemplissage : Lames rabotées ', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 75 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 7.99, '10030-big.jpg', '10030.jpg', 20, 0, 0, 5),
(15, 'Panneau Miami droit', '10031', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 36 x 75 mm\r\nRemplissage : Lames rabotées ', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 75 mm\r\nLongueur: 1,80 m\r\nHauteur	900 mm', 4.99, '10031-big.jpg', '10031.jpg', 16, 0, 0, 5),
(16, 'Panneau Rialto droit', '10100', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 3.99, '10100-big.jpg', '10100.jpg', 15, 0, 0, 6),
(17, 'Panneau Rialto chapeau de gendarme', '10101', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 8.99, '10101-big.jpg', '10101.jpg', 15, 0, 0, 6),
(18, 'Panneau Rivoli droit', '10050', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 46 mm\r\nEtrésillons : 46 x 46 mm\r\nRemplissage : Contre plaqué de couleur sombre ', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 1, '10050-big.jpg', '10050.jpg', 20, 0, 0, 10),
(19, 'Panneau Rivoli droit plein', '10051', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 46 mm\r\nEtrésillons : 46 x 46 mm\r\nRemplissage : Contre plaqué de couleur sombre ', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 10.99, '10051-big.jpg', '10051.jpg', 15, 0, 0, 10),
(20, 'Panneau Sanchez droit', '10080', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 46 mm\r\nRemplissage : lamelles rabotées superposées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 2.99, '10080-big.jpg', '10080.jpg', 10, 0, 0, 7),
(21, 'Panneau Sanchez convexe', '10082', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 46 mm\r\nRemplissage : lamelles rabotées superposées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 9.99, '10082-big.jpg', '10082.jpg', 10, 0, 0, 7),
(22, 'Panneau Shanghai droit', '10040', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : clins bombées\r\nRaidisseurs : lames bombées', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 11.99, '10040-big.jpg', '10040.jpg', 10, 0, 0, 8),
(23, 'Panneau Shanghai angle cassé à droite', '10043', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : clins bombées\r\nRaidisseurs : lames bombées', 'Type d’assemblage : pré-monté avec vis inox', 'Epaisseur: 46 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 10.99, '10043-big.jpg', '10043.jpg', 10, 0, 0, 8),
(24, 'Panneau Venise droit', '10060', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 0,90 m\r\nHauteur	1800 mm', 11.99, '10060-big.jpg', '10060.jpg', 20, 0, 0, 9),
(25, 'Panneau Venise 1/4 de rond', '10071', '', 'Essence : Epicéa\r\nTraitement : Classe 4 en autoclave\r\nGarantie du traitement : 20 ans hors-sol et 15 ans en contact avec le sol', 'Cadre : 46 x 68 mm\r\nRemplissage : lamelles rabotées', 'Type d’assemblage : pré-monté avec vis inox et lames assemblées à mi-bois', 'Epaisseur: 46 mm\r\nLongueur: 1,80 m\r\nHauteur	1800 mm', 13.99, '10071-big.jpg', '10071.jpg', 20, 0, 0, 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Fougnie', 'fougnie@gmail.com', '$2y$10$IUz7R2twC.ciMZwtrBbyheJeEP0hQOozfMCp6xFgg8q4jxSsY5KRe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
