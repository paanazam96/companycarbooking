-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 05:56 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poolcar3`
--

-- --------------------------------------------------------

--
-- Table structure for table `allbookingdata`
--

CREATE TABLE `allbookingdata` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `no_days` varchar(35) NOT NULL,
  `dest` varchar(35) NOT NULL,
  `placename` varchar(150) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allbookingdata`
--

INSERT INTO `allbookingdata` (`id`, `email`, `name`, `tel`, `dept`, `date`, `start_event`, `end_event`, `no_days`, `dest`, `placename`, `purpose`, `title`, `status`, `usertype`) VALUES
(1, 'saofiean@seliagroup.com', 'MOHD SAOFIEAN BIN BACHOK', '0154859521', 'BUSINESS DEVELOPMENT', '2018-09-13', '2018-09-19 09:00:00', '2018-09-21 16:30:00', '3', 'Meeting', 'Hotel MITC', 'Berbincang dengan JKR tentang tender baiki jalan', 'ALZA / MCP 2257', 'PENDING', 'User'),
(2, 'alamin@seliagroup.com', 'MOHAMMAD AL-AMIN BIN IBRAHIM', '0123456789', 'DIRECTOR & COOS OFFICE', '2018-09-13', '2018-09-18 22:00:00', '2018-09-20 15:00:00', '2', 'Meeting', 'Hatten Hotel Melaka', 'Meeting event dengan CEO JKR', 'AVANZA H / WB 5558 H', 'PENDING', 'User'),
(3, 'paanazam96@gmail.com', 'MUHAMMAD AFIFFARHAN BIN MOHD AZAM', '01111547571', 'PAVEMENT MANAGEMENT SYSTEM', '2018-09-18', '2018-09-26 09:00:00', '2018-09-28 14:30:00', '3', 'Meeting', 'sdf', 'dfff', 'SAGA / VW 5731', 'PENDING', 'User'),
(4, 'paanazam96@gmail.com', 'DDD', '01111547571', 'BUSINESS DEVELOPMENT', '2018-09-25', '2018-10-02 11:11:00', '2018-10-03 11:11:00', '2', 'Meeting', 'adsf', 'asdf', 'SAGA / VW 5731', 'PENDING', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `no_days` varchar(35) NOT NULL,
  `dest` varchar(35) NOT NULL,
  `placename` varchar(150) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `email`, `name`, `tel`, `dept`, `date`, `start_event`, `end_event`, `no_days`, `dest`, `placename`, `purpose`, `title`, `status`, `usertype`) VALUES
(1, 'admin@seliagroup.com', '', '', '', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', 'Admin'),
(2, 'paanazam96@gmail.com', 'MUHAMMAD AFIFFARHAN BIN MOHD AZAM', '01111547571', 'SYSTEM DEVELOPMENT', '2018-09-25', '2018-09-26 11:11:00', '2018-09-28 11:11:00', '3', 'Meeting', 'Hotel MITC', 'Meeting dengan client', 'SAGA / VW 5751', 'PENDING', 'User'),
(5, 'paanazam96@gmail.com', 'MUHAMMAD AFIFFARHAN BIN MOHD AZAM', '01111547571', 'SYSTEM DEVELOPMENT', '2018-09-25', '2018-12-18 10:00:00', '2018-12-21 16:00:00', '4', 'Meeting', 'Sunway Piramid  KL', 'Booth on Road Event', 'STAREX / MCL 5558', 'PENDING', 'User'),
(6, 'saofiean@seliagroup.com', 'MOHD SAOFIEAN BIN BACHOK', '0154859521', 'BUSINESS DEVELOPMENT', '2018-09-25', '2018-10-22 09:00:00', '2018-10-23 14:00:00', '2', 'Other', 'Langkawi', 'Kursus HDM4 bersama JKR Melaka', 'SAGA / VW 5731', 'PENDING', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(50) NOT NULL,
  `carname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `carname`) VALUES
(1, 'VITO / MAU 5558'),
(2, 'DMAX / MBV 7553'),
(3, 'DMAX / MBU 9419'),
(4, 'SAGA / MBW 193'),
(5, 'SAGA / MBW 194'),
(6, 'NISSAN NAVARA / MCB 2254 '),
(7, 'LORI / MCK 7084'),
(8, 'STAREX / MCL 5558'),
(9, 'POLO / MCL 558'),
(10, 'ALZA / MCP 2257'),
(11, 'COLORADO / MCP 3114'),
(12, 'COLORADO / MCP 4903'),
(13, 'COLORADO / MCQ 9249'),
(14, 'COLORADO / MCQ 9281'),
(15, 'COLORADO / MCQ 9284'),
(16, 'SAGA / VW 5731'),
(17, 'SAGA / VW 5751'),
(18, 'VAN / VW 9746'),
(19, 'AVANZA H / WB 5558 H'),
(20, 'AVANZA J / WB 5558 J'),
(21, 'AXIA / VAB 5558'),
(22, 'AXIA / VY 5558'),
(23, 'KELISA / WBA 1254');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(100) NOT NULL,
  `dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept`) VALUES
(1, 'DIRECTOR & COOS OFFICE'),
(2, 'BUSINESS DEVELOPMENT'),
(3, 'OPERATION DEPARTMENT'),
(4, 'ENGINEERING PAVEMENT'),
(5, 'MARRIS DATA COLLECTION'),
(6, 'PAVEMENT MANAGEMENT SYSTEM'),
(7, 'PROPOSAL'),
(8, 'CONTRACT'),
(9, 'REPORT GENERATION'),
(10, 'SPECIAL PROJECTS'),
(11, 'DATA COLLECTION'),
(12, 'SYSTEM INTEGRATION'),
(13, 'GIS'),
(14, 'SYSTEM DEVELOPMENT');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `stat`) VALUES
(1, 'PENDING'),
(2, 'IN USE'),
(3, 'RETURNED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allbookingdata`
--
ALTER TABLE `allbookingdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allbookingdata`
--
ALTER TABLE `allbookingdata`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
