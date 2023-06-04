-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 06:03 AM
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
  `user_review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hire_table`
--

INSERT INTO `hire_table` (`hire_id`, `userId`, `worker_id`, `hire_date`, `start_date`, `end_date`, `charge`, `payment_status`, `user_rating`, `user_review`) VALUES
(1, 7, 11, '2023-06-03', '2023-06-03', '2023-06-03', 700, 'paid', 5, 'I recently hired him, and I\'m extremely satisfied with their service. They were professional, knowledgeable, and attentive to detail. Their commitment to safety and fair pricing was also impressive. I highly recommend their services and will definitely hi');

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
(7, 'Toufiqul Islam Tanmoy', '12365897', '01848189482', 'Rajshahi, Bangladesh', 'admin@gmail.com', 'Tanmoy#120', 'tit.jpg'),
(9, 'Toufiqul Islam Tanmoy', '12365897', '01848189482', 'Rajshahi, Bangladesh', 'tittanmoy@yahoo.com', 'Tanmoy#120', 'fb-logo.png'),
(11, 'Samia Zaman', '454422', '0174424536', 'Rajshahi, Bangladesh', 'admin@gmail.com', 'Samia#120', 'chefPicture2.jpg'),
(12, 'Toufiqul Islam Tanmoy', '5413454', '01848189482', 'Rajshahi, Bangladesh', 'a@gmail.com', 'Tanmoy#120', 'chefPicture2.jpg'),
(14, 'Toufiqul Islam Tanmoy', '87654321', '01848189482', 'Rajshahi, Bangladesh', 'b@gmail.com', 'Tanmoy#120', '344288504_193267183585556_9189707409016718643_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `workersignup`
--

CREATE TABLE `workersignup` (
  `worker_id` int(11) NOT NULL,
  `worker_full_name` varchar(120) NOT NULL,
  `father_name` varchar(120) NOT NULL,
  `date_of_birth` date NOT NULL,
  `worker_photo` varchar(255) NOT NULL,
  `nid_number` varchar(120) NOT NULL,
  `worker_phone_number` varchar(120) NOT NULL,
  `present_address` varchar(140) NOT NULL,
  `parmanennt_address` varchar(140) NOT NULL,
  `worker_password` varchar(140) NOT NULL,
  `worker_status` tinyint(4) NOT NULL,
  `worker_email` varchar(120) NOT NULL,
  `workerType` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workersignup`
--

INSERT INTO `workersignup` (`worker_id`, `worker_full_name`, `father_name`, `date_of_birth`, `worker_photo`, `nid_number`, `worker_phone_number`, `present_address`, `parmanennt_address`, `worker_password`, `worker_status`, `worker_email`, `workerType`, `gender`) VALUES
(11, 'Md. Abdul Ali', 'Md. Sagor Ali', '1992-07-19', 'fake_worker.jpg', '1987654321987', '8801712345678', '5/A, Mymensingh Road, Dhaka', '5/A, Mymensingh Road, Dhaka', 'Worker@120', 1, 'abdul.ali@gmail.com', 'Electrician', ''),
(12, 'Abdul Haque', 'Bablu Haque', '1991-06-07', 'fake_worker2.jpg', '1234567891234', '8801712345679', '2/B, Mirpur Road, Dhaka', '2/B, Mirpur Road, Dhaka', 'Worker@120', 1, 'haque.ali@gmail.com', 'Plumber', ''),
(13, 'Md. Ali Ahmed', 'Md. Sagor Ali', '1985-04-13', 'fake_worker2.jpg', '7654321098765', '8801712345680', '12, Baridhara, Dhaka', '12, Baridhara, Dhaka', 'Worker@120', 1, 'ahmed.ali@gmail.com', 'Carpenter', ''),
(14, 'Rafiqul Islam', 'Rasidhu Islam', '1995-05-09', 'fake_worker2.jpg', '2345678912345', '8801712345681', '15, Uttara, Dhaka', '15, Uttara, Dhaka', 'Worker@120', 1, 'rafiul.ali@gmail.com', 'Mechanic', ''),
(15, 'Nasreen Akhter', 'Nasir Khan', '1987-11-27', 'chefPicture2.jpg', '6789012345678', '8801712345682', '7, Green Road, Dhaka', '7, Green Road, Dhaka', 'Worker@120', 1, 'nasrin@gmail.com', 'Cook', ''),
(16, 'Kamal Hossain', 'Jamal Hossain', '1999-05-23', 'fake_worker2.jpg', '5432109876543', '8801712345683', '10/B, Banani, Dhaka', '10/B, Banani, Dhaka', 'Worker@120', 1, 'kamal@gmail.com', 'Painter', 'Male'),
(17, 'Shaheda Begum', 'Sahin Khan', '1998-08-07', 'chefPicture2.jpg', '9876543210987', '8801712345684', '15, Dhanmondi, Dhaka', '15, Dhanmondi, Dhaka', 'Worker@120', 1, 'shaheda@gmail.com', 'Housekeeper', ''),
(18, 'Rahim Uddin', 'Rajib Uddin', '1997-12-23', 'fake_worker2.jpg', '3456789123456', '8801712345686', '12, Rajshahi Road, Rajshahi', '12, Rajshahi Road, Rajshahi', 'Worker@120', 1, 'uddin@gmail.com', 'Electrician', ''),
(19, 'Fatima Begum', 'Farhad Reza', '1999-02-05', 'chefPicture2.jpg', '7890123456789', '8801712345687', '45, Rajshahi Bypass Road, Rajshahi', '45, Rajshahi Bypass Road, Rajshahi', 'Worker@120', 1, 'fatima@gmail.com', 'Cook', ''),
(20, 'Siddique Rahman', 'Abir Rhaman', '1999-06-06', 'chefPicture.jpg', '6543210987654', '8801712345688', '22/A, University More, Rajshahi', '22/A, University More, Rajshahi', 'Worker@120', 1, 'rahmani@gmail.com', 'Cook', ''),
(21, 'Rofiz Farzi', 'Yusuf Uddin', '2000-03-10', 'Screenshot 2023-05-24 230805.png', '9621475623', '880174523965', 'Rajshahi, Bangladesh', 'Rajshahi, Bangladesh', 'Worker@120', 1, 'rofik@gmail.com', 'Plumber', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire_table`
--
ALTER TABLE `hire_table`
  ADD PRIMARY KEY (`hire_id`);

--
-- Indexes for table `usersignup`
--
ALTER TABLE `usersignup`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `workersignup`
--
ALTER TABLE `workersignup`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire_table`
--
ALTER TABLE `hire_table`
  MODIFY `hire_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `workersignup`
--
ALTER TABLE `workersignup`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
