-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2017 at 04:39 PM
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
('miniadmin', '1234567890', 'Jose Prakash', 'kottarakara', 0),
('rockingadmin', '1234567890', 'Mathukutty', 'manjadi', 0),
('shambomahadev', '1234567890', 'Adoor Bhasi', 'Kollam', 0),
('superadmin', '1234567890', 'Gabbar Singh', 'Kottayam', 1);

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
(201469857465, 1000000010, 'nnjj', 11),
(254136529874, 1000000008, 'mmmm', 1),
(255555744555, 1000000009, 'mmmmm', 1),
(255587444560, 1000000005, 'Ervani', 14),
(745874589568, 1000000002, 'Mathew K.T', 41),
(745898745874, 1000000003, 'Sidharth Bharath', 10),
(748510025436, 1000000001, 'Juhi Chavla', 74),
(774856698558, 1000000014, 'mmm', 74),
(784555897763, 1000000004, 'Yari Josepgh', 10),
(784589652147, 1000000001, 'Sidvani Vas', 24),
(874445588555, 1000000013, 'jjjjjj', 44),
(874555985569, 1000000002, 'Mimmini Mathew', 34),
(874559856412, 1000000004, 'Shan Aivin', 25),
(874587458956, 1000000003, 'Kasthuri Bharath', 34),
(874589666855, 1000000003, 'Mazhvil', 41),
(877547715588, 1000000002, 'Mimmin Mathew', 14),
(974869745120, 1000000001, 'Popz Popin', 20),
(987420102014, 1000000011, 'jjjjj', 1),
(987469851236, 1000000001, 'Divaldi Ram', 12);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1000000001, 145874587458, 'Karthika Krish', 'Krishnanilayam (H) Kottaramattam  P.O', '', '', 'Kottaramattam', 984562, 145, 105, 40000, 4, 'uploads/index.jpg', 'jpg', 9847513247, 'Kottayam', 3, 100001, 7.09188, 9.988, 0.4999, 1),
(1000000002, 984125749865, 'Divine Angel', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Disvansolvis (H) Hrisvasbil P.O Krivasndo', 'Krivasndo', 987452, 24, 145, 15000, 4, 'uploads/image.jpg', 'jpg', 9744254798, 'Kottayam', 1, 100001, 28, 7, 0.5, 1),
(1000000003, 145874598652, 'Barath Chandran', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Barathnivas (H) Bharathpuram P.O Kottayam', 'Kottayam', 874125, 47, 148, 57011, 5, 'uploads/index.jpg', 'jpg', 9874577455, 'Kottayam', 2, 100000, 24, 6, 0.5, 1),
(1000000004, 745891002244, 'Aivin Thomas', 'Ponnumpurayidam Mutholi P.O', '', '', 'Mutholi', 104785, 45, 100, 10000, 2, 'uploads/download.jpg', 'jpg', 8457965210, 'Kottayam', 4, 100000, 0, 0, 0, 1),
(1000000005, 475874598556, 'Subhash Chandra', 'Bharathmatha Kollad P.O Kottayam', 'Bharathmatha Kollad P.O Kottayam', 'Bharathmatha Kollad P.O Kottayam', 'Komarthanam', 748541, 20, 874, 12000, 1, 'uploads/download.jpg', 'jpg', 7412356980, 'karmapuram', 5, 100000, 0, 0, 0, 1),
(1000000008, 122222222222, 'mmmm', 'mmmm', '', '', 'mmm', 111, 5555, 5555, 5555, 1, 'uploads/index.jpg', 'jpg', 5555444444, 'Kottayam', 1, 100001, 28, 7, 1, 1),
(1000000009, 444455885444, 'mmmm', 'mmmm', '', '', 'mmmm', 1222, 4444, 4444, 55555, 1, 'uploads/index.jpg', 'jpg', 8888888855, 'Kottayam', 4, 100001, 6, 6, 1, 1),
(1000000010, 455874444558, 'mmmmm', 'kkkk', '', '', 'lllll', 11222, 2222, 2222, 22222, 1, 'uploads/index.jpg', 'jpg', 9845745590, 'Kottayam', 2, 100000, 8, 1, 1, 1),
(1000000011, 458749865744, 'mmm', 'kkk', '', '', 'kkk', 111, 1111, 1111, 111, 1, 'uploads/index.jpg', 'jpg', 9874652147, 'Kottayam', 2, 100001, 3.1, 1, 0.175, 0),
(1000000012, 103254102369, 'test', 'JJJJ', NULL, NULL, 'xx', 1, 1, 1, 1, 1, 'uploads/index.jpg', 'jpg', 1278963247, 'kottayam', 2, 100001, 73.4988, 74.0195, 48.0047, 1),
(1000000013, 587412369858, 'mmm', 'mm', '', '', 'mmm', 14, 55, 555, 55, 1, 'uploads/index.jpg', 'jpg', 4856987458, 'Kottayam', 1, 100001, 28, 7, 0.5, 1),
(1000000014, 415298741002, 'nnn', 'nnn', '', '', 'mmmm', 147, 444, 444, 444, 1, 'uploads/index.jpg', 'jpg', 4477444444, 'Kottayam', 2, 100001, 8, 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rationshops`
--

CREATE TABLE `rationshops` (
  `shopno` int(8) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(125) NOT NULL,
  `taluk` varchar(50) NOT NULL,
  `max_wheat` float DEFAULT NULL,
  `max_rice` float DEFAULT NULL,
  `max_ker` float DEFAULT NULL,
  `bal_wheat` float DEFAULT NULL,
  `bal_rice` float DEFAULT NULL,
  `bal_ker` float DEFAULT NULL,
  `amt` float DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rationshops`
--

INSERT INTO `rationshops` (`shopno`, `lname`, `address`, `taluk`, `max_wheat`, `max_rice`, `max_ker`, `bal_wheat`, `bal_rice`, `bal_ker`, `amt`, `password`) VALUES
(100000, 'Krishnan P.P', 'Plavirthapil (H) Kirvanam P.O Kottayam', 'Kottayam', 1000, 1000, 1000, 1000, 1000, 1000, 1000, 'Abcd1234'),
(100001, 'Lavalin L.P', 'Pishtturaveettil (H) Kottayam', 'Kottayam', 1000, 1000, 1000, 983.807, 980.091, 952.905, 1997.74, 'Abcd1234');

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
('48xhs7', 1000000003, 100000, 1491973193);

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
(20, 100001, 1000000012, 0.0011, 'rice', '2017-04-13', '21:49:35', 0);

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
-- Indexes for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD PRIMARY KEY (`ration_card_no`),
  ADD UNIQUE KEY `adhar_no` (`Aadhar_no`),
  ADD UNIQUE KEY `mob_no` (`mob_no`),
  ADD KEY `ration_card_no` (`ration_card_no`),
  ADD KEY `shopno` (`shopno`);

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
  ADD KEY `transid` (`transid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  MODIFY `ration_card_no` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000015;
--
-- AUTO_INCREMENT for table `rationshops`
--
ALTER TABLE `rationshops`
  MODIFY `shopno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;
--
-- AUTO_INCREMENT for table `transdetails`
--
ALTER TABLE `transdetails`
  MODIFY `transid` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardholder_and_mem`
--
ALTER TABLE `cardholder_and_mem`
  ADD CONSTRAINT `fkey1` FOREIGN KEY (`ration_card_no`) REFERENCES `rationcard_holder` (`ration_card_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rationcard_holder`
--
ALTER TABLE `rationcard_holder`
  ADD CONSTRAINT `ffff` FOREIGN KEY (`shopno`) REFERENCES `rationshops` (`shopno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
