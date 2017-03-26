-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 10:25 AM
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
-- Table structure for table `rationshops`
--

CREATE TABLE `rationshops` (
  `shopno` int(8) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(125) NOT NULL,
  `taluk` varchar(50) NOT NULL,
  `max_wheat` int(4) DEFAULT NULL,
  `max_rice` int(4) DEFAULT NULL,
  `max_ker` int(4) DEFAULT NULL,
  `bal_wheat` int(4) DEFAULT NULL,
  `bal_rice` int(4) DEFAULT NULL,
  `bal_ker` int(4) DEFAULT NULL,
  `amt` int(5) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rationshops`
--

INSERT INTO `rationshops` (`shopno`, `lname`, `address`, `taluk`, `max_wheat`, `max_rice`, `max_ker`, `bal_wheat`, `bal_rice`, `bal_ker`, `amt`, `password`) VALUES
(100000, 'Krishnan P.P', 'Plavirthapil (H) Kirvanam P.O Kottayam', 'Kottayam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abcd1234'),
(100001, 'Lavalin L.P', 'Pishtturaveettil (H) Kottayam', 'Kottayam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abcd1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rationshops`
--
ALTER TABLE `rationshops`
  ADD PRIMARY KEY (`shopno`),
  ADD KEY `shopno` (`shopno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rationshops`
--
ALTER TABLE `rationshops`
  MODIFY `shopno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
