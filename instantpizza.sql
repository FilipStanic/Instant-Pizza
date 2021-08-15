-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for instantpizza
CREATE DATABASE IF NOT EXISTS `instantpizza` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `instantpizza`;

-- Dumping structure for table instantpizza.faq
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table instantpizza.faq: ~4 rows (approximately)
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
	(1, 'Is your pizza good?', 'Our pizza is the best in the city. This means that all our pizza which we supply is 100% authentic and made from the best chefs in the world.'),
	(2, ' Do you cook other things?', 'Although we pride ourselves with our pizza, we are currently trying to invent new things!'),
	(3, 'How do I order?', 'Click on the "order" button in the top right corner of our website. Then, select your food. After that, click checkout, enter all your info and we will have your food prepared and delivered in no time !'),
	(4, 'Does your food contain any alergens?', 'No, it doesent.');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;

-- Dumping structure for table instantpizza.items
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img` text,
  `price` float NOT NULL DEFAULT '0',
  `extras` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table instantpizza.items: ~9 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `title`, `img`, `price`, `extras`) VALUES
	(36, 'California Pizza', 'californiapizza.jpg', 7, 'Ketchup, Tomato, Cheese'),
	(37, 'Capricioza', 'capricioza.jpg', 4, 'Ketchup, Tomato, Cheese'),
	(38, 'Chicago Pizza', 'chicagopizza.jpg', 6, 'Ketchup, Tomato, Cheese'),
	(39, 'Greek Pizza', 'greekpizza.jpg', 3, 'Ketchup, Tomato, Cheese'),
	(40, 'Margarita Pizza', 'margarita.jpg', 4, 'Ketchup, Tomato, Cheese'),
	(41, 'Peperonni pizza', 'peperonipizza.jpg', 6, 'Ketchup, Tomato, Cheese, Pepperoni'),
	(42, 'Quatro Formaggi', 'quatroformagi.jpg', 5, 'Ketchup, Tomato, Cheese'),
	(43, 'Sicillian pizza', 'sicillianpizza.jpeg', 4, 'Ketchup, Tomato, Cheese'),
	(44, 'Vegeterian pizza', 'veggeterianpizza.jpg', 6, 'Ketchup, Tomato, Herb Cheese');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table instantpizza.item_order
CREATE TABLE IF NOT EXISTS `item_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `extras` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table instantpizza.item_order: ~12 rows (approximately)
/*!40000 ALTER TABLE `item_order` DISABLE KEYS */;
INSERT INTO `item_order` (`id`, `order_id`, `title`, `extras`, `price`) VALUES
	(1, 1, 'Chicago Pizza', 'Ketchup, Tomato, Cheese', 6),
	(2, 1, 'Capricioza', 'Ketchup, Tomato, Cheese', 4),
	(3, 2, 'Chicago Pizza', 'Cheese', 6),
	(4, 2, 'Chicago Pizza', '', 6),
	(5, 2, 'Chicago Pizza', 'Ketchup, Tomato, Cheese', 6),
	(6, 2, 'Capricioza', 'Ketchup, Tomato, Cheese', 4),
	(7, 2, 'Capricioza', 'Ketchup, Tomato', 4),
	(8, 2, 'Capricioza', '', 4),
	(9, 2, 'Vegeterian pizza', 'Ketchup, Tomato, Herb Cheese', 6),
	(10, 3, 'Greek Pizza', '', 3),
	(11, 4, 'Margarita Pizza', 'Cheese', 4),
	(12, 5, 'Greek Pizza', '', 3);
/*!40000 ALTER TABLE `item_order` ENABLE KEYS */;

-- Dumping structure for table instantpizza.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table instantpizza.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table instantpizza.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table instantpizza.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
	(41, 'admin', 'admin@admin.com', '$2a$10$2b9cacf0c2b508c472867u/t7G5tUuYCufA.1RyePl1FynFaRGtuK');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
