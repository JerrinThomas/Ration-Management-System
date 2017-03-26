-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 11:17 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardholder_and_mem`
--

CREATE TABLE `cardholder_and_mem` (
  `Aadhar_no` bigint(18) NOT NULL,
  `ration_card_no` bigint(16) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardholder_and_mem`
--

INSERT INTO `cardholder_and_mem` (`Aadhar_no`, `ration_card_no`, `mem_name`, `age`) VALUES
(102547895667, 1000000002, 'Ann Mariya', 74),
(125477855566, 1000000003, 'Janaki Chandran', 98),
(147859854787, 1000000003, 'Simantha Bharath', 15),
(255587444560, 1000000005, 'Ervani', 14),
(745874589568, 1000000002, 'Mathew K.T', 41),
(745898745874, 1000000003, 'Sidharth Bharath', 10),
(748510025436, 1000000001, 'Juhi Chavla', 74),
(784555897763, 1000000004, 'Yari Josepgh', 10),
(874555985569, 1000000002, 'Mimmini Mathew', 34),
(874559856412, 1000000004, 'Shan Aivin', 25),
(874587458956, 1000000003, 'Kasthuri Bharath', 34),
(877547715588, 1000000002, 'Mimmin Mathew', 14),
(974869745120, 1000000001, 'Popz Popin', 20),
(987469851236, 1000000001, 'Divaldi Ram', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cardholder_and_mem`
--
ALTER TABLE `cardholder_and_mem`
  ADD PRIMARY KEY (`Aadhar_no`),
  ADD KEY `ration_card_no` (`ration_card_no`),
  ADD KEY `ration_card_no_2` (`ration_card_no`),
  ADD KEY `ration_card_no_3` (`ration_card_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardholder_and_mem`
--
ALTER TABLE `cardholder_and_mem`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`ration_card_no`) REFERENCES `rationcard_holder` (`ration_card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
