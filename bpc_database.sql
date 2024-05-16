-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 04:51 AM
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
(1, '2022-2023');

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
(3, 'CIS', 'College of Information and Infrastructure', 'Active'),
(4, 'CAS', 'College of Arts and Sciences', 'Active');

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
(6, 'BSAGRI', 'BACHELORS OF SCIENCE IN AGRICULTURE BUSINESS', 'CME'),
(7, 'BSIT', 'BACHELORS OF SCIENCE IN INFORMATION TECHNOLOGY', 'CIS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_enroll`
--

CREATE TABLE `tbl_bpc_enroll` (
  `enroll_id` int(11) NOT NULL,
  `section_code` varchar(50) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `student_code` varchar(50) NOT NULL,
  `date_enrolled` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_enroll`
--

INSERT INTO `tbl_bpc_enroll` (`enroll_id`, `section_code`, `subject_code`, `student_code`, `date_enrolled`) VALUES
(1, 'BSENTREP-I-I', 'GE107', '23-BPC-0008', '2023-02-08'),
(2, 'BSENTREP-I-I', 'GE104', '23-BPC-0008', '2023-02-08'),
(3, 'BSENTREP-II-I', 'GE104', '23-BPC-0009', '2023-02-08');

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
(11, '23-BPC-011i', 'JUNIO', 'JEZREEL JOHN', 'VICTORINO', 'MR', 'Male', '1993-12-12', 'ZONE III', 'BAYAMBANG', 'PANGASINAN', '23-BPC-011i.jpg', 'n/a', 'CIS', 'Permanent', 'full_time', '2016-06-01', 'Active'),
(12, '23-BPC-012i', 'SANTILLAN', 'MARIA CONCEPCION CARMELA', 'ATIENZA', 'MS', 'Female', '1978-12-08', 'BICAL NORTE', 'BAYAMBANG', 'PANGASINAN', '23-BPC-012i.jpg', 'PRC-2000-999', 'CME', 'Permanent', 'full_time', '2016-07-01', 'Active'),
(13, '23-BPC-013i', 'DELA CRUZ', 'JUAN', 'APOLINIO', 'MR', 'Male', '1993-12-06', 'ZONE III', 'BAYAMBANG', 'PANGASINAN', '23-BPC-013i.jpg', 'n/a', 'CIS', 'Permanent', 'full_time', '2016-12-06', 'Active'),
(14, '23-BPC-014i', 'DONATO', 'KC', 'CABADU', 'MS', 'Female', '1987-11-09', 'SANCAGULIS', 'BAYAMBANG', 'PANGASINAN', '23-BPC-014i.jpg', 'PRC-2011-768', 'CAS', 'Permanent', 'full_time', '2016-07-04', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_program_sections`
--

CREATE TABLE `tbl_bpc_program_sections` (
  `id` int(11) NOT NULL,
  `section_code` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `semester_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_program_sections`
--

INSERT INTO `tbl_bpc_program_sections` (`id`, `section_code`, `course_code`, `section`, `semester_code`) VALUES
(1, 'BSENTREP-I-I', 'BSENTREP', 'I', 'SC-1-22-23'),
(2, 'BSENTREP-II-I', 'BSENTREP', 'I', 'SC-2-22-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_program_section_subjects`
--

CREATE TABLE `tbl_bpc_program_section_subjects` (
  `class_id` int(11) NOT NULL,
  `section_code` varchar(100) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `schedule_code` varchar(100) NOT NULL,
  `instructors_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_program_section_subjects`
--

INSERT INTO `tbl_bpc_program_section_subjects` (`class_id`, `section_code`, `subject_code`, `schedule_code`, `instructors_id`) VALUES
(9, 'BSENTREP-II-I', 'GE104', 'TTH-LEC3-08-10', '23-BPC-012i'),
(10, 'BSENTREP-I-I', 'GE104', 'TTH-LEC2-08-10', '23-BPC-014i'),
(11, 'BSENTREP-I-I', 'GE104', 'MTF-LEC3-2-3', '23-BPC-014i');

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
(4, 'LEC3', 'LECTURE ROOM 3', 200, 'Active'),
(5, 'LEC4', 'LECTURE ROOM 4', 50, 'Active');

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
  `room_code` varchar(200) NOT NULL,
  `acquired` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_schedule`
--

INSERT INTO `tbl_bpc_schedule` (`schedule_id`, `schedule_code`, `day`, `start_time`, `end_time`, `room_code`, `acquired`) VALUES
(1, 'MWF-LEC1-8-10', 'MWF', '08:00:00', '10:00:00', 'LEC1', 0),
(3, 'TTH-LEC2-11-12', 'TTH', '08:00:00', '10:00:00', 'LEC1', 0),
(4, 'TTH-LEC3-08-10', 'TTH', '08:00:00', '10:00:00', 'LEC3', 1),
(5, 'TTH-LEC2-08-10', 'MWF', '09:00:00', '10:00:00', 'LEC2', 1),
(6, 'MTF-LEC3-2-3', 'MTF', '14:00:00', '15:00:00', 'LEC3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_semesters`
--

CREATE TABLE `tbl_bpc_semesters` (
  `semeter_id` int(11) NOT NULL,
  `semester_code` varchar(200) NOT NULL,
  `year_level` varchar(200) NOT NULL,
  `semester_term` varchar(20) NOT NULL,
  `academic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_semesters`
--

INSERT INTO `tbl_bpc_semesters` (`semeter_id`, `semester_code`, `year_level`, `semester_term`, `academic_id`) VALUES
(1, 'SC-1-22-23', '1stYear', '1stSemester', 1),
(2, 'SC-2-22-23', '2ndYear', '1stSemester', 1);

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
(61, 'GE104', '23-BPC-007i'),
(62, 'GE104', '23-BPC-011i'),
(63, 'GE107', '23-BPC-011i'),
(64, 'GE104', '23-BPC-012i'),
(65, 'GE107', '23-BPC-012i'),
(66, 'GE104', '23-BPC-013i'),
(67, 'GE107', '23-BPC-013i'),
(68, 'GEE101', '23-BPC-013i'),
(69, 'GE104', '23-BPC-014i'),
(70, 'GE107', '23-BPC-014i'),
(71, 'GEE101', '23-BPC-014i');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_students`
--

CREATE TABLE `tbl_bpc_students` (
  `student_id` int(11) NOT NULL,
  `student_code` varchar(100) NOT NULL,
  `s_lastname` varchar(100) NOT NULL,
  `s_firstname` varchar(100) NOT NULL,
  `s_middlename` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `s_birthdate` date NOT NULL,
  `s_contact` varchar(20) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_students`
--

INSERT INTO `tbl_bpc_students` (`student_id`, `student_code`, `s_lastname`, `s_firstname`, `s_middlename`, `barangay`, `town`, `province`, `sex`, `s_birthdate`, `s_contact`, `course_code`, `status`) VALUES
(7, '23-BPC-0007', 'DIAZ', 'LLOYD', 'NEIL', 'DON PEDRO', 'MALASIQUI', 'PANNGASIN', 'Male', '1998-01-08', '09190657331', 'BSENTREP-I-I', 'Active'),
(8, '23-BPC-0008', 'DIAZ', 'LLOYD', 'NEIL', 'DON PEDRO', 'MALASIQUI', 'PANNGASIN', 'Male', '1998-01-08', '09190657331', 'BSENTREP-I-I', 'Active'),
(9, '23-BPC-0009', 'SANTILLAN', 'MARIA', 'ATIENZA', 'BICAL NORTER', 'BAYAMBANG', 'PANGASINAN', 'Female', '1978-08-09', '09986789987', 'BSENTREP-II-I', 'Active');

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
(2, 'GE107', 'Science, Technology & Society', 3, 'Active'),
(3, 'GEE101', 'Living in the IT Era', 2, 'Active');

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
(1, '23-BPC-011i', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'Admin'),
(2, '23-BPC-012i', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'Admin'),
(3, '23-BPC-0008', 'b4d98575ad026f9a5ffffe566e69888a', 'first_login', 'Student'),
(4, '23-BPC-013i', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'Admin'),
(5, '23-BPC-0009', 'b4d98575ad026f9a5ffffe566e69888a', 'first_login', 'Student'),
(6, '23-BPC-014i', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'Instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bpc_academic_year`
--
ALTER TABLE `tbl_bpc_academic_year`
  ADD PRIMARY KEY (`academic_id`);

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
-- Indexes for table `tbl_bpc_enroll`
--
ALTER TABLE `tbl_bpc_enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `instructors_id` (`instructors_id`);

--
-- Indexes for table `tbl_bpc_program_sections`
--
ALTER TABLE `tbl_bpc_program_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bpc_program_section_subjects`
--
ALTER TABLE `tbl_bpc_program_section_subjects`
  ADD PRIMARY KEY (`class_id`);

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
-- Indexes for table `tbl_bpc_students`
--
ALTER TABLE `tbl_bpc_students`
  ADD PRIMARY KEY (`student_id`,`student_code`);

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
-- AUTO_INCREMENT for table `tbl_bpc_college`
--
ALTER TABLE `tbl_bpc_college`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bpc_courses`
--
ALTER TABLE `tbl_bpc_courses`
  MODIFY `courses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bpc_enroll`
--
ALTER TABLE `tbl_bpc_enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_instructors`
--
ALTER TABLE `tbl_bpc_instructors`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_bpc_program_sections`
--
ALTER TABLE `tbl_bpc_program_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_program_section_subjects`
--
ALTER TABLE `tbl_bpc_program_section_subjects`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bpc_rooms`
--
ALTER TABLE `tbl_bpc_rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_bpc_schedule`
--
ALTER TABLE `tbl_bpc_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_bpc_semesters`
--
ALTER TABLE `tbl_bpc_semesters`
  MODIFY `semeter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialty`
--
ALTER TABLE `tbl_bpc_specialty`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_bpc_students`
--
ALTER TABLE `tbl_bpc_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_bpc_subjects`
--
ALTER TABLE `tbl_bpc_subjects`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_users`
--
ALTER TABLE `tbl_bpc_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
