-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 09:14 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_attendance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `st_username` varchar(100) NOT NULL,
  `lec_id` int(11) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ispresent` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`st_username`, `lec_id`, `lat`, `lng`, `check_in`, `ispresent`) VALUES
('Ridmal', 848444, 37.421997, -122.084000, '2023-09-05 04:40:46', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchNo` varchar(5) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchNo`, `year`) VALUES
('18.1', '2018 1st Intake'),
('18.2', '2018 2nd Intake'),
('19.1', '2019 1st Intake'),
('19.2', '2019 2nd Intake'),
('20.1', '2020 1st Intake'),
('20.2', '2020 2nd Intake'),
('21.1', '2021 1st Intake'),
('21.2', '2021 2nd Intake'),
('22.1', '2022 1st Intake'),
('22.2', '2022 2nd Intake');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degID` varchar(100) NOT NULL,
  `degName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degID`, `degName`) VALUES
('FOB0024', 'Bsc (Hons) Logistic Management'),
('FOC001', 'BSc (Hons) Computer Science'),
('FOC002', 'BSc (Hons) Computer Networks'),
('FOC003', 'BSc (Hons) Computer Security'),
('FOC004', 'BSc (Hons) Software Engineering'),
('FOC005', 'BSc (Hons) Graphic Designing'),
('FOC006', 'BSc (Hons) Management Information Systems ');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `batchNo` varchar(5) NOT NULL,
  `degID` varchar(11) NOT NULL,
  `m_code` varchar(100) NOT NULL,
  `enYear` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`batchNo`, `degID`, `m_code`, `enYear`) VALUES
('18.2', 'FOC006', 'MAD-104', 2018),
('19.1', 'FOC001', 'MAD-104', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `ins_id` int(11) NOT NULL,
  `firstname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ins_username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `imgPath` text NOT NULL,
  `m_code` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`ins_id`, `firstname`, `ins_username`, `password`, `imgPath`, `m_code`) VALUES
(122454, 'Test Person', 'test', '16d7a4fca7442dda3ad93c9a726597e4', 'instructor/assets/img/instructors/ROG_Wallpaper_REIGNITE_1920x1080.jpg', 'MAD-104'),
(232323, 'Testddd', 'test2', 'ad0234829205b9033196ba818f7a872b', 'C:', 'MAD-104'),
(100257789, 'Chalani Orutotaarchchi', 'chalani', 'e1b74eb5b87bfa8baee8cfb60abd8d2a', 'C:', 'FIS-221'),
(200245445, 'Chaminda Wijesinghe', 'chaminda', 'f4a6c24b3de036c3f12019589b32894b', 'C:', 'IN-203');

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lec_id` int(11) NOT NULL,
  `m_code` varchar(100) DEFAULT NULL,
  `s_time` timestamp NULL DEFAULT NULL,
  `e_time` timestamp NULL DEFAULT NULL,
  `ins_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lec_id`, `m_code`, `s_time`, `e_time`, `ins_id`) VALUES
(848444, 'MAD-104', '2023-09-05 08:30:00', '2023-09-05 09:30:00', 122454),
(854545, 'MAD-104', '2023-08-30 16:00:00', '2023-08-30 17:00:00', 122454),
(2154544, 'MAD-104', '2023-08-30 15:30:00', '2023-08-30 16:30:00', 122454),
(20221106, 'MAD-104', '2023-08-30 15:30:00', '2023-08-30 16:30:00', 122454);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `m_code` varchar(100) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`m_code`, `m_name`, `description`) VALUES
('CL-101', 'C Language', 'The C programming language is a computer programming'),
('CN-203', 'Computer Networks', 'A computer network is a set of computers sharing resources provided by network nodes.'),
('DB-211', 'Database Management System', 'A database management system is the technology for creating and managing databases.'),
('FIS-221', 'Fundamental of Information System ', 'The five basic resources of information systems.'),
('IN-203', 'Introduction for Computer Science', 'Computer science is the study of algorithmic processes'),
('MAD-104', 'Mobile Application Development', 'Mobile app development is the act or process by which a mobile app is developed.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `st_no` int(11) DEFAULT NULL,
  `st_name` varchar(100) DEFAULT NULL,
  `imgPath` text NOT NULL,
  `batchNo` varchar(5) DEFAULT NULL,
  `degID` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_username`, `password`, `st_no`, `st_name`, `imgPath`, `batchNo`, `degID`) VALUES
('Asel', 'fc4991013ca4cd4ad53050b11cf98c7c', 10025886, 'Asel Bimsara', 'C:', '18.2', 'FOC002'),
('Dulan', '868871c768be003524cf058c1bd412da', 10085449, 'Dulan Malintha', 'C:', '19.1', 'FOC001'),
('Kulindu', 'be787aab62d90de0275d34dd66085aa8', 10027057, 'Kulindu Himsara', 'C:', '18.2', 'FOB0024'),
('Ridmal', '86814d8e68fd67978f40b3afbda789c0', 10026552, 'Ridmal Akmeemana', 'http://192.168.1.105/adms/Images/User/Ridmal.jpg', '18.2', 'FOC006'),
('Thisaru', 'cf37671a31032a2069042e897943a386', 10056884, 'Thisaru Dinethra', 'C:', '18.2', 'FOC002');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`, `img`) VALUES
(1, 'University', 'Adminstrartor', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Administrator', 'assets/img/profiles/avatar-05.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`st_username`,`lec_id`),
  ADD KEY `lecId` (`lec_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchNo`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`batchNo`,`degID`,`m_code`),
  ADD KEY `degID` (`degID`),
  ADD KEY `m_code` (`m_code`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`ins_id`),
  ADD KEY `m_code` (`m_code`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lec_id`),
  ADD KEY `mCode` (`m_code`),
  ADD KEY `ins_id` (`ins_id`),
  ADD KEY `ins_id_2` (`ins_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`m_code`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_username`),
  ADD KEY `degID` (`degID`),
  ADD KEY `batchNo` (`batchNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`st_username`) REFERENCES `student` (`st_username`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`lec_id`) REFERENCES `lecture` (`lec_id`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`batchNo`) REFERENCES `batch` (`batchNo`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`degID`) REFERENCES `degree` (`degID`),
  ADD CONSTRAINT `enrollment_ibfk_3` FOREIGN KEY (`m_code`) REFERENCES `module` (`m_code`);

--
-- Constraints for table `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_ibfk_1` FOREIGN KEY (`m_code`) REFERENCES `module` (`m_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`m_code`) REFERENCES `module` (`m_code`),
  ADD CONSTRAINT `lecture_ibfk_2` FOREIGN KEY (`ins_id`) REFERENCES `instructors` (`ins_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`degID`) REFERENCES `degree` (`degID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`batchNo`) REFERENCES `batch` (`batchNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
