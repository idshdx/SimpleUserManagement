-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2015 at 03:36 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `userdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `age_category`
--

CREATE TABLE IF NOT EXISTS `age_category` (
  `age_id` int(11) NOT NULL AUTO_INCREMENT,
  `age_category` varchar(30) NOT NULL,
  PRIMARY KEY (`age_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `age_category`
--

INSERT INTO `age_category` (`age_id`, `age_category`) VALUES
(1, 'young'),
(2, 'adult'),
(3, 'elder');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` mediumint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `description` text NOT NULL,
  `type_id` tinyint(11) NOT NULL,
  `age_id` tinyint(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `password`, `phone_number`, `description`, `type_id`, `age_id`) VALUES
(4, 'root', 'nume', 'email@gmail.ro', '5f4dcc3b5aa765d61d8327deb882cf99', 1234567, 'The super user', 1, 2),
(5, 'user', 'test', 'alttest@test.rololol', 'ee11cbb19052e40b07aac0ca060c23ee', 1999999999, 'Descrie', 2, 1),
(27, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1111111111, 'adminsadas', 1, 1),
(28, 'vineri', 'vineri', 'vineri@gmail.com', 'd0949ce9a3402f5fad12e641790d0fbc', 1999999998, 'cont facut vineri', 1, 1),
(29, 'usernou', 'numenou', 'emailnou@gmail.com', 'eb5c02d9bb86d78f2fc888768fdc6cf9', 1234567890, 'No description', 2, 1),
(30, 'Andrei', 'Andrei', 'andrei@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1111111111, 'OLYOLO', 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
