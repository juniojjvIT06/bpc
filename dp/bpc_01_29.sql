-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 04:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `tbl_bpc_academic_year`
--

CREATE TABLE `tbl_bpc_academic_year` (
  `academic_id` int(11) NOT NULL,
  `academic_year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_academic_year`
--

INSERT INTO `tbl_bpc_academic_year` (`academic_id`, `academic_year`) VALUES
(1, '2022-2023'),
(2, '2021-2022'),
(3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_classes`
--

CREATE TABLE `tbl_bpc_classes` (
  `class_id` int(11) NOT NULL,
  `class_code` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `schedule_code` varchar(100) NOT NULL,
  `instructors_id` varchar(100) NOT NULL,
  `semester_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_classes`
--

INSERT INTO `tbl_bpc_classes` (`class_id`, `class_code`, `course_code`, `subject_code`, `schedule_code`, `instructors_id`, `semester_code`) VALUES
(1, '23-ENTREP-GE-104', 'BS ENTREP', 'GE 104', 'MWF-LEC1-8-10', '23-BPC-003i', 'SC-1-22-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_college`
--

CREATE TABLE `tbl_bpc_college` (
  `cid` int(11) NOT NULL,
  `college_code` varchar(200) NOT NULL,
  `college_description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_college`
--

INSERT INTO `tbl_bpc_college` (`cid`, `college_code`, `college_description`, `status`) VALUES
(1, 'CME', 'College of Management and Entrepreneur', 'Active'),
(2, 'CIS', 'College of Information Systems', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_courses`
--

CREATE TABLE `tbl_bpc_courses` (
  `courses_id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `college_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_courses`
--

INSERT INTO `tbl_bpc_courses` (`courses_id`, `course_code`, `course_description`, `college_code`) VALUES
(1, 'BS ENTREP', 'BACHELORS OF SCIENCE IN ENTREPRENEUSHIP', 'CME'),
(2, 'BS AGRI', 'BACHELORS OF SCIENCE IN AGRICULTURE', 'CME'),
(3, 'BSIT', 'BACHELORS OF SCIENCE IN INFORMATION TECHNOLOGY', 'CIS');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_instructors`
--

INSERT INTO `tbl_bpc_instructors` (`tid`, `instructors_id`, `lastname`, `firstname`, `middlename`, `salutation`, `sex`, `date_of_birth`, `barangay`, `town`, `province`, `image`, `professional_no`, `appointment_nature`, `employment_status`, `date_hired`, `status`) VALUES
(1, '23-BPC-001i', 'JUNIO', 'JEZREEL JOHN', 'VICTORINO', 'MR', 'Male', '2023-01-02', '', 'BAYAMBANG', 'Pangasinan', '23-BPC-001i.jpg', 'PRC-2000-13', 'Temporary', 'part_time', '2023-01-04', 'Active'),
(2, '23-BPC-002i', 'SAYGO', 'RAFAEL', 'LIMUECO', 'MR', 'Male', '1988-01-21', '', 'BAYAMBANG', 'PANGASINAN', '23-BPC-002i.jpg', 'PRC-2000-14', 'Permanent', 'full_time', '2016-01-21', 'Active'),
(3, '23-BPC-003i', 'SAYGO', 'RAFAEL', 'LIMUECO', 'DR', 'Male', '1988-01-21', 'AMAMPEREZ', 'BAYAMBANG', 'PANGASINAN', '23-BPC-003i.jpg', 'PRC-2000-14', 'Permanent', 'full_time', '2016-01-21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_rooms`
--

CREATE TABLE `tbl_bpc_rooms` (
  `rooms_id` int(11) NOT NULL,
  `room_code` varchar(200) NOT NULL,
  `room_description` varchar(200) NOT NULL,
  `room_capacity` int(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_rooms`
--

INSERT INTO `tbl_bpc_rooms` (`rooms_id`, `room_code`, `room_description`, `room_capacity`, `status`) VALUES
(1, 'LEC1', 'LECTURE 1', 50, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_schedule`
--

CREATE TABLE `tbl_bpc_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_code` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_schedule`
--

INSERT INTO `tbl_bpc_schedule` (`schedule_id`, `schedule_code`, `day`, `start_time`, `end_time`, `room_code`) VALUES
(1, 'MWF-LEC1-8-10', 'MWF', '08:00:00', '10:00:00', 'LEC1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_semesters`
--

CREATE TABLE `tbl_bpc_semesters` (
  `semeter_id` int(11) NOT NULL,
  `semester_code` varchar(200) NOT NULL,
  `year_level` varchar(200) NOT NULL,
  `academic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_semesters`
--

INSERT INTO `tbl_bpc_semesters` (`semeter_id`, `semester_code`, `year_level`, `academic_id`) VALUES
(1, 'SC-1-22-23', '1st Year', 1),
(2, 'SC-2-22-23', '2nd Year', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_specialty`
--

CREATE TABLE `tbl_bpc_specialty` (
  `speciality_id` int(11) NOT NULL,
  `subject_code` varchar(200) NOT NULL,
  `instructors_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_specialty`
--

INSERT INTO `tbl_bpc_specialty` (`speciality_id`, `subject_code`, `instructors_id`) VALUES
(34, 'GE 107', '23-BPC-001i'),
(38, 'GE 107', '23-BPC-002i'),
(39, 'GE 104', '23-BPC-003i'),
(40, 'GE 107', '23-BPC-003i'),
(41, 'GE 104', '23-BPC-002i');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_subjects`
--

CREATE TABLE `tbl_bpc_subjects` (
  `sid` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_description` varchar(100) NOT NULL,
  `subject_units` int(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bpc_subjects`
--

INSERT INTO `tbl_bpc_subjects` (`sid`, `subject_code`, `subject_description`, `subject_units`, `status`) VALUES
(1, 'GE 104', 'Mathematic in the Modern World', 0, 'Active'),
(2, 'GE 107', 'Science, Technology & Society', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bpc_academic_year`
--
ALTER TABLE `tbl_bpc_academic_year`
  ADD PRIMARY KEY (`academic_id`);

--
-- Indexes for table `tbl_bpc_classes`
--
ALTER TABLE `tbl_bpc_classes`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_code` (`class_code`);

--
-- Indexes for table `tbl_bpc_college`
--
ALTER TABLE `tbl_bpc_college`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_bpc_courses`
--
ALTER TABLE `tbl_bpc_courses`
  ADD PRIMARY KEY (`courses_id`);

--
-- Indexes for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `instructors_id` (`instructors_id`);

--
-- Indexes for table `tbl_bpc_rooms`
--
ALTER TABLE `tbl_bpc_rooms`
  ADD PRIMARY KEY (`rooms_id`);

--
-- Indexes for table `tbl_bpc_schedule`
--
ALTER TABLE `tbl_bpc_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_bpc_semesters`
--
ALTER TABLE `tbl_bpc_semesters`
  ADD PRIMARY KEY (`semeter_id`);

--
-- Indexes for table `tbl_bpc_specialty`
--
ALTER TABLE `tbl_bpc_specialty`
  ADD PRIMARY KEY (`speciality_id`);

--
-- Indexes for table `tbl_bpc_subjects`
--
ALTER TABLE `tbl_bpc_subjects`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `specialization_id` (`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bpc_academic_year`
--
ALTER TABLE `tbl_bpc_academic_year`
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_classes`
--
ALTER TABLE `tbl_bpc_classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bpc_college`
--
ALTER TABLE `tbl_bpc_college`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_courses`
--
ALTER TABLE `tbl_bpc_courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_rooms`
--
ALTER TABLE `tbl_bpc_rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bpc_schedule`
--
ALTER TABLE `tbl_bpc_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bpc_semesters`
--
ALTER TABLE `tbl_bpc_semesters`
  MODIFY `semeter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialty`
--
ALTER TABLE `tbl_bpc_specialty`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_bpc_subjects`
--
ALTER TABLE `tbl_bpc_subjects`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
