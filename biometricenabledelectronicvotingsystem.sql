-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 03:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biometricenabledelectronicvotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `firstName`, `middleName`, `lastName`, `department`, `schoolyear`, `username`, `password`, `account_type`) VALUES
(1, 'admin', 'admin', 'admin', '', '', 'admin', 'admin', '1'),
(2, 'John', 'Smith', 'Doe', 'CSI', '2023-2024', 'john', 'password', '2'),
(3, 'Mary', 'Smith', 'Doe', 'CSI', '2023-2024', 'marydoe123', 'password', '2'),
(4, 'Jenny', 'Smith', 'Doe', 'CSI', '2023-2024', 'jennydoe123', 'password', '2'),
(5, 'Lorie', 'Luke', 'Mortin', 'CSI', '2023-2024', 'lorieluke123', 'password', '2'),
(6, 'Debbie', 'Wale', 'Stasue', 'CSI', '2023-2024', 'debbiewale231', 'password', '2'),
(7, 'Test', 'test', 'test', 'CSI', '2023-2024', 'testpass123', 'password', '2');

-- --------------------------------------------------------

--
-- Table structure for table `candidatestbl`
--

CREATE TABLE `candidatestbl` (
  `id` int(11) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `party` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electionyeartbl`
--

CREATE TABLE `electionyeartbl` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voterstbl`
--

CREATE TABLE `voterstbl` (
  `id` int(11) NOT NULL,
  `idNumber` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `biometric` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidatestbl`
--
ALTER TABLE `candidatestbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electionyeartbl`
--
ALTER TABLE `electionyeartbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voterstbl`
--
ALTER TABLE `voterstbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `candidatestbl`
--
ALTER TABLE `candidatestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electionyeartbl`
--
ALTER TABLE `electionyeartbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voterstbl`
--
ALTER TABLE `voterstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
