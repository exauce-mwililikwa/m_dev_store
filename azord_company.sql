-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juin 2021 à 20:53
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `azord_company`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresseuser`
--

DROP TABLE IF EXISTS `adresseuser`;
CREATE TABLE IF NOT EXISTS `adresseuser` (
  `_matriculeUser` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`_matriculeUser`),
  UNIQUE KEY `adresseUser_email_unique` (`email`),
  UNIQUE KEY `adresseUser_telephone_unique` (`telephone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attributacces`
--

DROP TABLE IF EXISTS `attributacces`;
CREATE TABLE IF NOT EXISTS `attributacces` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_designation` varchar(15) NOT NULL,
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detailtransactionfinancier`
--

DROP TABLE IF EXISTS `detailtransactionfinancier`;
CREATE TABLE IF NOT EXISTS `detailtransactionfinancier` (
  `_numeroTransaction` varchar(10) NOT NULL,
  `_heure` datetime NOT NULL,
  PRIMARY KEY (`_numeroTransaction`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `identite`
--

DROP TABLE IF EXISTS `identite`;
CREATE TABLE IF NOT EXISTS `identite` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_matricule` varchar(10) NOT NULL,
  `_nom` varchar(15) NOT NULL,
  `_postnom` varchar(15) NOT NULL,
  `_prenom` varchar(15) NOT NULL,
  `_attribut` int(11) NOT NULL,
  PRIMARY KEY (`_id`),
  UNIQUE KEY `_matricule` (`_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_matricule` varchar(10) NOT NULL,
  `_agentSec` varchar(10) NOT NULL,
  `_dateJour` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`_id`,`_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `transactionfinancier`
--

DROP TABLE IF EXISTS `transactionfinancier`;
CREATE TABLE IF NOT EXISTS `transactionfinancier` (
  `_id` int(11) NOT NULL AUTO_INCREMENT,
  `_numeroTransaction` varchar(10) NOT NULL,
  `_expeditaire` varchar(10) NOT NULL,
  `_destinataire` varchar(10) NOT NULL,
  `_montant` int(11) NOT NULL,
  `_retenu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(500) NOT NULL DEFAULT '1234',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `virtualcompte`
--

DROP TABLE IF EXISTS `virtualcompte`;
CREATE TABLE IF NOT EXISTS `virtualcompte` (
  `_matriculeUser` varchar(10) NOT NULL,
  `_montant` int(11) NOT NULL,
  PRIMARY KEY (`_matriculeUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
