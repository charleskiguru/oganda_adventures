-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2019 at 01:35 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adventures`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Charles Kiguru', 'charleskiguru14@gmail.com', 'b488216079c6e19076705ecc589d1cc7');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) NOT NULL,
  `image` varchar(300) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `plan_cost` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `username`, `email`, `phone`, `password`) VALUES
(1, '', 'charles kiguru', 'charleskiguru14@gmail.com', '0796324018', 'e10adc3949ba59abbe56e057f20f883e'),
(2, '', 'MaryNdungu', 'maryndungu14@gmail.com', '0733243567', '1435252'),
(3, '', 'charleskiguru', 'charleskiguru14@gmail.com', '0733243567', '85b38dfb5c2ef35cd1d01477c8c7dd31'),
(4, '', 'ffug', 'charleskiguru14@gmail.com', '0733243567', '438c5965259824def6a2b01d317fdd55'),
(5, 'James Maingi Kanyi', 'jymokanyi', 'jymomaingi@gmail.com', '0704369312', '14678a85c405bb1582a5b1191088e212'),
(6, 'Jane Wanjiru Kiguru', 'janekiguru', 'janekiguru234@gmail.com', '0705446738', 'ccce1ccc5e2e10599371ded6e4f71fed'),
(7, 'charles', 'charlesk', 'kevin.njoroge@rocketmail.com', '0733243567', 'b488216079c6e19076705ecc589d1cc7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
