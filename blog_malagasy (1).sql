-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 sep. 2020 à 13:24
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_malagasy`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `urlImage` varchar(255) DEFAULT NULL,
  `contenu` text NOT NULL,
  `dateParution` datetime NOT NULL DEFAULT current_timestamp(),
  `redacteurId` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `urlImage`, `contenu`, `dateParution`, `redacteurId`) VALUES
(9, 'Artisanat', 'collines1.jpg', 'premier article ', '2020-09-03 11:16:35', 6),
(10, 'Plantes', 'nature.jpg', 'premier article sur les plantes', '2020-09-03 11:16:35', 7),
(13, 'Article artisanat', 'pexels-ianja-mbola-773480.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae neque tempus, commodo lectus vel, mattis turpis. Morbi lacinia et turpis sed luctus.', '2020-09-03 12:02:55', 6);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `dateAjout` date NOT NULL DEFAULT current_timestamp(),
  `utilisateurId` tinyint(3) UNSIGNED DEFAULT NULL,
  `articleId` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `redacteurs`
--

DROP TABLE IF EXISTS `redacteurs`;
CREATE TABLE IF NOT EXISTS `redacteurs` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `redacteurs`
--

INSERT INTO `redacteurs` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(6, 'redacteur1', 'redacteur1@gmail.com', 'redacteur1'),
(7, 'redacteur2', 'redacteur2@gmail.com', 'redacteur2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` char(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
