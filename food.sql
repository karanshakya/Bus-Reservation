-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2019 at 05:31 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignitems`
--

CREATE TABLE `assignitems` (
  `id` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignitems`
--

INSERT INTO `assignitems` (`id`, `branchid`, `catid`, `itemid`, `itemstatus`) VALUES
(1, 1, 1, 1, 'Available'),
(2, 1, 1, 2, 'Not-Available'),
(3, 1, 1, 3, 'Available'),
(4, 1, 2, 4, 'Available'),
(5, 1, 2, 5, 'Available'),
(6, 2, 1, 2, 'Not-Available'),
(7, 2, 1, 3, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branchname` varchar(100) NOT NULL,
  `brancharea` varchar(100) NOT NULL,
  `branchimage` varchar(100) NOT NULL,
  `empmailid` varchar(100) NOT NULL,
  `branchaddress` varchar(200) NOT NULL,
  `branchcity` varchar(100) NOT NULL,
  `branchcountry` int(11) NOT NULL,
  `branchstate` int(11) NOT NULL,
  `branchpostal` int(11) NOT NULL,
  `branchdesc` longtext NOT NULL,
  `branchstatus` varchar(20) NOT NULL,
  `branchdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branchname`, `brancharea`, `branchimage`, `empmailid`, `branchaddress`, `branchcity`, `branchcountry`, `branchstate`, `branchpostal`, `branchdesc`, `branchstatus`, `branchdate`) VALUES
(1, 'Branch 1', 'Uppal', 'b1.jpg', 'employee@gmail.com', '3-33/75', 'Hyderabad', 1, 1, 500082, 'added branch details.', 'Open', '2019-02-23 14:59:49'),
(2, 'Branch 2', 'SR Nagar', 'b2.jpeg', 'emp@gmail.com', '6-12/75', 'Hyderabad', 1, 1, 500082, 'Added barnch 2 details.', 'Open', '2019-02-23 15:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `usermailid` varchar(100) NOT NULL,
  `aid` int(11) NOT NULL,
  `cartdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `usermailid`, `aid`, `cartdate`) VALUES
(3, 'user@gmail.com ', 3, '2019-02-25 15:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(100) NOT NULL,
  `categoryimage` varchar(200) NOT NULL,
  `categorydesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `categoryimage`, `categorydesc`) VALUES
(1, 'Ice Creams', 'c2.jpg', 'category details.'),
(2, 'Burgur', 'c1.jpg', 'Added details.');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryname`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `useremailid` varchar(100) NOT NULL,
  `feedbacksubject` varchar(200) NOT NULL,
  `feedbackdesc` longtext NOT NULL,
  `senddate` datetime NOT NULL,
  `replydesc` longtext NOT NULL,
  `replydate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `useremailid`, `feedbacksubject`, `feedbackdesc`, `senddate`, `replydesc`, `replydate`) VALUES
(1, 'user@gmail.com', 'Feedback Subject', 'Your service is very good.', '2019-02-25 17:35:06', 'Thank u.', '2019-02-25 17:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `replymsg` longtext NOT NULL,
  `senddate` varchar(50) NOT NULL,
  `replydate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `fromid`, `toid`, `message`, `replymsg`, `senddate`, `replydate`) VALUES
(1, 'employee@gmail.com', 'admin@gmail.com', 'Hi branch 1.', 'Hi sir.', '2019-02-25 19:58:56', '2019-02-26 03:46:07'),
(2, 'admin@gmail.com', 'employee@gmail.com', 'Hi sir,\r\nI have a problem.', 'tell me.', '2019-02-26 09:16:43', '2019-02-26 03:47:07'),
(3, 'admin@gmail.com', 'user@gmail.com', 'Hi admin sir.', 'Hi customer.', '2019-02-26 09:11:50', '2019-02-26 03:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `itemimage` varchar(150) NOT NULL,
  `itemprice` decimal(10,0) NOT NULL,
  `itemdesc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `categoryid`, `itemname`, `itemimage`, `itemprice`, `itemdesc`) VALUES
(1, 1, 'Venilla', 'i1.jpg', '150', 'added details.'),
(2, 1, 'Strawberry', 'i2.jpg', '180', 'added details.'),
(3, 1, 'Chocolate', 'i3.jpg', '110', 'added details.'),
(4, 2, 'Egg cheese', 'i4.jpeg', '165', 'added details.'),
(5, 2, 'Chicken', 'i5.jpg', '195', 'added details.');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(11) NOT NULL,
  `fromid` varchar(50) NOT NULL,
  `toid` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `senddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `fromid`, `toid`, `message`, `senddate`) VALUES
(1, 'admin@gmail.com', 'employee@gmail.com', 'Hi branch 1.', '2019-02-25 14:28:56'),
(2, 'user@gmail.com', 'admin@gmail.com', 'Hi admin sir.', '2019-02-26 03:41:50'),
(3, 'employee@gmail.com', 'admin@gmail.com', 'Hi sir.', '2019-02-26 03:46:07'),
(4, 'employee@gmail.com', 'admin@gmail.com', 'Hi sir,\r\nI have a problem.', '2019-02-26 03:46:43'),
(5, 'admin@gmail.com', 'employee@gmail.com', 'tell me.', '2019-02-26 03:47:07'),
(6, 'admin@gmail.com', 'user@gmail.com', 'Hi customer.', '2019-02-26 03:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `ordercart`
--

CREATE TABLE `ordercart` (
  `id` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `holdername` varchar(100) NOT NULL,
  `cardtype` varchar(50) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `cardpin` varchar(10) NOT NULL,
  `cardedate` varchar(15) NOT NULL,
  `orderdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordercart`
--

INSERT INTO `ordercart` (`id`, `kid`, `quantity`, `status`, `holdername`, `cardtype`, `cardnumber`, `cardpin`, `cardedate`, `orderdate`) VALUES
(1, 3, '2', 'Cancel', 'vijay', 'debitcard', '121212121212', '123', '03/21', '2019-02-25 16:52:15'),
(2, 3, '5', 'Booked', 'vijay', 'online', '757852785274', '369', '03/23', '2019-02-25 16:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `postal` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL,
  `regdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fullname`, `gender`, `emailid`, `password`, `mobile`, `image`, `dob`, `address`, `city`, `state`, `country`, `postal`, `role`, `regdate`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '0000000000', 'admin.png', '0000-00-00', 'admin', 'admin', 'admin', 'admin', '000000', 'admin', '0000-00-00'),
(2, 'User', 'Male', 'user@gmail.com', 'password', '9685749685', 'user1.png', '1990-10-10', 'sr nagar', 'Hyderabad', '1', '1', '500082', 'user', '2019-02-23 09:21:52'),
(3, 'employee', 'Male', 'employee@gmail.com', 'password', '8787545454', 'User2.png', '1990-10-10', 'sr nagar', 'Hyderabad', '1', '1', '500082', 'employee', '2019-02-23 10:19:04'),
(4, 'Emp 2', 'Male', 'emp@gmail.com', 'password', '8787545454', 'user3.png', '1990-10-12', 'sr nagar', 'Hyderabad', '1', '1', '500082', 'employee', '2019-02-23 15:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `countryid` varchar(10) NOT NULL,
  `statename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `countryid`, `statename`) VALUES
(1, '1', 'Telangana'),
(2, '1', 'Andhra Pradesh'),
(3, '2', 'New York');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignitems`
--
ALTER TABLE `assignitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercart`
--
ALTER TABLE `ordercart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignitems`
--
ALTER TABLE `assignitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ordercart`
--
ALTER TABLE `ordercart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
