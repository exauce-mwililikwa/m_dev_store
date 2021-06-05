-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juin 2021 à 04:44
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
-- Base de données : `ecom_store`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_image` varchar(50) NOT NULL,
  `admin_country` varchar(50) NOT NULL,
  `admin_about` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL,
  `admin_job` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'EXAUCE', 'exaucemwililikwa@gmail.com', 'aliconnorecho', 'MUTINDIAPALA MWILILIKWA EXAUCE.JPG', 'congo', 'i here', '+243998763638', 'informaticien');

-- --------------------------------------------------------

--
-- Structure de la table `boxes_session`
--

DROP TABLE IF EXISTS `boxes_session`;
CREATE TABLE IF NOT EXISTS `boxes_session` (
  `box_id` int(11) NOT NULL AUTO_INCREMENT,
  `box_title` varchar(50) NOT NULL,
  `box_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id_add` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_add`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) NOT NULL,
  `cat_image` varchar(50) NOT NULL,
  `cat_top` varchar(3) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`, `cat_top`) VALUES
(1, 'PATALON', '2.JPG', 'yes');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_country` varchar(50) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_image` varchar(50) NOT NULL,
  `customer_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'exauce', 'exaucemwililikwa@gmail.com', 'aliconnorecho', 'congo', 'goma', '0998763638', 'katindo', '1.JPG', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `manufactured_title` varchar(50) NOT NULL,
  `manufactured_top` varchar(50) NOT NULL,
  `manufactured_image` varchar(50) NOT NULL,
  `manufactured_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`manufactured_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `manufacturers`
--

INSERT INTO `manufacturers` (`manufactured_title`, `manufactured_top`, `manufactured_image`, `manufactured_id`) VALUES
('try', 'yes', '2.JPG', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `product_id` int(11) NOT NULL,
  `nom` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(5) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_img1` varchar(50) NOT NULL,
  `product_img2` varchar(50) NOT NULL,
  `product_img3` varchar(50) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_desc` varchar(50) NOT NULL,
  `product_keywoords` varchar(50) NOT NULL,
  `manufactured_id` int(5) NOT NULL,
  `product_label` varchar(50) NOT NULL,
  `product_sale` varchar(5) NOT NULL,
  `product_url` varchar(50) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywoords`, `manufactured_id`, `product_label`, `product_sale`, `product_url`) VALUES
(1, 1, 1, '2021-06-04', 'patalom', '2.JPG', '1.JPG', '2.JPG', 23, 'goodest', 'toka', 1, 'new', '24', '');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_title` varchar(50) NOT NULL,
  `p_cat_top` varchar(50) NOT NULL,
  `p_cat_image` varchar(50) NOT NULL,
  `p_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_title`, `p_cat_top`, `p_cat_image`, `p_cat_id`) VALUES
('tryiest', 'No', '2.JPG', 1);

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slider_name` varchar(50) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `slider_url` varchar(50) NOT NULL,
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slider_name`, `slider_image`, `slider_url`, `slider_id`) VALUES
('mupicture', 'MUTINDIAPALA MWILILIKWA EXAUCE.JPG', 'facebook.com', 1),
('mupictures', 'MUTINDIAPALA MWILILIKWA EXAUCE.JPG', 'facebook.com', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
