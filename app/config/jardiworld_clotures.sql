-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 nov. 2018 à 18:41
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

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
(9, 'panneaux venise');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nbProducts` int(11) NOT NULL DEFAULT '1',
  `totalPrice` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `date`, `nbProducts`, `totalPrice`) VALUES
(8, 1, '2018-11-24 10:24:26', 3, 30.71),
(9, 1, '2018-11-26 17:39:09', 1, 1.69);

-- --------------------------------------------------------

--
-- Structure de la table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orders_products`
--

INSERT INTO `orders_products` (`id`, `idOrder`, `idProduct`, `price`, `quantity`) VALUES
(6, 8, 2, 1.75, 5),
(5, 8, 1, 2.25, 3),
(7, 8, 3, 1.69, 9),
(8, 9, 3, 1.69, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `caracteristiques`, `description`, `composants`, `montage`, `dimensions`, `prix`, `img_big`, `img_vignette`, `stock`, `consultations`, `ventes`, `category_id`) VALUES
(1, 'Support de poteaux a fixer', '50010', '', 'En acier galvanise', '', '', '90x90mm\r\nLargeur de la base 150mm', 2.25, '50010-big.jpg', '50010.jpg', 7, 17, 3, 1),
(2, 'Support de poteaux a fixer', '50011', '', 'En acier galvanise', '', '', '70x70mm\r\nLargeur de la base 150mm', 1.75, '50011-big.jpg', '50011.jpg', 5, 40, 5, 1),
(3, 'Kit de fixation', '50016', '', 'Blister 4 equerres\r\nKit de fixation de 4 equerres en L\r\nAcier galvanise\r\n8 vis', '', '', '', 1.69, '50016-big.jpg', '50016.jpg', 0, 83, 10, 1),
(4, 'Poteau 9 x 9', '50015', '', 'En pin sylvestre\r\nGarantie : 10 ANS', '', '', 'Poteau 9 x 9 x 200 mm', 1.47, '50015-big.jpg', '50015.jpg', 10, 84, 0, 1),
(5, 'Poteau 7 x 7', '50014', '', 'En pin sylvestre\r\nGarantie : 10 ANS', '', '', 'Poteau 7 x 7 x 200 mm', 2.68, '50014-big.jpg', '50014.jpg', 10, 6, 0, 1),
(6, 'Support de poteaux a enfoncer', '50013', '', 'Support a enfoncer\r\nEn acier galvanise', '', '', '70x70mm\r\nLongueur de la pointe 750mm', 2.1, '50013-big.jpg', '50013.jpg', 10, 6, 0, 1),
(7, 'Support de poteaux a enfoncer', '50012', '', 'Support a enfoncer\r\nEn acier galvanise', '', '', '90x90mm\r\nLongueur de la pointe 750mm', 1.1, '50012-big.jpg', '50012.jpg', 15, 3, 0, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@test', '$2y$10$1jeZJMK1NqmmZ.6JIha3luXRS4GtPW9.SEYZMvbi.Lmk7HJ8PuFee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
