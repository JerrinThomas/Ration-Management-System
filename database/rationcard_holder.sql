-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 11:16 AM
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
-- Table structure for table `rationcard_holder`
--

CREATE TABLE `rationcard_holder` (
  `ration_card_no` bigint(16) NOT NULL,
  `Aadhar_no` bigint(18) NOT NULL,
  `hofamily` varchar(50) NOT NULL,
  `add1` varchar(125) NOT NULL,
  `add2` varchar(125) DEFAULT NULL,
  `add3` varchar(125) DEFAULT NULL,
  `pan_mun_cor` varchar(50) DEFAULT NULL,
  `pincode` int(7) DEFAULT NULL,
  `wardno` int(4) DEFAULT NULL,
  `house_no` int(4) DEFAULT NULL,
  `monthly_in` int(14) DEFAULT NULL,
  `no_of_mem` int(14) DEFAULT NULL,
  `hof_img` varchar(125) DEFAULT NULL,
  `hof_img_type` varchar(5) DEFAULT NULL,
  `mob_no` bigint(16) DEFAULT NULL,
  `taluk` varchar(50) NOT NULL,
  `category` int(4) NOT NULL,
  `shopno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rationcard_holder`
--

INSERT INTO `rationcard_holder` (`ration_card_no`, `Aadhar_no`, `hofamily`, `add1`, `add2`, `add3`, `pan_mun_cor`, `pincode`, `wardno`, `house_no`, `monthly_in`, `no_of_mem`, `hof_img`, `hof_img_type`, `mob_no`, `taluk`, `category`, `shopno`) VALUES
(1000000001, 145874587458, 'Karthika Krish', 'Krishnanilayam (H) Kottaramattam  P.O', '', '', 'Kottaramattam', 984562, 145, 105, 40000, 3, 'uploads/index.jpg', 'jpg', 9847513247, 'Kottayam', 3, 100001),
(1000000002, 984125749865, 'Divine Angel', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Krivasndo', 987452, 24, 145, 15000, 4, 'uploads/image.jpg', 'jpg', 9744254798, 'Kottayam', 1, 100001),
(1000000003, 145874598652, 'Barath Chandran', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Kottayam', 874125, 47, 148, 57011, 4, 'uploads/index.jpg', 'jpg', 9874577455, 'Kottayam', 2, 100000),
(1000000004, 745891002244, 'Aivin Thomas', 'Ponnumpurayidam Mutholi P.O', '', '', 'Mutholi', 104785, 45, 100, 10000, 2, 'uploads/download.jpg', 'jpg', 8457965210, 'Kottayam', 4, 100000),
(1000000005, 475874598556, 'Subhash Chandra', 'Bharathmatha Kollad P.O Kottayam', 'Bharathmatha Kollad P.O Kottayam', 'Bharathmatha Kollad P.O Kottayam', 'Komarthanam', 748541, 20, 874, 12000, 1, 'uploads/download.jpg', 'jpg', 7412356980, 'karmapuram', 5, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD PRIMARY KEY (`ration_card_no`),
  ADD UNIQUE KEY `adhar_no` (`Aadhar_no`),
  ADD UNIQUE KEY `mob_no` (`mob_no`),
  ADD KEY `ration_card_no` (`ration_card_no`),
  ADD KEY `shopno` (`shopno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  MODIFY `ration_card_no` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000006;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD CONSTRAINT `ffff` FOREIGN KEY (`shopno`) REFERENCES `rationshops` (`shopno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
