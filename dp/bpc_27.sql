-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_instructors`
--

CREATE TABLE `tbl_bpc_instructors` (
  `tid` int(11) NOT NULL,
  `instructors_id` varchar(100) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `salutation` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `town` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `professional_no` varchar(100) NOT NULL,
  `appointment_nature` varchar(50) NOT NULL,
  `employment_status` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_specialization`
--

CREATE TABLE `tbl_bpc_specialization` (
  `sid` int(11) NOT NULL,
  `specialization_id` varchar(100) NOT NULL,
  `specialization_desctiption` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `specialization_acro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `instructors_id` (`instructors_id`);

--
-- Indexes for table `tbl_bpc_specialization`
--
ALTER TABLE `tbl_bpc_specialization`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `specialization_id` (`specialization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialization`
--
ALTER TABLE `tbl_bpc_specialization`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
