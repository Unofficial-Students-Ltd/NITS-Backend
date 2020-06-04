-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 09:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('nit2020', 'nitcse123');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(250) NOT NULL,
  `ext` varchar(200) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(1, 1, 'STUDENu', 'pdf', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsupdates`
--

CREATE TABLE `newsupdates` (
  `id` int(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `ext` varchar(30) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsupdates`
--

INSERT INTO `newsupdates` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(38, 1, 'STUDENu', 'pdf', 0, 1),
(39, 1, 'assamese poem and love story , assam , zubeen garg', 'pdf', 1, 1),
(40, 1, 'corona', 'pdf', 1, 1),
(42, 0, 'website ', 'pdf', 0, 0),
(43, 1, 'Corona', 'pdf', 1, 1),
(44, 1, 'none', 'pdf', 0, 1),
(45, 1, 'STUDENu', 'pdf', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(255) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `ext` varchar(200) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(2, 0, 'STUDENT', 'pdf', 1, 1),
(3, 1, 'STUDENu', 'pdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE `recruitment` (
  `id` int(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(250) NOT NULL,
  `ext` varchar(260) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(1, 1, 'website ', 'pdf', 1, 1),
(3, 1, 'STUDENT', 'pdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentcorner`
--

CREATE TABLE `studentcorner` (
  `id` int(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentcorner`
--

INSERT INTO `studentcorner` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(2, 1, 'Corona', 'pdf', 1, 1),
(3, 1, 'STUDENu', 'pdf', 1, 1),
(4, 1, 'kanika', 'pdf', 1, 0),
(5, 1, 'website ', 'pdf', 1, 1),
(6, 1, 'Corona', 'pdf', 1, 1),
(7, 1, 'STUDENT', 'pdf', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `id` int(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `title` varchar(250) NOT NULL,
  `ext` varchar(200) NOT NULL,
  `bold` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`id`, `visible`, `title`, `ext`, `bold`, `status`) VALUES
(2, 1, 'STUDENT', 'pdf', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topstories`
--

CREATE TABLE `topstories` (
  `storyid` int(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topstories`
--

INSERT INTO `topstories` (`storyid`, `title`, `link`) VALUES
(37, 'Chinmoy', 'https://www.facebook.com/chinmoytalukdar.chinmoy'),
(38, 'website ', 'http://www.nits.ac.in/'),
(40, 'assamese poem and love story , assam , zubeen garg', 'http://aa'),
(41, 'v khvkh', 'http://www.nits.ac.in/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsupdates`
--
ALTER TABLE `newsupdates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitment`
--
ALTER TABLE `recruitment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcorner`
--
ALTER TABLE `studentcorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topstories`
--
ALTER TABLE `topstories`
  ADD PRIMARY KEY (`storyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsupdates`
--
ALTER TABLE `newsupdates`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recruitment`
--
ALTER TABLE `recruitment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentcorner`
--
ALTER TABLE `studentcorner`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topstories`
--
ALTER TABLE `topstories`
  MODIFY `storyid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
