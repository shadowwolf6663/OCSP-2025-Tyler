-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2025 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gconsole`
--

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `console_id` int(11) NOT NULL,
  `manufacturer` text NOT NULL,
  `c_name` text NOT NULL,
  `release_date` text NOT NULL,
  `controller_no` int(11) NOT NULL,
  `bit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `console`
--

INSERT INTO `console` (`console_id`, `manufacturer`, `c_name`, `release_date`, `controller_no`, `bit`) VALUES
(1, 'Nintendo', 'Nintendo switch', '3/3/2017', 3, 64),
(2, 'Nintendo', 'Nintendo Switch 2', '9/15/2025', 4, 128),
(3, 'Sony', 'PlayStation 5', '11/12/2020', 1, 64),
(4, 'Sony', 'PlayStation 4', '11/15/2013', 1, 64),
(5, 'Microsoft', 'Xbox Series X', '11/10/2020', 1, 64),
(6, 'Microsoft', 'Xbox One', '11/22/2013', 1, 64),
(7, 'Nintendo', 'Wii U', '11/18/2012', 2, 32),
(8, 'Sony', 'PlayStation 3', '11/11/2006', 2, 64),
(9, 'Microsoft', 'Xbox 360', '11/22/2005', 2, 64);

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `owns_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  `buy_date` text NOT NULL,
  `link_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`owns_id`, `user_id`, `console_id`, `buy_date`, `link_date`) VALUES
(1, 1, 1, '10/01/2004', '1/01/2003'),
(2, 1, 2, '10/02/2004', '01/02/2003'),
(3, 1, 3, '10/03/2004', '01/03/2003'),
(4, 1, 4, '10/04/2004', '01/04/2003'),
(5, 1, 5, '10/05/2004', '01/05/2003'),
(6, 1, 6, '10/06/2004', '01/06/2003'),
(7, 1, 7, '10/07/2004', '01/07/2003'),
(8, 1, 8, '10/08/2004', '01/08/2003'),
(9, 1, 9, '10/09/2004', '01/09/2003'),
(10, 2, 2, '01/10/2023', '01/11/2023'),
(11, 2, 3, '01/12/2023', '01/13/2023'),
(12, 3, 4, '02/01/2023', '02/02/2023'),
(13, 3, 5, '02/03/2023', '02/04/2023'),
(14, 4, 6, '03/01/2023', '03/02/2023'),
(15, 4, 7, '03/03/2023', '03/04/2023'),
(16, 5, 8, '04/01/2023', '04/02/2023'),
(17, 5, 9, '04/03/2023', '04/04/2023'),
(18, 6, 1, '05/01/2023', '05/02/2023'),
(19, 6, 2, '05/03/2023', '05/04/2023');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `signupdate` text NOT NULL,
  `dob` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `signupdate`, `dob`, `country`) VALUES
(1, 'tyler', 'obbies', '01//01/2023', '07/10/2007', 'united kingdom'),
(2, 'alex99', 'pass1234', '02/15/2023', '05/22/2000', 'united states'),
(3, 'jamie_x', 'secure987', '03/12/2023', '11/30/1998', 'canada'),
(4, 'mia_lee', 'letmein321', '04/20/2023', '08/17/2005', 'australia'),
(5, 'lucas_dev', 'codepass1', '05/01/2023', '03/09/1995', 'germany'),
(6, 'sakura23', 'animefan!', '06/18/2023', '12/25/2002', 'japan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`owns_id`),
  ADD KEY `user_id` (`user_id`,`console_id`),
  ADD KEY `console_id` (`console_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `owns`
--
ALTER TABLE `owns`
  MODIFY `owns_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`console_id`) REFERENCES `console` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
