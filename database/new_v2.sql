-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 03:51 PM
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
(1, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-01-15', 8),
(2, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-01-15', 10),
(3, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-01-15', 13),
(4, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-01-15', 17),
(5, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-01-15', 20),
(6, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-01-15', 24),
(7, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-01-15', 28),
(8, 'Your current academic standing is Average. Improvement is encouraged next semester.', 'Academic Standing Notice', '2026-01-15', 31),
(9, 'Your CGPA has fallen below the recommended threshold. Please consult your advisor.', 'CGPA Warning', '2026-01-15', 35);

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
(1, 'Diploma of Computer Science', 5, 100);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL,
  `semester_type` varchar(20) DEFAULT NULL,
  `credit_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`, `semester_type`, `credit_hours`) VALUES
(1, 'Semester 1', 'Normal', 10),
(2, 'Semester 2', 'Normal', 10),
(3, 'Semester 3', 'Normal', 6),
(4, 'Semester 4', 'Normal', 0);

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
  `academic_standing` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`user_id`, `program_id`, `advisor_id`, `CGPA`, `muet_status`, `total_credit_taken`, `academic_standing`) VALUES
(6, 1, 3, 3.20, 'Pass', 20, 'Good'),
(7, 1, 3, 3.10, 'Pass', 20, 'Good'),
(8, 1, 3, 2.80, 'Pass', 20, 'Average'),
(9, 1, 3, 3.50, 'Pass', 20, 'Good'),
(10, 1, 3, 2.90, 'Pass', 20, 'Average'),
(11, 1, 3, 3.60, 'Pass', 26, 'Excellent'),
(12, 1, 3, 3.00, 'Pass', 20, 'Good'),
(13, 1, 3, 2.70, 'Pass', 20, 'Average'),
(14, 1, 3, 3.40, 'Pass', 20, 'Good'),
(15, 1, 3, 3.30, 'Pass', 20, 'Good'),
(16, 1, 4, 3.20, 'Pass', 20, 'Good'),
(17, 1, 4, 2.90, 'Pass', 20, 'Average'),
(18, 1, 4, 3.80, 'Pass', 28, 'Excellent'),
(19, 1, 4, 3.00, 'Pass', 20, 'Good'),
(20, 1, 4, 2.60, 'Pass', 20, 'Average'),
(21, 1, 4, 3.10, 'Pass', 20, 'Good'),
(22, 1, 4, 3.70, 'Pass', 20, 'Excellent'),
(23, 1, 4, 3.20, 'Pass', 20, 'Good'),
(24, 1, 4, 2.80, 'Pass', 20, 'Average'),
(25, 1, 4, 3.50, 'Pass', 20, 'Good'),
(26, 1, 5, 3.00, 'Pass', 20, 'Good'),
(27, 1, 5, 3.10, 'Pass', 20, 'Good'),
(28, 1, 5, 2.90, 'Pass', 20, 'Average'),
(29, 1, 5, 3.40, 'Pass', 20, 'Good'),
(30, 1, 5, 3.60, 'Pass', 20, 'Excellent'),
(31, 1, 5, 2.70, 'Pass', 20, 'Average'),
(32, 1, 5, 3.20, 'Pass', 20, 'Good'),
(33, 1, 5, 3.80, 'Pass', 25, 'Excellent'),
(34, 1, 5, 3.30, 'Pass', 20, 'Good'),
(35, 1, 5, 2.80, 'Pass', 20, 'Average');

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
(6, 5, 2, 'B+', 'Pass', 1),
(6, 6, 2, 'A-', 'Pass', 1),
(7, 1, 1, 'B+', 'Pass', 1),
(7, 2, 1, 'B', 'Pass', 1),
(7, 3, 1, 'B', 'Pass', 1),
(7, 4, 2, 'B-', 'Pass', 1),
(7, 5, 2, 'B', 'Pass', 1),
(7, 6, 2, 'A-', 'Pass', 1),
(8, 1, 1, 'B-', 'Pass', 1),
(8, 2, 1, 'B-', 'Pass', 1),
(8, 3, 1, 'B', 'Pass', 1),
(8, 4, 2, 'B-', 'Pass', 1),
(8, 5, 2, 'B-', 'Pass', 1),
(8, 6, 2, 'B', 'Pass', 1),
(9, 1, 1, 'A-', 'Pass', 1),
(9, 2, 1, 'B+', 'Pass', 1),
(9, 3, 1, 'A-', 'Pass', 1),
(9, 4, 2, 'A-', 'Pass', 1),
(9, 5, 2, 'B+', 'Pass', 1),
(9, 6, 2, 'B+', 'Pass', 1),
(10, 1, 1, 'B+', 'Pass', 1),
(10, 2, 1, 'B-', 'Pass', 1),
(10, 3, 1, 'B-', 'Pass', 1),
(10, 4, 2, 'B-', 'Pass', 1),
(10, 5, 2, 'B', 'Pass', 1),
(10, 6, 2, 'B', 'Pass', 1),
(11, 1, 1, 'A-', 'Pass', 1),
(11, 2, 1, 'A-', 'Pass', 1),
(11, 3, 1, 'A-', 'Pass', 1),
(11, 4, 2, 'A', 'Pass', 1),
(11, 5, 2, 'A-', 'Pass', 1),
(11, 6, 2, 'A-', 'Pass', 1),
(11, 7, 3, 'A-', 'Pass', 1),
(11, 8, 3, 'C+', 'Pass', 1),
(12, 1, 1, 'B+', 'Pass', 1),
(12, 2, 1, 'B', 'Pass', 1),
(12, 3, 1, 'B', 'Pass', 1),
(12, 4, 2, 'B-', 'Pass', 1),
(12, 5, 2, 'B-', 'Pass', 1),
(12, 6, 2, 'B+', 'Pass', 1),
(13, 1, 1, 'C+', 'Pass', 1),
(13, 2, 1, 'B-', 'Pass', 1),
(13, 3, 1, 'C+', 'Pass', 1),
(13, 4, 2, 'B-', 'Pass', 1),
(13, 5, 2, 'B-', 'Pass', 1),
(13, 6, 2, 'A-', 'Pass', 1),
(14, 1, 1, 'B+', 'Pass', 1),
(14, 2, 1, 'B+', 'Pass', 1),
(14, 3, 1, 'B+', 'Pass', 1),
(14, 4, 2, 'A-', 'Pass', 1),
(14, 5, 2, 'B+', 'Pass', 1),
(14, 6, 2, 'B+', 'Pass', 1),
(15, 1, 1, 'B', 'Pass', 1),
(15, 2, 1, 'B+', 'Pass', 1),
(15, 3, 1, 'B', 'Pass', 1),
(15, 4, 2, 'B+', 'Pass', 1),
(15, 5, 2, 'A-', 'Pass', 1),
(15, 6, 2, 'B+', 'Pass', 1),
(16, 1, 1, 'B+', 'Pass', 1),
(16, 2, 1, 'B+', 'Pass', 1),
(16, 3, 1, 'B+', 'Pass', 1),
(16, 4, 2, 'B+', 'Pass', 1),
(16, 5, 2, 'B', 'Pass', 1),
(16, 6, 2, 'B', 'Pass', 1),
(17, 1, 1, 'B-', 'Pass', 1),
(17, 2, 1, 'B-', 'Pass', 1),
(17, 3, 1, 'B-', 'Pass', 1),
(17, 4, 2, 'B+', 'Pass', 1),
(17, 5, 2, 'B', 'Pass', 1),
(17, 6, 2, 'B-', 'Pass', 1),
(18, 1, 1, 'A', 'Pass', 1),
(18, 2, 1, 'A-', 'Pass', 1),
(18, 3, 1, 'A', 'Pass', 1),
(18, 4, 2, 'A-', 'Pass', 1),
(18, 5, 2, 'A-', 'Pass', 1),
(18, 6, 2, 'A-', 'Pass', 1),
(18, 7, 3, 'A-', 'Pass', 1),
(18, 8, 3, 'A-', 'Pass', 1),
(19, 1, 1, 'B', 'Pass', 1),
(19, 2, 1, 'B+', 'Pass', 1),
(19, 3, 1, 'B', 'Pass', 1),
(19, 4, 2, 'B-', 'Pass', 1),
(19, 5, 2, 'B+', 'Pass', 1),
(19, 6, 2, 'B', 'Pass', 1),
(20, 1, 1, 'C+', 'Pass', 1),
(20, 2, 1, 'C+', 'Pass', 1),
(20, 3, 1, 'C+', 'Pass', 1),
(20, 4, 2, 'B-', 'Pass', 1),
(20, 5, 2, 'B-', 'Pass', 1),
(20, 6, 2, 'B+', 'Pass', 1),
(21, 1, 1, 'B-', 'Pass', 1),
(21, 2, 1, 'B', 'Pass', 1),
(21, 3, 1, 'B+', 'Pass', 1),
(21, 4, 2, 'B', 'Pass', 1),
(21, 5, 2, 'B+', 'Pass', 1),
(21, 6, 2, 'B+', 'Pass', 1),
(22, 1, 1, 'B+', 'Pass', 1),
(22, 2, 1, 'A-', 'Pass', 1),
(22, 3, 1, 'A-', 'Pass', 1),
(22, 4, 2, 'A-', 'Pass', 1),
(22, 5, 2, 'A-', 'Pass', 1),
(22, 6, 2, 'A', 'Pass', 1),
(23, 1, 1, 'B', 'Pass', 1),
(23, 2, 1, 'B+', 'Pass', 1),
(23, 3, 1, 'B+', 'Pass', 1),
(23, 4, 2, 'B+', 'Pass', 1),
(23, 5, 2, 'B+', 'Pass', 1),
(23, 6, 2, 'B', 'Pass', 1),
(24, 1, 1, 'B-', 'Pass', 1),
(24, 2, 1, 'B-', 'Pass', 1),
(24, 3, 1, 'B', 'Pass', 1),
(24, 4, 2, 'B', 'Pass', 1),
(24, 5, 2, 'B-', 'Pass', 1),
(24, 6, 2, 'B-', 'Pass', 1),
(25, 1, 1, 'A-', 'Pass', 1),
(25, 2, 1, 'B+', 'Pass', 1),
(25, 3, 1, 'A-', 'Pass', 1),
(25, 4, 2, 'A-', 'Pass', 1),
(25, 5, 2, 'A-', 'Pass', 1),
(25, 6, 2, 'B-', 'Pass', 1),
(26, 1, 1, 'B-', 'Pass', 1),
(26, 2, 1, 'B', 'Pass', 1),
(26, 3, 1, 'B-', 'Pass', 1),
(26, 4, 2, 'B+', 'Pass', 1),
(26, 5, 2, 'B+', 'Pass', 1),
(26, 6, 2, 'B+', 'Pass', 1),
(27, 1, 1, 'B', 'Pass', 1),
(27, 2, 1, 'B-', 'Pass', 1),
(27, 3, 1, 'B+', 'Pass', 1),
(27, 4, 2, 'B+', 'Pass', 1),
(27, 5, 2, 'B', 'Pass', 1),
(27, 6, 2, 'B', 'Pass', 1),
(28, 1, 1, 'B-', 'Pass', 1),
(28, 2, 1, 'B', 'Pass', 1),
(28, 3, 1, 'B', 'Pass', 1),
(28, 4, 2, 'B-', 'Pass', 1),
(28, 5, 2, 'B', 'Pass', 1),
(28, 6, 2, 'B', 'Pass', 1),
(29, 1, 1, 'B+', 'Pass', 1),
(29, 2, 1, 'A-', 'Pass', 1),
(29, 3, 1, 'B+', 'Pass', 1),
(29, 4, 2, 'B+', 'Pass', 1),
(29, 5, 2, 'B+', 'Pass', 1),
(29, 6, 2, 'A-', 'Pass', 1),
(30, 1, 1, 'B+', 'Pass', 1),
(30, 2, 1, 'B+', 'Pass', 1),
(30, 3, 1, 'A', 'Pass', 1),
(30, 4, 2, 'A-', 'Pass', 1),
(30, 5, 2, 'A-', 'Pass', 1),
(30, 6, 2, 'A-', 'Pass', 1),
(31, 1, 1, 'C+', 'Pass', 1),
(31, 2, 1, 'B-', 'Pass', 1),
(31, 3, 1, 'B-', 'Pass', 1),
(31, 4, 2, 'B-', 'Pass', 1),
(31, 5, 2, 'B-', 'Pass', 1),
(31, 6, 2, 'B', 'Pass', 1),
(32, 1, 1, 'B', 'Pass', 1),
(32, 2, 1, 'B+', 'Pass', 1),
(32, 3, 1, 'B', 'Pass', 1),
(32, 4, 2, 'B+', 'Pass', 1),
(32, 5, 2, 'B+', 'Pass', 1),
(32, 6, 2, 'B+', 'Pass', 1),
(33, 1, 1, 'A-', 'Pass', 1),
(33, 2, 1, 'A', 'Pass', 1),
(33, 3, 1, 'A-', 'Pass', 1),
(33, 4, 2, 'A-', 'Pass', 1),
(33, 5, 2, 'A', 'Pass', 1),
(33, 6, 2, 'A-', 'Pass', 1),
(33, 7, 3, 'A-', 'Pass', 1),
(34, 1, 1, 'B+', 'Pass', 1),
(34, 2, 1, 'B+', 'Pass', 1),
(34, 3, 1, 'B', 'Pass', 1),
(34, 4, 2, 'B', 'Pass', 1),
(34, 5, 2, 'B+', 'Pass', 1),
(34, 6, 2, 'A', 'Pass', 1),
(35, 1, 1, 'B-', 'Pass', 1),
(35, 2, 1, 'B', 'Pass', 1),
(35, 3, 1, 'B', 'Pass', 1),
(35, 4, 2, 'B', 'Pass', 1),
(35, 5, 2, 'B-', 'Pass', 1),
(35, 6, 2, 'C+', 'Pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `credit_hours` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `credit_hours`, `program_id`, `semester_id`) VALUES
(1, 'Introduction to Programming', 3, 1, 1),
(2, 'Discrete Mathematics', 3, 1, 1),
(3, 'Computer Organization', 4, 1, 1),
(4, 'Data Structures and Algorithms', 4, 1, 2),
(5, 'Database Systems', 3, 1, 2),
(6, 'Object-Oriented Programming', 3, 1, 2),
(7, 'Operating Systems', 3, 1, 3),
(8, 'Computer Networks', 3, 1, 3);

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
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login_id`, `name`, `email`, `password`, `profile_picture`) VALUES
(1, 'A03241011', 'Admin 1', 'admin1@dsapts.com', 'admin123', NULL),
(2, 'A03241012', 'Admin 2', 'admin2@dsapts.com', 'admin123', NULL),
(3, 'M1113563', 'Advisor 3', 'advisor3@dsapts.com', 'advisor123', NULL),
(4, 'M1113564', 'Advisor 4', 'advisor4@dsapts.com', 'advisor123', NULL),
(5, 'M1113565', 'Advisor 5', 'advisor5@dsapts.com', 'advisor123', NULL),
(6, 'D32155320', 'Student 1', 'student1@dsapts.com', 'student123', NULL),
(7, 'D32155321', 'Student 2', 'student2@dsapts.com', 'student123', NULL),
(8, 'D32155322', 'Student 3', 'student3@dsapts.com', 'student123', NULL),
(9, 'D32155323', 'Student 4', 'student4@dsapts.com', 'student123', NULL),
(10, 'D32155324', 'Student 5', 'student5@dsapts.com', 'student123', NULL),
(11, 'D32155325', 'Student 6', 'student6@dsapts.com', 'student123', NULL),
(12, 'D32155326', 'Student 7', 'student7@dsapts.com', 'student123', NULL),
(13, 'D32155327', 'Student 8', 'student8@dsapts.com', 'student123', NULL),
(14, 'D32155328', 'Student 9', 'student9@dsapts.com', 'student123', NULL),
(15, 'D32155329', 'Student 10', 'student10@dsapts.com', 'student123', NULL),
(16, 'D32155330', 'Student 11', 'student11@dsapts.com', 'student123', NULL),
(17, 'D32155331', 'Student 12', 'student12@dsapts.com', 'student123', NULL),
(18, 'D32155332', 'Student 13', 'student13@dsapts.com', 'student123', NULL),
(19, 'D32155333', 'Student 14', 'student14@dsapts.com', 'student123', NULL),
(20, 'D32155334', 'Student 15', 'student15@dsapts.com', 'student123', NULL),
(21, 'D32155335', 'Student 16', 'student16@dsapts.com', 'student123', NULL),
(22, 'D32155336', 'Student 17', 'student17@dsapts.com', 'student123', NULL),
(23, 'D32155337', 'Student 18', 'student18@dsapts.com', 'student123', NULL),
(24, 'D32155338', 'Student 19', 'student19@dsapts.com', 'student123', NULL),
(25, 'D32155339', 'Student 20', 'student20@dsapts.com', 'student123', NULL),
(26, 'D32155340', 'Student 21', 'student21@dsapts.com', 'student123', NULL),
(27, 'D32155341', 'Student 22', 'student22@dsapts.com', 'student123', NULL),
(28, 'D32155342', 'Student 23', 'student23@dsapts.com', 'student123', NULL),
(29, 'D32155343', 'Student 24', 'student24@dsapts.com', 'student123', NULL),
(30, 'D32155344', 'Student 25', 'student25@dsapts.com', 'student123', NULL),
(31, 'D32155345', 'Student 26', 'student26@dsapts.com', 'student123', NULL),
(32, 'D32155346', 'Student 27', 'student27@dsapts.com', 'student123', NULL),
(33, 'D32155347', 'Student 28', 'student28@dsapts.com', 'student123', NULL),
(34, 'D32155348', 'Student 29', 'student29@dsapts.com', 'student123', NULL),
(35, 'D32155349', 'Student 30', 'student30@dsapts.com', 'student123', NULL);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
