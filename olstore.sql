-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 07:31 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olstore`
--
CREATE DATABASE IF NOT EXISTS `olstore` DEFAULT CHARACTER SET latin7 COLLATE latin7_general_ci;
USE `olstore`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` smallint(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `type` set('admin','employee','customer') NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `address` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userid`, `username`, `pwd`, `type`, `name`, `email`, `tel`, `address`, `date`) VALUES
(1, 'wzl', '1111', 'admin', 'Long', 'w@gmail.com', '666 581314', 'h9k 1n3', '2018-08-26'),
(2, 'sami', '1111', 'employee', 'Samiar', 's@gmail.com', '1234356', '1b3 2n5', '2018-08-26'),
(3, 'bob', '1111', 'customer', 'Bob', 'b@gmail.com', '738926', '3c3 4m4', '2018-08-26'),
(4, 'jim', '1111', 'customer', 'Jim', 'j@gmail.com', '70912365', 'j9j 5k5', '2018-08-22'),
(5, 'nagat', '1111', 'employee', 'Nagat', 'n@gmail.com', '6413548', 'n5n 6s6', '2018-08-15'),
(6, 'christ', '1111', 'customer', 'Christ', 'c@email.com', '8945132', 'c2c 1b1', '2018-08-22'),
(7, 'dell', '1111', 'customer', 'Dell', 'd@gmail.com', '6146668888', 'd4b 1m3', '2018-08-27'),
(8, 'god', '1111', 'employee', 'Hawk', 'h@g.com', '5748561', 'A4A 7K7', '2018-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` smallint(6) NOT NULL,
  `userid` smallint(6) NOT NULL,
  `productid` smallint(6) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `emid` smallint(6) NOT NULL,
  `emname` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `uptodate` date NOT NULL,
  `status` set('open','done') NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `productid`, `price`, `qty`, `total`, `emid`, `emname`, `date`, `uptodate`, `status`) VALUES
(1, 3, 1, '39.99', 2, '79.98', 2, 'Sami', '2018-08-23', '2018-09-01', 'done'),
(2, 4, 3, '49.99', 3, '149.97', 2, 'Sami', '2018-08-24', '2018-08-31', 'open'),
(3, 3, 1, '39.99', 1, '39.99', 4, 'Jim', '2018-08-26', '0000-00-00', 'open'),
(4, 3, 2, '99.99', 2, '199.98', 5, 'Nagat', '2018-08-27', '0000-00-00', 'open'),
(5, 4, 2, '99.99', 1, '99.99', 0, '', '2018-08-28', '0000-00-00', 'open'),
(6, 4, 4, '29.99', 2, '59.98', 0, 'Samiar', '2018-08-29', '2018-08-31', 'open'),
(7, 3, 5, '59.99', 1, '59.99', 0, 'Nagat', '2018-08-29', '2018-08-31', 'open'),
(8, 3, 4, '29.99', 1, '29.99', 0, '', '2018-08-29', '0000-00-00', 'open'),
(9, 3, 3, '49.99', 2, '99.98', 0, '', '2018-08-29', '0000-00-00', 'open'),
(10, 6, 2, '99.99', 1, '99.99', 0, 'Hawk', '2018-08-29', '2018-08-31', 'open'),
(11, 6, 4, '29.99', 1, '29.99', 0, '', '2018-08-29', '0000-00-00', 'open'),
(12, 6, 5, '59.99', 4, '239.96', 0, '', '2018-08-29', '0000-00-00', 'open'),
(13, 6, 4, '29.99', 1, '29.99', 0, '', '2018-08-29', '0000-00-00', 'open'),
(14, 6, 3, '49.99', 1, '49.99', 0, 'Hawk', '2018-08-29', '2018-08-30', 'open'),
(15, 0, 2, '99.99', 1, '99.99', 0, '', '2018-08-30', '0000-00-00', 'open'),
(16, 0, 6, '999.98', 2, '1999.96', 0, '', '2018-08-30', '0000-00-00', 'open'),
(17, 0, 6, '999.98', 2, '1999.96', 0, '', '2018-08-30', '0000-00-00', 'open'),
(18, 0, 4, '29.99', 1, '29.99', 0, '', '2018-08-30', '0000-00-00', 'open'),
(19, 0, 6, '999.98', 1, '999.98', 0, '', '2018-08-31', '0000-00-00', 'open'),
(20, 0, 4, '29.99', 2, '59.98', 0, '', '2018-08-31', '0000-00-00', 'open'),
(21, 0, 5, '59.99', 3, '179.97', 0, '', '2018-08-31', '0000-00-00', 'open'),
(22, 0, 3, '29.99', 1, '29.99', 0, 'Hawk', '2018-08-31', '2018-09-01', 'open'),
(23, 3, 4, '29.99', 2, '59.98', 0, '', '2018-08-31', '0000-00-00', 'open'),
(24, 0, 1, '39.99', 1, '39.99', 0, '', '2018-08-31', '0000-00-00', 'open'),
(25, 0, 3, '49.99', 1, '49.99', 0, '', '2018-08-31', '0000-00-00', 'open');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ordersum`
-- (See below for the actual view)
--
CREATE TABLE `ordersum` (
`userid` smallint(6)
,`productid` smallint(6)
,`qtysum` decimal(32,0)
,`url` varchar(50)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` smallint(6) NOT NULL,
  `productname` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin7;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `description`, `price`, `date`, `url`) VALUES
(1, 'Keyboard Lenovo', 'The Lenovo Professional Bluetooth Keyboard is a full-size traditional layout keyboard with number pad. The slim modern design has responsive keys and a premium typing experience. One touch dedicated media keys put the controls you use most at your fingertips. Wirelessly connect compatible Lenovo devices with bluetooth', '39.99', '2018-08-26', 'image/keyboard.jpg'),
(2, 'Mouse MS', 'Stylish and eye-grabbing, the Arc Touch Mouse is more than a pretty device. It is reliable wireless freedom plus Microsoft touch technology, on the go. When you are on the move, keep the tiny nano transceiver plugged into your computer\'s USB port, or attach it magnetically onto the underside of the mouse.', '99.99', '2018-08-26', 'image/mousems.jpg'),
(3, 'Mouse Dell', 'The Dell Bluetooth Mouse-WM615 combines high-performance with an innovative design which lets you transform from comfort to ultra portability and increase your productivity in virtually any setting.', '49.99', '2018-08-26', 'image/mousedell.jpg'),
(4, 'Ear Plug', 'Without more cable chaos, this Bluetooth earplug is completely wireless via Bluetooth connection. BT 4.2 low power consumption, better signal. The special earphone design makes this truly wireless Bluetooth headset a perfect choice for gym, running, cycling, hiking, sports and other activities. ', '29.99', '2018-08-26', 'image/earplug.jpg'),
(5, 'Head Phone', 'The Universal Bluetooth Wireless HD Headphones by Polaroid connects to most devices via Bluetooth, meaning you can enjoy high-definition sound quality without being tied down.\r\nNever miss a phone call again with the headphones’ built in microphone! Answer calls wireless without ever taking your phone out of your pocket. The buttons on the mic also double as a way to pay/pause music.\r\nRecharge the headphones go on with your day. ', '59.99', '2018-08-26', 'image/headphone.jpg'),
(6, 'Surface Pro', 'New product, you can add later...', '999.98', '2018-08-30', 'image/surface.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `top3`
-- (See below for the actual view)
--
CREATE TABLE `top3` (
`productid` smallint(6)
,`SUM(qty)` decimal(32,0)
,`url` varchar(50)
,`description` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure for view `ordersum`
--
DROP TABLE IF EXISTS `ordersum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ordersum`  AS  select `orders`.`userid` AS `userid`,`orders`.`productid` AS `productid`,sum(`orders`.`qty`) AS `qtysum`,`products`.`url` AS `url`,`products`.`description` AS `description` from (`orders` join `products` on((`orders`.`productid` = `products`.`productid`))) group by `orders`.`userid`,`orders`.`productid` order by `orders`.`userid`,sum(`orders`.`qty`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `top3`
--
DROP TABLE IF EXISTS `top3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `top3`  AS  select `orders`.`productid` AS `productid`,sum(`orders`.`qty`) AS `SUM(qty)`,`products`.`url` AS `url`,`products`.`description` AS `description` from (`orders` join `products` on((`orders`.`productid` = `products`.`productid`))) group by `orders`.`productid` order by sum(`orders`.`qty`) desc limit 3 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`) USING BTREE,
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `productname` (`productname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
