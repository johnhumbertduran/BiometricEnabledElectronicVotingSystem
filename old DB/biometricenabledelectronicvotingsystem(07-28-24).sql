-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 06:39 PM
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
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL COMMENT '1=super admin, 2=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `firstname`, `middlename`, `lastname`, `course`, `schoolyear`, `username`, `password`, `account_type`) VALUES
(1, 'admin', 'admin', 'admin', '', '', 'admin', 'admin', '1'),
(2, 'John', 'Smith', 'Doe', 'BSIT', '2023-2024', 'john', 'password', '2'),
(3, 'Mary', 'Smith', 'Doe', 'BSED', '2023-2024', 'marydoe123', 'password', '2'),
(4, 'Jenny', 'Smith', 'Doe', 'Filipino', '2023-2024', 'jennydoe123', 'password', '2'),
(5, 'Lorie', 'Luke', 'Mortin', 'Math', '2023-2024', 'lorieluke123', 'password', '2'),
(6, 'Debbie', 'Wale', 'Stasue', 'English', '2023-2024', 'debbiewale231', 'password', '2'),
(7, 'Test', 'test', 'test', 'BSIT', '2023-2024', 'testpass123', 'password', '2'),
(8, 'Test Admin', 'Middle Test', 'Last Test', 'BSED', '2023-2024', 'test1_123', 'test1_password', '2');

-- --------------------------------------------------------

--
-- Table structure for table `candidatestbl`
--

CREATE TABLE `candidatestbl` (
  `id` int(11) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `party` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `electionyear` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidatestbl`
--

INSERT INTO `candidatestbl` (`id`, `idnumber`, `firstname`, `middlename`, `lastname`, `course`, `year`, `position`, `party`, `status`, `electionyear`, `img`) VALUES
(1, '20138564', 'John', 'Smith', 'Doe', 'BSIT', '1st Year', 'President', 'Party', '', '', ''),
(2, '202354824', 'Elijah', 'Davis', 'Reid', 'BSeD', '1st Year', 'Vice President', 'Party', '', '', ''),
(3, '202354824', 'Elijah', 'Davis', 'Reid', 'BSeD', '1st Year', 'Vice-President', 'Second Party', '', '', '../../bins/img/candidate_img/6686abc4bda19_a kid with its  2221ea30-4911-4602-b737-b32876b171e4.png'),
(4, '20235615', 'Danny', 'Norton', 'Gutierrez', 'BSeD', '4th Year', 'President', 'Second Party', 'Active', '', '../../bins/img/candidate_img/6686accfa157d_588352552c9eb99faafea89e.png'),
(5, '20240001', 'Luther', 'Monday', 'Phillips', 'BSIT', '4th Year', 'President', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ecf08ee0dc_a kid with its  2221ea30-4911-4602-b737-b32876b171e4.png'),
(6, '20240002', 'Tricia', 'Abbey', 'Booker', 'BSIT', '4th Year', 'Vice President', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ed29a29e0a_8673852.jpg'),
(7, '20240003', 'Michael', 'Godfrey', 'Huffman', 'BSIT', '3rd Year', 'Secretary', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ed435e0ff4_684-6849320_pua-pig-png4-moana-pig-pua-png-transparent.png'),
(8, '20240004', 'Juana', 'Foss', 'Fuller', 'BSIT', '2nd Year', 'Assistant Secretary', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ed47f87084_kisspng-barbie-in-the-pink-shoes-ballet-dreams-barbie-bo-barbie-doll-5abfd35cc458f0.3643967215225209248043.png'),
(9, '20240005', 'Tracie', 'Timberlake', 'McClain', 'BSIT', '3rd Year', 'Treasurer', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ed97107ee5_47639 Rev.png'),
(10, '20240006', 'Hilda', 'Haley', 'Compton', 'BSIT', '3rd Year', 'Assistant Treasurer', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ed9b27ffe2_kisspng-hello-kitty-kitten-desktop-wallpaper-cuteness-hello-kitty-free-vector-5ab1017f1b9bc9.5043274715215496951131.png'),
(11, '20240007', 'Candy', 'Moss', 'Patel', 'BSIT', '3rd Year', 'Auditor', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668edb6fdeb67_mimiyuhh.jpg'),
(12, '20240008', 'Cheryl', 'Norton', 'Underwood', 'BSIT', '2nd Year', 'Assistant Auditor', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ede6a77a09_kisspng-angel-christmas-drawing-clip-art-angels-5abd5c1f726bf1.8189953515223593274687.png'),
(13, '20240009', 'Sylvia', 'Banner', 'Harman', 'BSIT', '3rd Year', 'P.I.O.', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ee5f50af38_kisspng-illustration-dementia-crossword-memory-art-pyladies-test-5b8e4c4b402f33.5336865115360522992629.png'),
(14, '20240010', 'Tyrone', 'Zanna', 'Bentley', 'BSIT', '3rd Year', 'P.I.O.', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ee72b036df_kisspng-hello-kitty-ipod-touch-camera-clip-art-transparent-png-hello-kitty-5ab1018d001cf5.5712936115215497090005.png'),
(15, '20240011', 'Mohammed', 'Lacy', 'Rickard', 'BSIT', '4th Year', 'Business Manager', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ee7fdbaf6d_kisspng-human-multitasking-businessperson-management-proje-thinking-man-5acfdf2e83ab50.2386396615235725265393.png'),
(16, '20240012', 'Gaby', 'Ott', 'Daniels', 'BSIT', '2nd Year', 'Layout Artist', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668eeac09b352_pngegg.png'),
(17, '20240013', 'Pris', 'Chasity', 'Kingston', 'BSIT', '2nd Year', 'Layout Artist', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668eee5514031_kits.png'),
(18, '20240014', 'Adaline', 'Ginger', 'Comstock', 'BSIT', '3rd Year', 'Technical Support', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ef0514fd82_pngwing.com (2).png'),
(19, '20240015', 'Rafferty', 'Bruce', 'Disney', 'BSIT', '2nd Year', 'Technical Support', 'Party 1', 'Active', '2023-2024', '../../bins/img/candidate_img/668ef42f1b0cf_kisspng-confusion-medical-sign-symptom-clip-art-confused-5ac25a228b03c4.4245729815226864985694.png'),
(20, '20240016', 'Rose', 'Foley', 'Snyder', 'BSIT', '4th Year', 'President', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668ef82e628e6_pexels-chloe-amaya-4079215.jpg'),
(21, '20240017', 'Florence', 'Adkins', 'Kennedy', 'BSIT', '1st Year', 'Vice President', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668ef8ea6e4bf_margot-robbie-harley-quinn-agoumtfw6foiqpn8.jpg'),
(22, '20240018', 'Christophe', 'Doty', 'Crane', 'BSIT', '4th Year', 'Secretary', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668ef9b671f02_Design3.jpg'),
(23, '20240019', 'Luis', 'Bowen', 'Murray', 'BSIT', '3rd Year', 'Assistant Secretary', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668efc2c8ae18_Design3.jpg'),
(24, '20240020', 'Marianne', 'Matthews', 'Berger', 'BSIT', '2nd Year', 'Treasurer', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668efd063a082_terrified-cartoon-nun-lady-vector-600w-1371335300.jpg'),
(25, '20240021', 'Mickey', 'Byrd', 'Fleming', 'BSIT', '2nd Year', 'Assistant Treasurer', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668efd82a19e3_4c831bc18b6cf49d0f92ce97b1214fa5.jpg'),
(26, '20240022', 'Denni', 'Wang', 'Kramer', 'BSIT', '3rd Year', 'Auditor', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668efe04877a1_stock-vector-cute-cartoon-christmas-angel-isolated-on-white-background-1557681569.jpg'),
(27, '20240023', 'Oliver', 'Read', 'Dodd', 'BSIT', '2nd Year', 'Assistant Auditor', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668efeb1ca4c8_business-caricatures-807135.jpg'),
(28, '20240024', 'Mildred', 'Watkins', 'Finley', 'BSIT', '1st Year', 'P.I.O.', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668eff58aeea3_business-caricatures-807261.jpg'),
(29, '20240025', 'Hugh', 'Hamilton', 'Lin', 'BSIT', '2nd Year', 'P.I.O.', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668eff95c8891_birthday-caricatures-807110.jpg'),
(30, '20240026', 'Darren', 'Roach', 'Bush', 'BSIT', '3rd Year', 'Business Manager', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668effca752fc_business-caricatures-807144.jpg'),
(31, '20240027', 'Marvin', 'Sampson', 'Nielsen', 'BSIT', '3rd Year', 'Layout Artist', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668f0007b2461_business-caricatures-807521.jpg'),
(32, '20240028', 'Tony', 'Eaton', 'Carver', 'BSIT', '3rd Year', 'Layout Artist', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668f004f2e6a5_facebook-avatar-cartoon-810033.jpg'),
(33, '20240029', 'Lyle', 'Hardy', 'Hale', 'BSIT', '3rd Year', 'Technical Support', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668f0096ac5d0_holiday-caricature-807530.jpg'),
(34, '20240030', 'Emmanuel', 'Holder', 'Williamson', 'BSIT', '3rd Year', 'Technical Support', 'Party 2', 'Active', '2023-2024', '../../bins/img/candidate_img/668f00f6188d1_restaurant-caricature-807045.jpg'),
(35, '20231254', 'Test Candidate', 'George', 'Lanley', 'BSIT', '2nd Year', 'Test Position', 'Test Party', '', '', '../../bins/img/candidate_img/66902651a01e9_facebook-avatar-cartoon-810038.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `electionyeartbl`
--

CREATE TABLE `electionyeartbl` (
  `id` int(11) NOT NULL,
  `electionyear` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '1=Active, 2=Pending, 3=Closed',
  `createdby` varchar(255) NOT NULL,
  `creatorid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electionyeartbl`
--

INSERT INTO `electionyeartbl` (`id`, `electionyear`, `title`, `status`, `createdby`, `creatorid`) VALUES
(1, '2021-2022', '2021-2022 Student Election', '3', 'John Doe', '2'),
(2, '2020-2021', '2020-2021 Student Election', '3', 'John Doe', '2'),
(3, '2019-2020', '2019-2020 Student Election', '3', 'Debbie Stasue', '6'),
(9, '2022-2023', '2022-2023 Student Election', '3', 'admin admin', '1'),
(10, '2023-2024', '2023-2024 Student Election', '1', 'John Doe', '2');

-- --------------------------------------------------------

--
-- Table structure for table `voterstbl`
--

CREATE TABLE `voterstbl` (
  `id` int(11) NOT NULL,
  `idnumber` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `biometric` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '0 = Not Voted, 1 = Voted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voterstbl`
--

INSERT INTO `voterstbl` (`id`, `idnumber`, `firstname`, `middlename`, `lastname`, `year`, `course`, `biometric`, `status`) VALUES
(1, '20235684', 'Abigail', 'Downs', 'Johnston', '3rd Year', 'BEED', '', '0'),
(2, '20236589', 'Beatrice', 'Cook', 'Friedman', '4th Year', 'BSIT', '', '0'),
(3, '20246589', 'Felicia', 'Leon', 'Reynolds', '1st Year', 'BSIT', '', '0'),
(4, '20246135', 'Mohammad', 'Travis', 'Holden', '1st Year', 'BSIT', '', '0'),
(5, '20246531', 'Douglas', 'Moran', 'Foley', '2nd Year', 'BSIT', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `votestbl`
--

CREATE TABLE `votestbl` (
  `id` int(11) NOT NULL,
  `voteridnumber` varchar(255) NOT NULL,
  `electionid` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `candidatevoted` varchar(255) NOT NULL
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
-- Indexes for table `votestbl`
--
ALTER TABLE `votestbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `candidatestbl`
--
ALTER TABLE `candidatestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `electionyeartbl`
--
ALTER TABLE `electionyeartbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `voterstbl`
--
ALTER TABLE `voterstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votestbl`
--
ALTER TABLE `votestbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
