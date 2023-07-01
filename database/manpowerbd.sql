-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 05:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manpowerbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersignup`
--

CREATE TABLE `usersignup` (
  `userId` int(255) NOT NULL,
  `UserName` varchar(120) NOT NULL,
  `UserNID` varchar(120) NOT NULL,
  `userPhone` varchar(255) NOT NULL,
  `userAddress` varchar(150) NOT NULL,
  `userEmail` varchar(125) NOT NULL,
  `userPassword` varchar(160) NOT NULL,
  `profileImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersignup`
--

INSERT INTO `usersignup` (`userId`, `UserName`, `UserNID`, `userPhone`, `userAddress`, `userEmail`, `userPassword`, `profileImage`) VALUES
(7, 'Toufiqul Islam Tanmoy', '12365897', '01848189482', 'Rajshahi, Bangladesh', 'admin@gmail.com', 'User@120', 'https://i.ibb.co/2697vpc/312538805-694265988970310-6018476747493320508-n.jpg'),
(9, 'Josim Ali', '12365897', '01848189482', 'Rajshahi, Bangladesh', 'josim@yahoo.com', 'User@120', 'https://i.ibb.co/sgPL9XF/360-F-299048604-Xob8-Gv-WQ49n-UQWEk-YOCEYX4y-SHCmfi-G2.webp'),
(11, 'Samia Zaman', '454422', '0174424536', 'Rajshahi, Bangladesh', 'admin@gmail.com', 'User@120', 'chefPicture2.jpg'),
(12, 'Faruk Khan', '5413454', '01848189482', 'Rajshahi, Bangladesh', 'faruk@gmail.com', 'User@120', 'https://i.ibb.co/fGmGXts/istockphoto-1016761216-612x612.jpg'),
(14, 'Sohel Rana', '87654321', '01848189482', 'Rajshahi, Bangladesh', 'rana@gmail.com', 'User@120', 'https://i.ibb.co/ySXZkg9/0x0.webp'),
(16, 'Sofiul Islam', '9621876536', '8801698425321', 'Rajshahi, Bangladesh', 'sofiul@gmail.com', 'User@120', 'https://i.ibb.co/PDCws6J/ad18d5d9acd7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersignup`
--
ALTER TABLE `usersignup`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
