-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2024 at 11:50 AM
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
  `academic_start_year` int(11) NOT NULL,
  `academic_end_year` int(11) NOT NULL,
  `academic_semester` varchar(20) NOT NULL,
  `academic_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_academic_year`
--

INSERT INTO `tbl_bpc_academic_year` (`academic_id`, `academic_start_year`, `academic_end_year`, `academic_semester`, `academic_status`) VALUES
(4, 2020, 2021, 'first_semester', 'closed'),
(5, 2020, 2021, 'second_semester', 'closed'),
(6, 2021, 2022, 'first_semester', 'closed'),
(8, 2021, 2022, 'first_semester', 'open'),
(12, 2021, 2022, 'first_semester', 'closed');

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
(1, 'CME', 'College of Management and Entrepreneurship', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bpc_courses`
--

CREATE TABLE `tbl_bpc_courses` (
  `sid` int(11) NOT NULL,
  `program_code` varchar(10) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_description` varchar(100) NOT NULL,
  `course_units` int(10) NOT NULL,
  `course_type` varchar(50) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `pre_requisite` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_courses`
--

INSERT INTO `tbl_bpc_courses` (`sid`, `program_code`, `course_code`, `course_description`, `course_units`, `course_type`, `year_level`, `semester`, `pre_requisite`, `status`) VALUES
(1, 'BSAGRI', 'GE104', 'Mathematics in the Modern World', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(2, 'BSAGRI', 'GE107', 'Science, Technology & Society', 3, 'lecture', 'first_year', 'second_semester', 'none', 'Active'),
(4, 'BSAGRI', 'GE101', 'Understanding the Self', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(5, 'BSENTREP', 'GE102', 'Readings in the Philippine History', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(6, 'BSAGRI', 'GE108', 'Ethics', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(7, 'BSAGRI', 'MGT101', 'Introduction to Entrepreneurship', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(8, 'BSAGRI', 'FAC101', 'Crop Science I - Fundamentals of Crop Science', 3, 'lecture_laboratory', 'first_year', 'first_semester', 'none', 'Active'),
(9, 'BSAGRI', 'NSTP101', 'Civic Welfare Training Service 1', 3, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(10, 'BSAGRI', 'PE101', 'Physical Activity Towards Health Fitness (Movement Pattern/Exercise Based)', 2, 'lecture', 'first_year', 'first_semester', 'none', 'Active'),
(11, 'BSAGRI', 'PE102', 'Physical Activity Towards Health & Fitness (Exercise Program-Based)', 2, 'lecture', 'first_year', 'second_semester', 'none', 'Active');

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
-- Table structure for table `tbl_bpc_programs`
--

CREATE TABLE `tbl_bpc_programs` (
  `program_id` int(11) NOT NULL,
  `program_code` varchar(100) NOT NULL,
  `program_description` varchar(100) NOT NULL,
  `college_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_programs`
--

INSERT INTO `tbl_bpc_programs` (`program_id`, `program_code`, `program_description`, `college_code`) VALUES
(5, 'BSENTREP', 'BACHELORS OF SCIENCE IN ENTREPRENEURSHIP', 'CME'),
(6, 'BSAGRI', 'BACHELORS OF SCIENCE IN AGRICULTURE BUSINESSES', 'CME'),
(8, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'CME');

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
(2, 'BSENTREP-II-I', 'BSENTREP', 'I', 'SC-2-22-23'),
(3, 'BSIT-I-I', 'BSIT', 'I', 'SC-1-22-23');

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
(11, 'BSENTREP-I-I', 'GE104', 'MTF-LEC3-2-3', '23-BPC-014i'),
(13, 'BSIT-I-I', 'GE104', 'TTH-LEC2-11-12', '23-BPC-012i'),
(14, 'BSIT-I-I', 'GEE101', 'F-LEC1-8-10', '23-BPC-014i'),
(15, 'BSIT-I-I', 'GE104', 'MWF-LEC1-8-10', '23-BPC-012i');

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
(1, 'MWF-LEC1-8-10', 'MWF', '08:00:00', '10:00:00', 'LEC1', 1),
(3, 'TTH-LEC2-11-12', 'TTH', '08:00:00', '10:00:00', 'LEC1', 1),
(4, 'TTH-LEC3-08-10', 'TTH', '08:00:00', '10:00:00', 'LEC3', 1),
(5, 'TTH-LEC2-08-10', 'MWF', '09:00:00', '10:00:00', 'LEC2', 1),
(6, 'MTF-LEC3-2-3', 'MTF', '14:00:00', '15:00:00', 'LEC3', 1),
(7, 'F-LEC1-8-10', 'F', '02:00:00', '17:00:00', 'LEC4', 1);

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
(71, 'GEE101', '23-BPC-014i'),
(72, 'GE104', '23-BPC-011i'),
(73, 'GE107', '23-BPC-011i'),
(74, 'GEE101', '23-BPC-011i');

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
  `extension` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `mother_tongue` varchar(50) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `father_firstname` varchar(100) NOT NULL,
  `father_middlename` varchar(100) NOT NULL,
  `father_lastname` varchar(100) NOT NULL,
  `father_educational` varchar(100) NOT NULL,
  `father_address` varchar(100) NOT NULL,
  `father_contact` varchar(100) NOT NULL,
  `mother_firstname` varchar(100) NOT NULL,
  `mother_middlename` varchar(100) NOT NULL,
  `mother_lastname` varchar(100) NOT NULL,
  `mother_educational` varchar(100) NOT NULL,
  `mother_address` varchar(100) NOT NULL,
  `mother_contact` varchar(100) NOT NULL,
  `4ps_beneficiary` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `last_school_name` varchar(200) NOT NULL,
  `last_school_address` varchar(200) NOT NULL,
  `honors_received` varchar(200) NOT NULL,
  `year_graduated` int(50) NOT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `date_entered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bpc_students`
--

INSERT INTO `tbl_bpc_students` (`student_id`, `student_code`, `s_lastname`, `s_firstname`, `s_middlename`, `extension`, `civil_status`, `barangay`, `town`, `province`, `sex`, `birthdate`, `place_of_birth`, `religion`, `mother_tongue`, `citizenship`, `contact`, `father_firstname`, `father_middlename`, `father_lastname`, `father_educational`, `father_address`, `father_contact`, `mother_firstname`, `mother_middlename`, `mother_lastname`, `mother_educational`, `mother_address`, `mother_contact`, `4ps_beneficiary`, `email`, `last_school_name`, `last_school_address`, `honors_received`, `year_graduated`, `course_code`, `status`, `date_entered`) VALUES
(7, '23-BPC-0007', 'DIAZ', 'LLOYD', 'NEIL', '', '', 'DON PEDRO', 'MALASIQUI', 'PANNGASIN', 'Male', '1998-01-08', '', '', '', '0', '09190657331', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'BSENTREP-I-I', 'Active', '2024-06-11'),
(8, '23-BPC-0008', 'DIAZ', 'LLOYD', 'NEIL', '', '', 'DON PEDRO', 'MALASIQUI', 'PANNGASIN', 'Male', '1998-01-08', '', '', '', '0', '09190657331', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'BSENTREP-I-I', 'Active', '2024-06-11'),
(9, '23-BPC-0009', 'SANTILLAN', 'MARIA', 'ATIENZA', '', '', 'BICAL NORTER', 'BAYAMBANG', 'PANGASINAN', 'Female', '1978-08-09', '', '', '', '0', '09986789987', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'BSENTREP-II-I', 'Active', '2024-06-11'),
(10, '24-BPC-0010', 'JUNIO', 'JEZREEL JOHN', 'VICTORINO', '', 'single', '015511075', '015511000', '015500000', 'male', '1993-12-06', 'STA. MESA , MANILA', 'ROMAN CATHOLIC', 'FILIPINO', 'FILIPINO', '091906573331', 'RAYMUND ALDRIN', 'MARTINEZ', 'JUNIO', 'high_school_graduate', 'BRGY. ZONE III, BAYAMBANG, PANGASINAN', '09197665898', 'LUCILA', 'ALONZO', 'VICTORINO', 'college_graduate', 'BRGY. ZONE III, BAYAMBANG, PANGASINAN', '09196758899', 'no', 'juniojjv@gmail.com', 'MALASIQUI NATIONAL HIGH SCHOOL', 'MALASIQUI, PANGASINAN', 'WITH HIGH HONORS', 2010, NULL, 'Active', '2024-06-11'),
(11, '24-BPC-0011', 'DELA CRUZ', 'JUAN', 'BAYOMBO', '', 'single', '015511075', '015511000', '015500000', 'male', '1997-12-06', 'BAYAMBANG', 'ROMAN CATHLOIC', 'FILIPINO', 'FILIPINO', '09196678899', 'GORDON', 'REYES', 'RAMSEY', 'college_graduate', 'BAYAMBANG, PANGASINAN', '09193932565', 'JUANA', 'DELA CRUZ', 'SANTOS', 'college_graduate', 'BAYAMBANG, PANGASINAN', '097865734456', 'no', 'xpac@gmail.com', 'MALASIQUI NATIONAL HIGH SCHOL', 'MALASIQUI PANGASINAN', 'WITH HIGH HONORS', 2022, NULL, 'Active', '2024-06-18');

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
(6, '23-BPC-014i', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', 'Instructor'),
(7, '24-BPC-0010', 'b4d98575ad026f9a5ffffe566e69888a', 'first_login', 'Student'),
(8, '24-BPC-0011', 'b4d98575ad026f9a5ffffe566e69888a', 'first_login', 'Student');

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
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `specialization_id` (`course_code`);

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
-- Indexes for table `tbl_bpc_programs`
--
ALTER TABLE `tbl_bpc_programs`
  ADD PRIMARY KEY (`program_id`);

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
  MODIFY `academic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_bpc_college`
--
ALTER TABLE `tbl_bpc_college`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bpc_courses`
--
ALTER TABLE `tbl_bpc_courses`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `tbl_bpc_programs`
--
ALTER TABLE `tbl_bpc_programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bpc_program_sections`
--
ALTER TABLE `tbl_bpc_program_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bpc_program_section_subjects`
--
ALTER TABLE `tbl_bpc_program_section_subjects`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_bpc_rooms`
--
ALTER TABLE `tbl_bpc_rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_bpc_schedule`
--
ALTER TABLE `tbl_bpc_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_bpc_semesters`
--
ALTER TABLE `tbl_bpc_semesters`
  MODIFY `semeter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bpc_specialty`
--
ALTER TABLE `tbl_bpc_specialty`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_bpc_students`
--
ALTER TABLE `tbl_bpc_students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bpc_users`
--
ALTER TABLE `tbl_bpc_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
