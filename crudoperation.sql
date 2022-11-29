-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 05:45 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudoperation`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcontact`
--

CREATE TABLE `addcontact` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addcontact`
--

INSERT INTO `addcontact` (`id`, `name`, `email`, `mobile`, `gender`, `image`) VALUES
(1, 'Safwan', 'safwan1@gmail.com', '7990455220', 'male', '2.jpg'),
(2, 'gdhfth', 'ronit.zinzuvadiya@brainvire.com', '5347538244', 'male', '2.jpg'),
(3, 'Kali', 'kali94@gmail.com', '8479874554', 'female', '2.jpg'),
(7, 'Shivu', 'shivu@gmail.com', '4754424538', 'female', '2.jpg'),
(8, 'Ranjan', 'ranjan@gmail.com', '3355669955', 'male', 'bf0ce12b9d376430136a06f845bcc5b5.jpg'),
(9, 'Raj', 'raj.zinzuvadiya@gmail.com', '9714136492', 'male', '2.jpg'),
(12, 'Shivani', 'shivani2202@gmail.com', '5456768476', 'female', '3.jpeg'),
(13, 'mahima', 'mahima4455@gmail.com', '4573275245', 'female', 'laura-vinck-Hyu76loQLdk-unsplash.jpg'),
(17, 'jani', 'jani@gmail.com', '3322556633', 'male', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `email`, `mobile`, `gender`, `password`, `image`) VALUES
(1, 'Ronit', 'ronit@gmail.com', '1245241245', 'male', '123', 'first.jpeg'),
(2, 'jayesh', 'jayesh@gmail.com', '6468787424', 'male', 'jayu', 'first.jpeg'),
(3, 'raj', 'raj@gmail.com', '5424545454', 'male', 'fcdsvdfv', 'first.jpeg'),
(4, 'jay', 'jay@gmail.com', '5445645645', 'male', 'jayu@52', 'first.jpeg'),
(37, 'Sahil', 'sahil@gmail.com', '5454654155', 'male', 'sahu@65', 'first.jpeg'),
(39, 'ranjna', 'ranjan@gmail.com', '4563206953', 'male', '123', 'first.jpeg'),
(46, 'mahesh', 'mahesh70@gmail.com', '4546876878', 'male', 'mahesh#52', 'first.jpeg'),
(47, 'Rajesh', 'rajesh45@gmail.com', '4656468765', 'male', '7588e69bd6e180de8f235d5f0902b5ef', 'first.jpeg'),
(48, 'Sanjana', 'sanjana22@gmail.com', '5687645645', 'female', 'd351c28245edfdfd392254a1bb28e286', 'first.jpeg'),
(49, 'Rahul', 'rahul@gmail.com', '5478674536', 'male', '43e04f3b0da16d94ee5af9381a0171ec', 'first.jpeg'),
(51, 'Darpit', 'darpit72@gmail.com', '9099908877', 'male', 'eedb27b6b2005a4eabdfa9502ff86caa', 'first.jpeg'),
(52, 'patel', 'patel@gmail.com', '4564564556', 'male', 'fc7ccca74282f1fb2d0ab185122a69ab', 'first.jpeg'),
(53, 'csfcds', 'abc@gmail.com', '4765847684', 'male', '03c7c0ace395d80182db07ae2c30f034', 'Screenshot from 2022-11-02 14-41-42.png'),
(65, 'hgh', 'abc@gmail.com', '5456846444', 'male', '9282a2511d33efa14926a37c353b55d2', '2.jpg'),
(66, 'safwan', 'safwan@gmail.com', '8000842001', 'male', '2f29aeb71b9506437104a62b64848126', 'Screenshot from 2022-11-22 13-26-18.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcontact`
--
ALTER TABLE `addcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcontact`
--
ALTER TABLE `addcontact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
