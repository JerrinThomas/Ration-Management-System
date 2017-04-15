-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 07:19 AM
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
(124578986532, 1000000003, 'Jistin Thomas', 13),
(125478569874, 1000000002, 'Rissbhalsha', 22),
(145874589652, 1000000006, 'mmm', 25),
(325698745896, 1000000006, 'mmmmm', 58),
(412574859866, 1000000002, 'Sisvalnina Ruso', 24),
(477785559885, 1000000007, 'Kiufaiufa', 15),
(555874455856, 1000000007, 'Oiidakkkfa', 78),
(749874589685, 1000000001, 'Pahnabi Chandran', 9),
(777777775555, 1000000003, 'Jissy Fernandaz', 21),
(784102225874, 1000000004, 'Impress Jignesh', 85),
(852036974102, 1000000002, 'Russdude Ruso', 5),
(857412236978, 1000000004, 'Pressy Thomas', 21),
(857496857445, 1000000003, 'Jissvin Thomas', 12),
(857496857496, 1000000004, 'Hessy Jignesh', 24),
(874555587455, 1000000004, 'Impression Jignesh', 10),
(874598748596, 1000000001, 'Hajnabi Chandran', 12),
(877444444444, 1000000002, 'Kissvansi Velvwet', 10),
(977458745845, 1000000001, 'Panjami Chandran', 74),
(985555555745, 1000000005, 'Jrr Vijay', 20),
(987102365412, 1000000002, 'Risvalnina Ruso', 21),
(987458742103, 1000000005, 'Jr Vijay', 10),
(987485965232, 1000000001, 'Panjali Chandran', 45);

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
(1000000001, 987458415258, 'Bharath Chandra', 'Puthukattil Karmapuram P.O', '', '', 'Karmapuram', 748758, 102, 985, 10000, 4, 'uploads/images.jpg', 'jpg', 9874653241, 'Kottayam', 1, 100001, 27.998, 6.89, 3.878, 0),
(1000000002, 987432015478, 'Ruso Rusvelt', 'Rusvarkisthan Karmapuram P.O', '', '', 'Kammattipadam', 458745, 102, 541, 9854, 5, 'uploads/images.jpg', 'jpg', 8100018888, 'Kottayam', 2, 100001, 24, 6, 4, 0),
(1000000003, 855558885555, 'Jacquelin Fernandaz', 'Kammattipadam Kammattipuram P.O', '', '', 'Kammattipadam', 415298, 125, 41, 52000, 3, 'uploads/images.jpg', 'jpg', 5444788599, 'Kottayam', 3, 100001, 8, 8, 0.5, 1),
(1000000004, 854474558555, 'Lisvalis Sisvilsta', 'Kalapila (H) Kottakad P.O', '', '', 'Panjamipuram', 857489, 103, 25, 21400, 4, 'uploads/images.jpg', 'jpg', 8574321025, 'Kottayam', 2, 100000, 20, 5, 0.5, 1),
(1000000005, 741225488556, 'Vijay SuperStar', 'Rakshaknagar kalkkandam P.O', '', '', 'Kalkkandam', 874589, 74, 200, 22255, 2, 'uploads/images.jpg', 'jpg', 5222587773, 'Kumarakom', 1, 100000, 28, 7, 4, 0),
(1000000006, 855574458885, 'test', 'kkkkk', '', '', 'ttttttttt', 77777, 777, 777, 777, 2, 'uploads/images.jpg', 'jpg', 7777777777, 'Kottayam', 1, 100000, 28, 7, 0.5, 1),
(1000000007, 748597845695, 'Hannnaaahhh', 'kofahfjajhfau Klloafkajj P.O', '', '', 'Koayfahfammm', 255555, 558, 555, 58745, 2, 'uploads/images.jpg', 'jpg', 5877459985, 'Kottayam', 3, 100001, 6, 6, 0.5, 1);

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
(100000, 'Krishnan P.P', 'Plavirthapil (H) Kirvanam P.O Kottayam', 'Kottayam', 19, 76, 5, 998.945, 1086, 998.189, 1000, 'Abcd1234'),
(100001, 'Lavalin L.P', 'Pishtturaveettil (H) Kottayam', 'Kottayam', 27, 66, 9, 1000.95, 1070, 1001.69, 2000.3, 'Abcd1234'),
(100002, 'Sidharth Test', 'Huaduamakjfiau Kollad P.O', 'Kottayam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Abcd1234');

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
(20, 100001, 1000000012, 0.0011, 'rice', '2017-04-13', '21:49:35', 0),
(21, 100001, 1000000001, 0.001, 'rice', '2017-04-14', '17:34:14', 0),
(22, 100001, 1000000001, 0.11, 'wheat', '2017-04-15', '12:04:36', 0),
(23, 100001, 1000000001, 0.001, 'rice', '2017-04-15', '12:04:36', 0),
(24, 100001, 1000000001, 0.122, 'kerosene', '2017-04-15', '12:04:36', 2.562);

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
  MODIFY `ration_card_no` bigint(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000008;
--
-- AUTO_INCREMENT for table `rationshops`
--
ALTER TABLE `rationshops`
  MODIFY `shopno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100003;
--
-- AUTO_INCREMENT for table `transdetails`
--
ALTER TABLE `transdetails`
  MODIFY `transid` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  ADD CONSTRAINT `ffff` FOREIGN KEY (`shopno`) REFERENCES `rationshops` (`shopno`),
  ADD CONSTRAINT `fffz` FOREIGN KEY (`category`) REFERENCES `category` (`cat_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
