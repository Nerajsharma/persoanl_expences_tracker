-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 11:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aapna_khalti`
--

-- --------------------------------------------------------

--
-- Table structure for table `expance`
--

CREATE TABLE `expance` (
  `sn` int(10) NOT NULL,
  `userid` varchar(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `paid` varchar(6) NOT NULL,
  `place` varchar(25) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `sn` int(25) NOT NULL,
  `userid` varchar(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `paid` varchar(5) NOT NULL,
  `purpose` varchar(52) NOT NULL,
  `method` varchar(20) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `required`
--

CREATE TABLE `required` (
  `sn` int(10) NOT NULL,
  `things` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `sn` int(6) NOT NULL,
  `userid` varchar(6) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_rent` varchar(6) NOT NULL,
  `paid` varchar(6) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `room_rent` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `name`, `username`, `password`, `date`, `room_rent`) VALUES
(1, 'Niraj sharma', 'admin', '$2y$10$G5qBHLKOj/vLNArcIOOP6u/CTJIA0.ST0Ea6rthotErq/oEYBGV/i', '2024-02-11 09:28:24.196875', '2375'),
(3, 'Binita sharma', 'binita', '$2y$10$DIGGuaslaZSpYwfRFBEaTeYTy.KWHmYZ69kprbIKzdW9bqUcizlHO', '2024-02-11 08:35:26.901409', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expance`
--
ALTER TABLE `expance`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `required`
--
ALTER TABLE `required`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expance`
--
ALTER TABLE `expance`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `sn` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `required`
--
ALTER TABLE `required`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `sn` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
