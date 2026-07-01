-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2026 at 07:19 AM
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
-- Database: `dsapts_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `user_id` int(11) NOT NULL,
  `department` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`user_id`, `department`) VALUES
(3, 'Computer Science'),
(4, 'Computer Science'),
(5, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alert_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `alert_type` varchar(50) DEFAULT NULL,
  `date_sent` date NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`alert_id`, `message`, `alert_type`, `date_sent`, `user_id`) VALUES
(74, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-07-01', 8),
(75, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-07-01', 10),
(76, 'You have not taken MUET yet. Please consider completing MUET before graduation to ensure all graduation requirements are met.', 'MUET Warning', '2026-07-01', 12),
(77, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-07-01', 13),
(78, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-07-01', 17),
(79, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-07-01', 20),
(80, 'You have not taken MUET yet. Please consider completing MUET before graduation to ensure all graduation requirements are met.', 'MUET Warning', '2026-07-01', 20),
(81, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-07-01', 24),
(82, 'You have not taken MUET yet. Please consider completing MUET before graduation to ensure all graduation requirements are met.', 'MUET Warning', '2026-07-01', 25),
(83, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-07-01', 28);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `total_sem` int(11) DEFAULT NULL,
  `required_credit_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `total_sem`, `required_credit_hours`) VALUES
(1, 'Diploma of Computer Science', 5, 90);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `semester_type` varchar(20) DEFAULT NULL,
  `sem_credit_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `semester_type`, `sem_credit_hours`) VALUES
(1, 'Semester 1/1', 'Normal', 15),
(2, 'Semester 1/2', 'Normal', 17),
(3, 'Semester 2/1', 'Normal', 17),
(4, 'Semester 2/2', 'Normal', 15),
(5, 'Semester 3/1', 'Normal', 13);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `user_id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `advisor_id` int(11) DEFAULT NULL,
  `CGPA` decimal(3,2) DEFAULT NULL,
  `muet_status` varchar(20) DEFAULT NULL,
  `total_credit_taken` int(11) DEFAULT NULL,
  `plan_to_degree` enum('Yes','No') DEFAULT NULL,
  `preferred_degree_field` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `program_id`, `advisor_id`, `CGPA`, `muet_status`, `total_credit_taken`, `plan_to_degree`, `preferred_degree_field`) VALUES
(6, 1, 3, 3.19, 'Pass', 46, 'Yes', 'Software Engineering'),
(7, 1, 3, 3.08, 'Pass', 46, 'No', NULL),
(8, 1, 3, 2.30, 'Pass', 46, 'Yes', 'Artificial Intelligence'),
(9, 1, 3, 3.27, 'Pass', 46, 'Yes', 'Cloud Computing'),
(10, 1, 3, 2.15, 'Pass', 46, 'No', NULL),
(11, 1, 3, 3.67, 'Pass', 46, 'Yes', 'Database Management'),
(12, 1, 3, 3.04, 'Not Taken', 46, 'No', NULL),
(13, 1, 3, 1.76, 'Pass', 46, 'Yes', 'Computer Networking'),
(14, 1, 3, 3.45, 'Pass', 46, 'No', NULL),
(15, 1, 3, 3.36, 'Pass', 46, 'Yes', 'Software Engineering'),
(16, 1, 4, 3.25, 'Pass', 32, 'Yes', 'Interactive Media'),
(17, 1, 4, 2.44, 'Pass', 32, 'No', NULL),
(18, 1, 4, 3.89, 'Pass', 32, 'Yes', 'Game Technology'),
(19, 1, 4, 3.03, 'Pass', 32, 'No', NULL),
(20, 1, 4, 1.60, 'Not Taken', 32, 'Yes', 'Cloud Computing'),
(21, 1, 4, 3.14, 'Pass', 32, 'No', NULL),
(22, 1, 4, 3.69, 'Pass', 32, 'Yes', 'Artificial Intelligence'),
(23, 1, 4, 3.25, 'Pass', 32, 'Yes', 'Software Engineering'),
(24, 1, 4, 2.23, 'Pass', 32, 'No', NULL),
(25, 1, 4, 3.57, 'Not Taken', 32, 'Yes', 'Database Management'),
(26, 1, 5, 2.94, 'Pass', 16, 'No', NULL),
(27, 1, 5, 3.06, 'Pass', 16, 'Yes', 'Computer Networking'),
(28, 1, 5, 2.68, 'Pass', 16, 'No', NULL),
(29, 1, 5, 3.38, 'Pass', 16, 'Yes', 'Game Technology'),
(30, 1, 5, 3.60, 'Pass', 16, 'Yes', 'Interactive Media'),
(31, 1, 5, 2.62, 'Pass', 16, 'No', NULL),
(32, 1, 5, 3.18, 'Pass', 16, 'Yes', 'Software Engineering'),
(33, 1, 5, 3.82, 'Pass', 16, 'No', NULL),
(34, 1, 5, 3.24, 'Pass', 16, 'Yes', 'Artificial Intelligence'),
(35, 1, 5, 2.82, 'Pass', 16, 'Yes', 'Cloud Computing');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `grade` varchar(2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `attempt_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`user_id`, `subject_id`, `semester_id`, `grade`, `status`, `attempt_no`) VALUES
(6, 1, 1, 'B+', 'Pass', 1),
(6, 2, 1, 'B', 'Pass', 1),
(6, 3, 1, 'B', 'Pass', 1),
(6, 4, 2, 'B', 'Pass', 1),
(6, 5, 1, 'B+', 'Pass', 1),
(6, 6, 2, 'A-', 'Pass', 1),
(6, 7, 3, 'B', 'Pass', 1),
(6, 8, 3, 'B+', 'Pass', 1),
(6, 9, 1, 'B+', 'Pass', 1),
(6, 10, 2, 'B+', 'Pass', 1),
(6, 11, 2, 'B+', 'Pass', 1),
(6, 12, 2, 'B', 'Pass', 1),
(6, 13, 2, 'B+', 'Pass', 1),
(6, 14, 3, 'B', 'Pass', 1),
(6, 15, 3, 'B+', 'Pass', 1),
(6, 16, 3, 'B', 'Pass', 1),
(7, 1, 1, 'B+', 'Pass', 1),
(7, 2, 1, 'B', 'Pass', 1),
(7, 3, 1, 'B', 'Pass', 1),
(7, 4, 2, 'B-', 'Pass', 1),
(7, 5, 1, 'B', 'Pass', 1),
(7, 6, 2, 'A-', 'Pass', 1),
(7, 7, 3, 'B', 'Pass', 1),
(7, 8, 3, 'B', 'Pass', 1),
(7, 9, 1, 'B', 'Pass', 1),
(7, 10, 2, 'B', 'Pass', 1),
(7, 11, 2, 'B', 'Pass', 1),
(7, 12, 2, 'B', 'Pass', 1),
(7, 13, 2, 'B', 'Pass', 1),
(7, 14, 3, 'B+', 'Pass', 1),
(7, 15, 3, 'B+', 'Pass', 1),
(7, 16, 3, 'B', 'Pass', 1),
(8, 1, 1, 'B-', 'Pass', 1),
(8, 2, 1, 'B-', 'Pass', 1),
(8, 3, 1, 'B', 'Pass', 1),
(8, 4, 2, 'B-', 'Pass', 1),
(8, 5, 1, 'B-', 'Pass', 1),
(8, 6, 2, 'B', 'Pass', 1),
(8, 7, 3, 'C', 'Pass', 1),
(8, 8, 3, 'C', 'Pass', 1),
(8, 9, 1, 'C', 'Pass', 1),
(8, 10, 2, 'C', 'Pass', 1),
(8, 11, 2, 'C', 'Pass', 1),
(8, 12, 2, 'C', 'Pass', 1),
(8, 13, 2, 'C', 'Pass', 1),
(8, 14, 3, 'C', 'Pass', 1),
(8, 15, 3, 'C', 'Pass', 1),
(8, 16, 3, 'C', 'Pass', 1),
(9, 1, 1, 'A-', 'Pass', 1),
(9, 2, 1, 'B+', 'Pass', 1),
(9, 3, 1, 'A-', 'Pass', 1),
(9, 4, 2, 'A-', 'Pass', 1),
(9, 5, 1, 'B+', 'Pass', 1),
(9, 6, 2, 'B+', 'Pass', 1),
(9, 7, 3, 'B+', 'Pass', 1),
(9, 8, 3, 'A-', 'Pass', 1),
(9, 9, 1, 'A-', 'Pass', 1),
(9, 10, 2, 'B+', 'Pass', 1),
(9, 11, 2, 'A-', 'Pass', 1),
(9, 12, 2, 'B+', 'Pass', 1),
(9, 13, 2, 'A-', 'Pass', 1),
(9, 14, 3, 'B+', 'Pass', 1),
(9, 15, 3, 'E', 'Fail', 1),
(9, 16, 3, 'B+', 'Pass', 1),
(10, 1, 1, 'B+', 'Pass', 1),
(10, 2, 1, 'B-', 'Pass', 1),
(10, 3, 1, 'B-', 'Pass', 1),
(10, 4, 2, 'B-', 'Pass', 1),
(10, 5, 1, 'B', 'Pass', 1),
(10, 6, 2, 'B', 'Pass', 1),
(10, 7, 3, 'C-', 'Pass', 1),
(10, 8, 3, 'C-', 'Pass', 1),
(10, 9, 1, 'C-', 'Pass', 1),
(10, 10, 2, 'C-', 'Pass', 1),
(10, 11, 2, 'C-', 'Pass', 1),
(10, 12, 2, 'C-', 'Pass', 1),
(10, 13, 2, 'C-', 'Pass', 1),
(10, 14, 3, 'C-', 'Pass', 1),
(10, 15, 3, 'C-', 'Pass', 1),
(10, 16, 3, 'C-', 'Pass', 1),
(11, 1, 1, 'A-', 'Pass', 1),
(11, 2, 1, 'A-', 'Pass', 1),
(11, 3, 1, 'A-', 'Pass', 1),
(11, 4, 2, 'A', 'Pass', 1),
(11, 5, 1, 'A-', 'Pass', 1),
(11, 6, 2, 'A-', 'Pass', 1),
(11, 7, 3, 'A-', 'Pass', 1),
(11, 8, 3, 'C+', 'Pass', 1),
(11, 9, 1, 'A-', 'Pass', 1),
(11, 10, 2, 'A-', 'Pass', 1),
(11, 11, 2, 'A-', 'Pass', 1),
(11, 12, 2, 'A-', 'Pass', 1),
(11, 13, 2, 'A', 'Pass', 1),
(11, 14, 3, 'A-', 'Pass', 1),
(11, 15, 3, 'A', 'Pass', 1),
(11, 16, 3, 'A-', 'Pass', 1),
(12, 1, 1, 'B+', 'Pass', 1),
(12, 2, 1, 'B', 'Pass', 1),
(12, 3, 1, 'B', 'Pass', 1),
(12, 4, 2, 'B-', 'Pass', 1),
(12, 5, 1, 'B-', 'Pass', 1),
(12, 6, 2, 'B+', 'Pass', 1),
(12, 7, 3, 'B', 'Pass', 1),
(12, 8, 3, 'B+', 'Pass', 1),
(12, 9, 1, 'B', 'Pass', 1),
(12, 10, 2, 'B', 'Pass', 1),
(12, 11, 2, 'B', 'Pass', 1),
(12, 12, 2, 'B', 'Pass', 1),
(12, 13, 2, 'B', 'Pass', 1),
(12, 14, 3, 'B', 'Pass', 1),
(12, 15, 3, 'B', 'Pass', 1),
(12, 16, 3, 'B+', 'Pass', 1),
(13, 1, 1, 'C+', 'Pass', 1),
(13, 2, 1, 'B-', 'Pass', 1),
(13, 3, 1, 'C+', 'Pass', 1),
(13, 4, 2, 'B-', 'Pass', 1),
(13, 5, 1, 'B-', 'Pass', 1),
(13, 6, 2, 'A-', 'Pass', 1),
(13, 9, 1, 'D', 'Pass', 1),
(13, 10, 2, 'E', 'Pass', 1),
(13, 11, 2, 'D', 'Pass', 1),
(13, 12, 2, 'E', 'Pass', 1),
(13, 13, 2, 'D', 'Pass', 1),
(14, 1, 1, 'B+', 'Pass', 1),
(14, 2, 1, 'B+', 'Pass', 1),
(14, 3, 1, 'B+', 'Pass', 1),
(14, 4, 2, 'A-', 'Pass', 1),
(14, 5, 1, 'B+', 'Pass', 1),
(14, 6, 2, 'B+', 'Pass', 1),
(14, 7, 3, 'B+', 'Pass', 1),
(14, 8, 3, 'A-', 'Pass', 1),
(14, 9, 1, 'A-', 'Pass', 1),
(14, 10, 2, 'B+', 'Pass', 1),
(14, 11, 2, 'A-', 'Pass', 1),
(14, 12, 2, 'B+', 'Pass', 1),
(14, 13, 2, 'A-', 'Pass', 1),
(14, 14, 3, 'B+', 'Pass', 1),
(14, 15, 3, 'A-', 'Pass', 1),
(14, 16, 3, 'B+', 'Pass', 1),
(15, 1, 1, 'B', 'Pass', 1),
(15, 2, 1, 'B+', 'Pass', 1),
(15, 3, 1, 'B', 'Pass', 1),
(15, 4, 2, 'B+', 'Pass', 1),
(15, 5, 1, 'A-', 'Pass', 1),
(15, 6, 2, 'B+', 'Pass', 1),
(15, 7, 3, 'A-', 'Pass', 1),
(15, 8, 3, 'B+', 'Pass', 1),
(15, 9, 1, 'B+', 'Pass', 1),
(15, 10, 2, 'B+', 'Pass', 1),
(15, 11, 2, 'B+', 'Pass', 1),
(15, 12, 2, 'B+', 'Pass', 1),
(15, 13, 2, 'B+', 'Pass', 1),
(15, 14, 3, 'A-', 'Pass', 1),
(15, 15, 3, 'B+', 'Pass', 1),
(15, 16, 3, 'A-', 'Pass', 1),
(16, 1, 1, 'B+', 'Pass', 1),
(16, 2, 1, 'B+', 'Pass', 1),
(16, 3, 1, 'B+', 'Pass', 1),
(16, 4, 2, 'B+', 'Pass', 1),
(16, 5, 1, 'B', 'Pass', 1),
(16, 6, 2, 'B', 'Pass', 1),
(16, 9, 1, 'B+', 'Pass', 1),
(16, 10, 2, 'B+', 'Pass', 1),
(16, 11, 2, 'B+', 'Pass', 1),
(16, 12, 2, 'B+', 'Pass', 1),
(16, 13, 2, 'B+', 'Pass', 1),
(17, 1, 1, 'B-', 'Pass', 1),
(17, 2, 1, 'B-', 'Pass', 1),
(17, 3, 1, 'B-', 'Pass', 1),
(17, 4, 2, 'B+', 'Pass', 1),
(17, 5, 1, 'B', 'Pass', 1),
(17, 6, 2, 'B-', 'Pass', 1),
(17, 9, 1, 'C', 'Pass', 1),
(17, 10, 2, 'C', 'Pass', 1),
(17, 11, 2, 'C', 'Pass', 1),
(17, 12, 2, 'C-', 'Pass', 1),
(17, 13, 2, 'C', 'Pass', 1),
(18, 1, 1, 'A', 'Pass', 1),
(18, 2, 1, 'A-', 'Pass', 1),
(18, 3, 1, 'A', 'Pass', 1),
(18, 4, 2, 'A-', 'Pass', 1),
(18, 5, 1, 'A-', 'Pass', 1),
(18, 6, 2, 'A-', 'Pass', 1),
(18, 9, 1, 'A', 'Pass', 1),
(18, 10, 2, 'A', 'Pass', 1),
(18, 11, 2, 'A', 'Pass', 1),
(18, 12, 2, 'A', 'Pass', 1),
(18, 13, 2, 'A', 'Pass', 1),
(19, 1, 1, 'B', 'Pass', 1),
(19, 2, 1, 'B+', 'Pass', 1),
(19, 3, 1, 'B', 'Pass', 1),
(19, 4, 2, 'B-', 'Pass', 1),
(19, 5, 1, 'B+', 'Pass', 1),
(19, 6, 2, 'B', 'Pass', 1),
(19, 9, 1, 'B', 'Pass', 1),
(19, 10, 2, 'B', 'Pass', 1),
(19, 11, 2, 'B', 'Pass', 1),
(19, 12, 2, 'B', 'Pass', 1),
(19, 13, 2, 'B', 'Pass', 1),
(20, 1, 1, 'C+', 'Pass', 1),
(20, 2, 1, 'C+', 'Pass', 1),
(20, 3, 1, 'C+', 'Pass', 1),
(20, 4, 2, 'B-', 'Pass', 1),
(20, 5, 1, 'B-', 'Pass', 1),
(20, 6, 2, 'B+', 'Pass', 1),
(20, 9, 1, 'D', 'Pass', 1),
(20, 10, 2, 'E', 'Pass', 1),
(20, 11, 2, 'E', 'Pass', 1),
(20, 12, 2, 'D', 'Pass', 1),
(20, 13, 2, 'E', 'Pass', 1),
(21, 1, 1, 'B-', 'Pass', 1),
(21, 2, 1, 'B', 'Pass', 1),
(21, 3, 1, 'B+', 'Pass', 1),
(21, 4, 2, 'B', 'Pass', 1),
(21, 5, 1, 'B+', 'Pass', 1),
(21, 6, 2, 'B+', 'Pass', 1),
(21, 9, 1, 'B+', 'Pass', 1),
(21, 10, 2, 'B', 'Pass', 1),
(21, 11, 2, 'B+', 'Pass', 1),
(21, 12, 2, 'B', 'Pass', 1),
(21, 13, 2, 'B+', 'Pass', 1),
(22, 1, 1, 'B+', 'Pass', 1),
(22, 2, 1, 'A-', 'Pass', 1),
(22, 3, 1, 'A-', 'Pass', 1),
(22, 4, 2, 'A-', 'Pass', 1),
(22, 5, 1, 'A-', 'Pass', 1),
(22, 6, 2, 'A', 'Pass', 1),
(22, 9, 1, 'A-', 'Pass', 1),
(22, 10, 2, 'A-', 'Pass', 1),
(22, 11, 2, 'A-', 'Pass', 1),
(22, 12, 2, 'A-', 'Pass', 1),
(22, 13, 2, 'A-', 'Pass', 1),
(23, 1, 1, 'B', 'Pass', 1),
(23, 2, 1, 'B+', 'Pass', 1),
(23, 3, 1, 'B+', 'Pass', 1),
(23, 4, 2, 'B+', 'Pass', 1),
(23, 5, 1, 'B+', 'Pass', 1),
(23, 6, 2, 'B', 'Pass', 1),
(23, 9, 1, 'B+', 'Pass', 1),
(23, 10, 2, 'B+', 'Pass', 1),
(23, 11, 2, 'B+', 'Pass', 1),
(23, 12, 2, 'B+', 'Pass', 1),
(23, 13, 2, 'B+', 'Pass', 1),
(24, 1, 1, 'B-', 'Pass', 1),
(24, 2, 1, 'B-', 'Pass', 1),
(24, 3, 1, 'B', 'Pass', 1),
(24, 4, 2, 'B', 'Pass', 1),
(24, 5, 1, 'B-', 'Pass', 1),
(24, 6, 2, 'B-', 'Pass', 1),
(24, 9, 1, 'C-', 'Pass', 1),
(24, 10, 2, 'D+', 'Pass', 1),
(24, 11, 2, 'C-', 'Pass', 1),
(24, 12, 2, 'D+', 'Pass', 1),
(24, 13, 2, 'C-', 'Pass', 1),
(25, 1, 1, 'A-', 'Pass', 1),
(25, 2, 1, 'B+', 'Pass', 1),
(25, 3, 1, 'A-', 'Pass', 1),
(25, 4, 2, 'A-', 'Pass', 1),
(25, 5, 1, 'A-', 'Pass', 1),
(25, 6, 2, 'B-', 'Pass', 1),
(25, 9, 1, 'A-', 'Pass', 1),
(25, 10, 2, 'A-', 'Pass', 1),
(25, 11, 2, 'A-', 'Pass', 1),
(25, 12, 2, 'A-', 'Pass', 1),
(25, 13, 2, 'A-', 'Pass', 1),
(26, 1, 1, 'B-', 'Pass', 1),
(26, 2, 1, 'B', 'Pass', 1),
(26, 3, 1, 'B-', 'Pass', 1),
(26, 5, 1, 'B+', 'Pass', 1),
(26, 9, 1, 'B', 'Pass', 1),
(27, 1, 1, 'B', 'Pass', 1),
(27, 2, 1, 'B-', 'Pass', 1),
(27, 3, 1, 'B+', 'Pass', 1),
(27, 5, 1, 'B', 'Pass', 1),
(27, 9, 1, 'B+', 'Pass', 1),
(28, 1, 1, 'B-', 'Pass', 1),
(28, 2, 1, 'B', 'Pass', 1),
(28, 3, 1, 'B', 'Pass', 1),
(28, 5, 1, 'B', 'Pass', 1),
(28, 9, 1, 'C-', 'Pass', 1),
(29, 1, 1, 'B+', 'Pass', 1),
(29, 2, 1, 'A-', 'Pass', 1),
(29, 3, 1, 'B+', 'Pass', 1),
(29, 5, 1, 'B+', 'Pass', 1),
(29, 9, 1, 'B+', 'Pass', 1),
(30, 1, 1, 'B+', 'Pass', 1),
(30, 2, 1, 'B+', 'Pass', 1),
(30, 3, 1, 'A', 'Pass', 1),
(30, 5, 1, 'A-', 'Pass', 1),
(30, 9, 1, 'A-', 'Pass', 1),
(31, 1, 1, 'C+', 'Pass', 1),
(31, 2, 1, 'B-', 'Pass', 1),
(31, 3, 1, 'B-', 'Pass', 1),
(31, 5, 1, 'B-', 'Pass', 1),
(31, 9, 1, 'B-', 'Pass', 1),
(32, 1, 1, 'B', 'Pass', 1),
(32, 2, 1, 'B+', 'Pass', 1),
(32, 3, 1, 'B', 'Pass', 1),
(32, 5, 1, 'B+', 'Pass', 1),
(32, 9, 1, 'B+', 'Pass', 1),
(33, 1, 1, 'A-', 'Pass', 1),
(33, 2, 1, 'A', 'Pass', 1),
(33, 3, 1, 'A-', 'Pass', 1),
(33, 5, 1, 'A', 'Pass', 1),
(33, 9, 1, 'A-', 'Pass', 1),
(34, 1, 1, 'B+', 'Pass', 1),
(34, 2, 1, 'B+', 'Pass', 1),
(34, 3, 1, 'B', 'Pass', 1),
(34, 5, 1, 'B+', 'Pass', 1),
(34, 9, 1, 'B+', 'Pass', 1),
(35, 1, 1, 'B-', 'Pass', 1),
(35, 2, 1, 'B', 'Pass', 1),
(35, 3, 1, 'B', 'Pass', 1),
(35, 5, 1, 'B-', 'Pass', 1),
(35, 9, 1, 'B-', 'Pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `credit_hours` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `subject_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `credit_hours`, `program_id`, `semester_id`, `subject_code`) VALUES
(1, 'Introduction to Programming', 3, 1, 1, 'DITP1113'),
(2, 'Discrete Mathematics', 3, 1, 1, 'DITI1243'),
(3, 'Computer Organization', 3, 1, 1, 'DITS1133'),
(4, 'Data Structures and Algorithms', 3, 1, 2, 'DITP1333'),
(5, 'Database Systems', 3, 1, 1, 'DITM2113'),
(6, 'Object-Oriented Programming', 3, 1, 2, 'DITP3113'),
(7, 'Operating Systems', 3, 1, 3, 'DITS2213'),
(8, 'Computer Networks', 3, 1, 3, 'DITS2313'),
(9, 'Multimedia System', 3, 1, 1, 'DITM2113'),
(10, 'English for Effective Communication', 2, 1, 2, 'DLLW2122'),
(11, 'Calculus and Numerical Methods', 3, 1, 2, 'DITI1233'),
(12, 'Human Computer Interaction', 3, 1, 2, 'DITM1313'),
(13, 'System Analysis and Design', 3, 1, 2, 'DITP2213'),
(14, 'English for Marketability', 2, 1, 3, 'DLLW3132'),
(15, 'Statistic and Probability', 3, 1, 3, 'DITI2233'),
(16, 'Computer Security', 3, 1, 3, 'DITS2413'),
(17, 'System Development Workshop', 4, 1, 4, 'DITU3934'),
(18, 'Web Programming', 3, 1, 4, 'DITM2123'),
(19, 'Event-driven Programming', 3, 1, 4, 'DITP2123'),
(20, 'Local Area Network', 3, 1, 4, 'DITS3323'),
(21, 'Software Engineering', 3, 1, 4, 'DITP3213'),
(22, 'Diploma Project', 4, 1, 5, 'DITU3964'),
(23, 'Applied Artificial Intelligence', 3, 1, 5, 'DITI3133');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login_id`, `name`, `email`, `password`, `profile_picture`, `address`, `phone_number`) VALUES
(1, 'A03241011', 'Abdullah Hakim Bin Mohd Salleh', 'hakim.eze@gmail.com', '$2y$10$rDjjCU7Dq8ePUbAMHqSZD.PyyQMzp9MSW82YWQB84KrmBvCRTj6pG', '../assets/imgs/profile/img_6a44a3084d18c_hakim.jpeg', 'No. 12, Jalan Padungan, 93100 Kuching, Sarawak', '012-3456701'),
(2, 'A03241012', 'Nurul Aina binti Hasrul', 'nurulaina@dsapts.com', '$2y$10$celu.ETCC2OIspsT0ClLqeeYWZ/wTumsVmo6DPbH97zsRfQLqx90C', NULL, 'No. 5, Lorong Song 2, 93350 Kuching, Sarawak', '013-2345702'),
(3, 'M1113563', 'Elvin Teh Jie Ming', 'elvintehh@gmail.com', '$2y$10$gFQP0dUx6FXFy8674t2MouMwAjer7fZz0PVa6i88JVtcGVXziiYcy', '../assets/imgs/profile/img_6a44a2ed9fb62_elvin.jpg', '23, Jalan SS2/24, 47300 Petaling Jaya, Selangor', '016-7894703'),
(4, 'M1113564', 'Siti Nabilah binti Osman', 'sitinabilah@dsapts.com', '$2y$10$Pq0AKYVu4i93u0FqE1KY2OMDokEGVkOr9sRPfI/tAfo.DOQZt1Ft.', NULL, 'No. 8, Jalan Tun Razak, 50400 Kuala Lumpur', '017-6543704'),
(5, 'M1113565', 'Hairul Azwan bin Mohd Noor', 'hairulazwan@dsapts.com', '$2y$10$c3/o2JmiBuZF9cHgSin7CunuiSck11FN7ho9e8iXtb5QbmTXvGPvu', NULL, '17, Jalan Permas Jaya, 81750 Johor Bahru, Johor', '019-8765705'),
(6, 'D32155320', 'Zulkiflie Bin Muhamad Zunaini', 'khalishimran48@gmail.com', '$2y$10$.NjrsgzjU1lX09pAEpgxGOBIVxJDx.SAXeXm5GqTl1SCd4RPXOx9q', '../assets/imgs/profile/img_6a44a331af1ed_izul.jpeg', 'No. 3, Jalan Burma, 10350 Georgetown, Penang', '014-3216706'),
(7, 'D32155321', 'Nur Syafiqah binti Kamal', 'nursyafiqah@dsapts.com', '$2y$10$RzCRMTETCWqRlvyr7B9Kk.AiLaEH2amvGRVCZ/rgE2DGmwEcJ3X/G', NULL, '45, Jalan Gaya, 88000 Kota Kinabalu, Sabah', '011-23456707'),
(8, 'D32155322', 'Joshua Ong Wei Hao', 'joshuaong@dsapts.com', '$2y$10$9GN5DGFY28H/S77ONbN7/.C.R4qlIF8vd9u40mWxiqNvhcZFosgzm', NULL, 'No. 9, Jalan Bukit Bintang, 55100 Kuala Lumpur', '012-9876708'),
(9, 'D32155323', 'Mohamad Aliff bin Suhaimi', 'mohadaliff@dsapts.com', '$2y$10$Zsv8ZrRIS9y6SarvIGjrAO6WhPDerjf9MRG0dymCAfjQ/47XDVKBC', NULL, '21, Jalan Tuanku Abdul Rahman, 80000 Johor Bahru, Johor', '013-4567709'),
(10, 'D32155324', 'Fatin Athirah binti Zainol', 'fatinathirah@dsapts.com', '$2y$10$cMCAXNFgt5GJPJJSELSNn.GVC85xsog5YKk73oawQuONWbQ4oaqKy', NULL, 'No. 14, Jalan Stutong, 93350 Kuching, Sarawak', '016-2345710'),
(11, 'D32155325', 'Hafizuddin bin Abdul Ghani', 'hafizuddin@dsapts.com', '$2y$10$bpVoyIqcay6b99P3xCiUqO4YU4joCB5oTbPR1hmZPH.Fs1DTib5/e', NULL, '6, Jalan Datuk Keramat, 54000 Kuala Lumpur', '017-8901711'),
(12, 'D32155326', 'Liyana Damia binti Mazlan', 'liyanadamia@dsapts.com', '$2y$10$8mODDTQj8o.BF7f6tTVuouSFvsuPC.PLpqvtFjKfcW7s.PbBYliiC', NULL, 'No. 18, Jalan Ipoh, 51200 Kuala Lumpur', '019-3456712'),
(13, 'D32155327', 'Izzatul Husna binti Nordin', 'izzatulhusna@dsapts.com', '$2y$10$ZEwovhCBvC7n5EYwK4Dox.07KN9zGv7lkHHGX1srZB2rTNEYNzdj.', NULL, '33, Jalan Bandar, 41000 Klang, Selangor', '014-7890713'),
(14, 'D32155328', 'Muhamad Azri bin Saiful', 'muhamadazri@dsapts.com', '$2y$10$21LZm4dheowjZxDLNXgH/OwjZ304RoR4DvJBZGeUeMTA9Z1fUOTvq', NULL, 'No. 2, Jalan Kapitan, 89000 Kudat, Sabah', '011-65432714'),
(15, 'D32155329', 'Noor Farahin binti Ismail', 'noorfarahin@dsapts.com', '$2y$10$GCDrylLiJjobiB7OCl9V1eIY52OITJhVHmRSp6P36cu1UG5qU8V8K', NULL, '7, Jalan Tabuan, 93350 Kuching, Sarawak', '012-1234715'),
(16, 'D32155330', 'Khairul Aiman bin Yusof', 'khairulaiman@dsapts.com', '$2y$10$rVz/L9Ftomota5W5frBwb.XzOLiKo8MFL0Ho1SRRgSsuVrWeox82C', NULL, 'No. 11, Jalan Sungai Besi, 57100 Kuala Lumpur', '013-5678716'),
(17, 'D32155331', 'Sharifah Alia binti Syed Ali', 'sharifhalia@dsapts.com', '$2y$10$.g6bRtt64EQcA3phWa/GSO.sGDiSuRIHFg2.iiK21AwPgwFK7L8SO', NULL, '29, Jalan Air Itam, 11500 Penang', '016-9012717'),
(18, 'D32155332', 'Zulfikri bin Mohd Zain', 'zulfikri@dsapts.com', '$2y$10$IUrdIKm/rIKgKg2fOm0dyuuitvX44Sx56izWLS5amtHJyvBdv0I06', NULL, 'No. 4, Jalan Matang, 93050 Kuching, Sarawak', '017-3456718'),
(19, 'D32155333', 'Amira Batrisyia binti Rodzi', 'amirabatrisyia@dsapts.com', '$2y$10$3jXCsrARANfSU.4o.gRp5.4aZkJ154KlAOlG8oFAMF/Ks8EGRjZEe', NULL, '16, Jalan Klebang, 31200 Ipoh, Perak', '019-7890719'),
(20, 'D32155334', 'Hafeez Danial bin Jamaludin', 'hafeeezdanial@dsapts.com', '$2y$10$H5qqI5fCiMy1cbHiYfh6buHsymGybrbGIiI3jald/IkxMU8Rm33Q.', NULL, 'No. 10, Jalan Tebrau, 80300 Johor Bahru, Johor', '014-2345720'),
(21, 'D32155335', 'Nurul Natasya binti Rahmat', 'nurulnatasya@dsapts.com', '$2y$10$kiHTvVSi1NZtZpvbMvk1xe/9pQwwEksLfw//K6B3IKzQcRClT/0Vm', NULL, '25, Jalan Damansara, 60000 Kuala Lumpur', '011-98765721'),
(22, 'D32155336', 'Aqil Ariff bin Hamdan', 'aqilariff@dsapts.com', '$2y$10$GH2U/K1aBZp9g4QSO8JiiOHDDKbOC7qi5H7NNmEc3YlMlcMBuF5Cq', NULL, 'No. 13, Jalan Bintawa, 93450 Kuching, Sarawak', '012-6789722'),
(23, 'D32155337', 'Farhana Izzati binti Ghazali', 'farhanaizzati@dsapts.com', '$2y$10$5lA1ygACXCXkTRhsOcAEReXCBHK8WIyNAiS0UFJlhse7MRNrf/yMK', NULL, '19, Jalan Larkin, 80350 Johor Bahru, Johor', '013-0123723'),
(24, 'D32155338', 'Ridhwan Farhan bin Lokman', 'ridhwanfarhan@dsapts.com', '$2y$10$t8c0xdrg2H9/99VGk4prGu2q1Mq9uJOzg0d1K9NWFJr6Jugkfa4QK', NULL, 'No. 6, Jalan Tuaran, 88450 Kota Kinabalu, Sabah', '016-4567724'),
(25, 'D32155339', 'Syadza Adriana binti Sabri', 'syadzaadriana@dsapts.com', '$2y$10$pw7yF8DMW4XmoRxySGLz4u2Ew4.hIIMR8UYS5EW0sUoeIkOMw7o36', NULL, '31, Jalan Bukit Mata, 93100 Kuching, Sarawak', '017-8901725'),
(26, 'D32155340', 'Harith Izzwan bin Shafie', 'harithizzwan@dsapts.com', '$2y$10$soVyRTH7vaQGXbxOn/X/deyoEnMXN861tcAsFbrfhOtlHvIpLKZs.', NULL, 'No. 12, Jalan Merdeka, 75000 Melaka, Melaka', '012-3456781'),
(27, 'D32155341', 'Nadhirah Insyirah binti Aziz', 'nadhirahinsyirah@dsapts.com', '$2y$10$lt7ESj/AV0eZYati7cSG8uIQYSOFMRz4wHk7JgdETMzQsdJ1uiwdK', NULL, 'No. 45, Jalan Setia, 81300 Skudai, Johor', '013-4567892'),
(28, 'D32155342', 'Syazwan Afiq bin Ramdan', 'syazwanafiq@dsapts.com', '$2y$10$7L8efIHWzqxwN9SS.Kh7EubjVfzQn7K9kRmQD8TT3pEbmQ5p0V0G.', NULL, 'No. 8, Jalan Seri Impian, 14000 Bukit Mertajam, Penang', '014-5678903'),
(29, 'D32155343', 'Adlina Safiya binti Rosdi', 'adlinasafiya@dsapts.com', '$2y$10$n.ES15jTx3wkiFvh04e2FO.C9pxBdbuGkPil0L1Y1y9gpqoxNb63C', NULL, 'No. 22, Jalan Ampang, 50450 Kuala Lumpur', '010-6789014'),
(30, 'D32155344', 'Mukhriz Ikhwan bin Yusri', 'mukhrizikhwan@dsapts.com', '$2y$10$kfmbDX9rIRc1xKfzwDaFf.sA6lj5IH1TioI8J/x9cceT6A09hdiEK', NULL, 'No. 9, Jalan Indah, 43000 Kajang, Selangor', '011-7890125'),
(31, 'D32155345', 'Nabilah Husna binti Razif', 'nabilahhusna@dsapts.com', '$2y$10$0xLKFv94qOdmfOucddPhaO3tc3Np/ahUJxkx2qjQzoyDWPRjS/VL.', NULL, 'No. 17, Jalan Putra, 01000 Kangar, Perlis', '012-8901236'),
(32, 'D32155346', 'Azfar Hakimi bin Daud', 'azfarhakimi@dsapts.com', '$2y$10$HY3so2W7VHiuBFkH8l9WUeKJI9HhQFj8gEFE0A4f5WtnhMTF477X6', NULL, 'No. 3, Jalan Desa, 96000 Sibu, Sarawak', '013-9012347'),
(33, 'D32155347', 'Aisyah Nur binti Sulaiman', 'aisyahnur@dsapts.com', '$2y$10$zUeAWHaDd29061Av9k8ofu1eK5uDFXXjozhX9fae1WBOw.5qcGDge', NULL, 'No. 55, Jalan Damai, 88300 Kota Kinabalu, Sabah', '014-0123458'),
(34, 'D32155348', 'Hazwan Syukri bin Mustafa', 'hazwansyukri@dsapts.com', '$2y$10$Fm21nghpNyvsr7jZRHGJZ.ywxLwXU/TBvSs3zATrbXN8khan7CU6C', NULL, 'No. 28, Jalan Harmoni, 15200 Kota Bharu, Kelantan', '016-1234569'),
(35, 'D32155349', 'Puteri Balqis binti Zainal', 'puteribalqis@dsapts.com', '$2y$10$HpaufbZyOuH1XBX/ildFy.Zjmz.ZPL8n8P.p5yzw7KegGarug6xL.', NULL, 'No. 14, Jalan Permai, 26600 Pekan, Pahang', '017-2345670');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alert_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`user_id`,`subject_id`,`semester_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `fk_advisor_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alert`
--
ALTER TABLE `alert`
  ADD CONSTRAINT `alert_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_advisor` FOREIGN KEY (`advisor_id`) REFERENCES `advisor` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_program` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_student_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student` (`user_id`),
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `student_subject_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`),
  ADD CONSTRAINT `subject_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
