-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2020 at 10:52 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'The Odyssey by Robert Fragles', 'Book', '15.23', 'Book_001.jpg'),
(2, 'The Republic by Plato', 'Book', '45.23', 'Book_002.jpg'),
(3, '1984 by George Orwell', 'Book', '42.30', 'Book_003.jpg'),
(4, 'Candide by Voltaire', 'Book', '38.26', 'Book_004.jpg'),
(5, 'Madame Bovary by Gustave Flaubert', 'Book', '23.56', 'Book_005.jpg'),
(6, 'In the Penal Colony by Franz Kafka', 'Book', '15.26', 'Book_006.jpg'),
(7, 'The Grapes of Wrath by John Steinbeck', 'Book', '45.23', 'Book_007.jpg'),
(8, 'Cannery Row by John Steinbeck', 'Book', '12.35', 'Book_008.jpg'),
(9, 'This Side of Paradise by Scott Fitzgerald', 'Book', '25.25', 'Book_009.jpg'),
(10, 'A Tale of Two Cities by Charles Dickens', 'Book', '78.23', 'Book_010.jpg'),
(11, 'Captain America 1944', 'Comics', '10.25', 'Comics_001.jpg'),
(12, 'Spider-Man 1977', 'Comics', '9.85', 'Comics_002.jpg'),
(13, 'The Incredible Hulk 1977', 'Comics', '11.75', 'Comics_003.jpg'),
(14, 'Dr Strange 1978', 'Comics', '12.50', 'Comics_004.jpg'),
(15, 'The Fantastic Four', 'Comics', '10.85', 'Comics_005.jpg'),
(16, 'Generation X', 'Comics', '15.20', 'Comics_006.jpg'),
(17, 'Blade 1998', 'Comics', '14.23', 'Comics_007.jpg'),
(18, 'Batman the Animated Series', 'Comics', '15.50', 'Comics_008.jpg'),
(19, 'Justice League', 'Comics', '10.25', 'Comics_009.jpg'),
(20, 'Swamp Thing', 'Comics', '12.30', 'Comics_010.jpg'),
(21, 'Frank Miller Daredevil', 'Comics', '8.50', 'Comics_011.jpg'),
(22, 'James Robinsons Starman', 'Comics', '5.50', 'Comics_012.jpg'),
(23, 'Sports Illustrated', 'Magazine', '15.50', 'Magazine_001.jpg'),
(24, 'US Weekly', 'Magazine', '16.25', 'Magazine_002.jpg'),
(25, 'WWE Smackdown', 'Magazine', '20.50', 'Magazine_003.jpg'),
(26, 'ESPN the Magazine', 'Magazine', '30.00', 'Magazine_004.jpg'),
(27, 'Tennis Magazine', 'Magazine', '21.99', 'Magazine_005.jpg'),
(28, 'Larousse', 'Dictionnary', '50.99', 'Dictionnary_001.jpg'),
(29, 'Cambridge Dictionnary', 'Dictionnary', '45.50', 'Dictionnary_002.jpg'),
(30, 'Oxford English', 'Dictionnary', '60.00', 'Dictionnary_003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `email`, `password`) VALUES
(1, 'sarah@mycput.org', '4a586c295fddb5a0d9f66c192eeb2fe3'),
(2, 'charles@mycput.org', 'b4cf4da79fc0cdb5b2c4288198ad6a66'),
(3, 'eve@mycput.org', '913b7996b26ccd2f9a35a5d640af331f'),
(4, 'jordan@mycput.org', 'c836a00117f92e0a655671e6e3b7791d'),
(5, 'james@mycput.org', '5c65484096e3db6f65f8cfd47e748a93'),
(6, 'sam@sam.com', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
