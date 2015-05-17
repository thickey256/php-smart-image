-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2015 at 08:42 PM
-- Server version: 5.5.43-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `source_images`
--

DROP TABLE IF EXISTS `source_images`;
CREATE TABLE IF NOT EXISTS `source_images` (
  `image_id` int(11) NOT NULL,
  `source_filename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Hold source images ready for resizing';

--
-- Dumping data for table `source_images`
--

INSERT INTO `source_images` (`image_id`, `source_filename`) VALUES
(1, '6YYQ6XZA5F.jpg'),
(2, '8I92Y1C8Z0.jpg'),
(3, '60T5RG5V64.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `source_images`
--
ALTER TABLE `source_images`
  ADD UNIQUE KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `source_images`
--
ALTER TABLE `source_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
