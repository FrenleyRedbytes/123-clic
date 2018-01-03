-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2017 at 05:19 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_time` datetime(6) NOT NULL,
  `created_by` int(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hours_service`
--

CREATE TABLE IF NOT EXISTS `hours_service` (
  `hse_id` int(11) NOT NULL AUTO_INCREMENT,
  `serv_id` int(11) NOT NULL,
  `monday` varchar(50) NOT NULL,
  `tuesday` varchar(50) NOT NULL,
  `wednesday` varchar(50) NOT NULL,
  `thursday` varchar(50) NOT NULL,
  `friday` varchar(50) NOT NULL,
  `saturday` varchar(50) NOT NULL,
  `sunday` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime(6) NOT NULL,
  `created_date` datetime(6) NOT NULL,
  PRIMARY KEY (`hse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hours_specialist`
--

CREATE TABLE IF NOT EXISTS `hours_specialist` (
  `hpe_id` int(11) NOT NULL AUTO_INCREMENT,
  `spe_id` int(11) NOT NULL,
  `monday` varchar(250) NOT NULL,
  `tuesday` varchar(250) NOT NULL,
  `wednesday` varchar(250) NOT NULL,
  `thursday` varchar(250) NOT NULL,
  `friday` varchar(250) NOT NULL,
  `saturday` varchar(250) NOT NULL,
  `sunday` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime(6) NOT NULL,
  `created_date` datetime(6) NOT NULL,
  PRIMARY KEY (`hpe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serv_id` int(11) NOT NULL AUTO_INCREMENT,
  `spe_id` int(255) NOT NULL,
  `serv_title` varchar(255) NOT NULL,
  `serv_day` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `time` time(6) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `created_date` datetime(6) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  KEY `serv_id` (`serv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE IF NOT EXISTS `specialist` (
  `spe_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(250) NOT NULL,
  `brand_logo` varchar(1000) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_image` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_by` int(255) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  KEY `spe_id` (`spe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
