-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 03:48 AM
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
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `taluk` varchar(32) NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`username`, `password`, `name`, `taluk`, `role`) VALUES
('adminpopinz', '1234567890', 'Kochadiyan', 'karmapuram', 0),
('freakadmin', '1234567890', 'Roshni Valsa', 'Kumarakom', 0),
('javalin', 'Abcd1234', 'Java Lin', 'kochi', 0),
('kkkkkk', 'Abcd1234', 'llllll', 'kkkkk', 0),
('miniadmin', '1234567890', 'Jose Prakash', 'kottarakara', 0),
('rockingadmin', '1234567890', 'Mathukutty', 'manjadi', 0),
('shambomahadev', '1234567890', 'Adoor Bhasi', 'Kollam', 0),
('superadmin', '1234567890', 'Gabbar Singh', 'Kottayam', 1),
('testadmin', 'Abcd1234', 'test', 'pampady', 0),
('tmtadmin', 'Abcd1234', 'Tom Mathew', 'pala', 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `username` varchar(16) NOT NULL,
  `activity` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`username`, `activity`, `date`, `time`) VALUES
('ssbfbs', 'log in ', '2017-06-08', '07:55:10'),
('superadmin', 'log in', '2017-06-08', '08:01:22'),
('superadmin', 'log in', '2017-06-08', '08:02:58'),
('superadmin', 'log in', '2017-06-08', '08:04:15'),
('superadmin', 'log in', '2017-06-08', '08:05:27'),
('miniadmin', 'log in', '2017-06-08', '08:06:40'),
('', 'logged Out', '2017-06-08', '08:07:26'),
('miniadmin', 'log in', '2017-06-08', '08:07:57'),
('miniadmin', 'logged Out', '2017-06-08', '08:07:59'),
('miniadmin', 'Logged In', '2017-06-08', '08:10:24'),
('miniadmin', 'Logged Out', '2017-06-08', '08:10:27'),
('miniadmin', 'Login', '2017-06-08', '08:15:27'),
('', 'Added new card : 1000000005 ', '2017-06-08', '08:16:59'),
('miniadmin', 'Added new card : 1000000005 ', '2017-06-08', '08:21:05'),
('miniadmin', 'Added new card :  ', '2017-06-08', '08:25:48'),
('miniadmin', 'Card Modified : 1000000004 ', '2017-06-08', '08:38:23'),
('miniadmin', 'Added new card : 1000000006 ', '2017-06-08', '08:47:23'),
('miniadmin', 'Card Deleted : 1000000006 ', '2017-06-08', '08:47:37'),
('miniadmin', 'Modifies Shop : 100003 ', '2017-06-08', '08:57:11'),
('miniadmin', 'Deleted Shop : 100003 ', '2017-06-08', '08:57:19'),
('miniadmin', 'Added new Shop : 100005 ', '2017-06-08', '09:00:15'),
('miniadmin', 'Added new Shop : 100006 ', '2017-06-08', '09:01:42'),
('miniadmin', 'Modified Shop : 100006 ', '2017-06-08', '09:06:52');

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
(105544523650, 1000000004, 'Jignu Hona', 15),
(120010001220, 1000000002, 'Ulip Thomas', 54),
(125444755711, 1000000002, 'Nili Thomas', 24),
(201452103654, 1000000001, 'Vineethan Chandra', 20),
(230111254441, 1000000004, 'Jignesh Hona', 10),
(254112364411, 1000000002, 'Tulip Thomas', 12),
(412532214521, 1000000003, 'Jan K.T', 20),
(415477455696, 1000000002, 'Philip Thomas', 25),
(415697456662, 1000000003, 'Gittex K.T', 30),
(451236552242, 1000000001, 'Bharathi V.P', 40),
(741023695412, 1000000001, 'Vinvin Chandra', 10),
(741203569743, 1000000001, 'Vimal Chandra', 14),
(745444566950, 1000000002, 'K.T Abraham', 45),
(745521233321, 1000000003, 'Gitti K.T', 21);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_no` int(11) NOT NULL,
  `riceq` float NOT NULL DEFAULT '0',
  `wheatq` float DEFAULT '0',
  `ekerq` float NOT NULL DEFAULT '0',
  `nekerq` float NOT NULL DEFAULT '0',
  `permember` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_no`, `riceq`, `wheatq`, `ekerq`, `nekerq`, `permember`) VALUES
(1, 28, 7, 0.5, 4, 0),
(2, 4, 1, 0.5, 4, 1),
(3, 2, 2, 0.5, 4, 1),
(4, 6, 6, 0.5, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `cat_no` int(3) NOT NULL,
  `price` float NOT NULL,
  `pwheat` float NOT NULL,
  `pker` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`cat_no`, `price`, `pwheat`, `pker`) VALUES
(1, 0, 0, 21),
(2, 0, 0, 21),
(3, 2, 2, 21),
(4, 8.9, 6.7, 21);

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
  `shopno` int(4) NOT NULL,
  `remrice` float NOT NULL DEFAULT '0',
  `remwheat` float NOT NULL DEFAULT '0',
  `remker` float NOT NULL DEFAULT '0',
  `elect` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rationcard_holder`
--

INSERT INTO `rationcard_holder` (`ration_card_no`, `Aadhar_no`, `hofamily`, `add1`, `add2`, `add3`, `pan_mun_cor`, `pincode`, `wardno`, `house_no`, `monthly_in`, `no_of_mem`, `hof_img`, `hof_img_type`, `mob_no`, `taluk`, `category`, `shopno`, `remrice`, `remwheat`, `remker`, `elect`) VALUES
(1000000001, 457415697454, 'Subhash Chandra', 'Krishnanilayam (H) Kottaramattam  P.O', '', '', 'Komarthanam', 474561, 41, 102, 10000, 4, 'uploads/img.jpg', 'jpg', 8281860141, 'Kottayam', 1, 100001, 28, 7, 4, 0),
(1000000002, 741012124152, 'Tom Mathew Thomas', 'Baavanyilveedu Immavannoor P.O Kollam', '', '', 'Immavannoor', 102541, 12, 452, 10200, 5, 'uploads/img2.jpg', 'jpg', 9496637344, 'Kottayam', 2, 100001, 24, 6, 4, 0),
(1000000003, 741000000112, 'Kittex K.T', 'Kottaram Kottaramattom Kottayam', '', '', 'Kottaramattam', 125441, 52, 12, 25000, 3, 'uploads/img1.jpg', 'jpg', 9846828106, 'Kottayam', 3, 100001, 8, 8, 0.5, 1),
(1000000004, 564788991230, 'Janvar Hona', 'Jangar Ganganoor P.O Kottayam', '', '', 'Ganganoor', 154254, 102, 54, 50000, 2, 'uploads/img1.jpg', 'jpg', 7459745222, 'kottarakara', 4, 100000, 6, 6, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rationshops`
--

CREATE TABLE `rationshops` (
  `shopno` int(8) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(125) NOT NULL,
  `taluk` varchar(50) NOT NULL,
  `max_wheat` float DEFAULT '0',
  `max_rice` float DEFAULT '0',
  `max_ker` float DEFAULT '0',
  `bal_wheat` float DEFAULT '0',
  `bal_rice` float DEFAULT '0',
  `bal_ker` float DEFAULT '0',
  `amt` float DEFAULT '0',
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rationshops`
--

INSERT INTO `rationshops` (`shopno`, `lname`, `address`, `taluk`, `max_wheat`, `max_rice`, `max_ker`, `bal_wheat`, `bal_rice`, `bal_ker`, `amt`, `password`) VALUES
(100000, 'Krishnan P.P', 'Plavirthapil (H) Kirvanam P.O Kottayam', 'Kottayam', 6, 6, 4, 0, 0, 0, 0, 'Abcd1234'),
(100001, 'Lavalin L.P', 'Pishtturaveettil (H) Kottayam', 'Kottayam', 21, 60, 8.5, 0, 0, 0, 0, 'Abcd1234');

-- --------------------------------------------------------

--
-- Stand-in structure for view `shop_wise_sum`
-- (See below for the actual view)
--
CREATE TABLE `shop_wise_sum` (
`shopno` int(8)
,`reqrice` double
,`reqwheat` double
,`reqker` double
);

-- --------------------------------------------------------

--
-- Table structure for table `tempotp`
--

CREATE TABLE `tempotp` (
  `otp` varchar(10) DEFAULT NULL,
  `ration_card_no` bigint(18) DEFAULT NULL,
  `shopno` bigint(18) DEFAULT NULL,
  `starttime` bigint(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempotp`
--

INSERT INTO `tempotp` (`otp`, `ration_card_no`, `shopno`, `starttime`) VALUES
('51oq', 1000000008, 100001, 1496655763);

-- --------------------------------------------------------

--
-- Table structure for table `transdetails`
--

CREATE TABLE `transdetails` (
  `transid` int(18) NOT NULL,
  `shopno` bigint(18) NOT NULL,
  `cardno` bigint(18) NOT NULL,
  `quantity` float NOT NULL,
  `item` varchar(20) NOT NULL,
  `dat` date NOT NULL,
  `tim` time NOT NULL,
  `amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transdetails`
--

INSERT INTO `transdetails` (`transid`, `shopno`, `cardno`, `quantity`, `item`, `dat`, `tim`, `amt`) VALUES
(3, 100001, 1000000001, 0, 'wheat', '2017-04-13', '00:00:00', 0),
(4, 11000, 1111, 2, 'wheat', '2017-04-13', '18:32:18', 1111),
(5, 100001, 1000000001, 0, 'wheat', '2017-04-13', '19:53:13', 0),
(6, 100001, 1000000001, 1, 'rice', '2017-03-15', '11:00:00', 100),
(7, 100001, 1000000001, 0, 'wheat', '2017-04-13', '20:28:52', 0),
(8, 100001, 1000000001, 0, 'wheat', '2017-04-13', '20:36:54', 0),
(9, 100001, 1000000001, 0.001, 'wheat', '2017-04-13', '20:42:02', 0.002),
(10, 100001, 1000000012, 14, 'wheat', '2017-04-13', '21:01:03', 0),
(11, 100001, 1000000012, 11, 'kerosene', '2017-04-13', '21:01:03', 231),
(12, 100001, 1000000012, 0.255, 'wheat', '2017-04-13', '21:02:16', 0),
(13, 100001, 1000000012, 0.25, 'kerosene', '2017-04-13', '21:02:16', 5.25),
(14, 100001, 1000000012, 0.25, 'wheat', '2017-04-13', '21:26:52', 0),
(15, 100001, 1000000012, 0.25, 'kerosene', '2017-04-13', '21:26:52', 5.25),
(16, 100001, 1000000012, 0.1254, 'wheat', '2017-04-13', '21:38:26', 0),
(17, 100001, 1000000012, 0.00125, 'kerosene', '2017-04-13', '21:38:26', 0.02625),
(18, 100001, 1000000012, 0.0001, 'wheat', '2017-04-13', '21:40:49', 0),
(19, 100001, 1000000012, 0.0001, 'kerosene', '2017-04-13', '21:40:49', 0.0021),
(20, 100001, 1000000012, 0.0011, 'rice', '2017-04-13', '21:49:35', 0),
(21, 100001, 1000000001, 0.001, 'rice', '2017-04-14', '17:34:14', 0),
(22, 100001, 1000000001, 0.11, 'wheat', '2017-04-15', '12:04:36', 0),
(23, 100001, 1000000001, 0.001, 'rice', '2017-04-15', '12:04:36', 0),
(24, 100001, 1000000001, 0.122, 'kerosene', '2017-04-15', '12:04:36', 2.562),
(25, 100001, 1000000001, 28, 'rice', '2017-04-16', '18:14:33', 0),
(26, 100001, 1000000001, 4, 'kerosene', '2017-04-16', '18:14:34', 84),
(27, 100001, 1000000001, 0.25, 'kerosene', '2017-04-17', '20:32:49', 5.25),
(28, 100001, 1000000001, 5, 'rice', '2017-04-17', '22:38:55', 0),
(29, 100001, 1000000001, 0.5, 'kerosene', '2017-04-17', '22:38:55', 10.5),
(30, 100001, 1000000001, 5, 'rice', '2017-04-17', '23:02:42', 0),
(31, 100001, 1000000001, 0.5, 'kerosene', '2017-04-17', '23:02:42', 10.5),
(32, 100001, 1000000001, 1, 'kerosene', '2017-04-18', '08:42:58', 21),
(33, 100001, 1000000001, 0.25, 'rice', '2017-04-18', '09:16:23', 0),
(34, 100009, 1000000014, 12, 'rice', '2017-04-18', '10:11:37', 0),
(35, 100001, 1000000008, 0.5, 'rice', '2017-06-05', '14:58:19', 0),
(36, 100001, 1000000008, 0.5, 'rice', '2017-06-05', '15:02:37', 0),
(37, 100001, 1000000008, 0.12, 'rice', '2017-06-05', '15:06:21', 0),
(38, 100001, 1000000008, 0.0002, 'rice', '2017-06-05', '15:09:06', 0);

-- --------------------------------------------------------

--
-- Structure for view `shop_wise_sum`
--
DROP TABLE IF EXISTS `shop_wise_sum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `shop_wise_sum`  AS  select `rationshops`.`shopno` AS `shopno`,(`rationshops`.`max_rice` - `rationshops`.`bal_rice`) AS `reqrice`,(`rationshops`.`max_wheat` - `rationshops`.`bal_wheat`) AS `reqwheat`,(`rationshops`.`max_ker` - `rationshops`.`bal_ker`) AS `reqker` from `rationshops` group by `rationshops`.`shopno` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cardholder_and_mem`
--
ALTER TABLE `cardholder_and_mem`
  ADD PRIMARY KEY (`Aadhar_no`),
  ADD KEY `ration_card_no` (`ration_card_no`),
  ADD KEY `ration_card_no_2` (`ration_card_no`),
  ADD KEY `ration_card_no_3` (`ration_card_no`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_no`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD KEY `cat_no` (`cat_no`);

--
-- Indexes for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD PRIMARY KEY (`ration_card_no`),
  ADD UNIQUE KEY `adhar_no` (`Aadhar_no`),
  ADD UNIQUE KEY `mob_no` (`mob_no`),
  ADD KEY `ration_card_no` (`ration_card_no`),
  ADD KEY `shopno` (`shopno`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `rationshops`
--
ALTER TABLE `rationshops`
  ADD PRIMARY KEY (`shopno`),
  ADD KEY `shopno` (`shopno`);

--
-- Indexes for table `transdetails`
--
ALTER TABLE `transdetails`
  ADD PRIMARY KEY (`transid`),
  ADD KEY `transid` (`transid`),
  ADD KEY `shopno` (`shopno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  MODIFY `ration_card_no` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000007;
--
-- AUTO_INCREMENT for table `rationshops`
--
ALTER TABLE `rationshops`
  MODIFY `shopno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
--
-- AUTO_INCREMENT for table `transdetails`
--
ALTER TABLE `transdetails`
  MODIFY `transid` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardholder_and_mem`
--
ALTER TABLE `cardholder_and_mem`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`ration_card_no`) REFERENCES `rationcard_holder` (`ration_card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `ccshaf` FOREIGN KEY (`cat_no`) REFERENCES `category` (`cat_no`);

--
-- Constraints for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD CONSTRAINT `ffff` FOREIGN KEY (`shopno`) REFERENCES `rationshops` (`shopno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fffz` FOREIGN KEY (`category`) REFERENCES `category` (`cat_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
