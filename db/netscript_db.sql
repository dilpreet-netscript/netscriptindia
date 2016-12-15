-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2016 at 01:25 PM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netscript_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus_tbl`
--

CREATE TABLE IF NOT EXISTS `contactus_tbl` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_subject` varchar(100) NOT NULL,
  `user_message` varchar(300) NOT NULL,
  `createdAt` datetime(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus_tbl`
--

INSERT INTO `contactus_tbl` (`id`, `user_name`, `user_email`, `user_subject`, `user_message`, `createdAt`) VALUES
(1, 'testname', 'email@gmail.com', 'subject test', 'message test', '2016-12-06 18:53:58.000000');

-- --------------------------------------------------------

--
-- Table structure for table `notify_tbl`
--

CREATE TABLE IF NOT EXISTS `notify_tbl` (
  `id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `createdAt` datetime(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify_tbl`
--

INSERT INTO `notify_tbl` (`id`, `email_id`, `createdAt`) VALUES
(1, 'laxman@gmail.com', '2016-12-06 18:49:29.000000');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_tbl`
--

CREATE TABLE IF NOT EXISTS `subscriber_tbl` (
  `id` int(10) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `loc` varchar(100) NOT NULL,
  `cover_letter` varchar(200) NOT NULL,
  `createdat` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus_tbl`
--
ALTER TABLE `contactus_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_tbl`
--
ALTER TABLE `notify_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber_tbl`
--
ALTER TABLE `subscriber_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus_tbl`
--
ALTER TABLE `contactus_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notify_tbl`
--
ALTER TABLE `notify_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscriber_tbl`
--
ALTER TABLE `subscriber_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
