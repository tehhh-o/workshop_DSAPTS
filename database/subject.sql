-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 08:05 AM
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
(3, 'Computer Organization', 4, 1, 1, 'DITS1133'),
(4, 'Data Structures and Algorithms', 4, 1, 2, 'DITP1333'),
(5, 'Database Systems', 3, 1, 2, 'DITM2113'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

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
