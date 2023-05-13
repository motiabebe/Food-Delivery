-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 08, 2022 at 03:06 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL,
  `admin_username` varchar(10) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Administration  ', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

DROP TABLE IF EXISTS `delivery`;
CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `delivery_name` varchar(25) NOT NULL,
  `gender` char(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`, `gender`, `username`, `password`, `phone`) VALUES
(4, 'Delivery Guy', 'M', 'admin', '1234567', 0);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `name`, `type`, `description`, `price`, `image`, `restaurant_id`) VALUES
(3, 'Chesse Burger', 'Burger', 'Burger', 200, 'food_3.jpg', 1),
(2, 'Chesse Pizza', 'Pizza', 'large pizza with chesse', 200, 'food_1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `datetime` timestamp NOT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`orders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `user_id`, `food_id`, `delivery_id`, `datetime`, `order_status`) VALUES
(18, 1, 1, 4, '2022-08-07 14:31:33', 'Delivered'),
(19, 1, 1, NULL, '2022-08-07 15:43:25', 'Pending'),
(20, 1, 2, 4, '2022-08-08 04:23:58', 'Delivered'),
(21, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(22, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(23, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(24, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(25, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(26, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(27, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(28, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(29, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending'),
(30, 1, 2, NULL, '2022-08-08 04:42:59', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `restaurant_address` varchar(100) NOT NULL,
  `restaurant_phone` varchar(15) NOT NULL,
  `restaurant_email` varchar(30) NOT NULL,
  `restaurant_website` varchar(30) NOT NULL,
  `restaurant_description` text NOT NULL,
  `restaurant_logo` text NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `restaurant_name`, `username`, `password`, `restaurant_address`, `restaurant_phone`, `restaurant_email`, `restaurant_website`, `restaurant_description`, `restaurant_logo`) VALUES
(1, 'Burger Base', 'admin', 'admin', '4 Kilo', '34567890', 'BurgerBase@gmail.com', 'www.bbase.com', 'Burger Spot', 'brand.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `gender`, `username`, `password`, `phone`, `address`) VALUES
(1, 'User', 'asdpopopop', 'M', 'admin', '123456789', 942125566, 'Gulele Street');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
