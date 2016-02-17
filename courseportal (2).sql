-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 09:20 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `topic` varchar(20) NOT NULL,
  `lastdate` date DEFAULT NULL,
  `creatdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submission`
--

CREATE TABLE `assignment_submission` (
  `usn` varchar(20) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `submit_doc` varchar(100) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `name` varchar(20) DEFAULT NULL,
  `course_id` varchar(10) NOT NULL,
  `sem` int(3) NOT NULL,
  `credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `course_id`, `sem`, `credits`) VALUES
('Environmental scienc', '12eb42', 4, 4),
('Legal Studies', '12HSC73', 7, 2),
('Intellectual propert', '12hsi51', 5, 3),
('Management and Organ', '12hsm61', 6, 3),
('System software', '12id52', 5, 5),
('datastructures', '12is01', 7, 4),
('system software', '12is02', 7, 4),
('compiler design', '12is03', 7, 4),
('dms', '12is04', 7, 4),
('Datastructures', '12is33', 3, 5),
('Digital logic design', '12is34', 3, 5),
('Object oriented prog', '12is35', 3, 5),
('Discrete mathematica', '12is36', 3, 5),
('theory of Computatio', '12is43', 4, 4),
('Computer organizatio', '12is44', 4, 3),
('Design and analysis ', '12is45', 4, 5),
('Operating systems', '12is46', 4, 3),
('Unix system programm', '12is49', 4, 5),
('Microprocessors', '12is53', 5, 5),
('Computer networks ', '12is54', 5, 5),
('Software engineering', '12is62', 6, 4),
('Computer networks an', '12is63', 6, 5),
('Database management ', '12is64', 6, 5),
('Emerging technologie', '12is65', 6, 2),
('Web programming', '12IS71', 7, 5),
('Software Testing', '12IS72', 7, 5),
('Human Computer Inera', '12IS74', 7, 3),
('Mathematics-4', '12ma41', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_assignment`
--

CREATE TABLE `course_assignment` (
  `course_id` varchar(10) NOT NULL,
  `topic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `course_id` varchar(10) NOT NULL,
  `qbank` varchar(100) DEFAULT NULL,
  `ppt` varchar(100) DEFAULT NULL,
  `lessonplan` varchar(100) DEFAULT NULL,
  `modelq` varchar(100) DEFAULT NULL,
  `labm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`course_id`, `qbank`, `ppt`, `lessonplan`, `modelq`, `labm`) VALUES
('12HSC73', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `staff_id` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `department`, `staff_id`, `Password`, `email`) VALUES
('chethana murthy', 'ise', 'CRM', 'pass', 'crm@gmail.com'),
('smitha', 'ise', 'GRS', 'pass', 'crm@gmail.com'),
('mamtha', 'ise', 'GSM', 'pass', 'crm@gmail.com'),
('geetha', 'ise', 'GV', 'pass', 'crm@gmail.com'),
('name', 'dep', 'id', 'pass', 'email '),
('kavitha', 'ise', 'KAV', 'pass', 'crm@gmail.com'),
('merin', 'ise', 'MM', 'pass', 'crm@gmail.com'),
('nagraj cholli', 'ise', 'NC', 'pass', 'crm@gmail.com'),
('rajshekhar ', 'ise', 'rms', 'pass', 'rjs@gmail.com'),
('rashmi', 'ise', 'RR', 'pass', 'crm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff_auth`
--

CREATE TABLE `staff_auth` (
  `staff_id` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_auth`
--

INSERT INTO `staff_auth` (`staff_id`, `password`) VALUES
('CRM', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('GRS', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('GSM', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('GV', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('id', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('KAV', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('MM', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('NC', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('rms', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('RR', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(20) DEFAULT NULL,
  `usn` varchar(20) NOT NULL,
  `sem` int(11) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `usn`, `sem`, `password`, `email`) VALUES
('Adesh', '1RV12IS001', 3, 'pass', 'preciousandsacred@gmail.com'),
('Apoorv', '1RV12IS002', 3, 'pass', 'preciousandsacred@gmail.com'),
('Apoorva', '1RV12IS003', 3, 'pass', 'preciousandsacred@gmail.com'),
('Anirudh', '1RV12IS004', 3, 'pass', 'preciousandsacred@gmail.com'),
('Anusha', '1RV12IS005', 3, 'pass', 'preciousandsacred@gmail.com'),
('Aparna', '1RV12IS006', 4, 'pass', 'preciousandsacred@gmail.com'),
('Chandan', '1RV12IS007', 4, 'pass', 'preciousandsacred@gmail.com'),
('Nishith', '1RV12IS008', 4, 'pass', 'preciousandsacred@gmail.com'),
('Pradeep', '1RV12IS009', 5, 'pass', 'preciousandsacred@gmail.com'),
('Punith', '1RV12IS010', 5, 'pass', 'preciousandsacred@gmail.com'),
('Meghshyam', '1RV12IS011', 6, 'pass', 'preciousandsacred@gmail.com'),
('Shyam', '1RV12IS012', 6, 'pass', 'preciousandsacred@gmail.com'),
('Sourabh', '1RV12IS013', 7, 'pass', 'preciousandsacred@gmail.com'),
('Guru', '1RV12IS014', 7, 'pass', 'preciousandsacred@gmail.com'),
('Shyam', '1RV12IS015', 7, 'pass', 'preciousandsacred@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `usn` varchar(20) NOT NULL,
  `course_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`usn`, `course_id`) VALUES
('1RV12IS001', '12is33'),
('1RV12IS001', '12is34'),
('1RV12IS001', '12is35'),
('1RV12IS001', '12is36'),
('1RV12IS002', '12is33'),
('1RV12IS002', '12is34'),
('1RV12IS002', '12is35'),
('1RV12IS002', '12is36'),
('1RV12IS003', '12is33'),
('1RV12IS003', '12is34'),
('1RV12IS003', '12is35'),
('1RV12IS003', '12is36'),
('1RV12IS004', '12is33'),
('1RV12IS004', '12is34'),
('1RV12IS004', '12is35'),
('1RV12IS004', '12is36'),
('1RV12IS005', '12is33'),
('1RV12IS005', '12is34'),
('1RV12IS005', '12is35'),
('1RV12IS005', '12is36'),
('1RV12IS006', '12eb42'),
('1RV12IS006', '12is43'),
('1RV12IS006', '12is44'),
('1RV12IS006', '12is45'),
('1RV12IS006', '12is46'),
('1RV12IS006', '12is49'),
('1RV12IS006', '12ma41'),
('1RV12IS007', '12eb42'),
('1RV12IS007', '12is43'),
('1RV12IS007', '12is44'),
('1RV12IS007', '12is45'),
('1RV12IS007', '12is46'),
('1RV12IS007', '12is49'),
('1RV12IS007', '12ma41'),
('1RV12IS008', '12eb42'),
('1RV12IS008', '12is43'),
('1RV12IS008', '12is44'),
('1RV12IS008', '12is45'),
('1RV12IS008', '12is46'),
('1RV12IS008', '12is49'),
('1RV12IS008', '12ma41'),
('1RV12IS009', '12hsi51'),
('1RV12IS009', '12id52'),
('1RV12IS009', '12is53'),
('1RV12IS009', '12is54'),
('1RV12IS010', '12hsi51'),
('1RV12IS010', '12id52'),
('1RV12IS010', '12is53'),
('1RV12IS010', '12is54'),
('1RV12IS011', '12hsm61'),
('1RV12IS011', '12is62'),
('1RV12IS011', '12is63'),
('1RV12IS011', '12is64'),
('1RV12IS012', '12hsm61'),
('1RV12IS012', '12is62'),
('1RV12IS012', '12is63'),
('1RV12IS012', '12is64'),
('1RV12IS013', '12HSC73'),
('1RV12IS013', '12is65'),
('1RV12IS013', '12IS71'),
('1RV12IS013', '12IS72'),
('1RV12IS014', '12HSC73'),
('1RV12IS014', '12IS71'),
('1RV12IS014', '12IS72'),
('1RV12IS014', '12IS74'),
('1RV12IS015', '12HSC73'),
('1RV12IS015', '12IS71'),
('1RV12IS015', '12IS72'),
('1RV12IS015', '12IS74'),
('USN', 'Course_ID');

-- --------------------------------------------------------

--
-- Table structure for table `stud_auth`
--

CREATE TABLE `stud_auth` (
  `usn` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_auth`
--

INSERT INTO `stud_auth` (`usn`, `password`) VALUES
('1RV12IS001', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS002', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS003', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS004', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS005', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS006', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS007', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS008', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS009', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS010', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS011', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS012', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS013', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS014', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('1RV12IS015', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('USN', 'd7cd56f2a2a3f47830760edfb89946eb7b9e2cd1');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `course_id` varchar(10) NOT NULL,
  `staff_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`course_id`, `staff_id`) VALUES
('12eb42', 'GRS'),
('12HSC73', 'rms'),
('12hsi51', 'GV'),
('12hsm61', 'CRM'),
('12id52', 'GV'),
('12is33', 'KAV'),
('12is34', 'MM'),
('12is35', 'MM'),
('12is36', 'NC'),
('12is43', 'GSM'),
('12is44', 'GSM'),
('12is45', 'GSM'),
('12is46', 'KAV'),
('12is49', 'KAV'),
('12is53', 'GV'),
('12is54', 'GRS'),
('12is62', 'CRM'),
('12is63', 'RR'),
('12is64', 'RR'),
('12is65', 'RR'),
('12IS71', 'rms'),
('12IS72', 'rms'),
('12IS74', 'CRM'),
('12ma41', 'GRS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`topic`);

--
-- Indexes for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD PRIMARY KEY (`usn`,`course_id`,`topic`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `topic` (`topic`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_assignment`
--
ALTER TABLE `course_assignment`
  ADD PRIMARY KEY (`course_id`,`topic`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `topic` (`topic`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `staff_auth`
--
ALTER TABLE `staff_auth`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`usn`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `stud_auth`
--
ALTER TABLE `stud_auth`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`course_id`,`staff_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_submission`
--
ALTER TABLE `assignment_submission`
  ADD CONSTRAINT `assignment_submission_ibfk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `assignment_submission_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `assignment_submission_ibfk_3` FOREIGN KEY (`topic`) REFERENCES `assignment` (`topic`);

--
-- Constraints for table `course_assignment`
--
ALTER TABLE `course_assignment`
  ADD CONSTRAINT `course_assignment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `course_assignment_ibfk_2` FOREIGN KEY (`topic`) REFERENCES `assignment` (`topic`);

--
-- Constraints for table `resource`
--
ALTER TABLE `resource`
  ADD CONSTRAINT `resource_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
