-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2019 at 10:49 AM
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
-- Table structure for table `booked_tours`
--

CREATE TABLE IF NOT EXISTS `booked_tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_booked` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(50) NOT NULL,
  `no_adults` int(11) NOT NULL,
  `no_kids` int(11) NOT NULL,
  `total_cost` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `booked_tours`
--

INSERT INTO `booked_tours` (`id`, `plan_booked`, `first_name`, `last_name`, `email`, `phoneno`, `no_adults`, `no_kids`, `total_cost`, `nationality`, `created_at`) VALUES
(1, '', 'Charles', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 5, 10, '', 'Kenya', '2019-09-24 14:11:06'),
(2, '', 'Charles', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 5, 10, '', 'Kenya', '2019-09-24 14:11:08'),
(3, '', 'Charles Muraguri', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 5, 7, '', 'Kenya', '2019-09-24 14:17:13'),
(4, '', 'Emanuel', 'Oganda', 'emanueloganda@gmail.com', '0789234567', 4, 2, '', 'Bahamas', '2019-09-24 14:32:24'),
(5, '', 'Mary', 'Ndungu', 'maryndungu14@gmail.com', '0798345623', 1, 3, '', 'Andorra', '2019-09-24 14:35:40'),
(6, '', 'James', 'Ogutu', 'ogutu@gmail.com', '07985683734', 3, 4, '', 'Kenya', '2019-09-24 14:38:58'),
(7, '', 'Charles Muraguru', 'Kiguru', 'jymomaingi@gmail.com', '2233333', 333333, 3333, '', 'Belarus', '2019-09-24 14:41:27'),
(8, '', 'Charles Muraguri', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 3, 4, '', 'Kenya', '2019-09-24 14:44:26'),
(9, '', 'Daniel', 'Kamaru', 'kamaru@gmail.com', '073545635422', 1, 6, '', 'Argentina', '2019-09-24 14:51:47'),
(10, '', 'Kelvin', 'Maina', 'kevin.njoroge@rocketmail.com', '0704365354', 2, 10, '', 'Bangladesh', '2019-09-24 14:56:28'),
(11, 'Ngong forest sanctuary', 'Miriam', 'Wangui', 'millie34@gmail.com', '072343567898', 4, 2, '', 'Argentina', '2019-09-25 12:08:22'),
(12, '14500', 'Charles Muraguru', 'Kiguru', 'fghj', '567', 66, 667, '', 'Afghanistan', '2019-09-25 12:38:24'),
(13, 'Ngong forest sanctuary', 'dyui', 'tdytuu', 'rtyu', '6888655565', 89999, 5, '', 'Angola', '2019-09-25 13:23:51'),
(14, 'Lake Bogoria Hotsprings', 'Nancy', 'Njeri', 'nansi12rt@gmail.com', '0708166393', 5, 2, '', 'Kenya', '2019-09-25 13:26:55'),
(15, 'Nyali beach resort', 'Kennedy', 'Kipkoech', 'kipkoechken@gmail.com', '0789654323', 6, 8, '310000', 'Kenya', '2019-09-25 15:44:57'),
(16, 'Lake Bogoria Hotsprings', 'Florence', 'Wambui', 'flowambs23@gmail.com', '0789654342', 2, 5, '65250', 'Uganda', '2019-09-25 15:47:46'),
(17, 'Ngong forest sanctuary', 'Charles Muraguru', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 9, 9, '16200', 'Israel', '2019-09-25 16:09:54'),
(18, 'Nyali beach resort', 'Charles Muraguri', 'Kiguru', 'charleskiguru14@gmail.com', '0796324018', 5, 6, '248000', 'Barbados', '2019-09-26 09:28:08'),
(19, 'Lake Bogoria Hotsprings', 'Charles Muraguru', 'Kiguru', 'charleskiguru14@gmail.com', '079868474774', 8, 6, '159500', 'Belgium', '2019-09-26 09:29:51');

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
  `plan_cost` mediumint(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `image`, `start_date`, `end_date`, `plan_cost`, `description`, `status`) VALUES
(1, 'Nakuru Game Park', '12160.jpg', '2019-09-20', '2019-09-20', 30000, 'Touring Lake Nakuru and Game Park', '0'),
(2, 'Mt Kilimanjaro', '25603.jpg', '2019-09-20', '2019-09-27', 15000, 'Back packing, hill racing', '0'),
(3, 'Ngong forest sanctuary', '6897.jpg', '2019-10-25', '2019-10-27', 1200, 'Ziplining, bike riding, hiking, photo and video shooting, Archery', '1'),
(4, 'Lake Bogoria Hotsprings', '25064.jpg', '2019-09-20', '2019-09-20', 14500, 'Many things includes', '0'),
(5, 'Chaka ranch', '4606.jpg', '2019-12-20', '2019-12-28', 31000, 'Horse riding, outside catering, three nights', ''),
(6, 'Ngong hills sanctuary', '20134.jpg', '2019-09-20', '2019-09-28', 14500, 'Ziplining, outside catering, hiking, photoshooting', '0'),
(7, 'Lake Bogoria Hotsprings', '15711.jpg', '2019-09-21', '2019-09-28', 14500, 'Egg boiling in the hot springs, goat eating with accommodation inclusive', '1'),
(8, 'Nyali beach resort', '17324.jpg', '2019-09-21', '2019-09-28', 31000, '3 days, two nights with accomodation inclusive. Swimming, boat riding and more', '1');

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
