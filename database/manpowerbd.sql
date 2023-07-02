-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 05:24 PM
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
  `working_hour` varchar(12) NOT NULL,
  `accept` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hire_table`
--

INSERT INTO `hire_table` (`hire_id`, `userId`, `worker_id`, `hire_date`, `start_date`, `end_date`, `charge`, `payment_status`, `user_rating`, `user_review`, `review_date`, `notification_status`, `transactionId`, `working_method`, `working_hour`, `accept`) VALUES
(1, 7, 11, '2023-06-03', '2023-06-03', '2023-06-03', 700, 'paid', 5, 'I recently hired him, and I\'m extremely satisfied with their service. They were professional, knowledgeable, and attentive to detail. Their commitment to safety and fair pricing was also impressive. I highly recommend their services and will definitely hi', '2023-06-03', 0, 'trxp59drc12', 'Full Day', 'N/A', 'Yes'),
(3, 9, 11, '2023-06-19', '2023-06-20', '2023-06-20', 700, 'Paid', 4, 'Good Working', '2023-06-20', 0, 'trxpo963giw', 'Full Day', 'N/A', 'Yes'),
(4, 7, 12, '2023-06-20', '2023-06-20', '2023-06-20', 750, 'Paid', 5, 'Awesome', '2023-06-20', 0, 'trxfg14uq12', 'Full Day', 'N/A', 'Yes'),
(14, 7, 11, '2023-07-01', '2023-07-17', '0000-00-00', 545, 'Pending', 0, '', NULL, 1, '', 'Hourly', '5', 'Pending'),
(15, 7, 12, '2023-07-01', '2023-07-23', '0000-00-00', 706, 'Pending', 0, '', NULL, 1, '', 'Full Day', 'N/A', 'Pending');

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
(11, 'Samia Zaman', '454422', '0174424536', 'Rajshahi, Bangladesh', 'samia@gmail.com', 'User@120', 'https://i.ibb.co/x318zwq/pexels-photo-733872.webp'),
(12, 'Faruk Khan', '5413454', '01848189482', 'Rajshahi, Bangladesh', 'faruk@gmail.com', 'User@120', 'https://i.ibb.co/fGmGXts/istockphoto-1016761216-612x612.jpg'),
(14, 'Sohel Rana', '87654321', '01848189482', 'Rajshahi, Bangladesh', 'rana@gmail.com', 'User@120', 'https://i.ibb.co/ySXZkg9/0x0.webp'),
(16, 'Sofiul Islam', '9621876536', '8801698425321', 'Rajshahi, Bangladesh', 'sofiul@gmail.com', 'User@120', 'https://i.ibb.co/PDCws6J/ad18d5d9acd7.jpg'),
(17, 'Istiaqe Khan', '1236853694', '88012356548', 'Gopalpur', 'istiaqe@gmail.com', 'User@120', 'https://i.ibb.co/LJ9584x/580a3b02e41c.png'),
(18, 'Abdul Kalam', '475465468', '88013658594', 'Foridpur', 'kalam@gmail.com', 'User@120', 'https://i.ibb.co/52tv2Vz/3b6164a1ac64.png'),
(19, 'Md. Tanmoy', '7654641536', '8801848189483', 'Rajshahi, Bangladesh', 'tanmoy@gmail.com', 'User@120', 'https://i.ibb.co/7GJp38R/6dc3045e5578.png'),
(20, 'Md.Zia', '895645567', '8801848189485', 'Rajshahi, Bangladesh', 'zia@gmail.com', 'User@120', 'https://i.ibb.co/HpFXydD/4bf12d1c323d.png');

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
  `gender` varchar(255) NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workersignup`
--

INSERT INTO `workersignup` (`worker_id`, `worker_full_name`, `father_name`, `date_of_birth`, `worker_photo`, `nid_number`, `worker_phone_number`, `present_address`, `parmanennt_address`, `worker_password`, `worker_status`, `worker_email`, `workerType`, `gender`, `points`) VALUES
(11, 'Md. Abdul Ali', 'Md. Sagor Ali', '1992-07-19', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '1987654321987', '8801712345678', '5/A, Mymensingh Road, Dhaka', '5/A, Mymensingh Road, Dhaka', 'Worker@120', 1, 'abdul.ali@gmail.com', 'Electrician', 'Male', 300),
(12, 'Abdul Haque', 'Bablu Haque', '1991-06-07', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '1234567891234', '8801712345679', '2/B, Mirpur Road, Dhaka', '2/B, Mirpur Road, Dhaka', 'Worker@120', 1, 'haque.ali@gmail.com', 'Plumber', 'Male', 200),
(13, 'Md. Ali Ahmed', 'Md. Sagor Ali', '1985-04-13', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '7654321098765', '8801712345680', '12, Baridhara, Dhaka', '12, Baridhara, Dhaka', 'Worker@120', 1, 'ahmed.ali@gmail.com', 'Carpenter', 'Male', 100),
(14, 'Rafiqul Islam', 'Rasidhu Islam', '1995-05-09', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '2345678912345', '8801712345681', '15, Uttara, Dhaka', '15, Uttara, Dhaka', 'Worker@120', 1, 'rafiul.ali@gmail.com', 'Mechanic', 'Male', 100),
(15, 'Nasreen Akhter', 'Nasir Khan', '1987-11-27', 'https://i.ibb.co/P9FFdfL/chef-Picture2.jpg', '6789012345678', '8801712345682', '7, Green Road, Dhaka', '7, Green Road, Dhaka', 'Worker@120', 1, 'nasrin@gmail.com', 'Cook', 'Female', 100),
(16, 'Kamal Hossain', 'Jamal Hossain', '1999-05-23', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '5432109876543', '8801712345683', '10/B, Banani, Dhaka', '10/B, Banani, Dhaka', 'Worker@120', 1, 'kamal@gmail.com', 'Painter', 'Male', 100),
(17, 'Shaheda Begum', 'Sahin Khan', '1998-08-07', 'https://i.ibb.co/P9FFdfL/chef-Picture2.jpg', '9876543210987', '8801712345684', '15, Dhanmondi, Dhaka', '15, Dhanmondi, Dhaka', 'Worker@120', 1, 'shaheda@gmail.com', 'Housekeeper', 'Female', 100),
(18, 'Rahim Uddin', 'Rajib Uddin', '1997-12-23', 'https://i.ibb.co/Q6ddZB4/fake-worker.jpg', '3456789123456', '8801712345686', '12, Rajshahi Road, Rajshahi', '12, Rajshahi Road, Rajshahi', 'Worker@120', 1, 'uddin@gmail.com', 'Electrician', 'Male', 100),
(19, 'Fatima Begum', 'Farhad Reza', '1999-02-05', 'https://i.ibb.co/P9FFdfL/chef-Picture2.jpg', '7890123456789', '8801712345687', '45, Rajshahi Bypass Road, Rajshahi', '45, Rajshahi Bypass Road, Rajshahi', 'Worker@120', 1, 'fatima@gmail.com', 'Cook', 'Female', 100),
(20, 'Siddique Rahman', 'Abir Rhaman', '1999-06-06', 'https://i.ibb.co/WfztKXZ/chef-Picture.jpg', '6543210987654', '8801712345688', '22/A, University More, Rajshahi', '22/A, University More, Rajshahi', 'Worker@120', 1, 'rahmani@gmail.com', 'Cook', 'Male', 100),
(21, 'Rofiz Farzi', 'Yusuf Uddin', '2000-03-10', 'https://i.ibb.co/9pBzy71/aaron-huber-Kxe-Fu-Xta4-SE-unsplash.jpg', '9621475623', '880174523965', 'Rajshahi, Bangladesh', 'Rajshahi, Bangladesh', 'Worker@120', 1, 'rofik@gmail.com', 'Plumber', 'Male', 100),
(22, 'Mustafizur Karim', 'Himel Sikdar', '1993-04-27', 'https://i.ibb.co/ysBKWsC/e078e8972dd9.jpg', '123698474', '8801403696314', 'Char Khuta, Rajshahi', 'Char Khuta, Rajshahi', 'Worker@120', 1, 'mustafizur@gmail.com', 'Mechanic', 'Male', 100),
(23, 'Md Arif Ali', 'Md Aken Shekh', '1992-03-07', 'https://i.ibb.co/28pGt8R/3045278a3596.jpg', '92143697125', '8801625825230', 'Nowdapara, Rajshahi', 'Nowdapara, Rajshahi', 'Worker@120', 1, 'arif@gmail.com', 'Mechanic', 'Male', 100);

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
  MODIFY `hire_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usersignup`
--
ALTER TABLE `usersignup`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `workersignup`
--
ALTER TABLE `workersignup`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
