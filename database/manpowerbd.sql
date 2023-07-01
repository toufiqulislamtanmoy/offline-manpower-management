-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 01:30 PM
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
-- Table structure for table `hire_table`
--

CREATE TABLE `hire_table` (
  `hire_id` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `worker_id` int(255) NOT NULL,
  `hire_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `charge` int(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `user_rating` int(255) NOT NULL,
  `user_review` varchar(255) NOT NULL,
  `review_date` date DEFAULT NULL,
  `notification_status` int(255) NOT NULL,
  `transactionId` varchar(255) NOT NULL,
  `working_method` varchar(60) NOT NULL,
  `working_hour` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hire_table`
--

INSERT INTO `hire_table` (`hire_id`, `userId`, `worker_id`, `hire_date`, `start_date`, `end_date`, `charge`, `payment_status`, `user_rating`, `user_review`, `review_date`, `notification_status`, `transactionId`, `working_method`, `working_hour`) VALUES
(1, 7, 11, '2023-06-03', '2023-06-03', '2023-06-03', 700, 'paid', 5, 'I recently hired him, and I\'m extremely satisfied with their service. They were professional, knowledgeable, and attentive to detail. Their commitment to safety and fair pricing was also impressive. I highly recommend their services and will definitely hi', '2023-06-03', 0, 'trxp59drc12', 'Full Day', 'N/A'),
(3, 9, 11, '2023-06-19', '2023-06-20', '2023-06-20', 700, 'Paid', 4, 'Good Working', '2023-06-20', 0, 'trxpo963giw', 'Full Day', 'N/A'),
(4, 7, 12, '2023-06-20', '2023-06-20', '2023-06-20', 750, 'Paid', 5, 'Awesome', '2023-06-20', 0, 'trxfg14uq12', 'Full Day', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire_table`
--
ALTER TABLE `hire_table`
  ADD PRIMARY KEY (`hire_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire_table`
--
ALTER TABLE `hire_table`
  MODIFY `hire_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
