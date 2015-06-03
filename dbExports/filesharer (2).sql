-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 07:55 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `filesharer`
--
CREATE DATABASE IF NOT EXISTS `filesharer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `filesharer`;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `usr_id`, `file_id`, `ip`, `time`) VALUES
(1, 1, 1, '::1', '2015-06-03 10:08:04'),
(2, 1, 1, '::1', '2015-06-03 10:08:14'),
(3, 1, 1, '::1', '2015-06-03 10:13:22'),
(4, 1, 1, '::1', '2015-06-03 10:13:31'),
(5, 1, 1, '::1', '2015-06-03 10:23:37'),
(6, 1, 1, '::1', '2015-06-03 10:35:01'),
(7, 1, 1, '::1', '2015-06-03 11:38:07'),
(8, 1, 1, '::1', '2015-06-03 13:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_descr` text NOT NULL,
  `usr_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `file_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_name`, `file_descr`, `usr_id`, `size`, `file_created`) VALUES
(1, 'CACP Resolution 2006-06.pdf', '', 1, 0, '2015-06-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `usr_id`, `ip`, `time`) VALUES
(1, 2, '::1', '2015-06-03 09:19:15'),
(2, 2, '::1', '2015-06-03 09:20:32'),
(3, 1234, '::1', '2015-06-03 09:39:01'),
(4, 1, '::1', '2015-06-03 09:39:43'),
(5, 1, '::1', '2015-06-03 09:50:35'),
(6, 1, '::1', '2015-06-03 10:26:17'),
(7, 1, '::1', '2015-06-03 10:34:59'),
(8, 1, '::1', '2015-06-03 11:06:03'),
(9, 1, '::1', '2015-06-03 13:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `usr_id` int(11) NOT NULL,
  `usr_email` text NOT NULL,
  `display_name` text NOT NULL,
  `usr_password` text NOT NULL,
  `usr_last_login` datetime NOT NULL,
  `usr_last_ip` varchar(255) NOT NULL,
  `usr_disabled` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `force_password_change` int(11) NOT NULL DEFAULT '1',
  `usr_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_email`, `display_name`, `usr_password`, `usr_last_login`, `usr_last_ip`, `usr_disabled`, `admin`, `force_password_change`, `usr_created`) VALUES
(1, 'scottmo@e-crime.on.ca', 'Scott', '1', '2015-06-03 13:26:57', '::1', 0, 0, 0, '2015-06-03 09:02:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
