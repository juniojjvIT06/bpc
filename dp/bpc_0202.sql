-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 03:47 PM
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
-- Table structure for table `tbl_bpc_academic_year`
--

CREATE TABLE `tbl_bpc_academic_year` (
  `academic_id` int(11) NOT NULL,
  `academic_year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_academic_year`
--

INSERT INTO `tbl_bpc_academic_year` (`academic_id`, `academic_year`) VALUES
(1, '2022-2023'),
(2, '2021-2022');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_classes`
--

INSERT INTO `tbl_bpc_classes` (`class_id`, `class_code`, `course_code`, `subject_code`, `schedule_code`, `instructors_id`, `semester_code`) VALUES
(1, '23-ENTREP-GE-104', 'BSENTREP', 'GE104', 'MWF-LEC1-8-10', '23-BPC-007i', 'SC-1-22-23'),
(4, '23-ENTREP-GE-106', 'BSENTREP', 'GE104', 'MWF-LEC1-8-10', '23-BPC-007i', 'SC-1-22-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_college`
--

CREATE TABLE `tbl_bpc_college` (
  `cid` int(11) NOT NULL,
  `college_code` varchar(200) NOT NULL,
  `college_description` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_college`
--

INSERT INTO `tbl_bpc_college` (`cid`, `college_code`, `college_description`, `status`) VALUES
(1, 'CME', 'College of Management and Entrepreneurship', 'Active'),
(3, 'CIS', 'College of Information and Infrastructure', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_courses`
--

CREATE TABLE `tbl_bpc_courses` (
  `courses_id` int(11) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `college_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_courses`
--

INSERT INTO `tbl_bpc_courses` (`courses_id`, `course_code`, `course_description`, `college_code`) VALUES
(5, 'BSENTREP', 'BACHELORS OF SCIENCE IN ENTREPRENEURSHIP', 'CME'),
(6, 'BSAGRI', 'BACHELORS OF SCIENCE IN AGRICULTURE BUSINESS', 'CME');

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
  `college_code` varchar(200) NOT NULL,
  `appointment_nature` varchar(50) NOT NULL,
  `employment_status` varchar(50) NOT NULL,
  `date_hired` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_instructors`
--

INSERT INTO `tbl_bpc_instructors` (`tid`, `instructors_id`, `lastname`, `firstname`, `middlename`, `salutation`, `sex`, `date_of_birth`, `barangay`, `town`, `province`, `image`, `professional_no`, `college_code`, `appointment_nature`, `employment_status`, `date_hired`, `status`) VALUES
(9, '23-BPC-007i', 'ESPINO', 'PATRICIA', 'MARIN', 'MS', 'Female', '1996-11-28', 'ZONE 7', 'BAYAMBANG', 'PANGASINAN', '23-BPC-007i.jpg', 'PRC-2000-134', 'CME', 'Permanent', 'full_time', '2023-02-06', 'Active'),
(11, '23-BPC-011i', 'JUNIO', 'JEZREEL JOHN', 'VICTORINO', 'MR', 'Male', '1993-12-12', 'ZONE III', 'BAYAMBANG', 'PANGASINAN', '23-BPC-011i.jpg', 'n/a', 'CIS', 'Permanent', 'full_time', '2016-06-01', 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_rooms`
--

INSERT INTO `tbl_bpc_rooms` (`rooms_id`, `room_code`, `room_description`, `room_capacity`, `status`) VALUES
(1, 'LEC1', 'LECTURE ROOM 1', 50, 'Active'),
(3, 'LEC2', 'LECTURE ROOM 2', 100, 'Active'),
(4, 'LEC3', 'LECTURE ROOM 3', 200, 'Active');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_schedule`
--

INSERT INTO `tbl_bpc_schedule` (`schedule_id`, `schedule_code`, `day`, `start_time`, `end_time`, `room_code`) VALUES
(1, 'MWF-LEC1-8-10', 'MWF', '08:00:00', '10:00:00', 'LEC1'),
(3, 'TTH-LEC2-11-12', 'TTH', '08:00:00', '10:00:00', 'LEC1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_semesters`
--

CREATE TABLE `tbl_bpc_semesters` (
  `semeter_id` int(11) NOT NULL,
  `semester_code` varchar(200) NOT NULL,
  `year_level` varchar(200) NOT NULL,
  `academic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_semesters`
--

INSERT INTO `tbl_bpc_semesters` (`semeter_id`, `semester_code`, `year_level`, `academic_id`) VALUES
(1, 'SC-1-22-23', '1st Year', 1),
(2, 'SC-2-22-23', '2nd Year', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_specialty`
--

CREATE TABLE `tbl_bpc_specialty` (
  `speciality_id` int(11) NOT NULL,
  `subject_code` varchar(200) NOT NULL,
  `instructors_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_specialty`
--

INSERT INTO `tbl_bpc_specialty` (`speciality_id`, `subject_code`, `instructors_id`) VALUES
(59, 'GE104', '23-BPC-001i'),
(60, 'GE107', '23-BPC-001i'),
(61, 'GE104', '23-BPC-007i');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_subjects`
--

INSERT INTO `tbl_bpc_subjects` (`sid`, `subject_code`, `subject_description`, `subject_units`, `status`) VALUES
(1, 'GE104', 'Mathematics in the Modern World', 3, 'Active'),
(2, 'GE107', 'Science, Technology & Society', 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_users`
--

CREATE TABLE `tbl_bpc_users` (
  `users_id` int(11) NOT NULL,
  `code_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `category_level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='id_code';

--
-- Dumping data for table `tbl_bpc_users`
--

INSERT INTO `tbl_bpc_users` (`users_id`, `code_id`, `password`, `status`, `category_level`) VALUES
(1, '23-BPC-011i', 'b4d98575ad026f9a5ffffe566e69888a', 'first_login', 'Admin');

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
-- Indexes for table `tbl_bpc_specialization`
--
ALTER TABLE `tbl_bpc_specialization`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `specialization_id` (`specialization_id`);

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
-- Indexes for table `tbl_bpc_users`
--
ALTER TABLE `tbl_bpc_users`
  ADD PRIMARY KEY (`users_id`);

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bpc_college`
--
ALTER TABLE `tbl_bpc_college`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_courses`
--
ALTER TABLE `tbl_bpc_courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bpc_rooms`
--
ALTER TABLE `tbl_bpc_rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bpc_schedule`
--
ALTER TABLE `tbl_bpc_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_semesters`
--
ALTER TABLE `tbl_bpc_semesters`
  MODIFY `semeter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialization`
--
ALTER TABLE `tbl_bpc_specialization`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialty`
--
ALTER TABLE `tbl_bpc_specialty`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_bpc_subjects`
--
ALTER TABLE `tbl_bpc_subjects`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_users`
--
ALTER TABLE `tbl_bpc_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
