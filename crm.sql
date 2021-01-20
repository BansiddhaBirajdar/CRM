-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 05:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `actionby` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `citymaster`
--

CREATE TABLE `citymaster` (
  `id` int(11) NOT NULL,
  `countrycode` int(11) NOT NULL,
  `statecode` int(11) NOT NULL,
  `cityname` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `stampdate` varchar(60) NOT NULL,
  `stamptime` varchar(60) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citymaster`
--

INSERT INTO `citymaster` (`id`, `countrycode`, `statecode`, `cityname`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 1, 1, 'PUNE', 'Y', '21-Nov-2020', '06:48:20 pm', 1, 'admin'),
(2, 1, 2, 'ahmedabad', 'Y', '21-Nov-2020', '07:13:56 pm', 1, 'admin'),
(3, 2, 4, 'p', 'N', '04-Dec-2020', '01:49:59 pm', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `countrymaster`
--

CREATE TABLE `countrymaster` (
  `id` int(11) NOT NULL,
  `countryname` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `stampdate` varchar(60) NOT NULL,
  `stamptime` varchar(60) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrymaster`
--

INSERT INTO `countrymaster` (`id`, `countryname`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'India', 'Y', '20-Nov-2020', '12:12:11', 1, 'admin'),
(2, 'Pakistaan', 'N', '21-Nov-2020', '02:02:32 pm', 1, 'admin'),
(3, 'demo1', 'N', '30-Nov-2020', '10:30:30 pm', 1, 'Vaibhav'),
(5, 'demo2', 'Y', '01-Jan-2021', '11:08:43 am', 1, 'Vaibhav'),
(6, 'demo3', 'Y', '01-Jan-2021', '11:09:56 am', 1, 'Vaibhav'),
(7, 'demo4', 'Y', '01-Jan-2021', '11:10:06 am', 1, 'Vaibhav'),
(8, 'demo5', 'Y', '01-Jan-2021', '11:10:18 am', 1, 'Vaibhav'),
(9, 'demo6', 'Y', '01-Jan-2021', '11:10:33 am', 1, 'Vaibhav'),
(10, 'demo7', 'Y', '01-Jan-2021', '11:10:40 am', 1, 'Vaibhav'),
(11, 'demo9', 'Y', '01-Jan-2021', '11:10:48 am', 1, 'Vaibhav'),
(12, 'demo10', 'Y', '01-Jan-2021', '11:11:02 am', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dname`) VALUES
(1, 'MARKeting update'),
(2, 'TestingN'),
(3, 'Developer'),
(6, 'testing update'),
(7, 'test update'),
(9, 'demo1');

-- --------------------------------------------------------

--
-- Table structure for table `issuemaster`
--

CREATE TABLE `issuemaster` (
  `id` int(11) NOT NULL,
  `issue` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `stampdate` varchar(100) NOT NULL,
  `stamptime` varchar(100) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuemaster`
--

INSERT INTO `issuemaster` (`id`, `issue`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'demo12', 'N', '04-Dec-2020', '04:53:15 pm', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `loginmaster`
--

CREATE TABLE `loginmaster` (
  `id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `lastlogin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginmaster`
--

INSERT INTO `loginmaster` (`id`, `staffid`, `email`, `password`, `status`, `role`, `lastlogin`) VALUES
(1, 1, 'admin1@gamil.com', 'vk', 'Y', 'S', 'Sunday/10/January/2021 06:24:37 am'),
(2, 2, 'demo@gamil.com', 'demo', 'Y', 'S', 'Thursday/07/January/2021 05:35:42 pm'),
(3, 3, 'bansi@gmail.com', 'basni', 'Y', 'S', 'Saturday/09/January/2021 08:12:42 pm'),
(4, 4, 'demo1@gmail.com', 'demo', 'Y', 'S', 'Thursday/07/January/2021 05:46:45 pm');

-- --------------------------------------------------------

--
-- Table structure for table `noticemaster`
--

CREATE TABLE `noticemaster` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `stampdate` varchar(50) NOT NULL,
  `stamptime` varchar(50) NOT NULL,
  `stampuserid` int(10) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticemaster`
--

INSERT INTO `noticemaster` (`id`, `title`, `description`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'hoildays', 'hoildays\n', '10-Jan-2021', '11:52:37 am', 1, 'Vaibhav'),
(2, 'work4', 'working time \n\n', '10-Jan-2021', '11:54:31 am', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `pincodemaster`
--

CREATE TABLE `pincodemaster` (
  `id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `citycode` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `stampdate` varchar(60) NOT NULL,
  `stamptime` varchar(60) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pincodemaster`
--

INSERT INTO `pincodemaster` (`id`, `pincode`, `citycode`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 411036, 1, 'Y', '20-Nov-2020', '12:12:12', 1, 'admin'),
(2, 411065, 2, 'N', '21-Nov-2020', '07:15:58 pm', 1, 'admin'),
(3, 411037, 1, 'Y', '23-Nov-2020', '03:19:01 pm', 1, 'admin'),
(4, 11111, 1, 'N', '04-Dec-2020', '03:02:27 pm', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `productsmaster`
--

CREATE TABLE `productsmaster` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `productimage` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `stampdate` varchar(100) NOT NULL,
  `stamptime` varchar(100) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotemaster`
--

CREATE TABLE `quotemaster` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `stampdate` varchar(100) NOT NULL,
  `stamptime` varchar(100) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotemaster`
--

INSERT INTO `quotemaster` (`id`, `quote`, `author`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'never give up', 'om', '10-Jan-2021', '11:41:00 am', 1, 'Vaibhav'),
(2, 'never compare somebody ey', 'mee', '10-Jan-2021', '11:42:06 am', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `sourcemaster`
--

CREATE TABLE `sourcemaster` (
  `id` int(11) NOT NULL,
  `sourcename` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `stampdate` varchar(100) NOT NULL,
  `stamptime` varchar(100) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sourcemaster`
--

INSERT INTO `sourcemaster` (`id`, `sourcename`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'facebook', 'Y', 'kjksjdf', 'kskldj', 1, 'kljsdjsd');

-- --------------------------------------------------------

--
-- Table structure for table `staffmaster`
--

CREATE TABLE `staffmaster` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobileno` varchar(100) NOT NULL,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `depid` int(11) NOT NULL,
  `stampdate` varchar(100) NOT NULL,
  `stamptime` varchar(100) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffmaster`
--

INSERT INTO `staffmaster` (`id`, `name`, `image`, `mobileno`, `countryid`, `stateid`, `cityid`, `pincode`, `street`, `depid`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 'Vaibhav', 'vk.jpg', '+12 345 678-9012', 1, 2, 2, 2, 'ompark\r\n', 1, '21-Nov_2020', '06:42:25 pm', 1, 'admin'),
(2, 'pooja Deshamukh', '7012021053542.jpg', '+91 123 456-7890', 1, 1, 1, 3, 'Dhanori', 3, '07-Jan-2021', '05:35:42 pm', 1, 'Vaibhav'),
(3, 'bansi birajdar', '9012021081242.jpg', '+98 745 632-100_', 1, 1, 1, 1, 'manajri bk', 1, '07-Jan-2021', '05:41:00 pm', 1, 'Vaibhav'),
(4, 'demo1', '7012021054645.jpg', '+97 845 612-3000', 1, 2, 2, 2, 'demo', 6, '07-Jan-2021', '05:46:45 pm', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `statemaster`
--

CREATE TABLE `statemaster` (
  `id` int(11) NOT NULL,
  `countrycode` int(11) NOT NULL,
  `statename` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `stampdate` varchar(60) NOT NULL,
  `stamptime` varchar(60) NOT NULL,
  `stampuserid` int(11) NOT NULL,
  `stampusername` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statemaster`
--

INSERT INTO `statemaster` (`id`, `countrycode`, `statename`, `status`, `stampdate`, `stamptime`, `stampuserid`, `stampusername`) VALUES
(1, 1, 'maharashtra ', 'Y', '21-Nov_2020', '12:12:12', 1, 'admin'),
(2, 1, 'gujarat', 'Y', '21-Nov-2020', '06:42:25 pm', 1, 'admin'),
(3, 1, 'up', 'Y', '04-Dec-2020', '12:07:46 pm', 1, 'Vaibhav'),
(4, 2, 'kp1', 'N', '04-Dec-2020', '12:27:58 pm', 1, 'Vaibhav'),
(5, 3, 'demo1', 'Y', '04-Dec-2020', '01:12:34 pm', 1, 'Vaibhav');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `profile` varchar(60) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `depcode` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `lastlogin` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`id`, `name`, `email`, `mobile`, `profile`, `gender`, `depcode`, `address`, `status`, `password`, `lastlogin`) VALUES
(1, 'Vaibhav', 'admin@gmail.com', '7776808085', 'vk.jpg', 'M', 1, '102 E/5,Bhavani Peth,Solapur - 413002', 'N', 'admin', 'Sunday/10/January/2021 11:06:59 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citymaster`
--
ALTER TABLE `citymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrymaster`
--
ALTER TABLE `countrymaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuemaster`
--
ALTER TABLE `issuemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginmaster`
--
ALTER TABLE `loginmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticemaster`
--
ALTER TABLE `noticemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pincodemaster`
--
ALTER TABLE `pincodemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsmaster`
--
ALTER TABLE `productsmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotemaster`
--
ALTER TABLE `quotemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sourcemaster`
--
ALTER TABLE `sourcemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffmaster`
--
ALTER TABLE `staffmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statemaster`
--
ALTER TABLE `statemaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `citymaster`
--
ALTER TABLE `citymaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countrymaster`
--
ALTER TABLE `countrymaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `issuemaster`
--
ALTER TABLE `issuemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loginmaster`
--
ALTER TABLE `loginmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `noticemaster`
--
ALTER TABLE `noticemaster`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pincodemaster`
--
ALTER TABLE `pincodemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productsmaster`
--
ALTER TABLE `productsmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotemaster`
--
ALTER TABLE `quotemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sourcemaster`
--
ALTER TABLE `sourcemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffmaster`
--
ALTER TABLE `staffmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statemaster`
--
ALTER TABLE `statemaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
