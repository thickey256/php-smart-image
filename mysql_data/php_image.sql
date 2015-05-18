-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2015 at 01:24 PM
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_sub_category` varchar(255) NOT NULL,
  `image_source_path` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Holds products';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category`, `product_sub_category`, `image_source_path`) VALUES
(1, 'Aver Grey and White Extending and Eames Dining Set', 'Dining Sets', 'Extending Dining Sets', 'aver_grey_eames/'),
(2, 'Fern White Gloss Extending and Eames Style Dining Set', 'Dining Sets', 'Extending Dining Sets', 'fern_eames/'),
(3, 'Fern Dining Chair', 'Seating', 'Dining Chairs', 'fern_chair/'),
(4, 'Senn Colourful Dining Chair', 'Seating', 'Dining Chairs', 'senn_chair/');

-- --------------------------------------------------------

--
-- Table structure for table `source_images`
--

DROP TABLE IF EXISTS `source_images`;
CREATE TABLE IF NOT EXISTS `source_images` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `source_filename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Hold source images ready for resizing';

--
-- Dumping data for table `source_images`
--

INSERT INTO `source_images` (`image_id`, `product_id`, `source_filename`) VALUES
(1, 1, '_MG_4021-Select.jpg'),
(2, 1, '_MG_4072.jpg'),
(3, 1, '_MG_4082-Select.jpg'),
(4, 2, 'IMG_2987-Select.jpg'),
(5, 2, 'IMG_3008-Select.jpg'),
(6, 2, 'IMG_3018-Merge-3.jpg'),
(7, 3, '20140226_2476.jpg'),
(8, 3, '20140226_2486.jpg'),
(9, 3, '20140226_2496.jpg'),
(10, 3, 'IMG_1883.jpg'),
(11, 4, '_MG_3814.jpg'),
(12, 4, '_MG_3816.jpg'),
(13, 4, '_MG_3818.jpg'),
(14, 4, '_MG_3819.jpg'),
(15, 4, 'white-oak-.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `source_images`
--
ALTER TABLE `source_images`
  ADD UNIQUE KEY `image_id` (`image_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `source_images`
--
ALTER TABLE `source_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
