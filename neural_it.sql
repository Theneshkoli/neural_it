-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 08:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neural_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `aid` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `add_line1` text COLLATE utf8_unicode_ci NOT NULL,
  `add_line2` text COLLATE utf8_unicode_ci NOT NULL,
  `state` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `country` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`aid`, `employee_id`, `add_line1`, `add_line2`, `state`, `country`) VALUES
(1, 1, 'bldg', 'street', 'Gujrat', 'India'),
(2, 1, 'flat', 'thane', 'Maharashtra', 'India'),
(3, 2, 'bldg', 'street', 'Gujrat', 'India'),
(4, 3, 'house', 'city', 'Gujrat', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `fname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `mname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `lname` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `photograph` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `fname`, `mname`, `lname`, `gender`, `mail`, `mobile_no`, `date_of_birth`, `photograph`, `status`) VALUES
(1, 'Dinesh', 'Tukaram', 'Koli', 'male', '', 9988776644, '2018-10-15', 'dummy.png', '1'),
(2, 'Dinesh', 'Tukaram', 'Koli2', 'male', 'test2@mail.com', 9988776644, '2018-10-15', 'dummy.png', '1'),
(3, 'deepak', 'm_name', 'raj', 'male', 'test3@mail.com', 8888776655, '2019-10-15', 'dummy.png', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`eid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
