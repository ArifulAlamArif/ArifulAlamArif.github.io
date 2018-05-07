-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 06:05 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`) VALUES
(1, 'MensFashion'),
(2, 'WomensFashion'),
(3, 'Phones&Tablets'),
(4, 'Computer&Gaming'),
(5, 'Beauty&Health'),
(6, 'TV,AUDIO&CAMERAS');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `description` varchar(1500) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `discounts` int(100) NOT NULL,
  `pimage` varchar(100) NOT NULL,
  `deliveryDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`, `qty`, `description`, `cname`, `discounts`, `pimage`, `deliveryDate`) VALUES
(2, 'a', 1, 1, '1', 'Phones&Tablets', 1, 'a_Phones&Tablets.png', '1-5'),
(3, 'as', 2, 2, '2', 'Computer&Gaming', 2, 'as_Computer&Gaming.png', '2-6'),
(4, 'S9', 10500, 5, 'Samsung Mobile', 'Phones&Tablets', 5, 'S9_Phones&Tablets.jpg', '1-5'),
(5, 'nn', 11, 11, '11', 'Beauty&Health', 11, 'nn_Beauty&Health.jpg', '5-6'),
(6, 'aaa', 1, 3, '2', 'TV,AUDIO&CAMERAS', 4, 'aaa_TV,AUDIO&CAMERAS.jpg', '5-6'),
(8, 'aaaaaa', 111, 111, '111', 'MensFashion', 11, '7_aaaaaa_MensFashion.jpg', '1-5'),
(9, 'www', 22, 22, '22', 'WomensFashion', 22, '9_www_WomensFashion.jpg', '2-5');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `pic_id` int(11) NOT NULL,
  `pic_name` varchar(100) NOT NULL,
  `pic_type` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `links` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`pic_id`, `pic_name`, `pic_type`, `filename`, `links`) VALUES
(4, 'csgo', 'offers', 'csgo_offers.png', 'https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/'),
(7, 'up', 'ads', 'up_ads.jpg', 'https://www.filmxy.me/up-2009-720p-1080p-bluray-free-download/'),
(11, 'E_bike', 'ads', 'E_bike_ads.jpg', '#'),
(12, 'smart_phone', 'offers', 'smart_phone_offers.jpg', 'asd.asd'),
(13, 'smart_tv', 'offers', 'smart_tv_offers.jpg', '#'),
(17, 'Red bus', 'ads', 'Red bus_ads.png', 'https://en.wikipedia.org/wiki/Bus');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `verification` varchar(10) NOT NULL,
  `v_code` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`, `mobile`, `address`, `gender`, `dob`, `verification`, `v_code`, `type`, `id`) VALUES
('Faiza Tahsin', 'nimmi.haque17@yahoo.com', 'Nimmi', '1717', '+8801959609919', 'BD', 'female', '17/11/1996', 'yes', 'WJo7Sz', 'customer', 1),
('Arif', 'arifulalamarif@rocketmail.com', 'TIME KIll', '11aaAA', '+8801959609918', 'adabar dhaka', 'male', '27/01/1996', 'yes', 'vGHpPd', 'admin', 2),
('Arif', 'kingstonezoan@gmail.com', 'TimE Killer', '1aA', '+8801959609919', 'adabar dhaka-1207', 'male', '27/01/1997', 'yes', 'SKkjvv', 'customer', 3),
('Fariha Tahsin', 'farihatahsin256@gmail.com', 'Nidhi', 'Nn1', '+8801689691157', 'house #29, road #1, block C, Bashundhara R/A, dhaka.', 'female', '25/1/1995', 'yes', 'TmK4g2', 'customer', 4),
('Christopher Jonathan', 'cjonathan@gmail.com', 'Cris', 'A147a147', '+08978452125', 'Munich,Germany', 'male', '1/1/1995', 'yes', 'omagLN', 'customer', 6),
('asdasdA', 'asd5asd@as.co', 'asdddA', '1aA', '65465451112', 'ads', 'male', '1/1/1960', 'yes', 'HSYcGd', 'customer', 9),
('aaA', 'aaA@asd.ad', 'adaA', '1wW', '11111111112', 'asd', 'male', '1/1/1960', 'no', '46KfgN', 'customer', 13),
('Nazmul', 'nazmuul420@gmail.com', 'Nazmul', '1nN', '64545454454', 'adsa', 'male', '1/1/1961', 'yes', 'F0IVqd', 'customer', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `pic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
