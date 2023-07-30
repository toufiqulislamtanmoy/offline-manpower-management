-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 02:20 PM
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
-- Structure for view `pending_worker_hire_details`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pending_worker_hire_details`  AS SELECT `ht`.`hire_id` AS `hire_id`, `ht`.`userId` AS `userId`, `ht`.`worker_id` AS `worker_id`, `ht`.`hire_date` AS `hire_date`, `ht`.`start_date` AS `start_date`, `ht`.`end_date` AS `end_date`, `ht`.`charge` AS `charge`, `ht`.`payment_status` AS `payment_status`, `ht`.`user_rating` AS `user_rating`, `ht`.`user_review` AS `user_review`, `ht`.`review_date` AS `review_date`, `ht`.`notification_status` AS `notification_status`, `ht`.`transactionId` AS `transactionId`, `ht`.`working_method` AS `working_method`, `ht`.`working_hour` AS `working_hour`, `ht`.`accept` AS `accept`, `wt`.`worker_full_name` AS `worker_full_name`, `wt`.`worker_photo` AS `worker_photo`, `wt`.`worker_phone_number` AS `worker_phone_number`, `wt`.`workerType` AS `workerType` FROM (`hire_table` `ht` join `workersignup` `wt` on(`ht`.`worker_id` = `wt`.`worker_id`))  ;

--
-- VIEW `pending_worker_hire_details`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
