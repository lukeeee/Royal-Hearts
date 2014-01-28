-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: 10.0.227.55
-- Generation Time: Jan 28, 2014 at 09:20 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `124020-matkasse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Grönsaker'),
(3, 'Kött & Chark'),
(4, 'Godis & Snacks'),
(6, 'Grönsaker'),
(7, 'Frukt');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Karlskrona'),
(6, 'Växjö'),
(7, 'Karlskrona');

-- --------------------------------------------------------

--
-- Table structure for table `city_store`
--

DROP TABLE IF EXISTS `city_store`;
CREATE TABLE IF NOT EXISTS `city_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `city_store`
--

INSERT INTO `city_store` (`id`, `storeID`, `cityID`) VALUES
(6, 7, 7),
(7, 6, 6),
(8, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `foodbasket_order`
--

DROP TABLE IF EXISTS `foodbasket_order`;
CREATE TABLE IF NOT EXISTS `foodbasket_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `foodproduct_storeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `foodbasket_order`
--

INSERT INTO `foodbasket_order` (`id`, `orderID`, `quantity`, `foodproduct_storeID`) VALUES
(6, 1, 2, 7),
(7, 1, 2, 6),
(8, 1, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `foodproducts`
--

DROP TABLE IF EXISTS `foodproducts`;
CREATE TABLE IF NOT EXISTS `foodproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `foodproducts`
--

INSERT INTO `foodproducts` (`id`, `name`, `categoryID`) VALUES
(6, 'Tomat', 6),
(7, 'Morot', 6),
(8, 'Dill', 6);

-- --------------------------------------------------------

--
-- Table structure for table `foodproduct_store`
--

DROP TABLE IF EXISTS `foodproduct_store`;
CREATE TABLE IF NOT EXISTS `foodproduct_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foodproductID` int(11) DEFAULT NULL,
  `store_cityID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `foodproduct_store`
--

INSERT INTO `foodproduct_store` (`id`, `foodproductID`, `store_cityID`, `price`) VALUES
(6, 6, 7, 10),
(7, 7, 6, 20),
(8, 8, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

DROP TABLE IF EXISTS `order_table`;
CREATE TABLE IF NOT EXISTS `order_table` (
  `orderID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateedited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`orderID`, `userID`, `amount`, `datecreated`, `dateedited`) VALUES
(1, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`) VALUES
(6, 'City Gross'),
(7, 'Frukthuset');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `salt` varchar(45) DEFAULT NULL,
  `privilege` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `privilege`) VALUES
(6, 'user', '55ebb2d286d5ad25241b19f307e395635971008a1ecdbd3871927af61ea890f0', '07a46b1a155a3c07e34de', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
