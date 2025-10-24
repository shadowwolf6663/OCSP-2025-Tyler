-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2025 at 12:12 PM
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
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`auditid`, `patientid`, `code`, `longdesc`, `date`) VALUES
(27, 1, 'log', 'user has succesfully logged in', 20251024),
(28, 1, 'log', 'user has succesfully logged in', 1761296204),
(29, 1, 'log', 'user has logged out', 1761296219),
(30, 1, 'log', 'user has succesfully logged in', 1761296224),
(31, 1, 'lgo', 'user has logged out', 1761296387),
(32, 1, 'log', 'user has succesfully logged in', 1761296391),
(33, 1, 'lgo', 'user has logged out', 1761296427),
(34, 1, 'log', 'user has succesfully logged in', 1761296431),
(35, 1, 'reg', 'created new patient: 2', 1761296798),
(36, 1, 'bok', 'created new booking', 1761296824),
(37, 1, 'lgo', 'user has logged out', 1761296843),
(38, 1, 'log', 'user has succesfully logged in', 1761300297),
(39, 1, 'alt', 'altered the booking', 1761300406),
(40, 1, 'reg', 'created new patient: 2', 1761300672),
(41, 1, 'lgo', 'user has logged out', 1761300674),
(42, 2, 'log', 'user has succesfully logged in', 1761300684),
(43, 2, 'alt', 'altered the booking', 1761300699),
(44, 2, 'lgo', 'user has logged out', 1761300775),
(45, 2, 'log', 'user has succesfully logged in', 1761300780),
(46, 2, 'lgo', 'user has logged out', 1761307510),
(47, 2, 'log', 'user has succesfully logged in', 1761307685),
(48, 2, 'lgo', 'user has logged out', 1761307692),
(49, 2, 'log', 'user has succesfully logged in', 1761307697),
(50, 2, 'lgo', 'user has logged out', 1761307711),
(51, 2, 'log', 'user has succesfully logged in', 1761307753),
(52, 2, 'lgo', 'user has logged out', 1761307755);

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
(14, 'new', 'nur', '$2y$10$rWK92JPATNjULe2NVaBf9OYilu6vOG46nu2sDyTYt4FJr5.qwpLnq', 5);

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
(1, 'a', 'b', 'c', 'm', 12, 'bob'),
(2, 'new', 'this ', 'guy', 'm', 13, '$2y$10$Nmm7I5soNJi7bkocaZtfouw5vzje6pVcinlY5TJN6AQmJIlpufDc.'),
(3, 'new', 'this ', 'guy', 'm', 13, '$2y$10$DwlXF7Qr5kEj21ieEdJ94OK9Lp4ClPsLFmSrol9P5RtFXotfRjmuW');

-- --------------------------------------------------------

--
-- Table structure for table `staffaudit`
--

CREATE TABLE `staffaudit` (
  `auditid` int NOT NULL,
  `doctorid` int NOT NULL,
  `code` text NOT NULL,
  `longdesc` text NOT NULL,
  `date` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staffaudit`
--

INSERT INTO `staffaudit` (`auditid`, `doctorid`, `code`, `longdesc`, `date`) VALUES
(10, 14, 'reg', 'created new staff: ', 1761307576),
(11, 14, 'log', 'user has succesfully logged in', 1761307590),
(12, 14, 'lgo', 'user has logged out', 1761307643),
(13, 14, 'log', 'user has succesfully logged in', 1761307815);

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
-- Indexes for table `staffaudit`
--
ALTER TABLE `staffaudit`
  ADD PRIMARY KEY (`auditid`),
  ADD KEY `doctorid` (`doctorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `auditid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffaudit`
--
ALTER TABLE `staffaudit`
  MODIFY `auditid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Constraints for table `staffaudit`
--
ALTER TABLE `staffaudit`
  ADD CONSTRAINT `staffaudit_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctor` (`doctorid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
