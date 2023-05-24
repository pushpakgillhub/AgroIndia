-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agricalturedatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `faadharNumber` varchar(12) DEFAULT NULL,
  `phoneNumber` varchar(10) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `answerby` varchar(10) DEFAULT NULL,
  `problem` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advice`
--


-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `aadharNumber` varchar(50) DEFAULT NULL,
  `accountNumber` varchar(10) DEFAULT NULL,
  `ifsc` varchar(10) DEFAULT NULL,
  `accholdername` varchar(50) DEFAULT NULL,
  `bankName` varchar(50) DEFAULT NULL,
  `branchName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--



-- --------------------------------------------------------

--
-- Table structure for table `cropsell`
--

CREATE TABLE `cropsell` (
  `aadharNumber` varchar(50) NOT NULL,
  `cropType` varchar(50) DEFAULT NULL,
  `cropName` varchar(50) NOT NULL,
  `cropArea` float DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `ownerName` varchar(50) DEFAULT NULL,
  `land` varchar(50) DEFAULT NULL,
  `careapart` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cropsell`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmer_login`
--

CREATE TABLE `farmer_login` (
  `id` int(11) NOT NULL,
  `aadharNumber` varchar(12) NOT NULL,
  `namee` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `email_verified` varchar(100) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `vilBlock` varchar(50) NOT NULL,
  `distt` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(12) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `emailid` varchar(50) DEFAULT NULL,
  `aadharofpc` varchar(12) DEFAULT NULL,
  `landid` varchar(50) DEFAULT NULL,
  `landarea` varchar(10) DEFAULT NULL,
  `docverficationcenter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land`
--

-- --------------------------------------------------------

--
-- Table structure for table `newdetails`
--

CREATE TABLE `newdetails` (
  `aadharNumber` varchar(12) DEFAULT NULL,
  `cropName` varchar(50) DEFAULT NULL,
  `seedName` varchar(50) DEFAULT NULL,
  `cropYear` int(11) NOT NULL,
  `cropMonth` varchar(15) NOT NULL,
  `showingDate` date DEFAULT NULL,
  `harvestingDate` date DEFAULT NULL,
  `wateringNumber` int(11) DEFAULT NULL,
  `cropType` varchar(10) DEFAULT NULL,
  `fertilizers` varchar(1000) DEFAULT NULL,
  `cropYeild` varchar(10) DEFAULT NULL,
  `investment` varchar(10) DEFAULT NULL,
  `income` varchar(10) DEFAULT NULL,
  `landid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newdetails`
--

-- --------------------------------------------------------

--
-- Table structure for table `officer_login`
--

CREATE TABLE `officer_login` (
  `govid` varchar(10) NOT NULL,
  `officername` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `phonenum` bigint(20) NOT NULL,
  `emailaddr` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer_login`
--

INSERT INTO `officer_login` (`govid`, `officername`, `gender`, `salary`, `phonenum`, `emailaddr`, `password`) VALUES
('GOV1234567', 'Shyam Parshad', 'Male', 120000, 8912348912, 'shyamparshad12@gmail.com', '1234567890qw');

-- --------------------------------------------------------

--
-- Indexes for table `cropsell`
--
ALTER TABLE `cropsell`
  ADD PRIMARY KEY (`cropName`);

--
-- Indexes for table `farmer_login`
--
ALTER TABLE `farmer_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aadharNumber` (`aadharNumber`),
  ADD KEY `emailAddress` (`emailAddress`),
  ADD KEY `dt` (`dt`);

--
-- Indexes for table `newdetails`
--
ALTER TABLE `newdetails`
  ADD PRIMARY KEY (`landid`,`cropYear`,`cropMonth`);

--
-- Indexes for table `officer_login`
--
ALTER TABLE `officer_login`
  ADD PRIMARY KEY (`govid`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `expires` (`expires`),
  ADD KEY `emailAddress` (`emailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer_login`
--
ALTER TABLE `farmer_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
