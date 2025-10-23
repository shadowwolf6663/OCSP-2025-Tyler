-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2025 at 02:11 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `auditid` int NOT NULL,
  `patientid` int NOT NULL,
  `code` text COLLATE utf8mb4_general_ci NOT NULL,
  `longdesc` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`auditid`, `patientid`, `code`, `longdesc`, `date`) VALUES
(1, 1, 'log', 'user has logged out', '2025-10-21'),
(2, 1, 'log', 'user has succesfully logged in', '2025-10-21'),
(3, 1, 'log', 'user has logged out', '2025-10-21'),
(4, 1, 'log', 'user has succesfully logged in', '2025-10-21'),
(5, 1, 'log', 'user has succesfully logged in', '2025-10-21'),
(6, 1, 'log', 'user has succesfully logged in', '2025-10-21'),
(7, 1, 'log', 'user has succesfully logged in', '2025-10-21'),
(8, 1, 'bok', 'created new booking', '2025-10-21'),
(9, 1, 'bok', 'created new booking', '2025-10-23'),
(10, 1, 'bok', 'created new booking', '2025-10-23'),
(11, 1, 'log', 'user has succesfully logged in', '2025-10-23'),
(12, 1, 'bok', 'created new booking', '2025-10-23'),
(13, 1, 'bok', 'created new booking', '2025-10-23'),
(14, 1, 'bok', 'created new booking', '2025-10-23'),
(15, 1, 'bok', 'created new booking', '2025-10-23'),
(16, 1, 'bok', 'created new booking', '2025-10-23'),
(17, 1, 'bok', 'created new booking', '2025-10-23'),
(18, 1, 'bok', 'created new booking', '2025-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` int NOT NULL,
  `patientid` int NOT NULL,
  `doctorid` int NOT NULL,
  `dateofbooking` int NOT NULL,
  `completed` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `patientid`, `doctorid`, `dateofbooking`, `completed`) VALUES
(2, 1, 11, 1761375300, 'False'),
(4, 1, 2, 1759532880, 'False'),
(5, 1, 11, 1760488080, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorid` int NOT NULL,
  `doctor_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `role` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `room` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorid`, `doctor_name`, `role`, `password`, `room`) VALUES
(1, 'doctor', 'doc', '$2y$10$ESuEVal5FLnzxT63JKB48uXC1Q5qQ4KhaVyPPWygGxvX8dFyJyiVO', 2),
(2, 'doctor', 'doc', '$2y$10$bu5ex1xOBr7glGJvkrcyue1sit2VsUi6zLTj69TmjOjs1EARcqt0S', 2),
(3, 'doctor', 'doc', '$2y$10$ysn8LiYTi1FEeJQSQ7a1Muwr6Pb6EDMONnD7ghLMfLqZWNLb4AKe6', 2),
(11, 'new', 'nur', '$2y$10$ojapOwrG5kmqpcGqcSI8pe5/ebbPaw9rnuLOWUbBraWLOVBXk.6Qe', 5);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientid` int NOT NULL,
  `first_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `second_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `gender` text COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `first_name`, `middle_name`, `second_name`, `gender`, `age`, `password`) VALUES
(1, 'a', 'b', 'c', 'm', 12, '$2y$10$A46Tfj4qh1ux0ZBEOOAzyuajqqKWrC4DHJzeIEfXnjnpr6R0vnUtm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`auditid`),
  ADD KEY `patientid` (`patientid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `patientid` (`patientid`,`doctorid`),
  ADD KEY `doctorid` (`doctorid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `auditid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `patient` (`patientid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctor` (`doctorid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`patientid`) REFERENCES `patient` (`patientid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
