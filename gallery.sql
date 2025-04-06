-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 06 avr. 2025 à 17:24
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gallery`
--

-- --------------------------------------------------------

--
-- Structure de la table `paintings`
--

DROP TABLE IF EXISTS `paintings`;
CREATE TABLE IF NOT EXISTS `paintings` (
  `id_painting` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `year` int NOT NULL,
  `artist_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `width` decimal(5,2) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_painting`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `paintings`
--

INSERT INTO `paintings` (`id_painting`, `title`, `year`, `artist_name`, `width`, `height`) VALUES
(3, 'm', 11, 'K', 0.05, 0.05),
(4, 'K', 16, 'K', 0.05, 0.05),
(5, 'K', 1, 'K', 0.05, 0.05),
(6, 'boni', 2020, 'KOFFI', 0.24, 0.15);

-- --------------------------------------------------------

--
-- Structure de la table `storage`
--

DROP TABLE IF EXISTS `storage`;
CREATE TABLE IF NOT EXISTS `storage` (
  `id_painting` int NOT NULL,
  `id_warehouse` int NOT NULL,
  PRIMARY KEY (`id_painting`,`id_warehouse`),
  KEY `id_warehouse` (`id_warehouse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `storage`
--

INSERT INTO `storage` (`id_painting`, `id_warehouse`) VALUES
(3, 7),
(3, 8),
(3, 10),
(4, 8),
(5, 7),
(5, 9),
(6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id_warehouse` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_warehouse`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `warehouses`
--

INSERT INTO `warehouses` (`id_warehouse`, `name`, `address`) VALUES
(7, 'ange koffi', '39 RUE DU DOCTEUR SUREAU'),
(8, 'm', 'ioj'),
(9, 'ange koffi', '39 RUE DU DOCTEUR SUREAU'),
(10, 'brin', '20 RUE DU DOCTEUR SUREAU');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
