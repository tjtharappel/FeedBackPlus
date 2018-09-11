-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 11, 2018 at 12:56 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--
CREATE DATABASE IF NOT EXISTS `feedback` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `feedback`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getTeacherRatingByDept`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTeacherRatingByDept` (IN `deptId` INT)  NO SQL
SELECT r.teachers_id,t.name, avg(r.communicationrating) as communication,avg(r.subjectknowledgerating) as subjectknowledge,avg(r.classroominteractionrating) as classroom FROM `feedbackrecords` as r  join teachers as t on t.id = r.teachers_id
where r.departments_id = deptId and t.departments_id=deptId group by r.teachers_id$$

DROP PROCEDURE IF EXISTS `getTeacherRatingById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getTeacherRatingById` (IN `teacherId` INT)  NO SQL
SELECT r.teachers_id,t.name,stud.name as student,c.name as course,s.name as subject,s.semester as semester, (r.communicationrating) as communication,(r.subjectknowledgerating) as subjectknowledge,(r.classroominteractionrating) as classroom,r.remarks as remarks  FROM `feedbackrecords` as r  join teachers as t on t.id = r.teachers_id
join subjects as s on r.subjects_id = s.id
join students as stud on r.students_id = stud.id
join courses as c on r.courses_id = c.id
where  t.id=teacherId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

DROP TABLE IF EXISTS `academics`;
CREATE TABLE IF NOT EXISTS `academics` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `courses_id` int(11) UNSIGNED DEFAULT NULL,
  `strength` int(11) UNSIGNED DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_academics_courses` (`courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `courses_id`, `strength`, `date`) VALUES
(1, 1, 50, '2018-03-14'),
(2, 2, 50, '2018-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `assignedsubjects`
--

DROP TABLE IF EXISTS `assignedsubjects`;
CREATE TABLE IF NOT EXISTS `assignedsubjects` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `academics_id` int(11) UNSIGNED DEFAULT NULL,
  `teachers_id` int(11) UNSIGNED DEFAULT NULL,
  `subjects_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_assignedsubjects_academics` (`academics_id`),
  KEY `index_foreignkey_assignedsubjects_teachers` (`teachers_id`),
  KEY `index_foreignkey_assignedsubjects_subjects` (`subjects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `assignedsubjects`
--

INSERT INTO `assignedsubjects` (`id`, `academics_id`, `teachers_id`, `subjects_id`) VALUES
(1, 1, 62, 5),
(2, 1, 68, 6),
(3, 1, 64, 3),
(4, 1, 66, 2),
(5, 1, 67, 1),
(6, 1, 64, 4),
(7, 2, 64, 12),
(8, 2, 65, 11),
(9, 2, 67, 8),
(10, 2, 66, 9),
(11, 2, 65, 10);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `departments_id` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `duration` int(11) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pattern` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_courses_departments` (`departments_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `departments_id`, `name`, `duration`, `type`, `pattern`) VALUES
(1, 20, 'BCA', 3, 'UG', 'semester'),
(2, 20, 'MCA', 3, 'PG', 'semester'),
(3, 23, 'B.Sc Mathematics', 3, 'UG', 'semester'),
(4, 23, 'M.Sc Mathematics', 2, 'PG', 'semester'),
(5, NULL, 'B.Sc Botany', 3, 'UG', 'semester');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(2, 'Electronics'),
(20, 'Computer Science'),
(23, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `feedbackrecords`
--

DROP TABLE IF EXISTS `feedbackrecords`;
CREATE TABLE IF NOT EXISTS `feedbackrecords` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `academics_id` int(11) UNSIGNED DEFAULT NULL,
  `departments_id` int(11) UNSIGNED DEFAULT NULL,
  `courses_id` int(11) UNSIGNED DEFAULT NULL,
  `teachers_id` int(11) UNSIGNED DEFAULT NULL,
  `students_id` int(11) UNSIGNED DEFAULT NULL,
  `subjects_id` int(11) UNSIGNED DEFAULT NULL,
  `communicationrating` int(11) UNSIGNED DEFAULT NULL,
  `subjectknowledgerating` int(11) UNSIGNED DEFAULT NULL,
  `classroominteractionrating` int(11) UNSIGNED DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `feedbackdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_feedbackrecodes_academics` (`academics_id`),
  KEY `index_foreignkey_feedbackrecodes_departments` (`departments_id`),
  KEY `index_foreignkey_feedbackrecodes_courses` (`courses_id`),
  KEY `index_foreignkey_feedbackrecodes_teachers` (`teachers_id`),
  KEY `index_foreignkey_feedbackrecodes_students` (`students_id`),
  KEY `index_foreignkey_feedbackrecodes_subjects` (`subjects_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `feedbackrecords`
--

INSERT INTO `feedbackrecords` (`id`, `academics_id`, `departments_id`, `courses_id`, `teachers_id`, `students_id`, `subjects_id`, `communicationrating`, `subjectknowledgerating`, `classroominteractionrating`, `remarks`, `feedbackdate`) VALUES
(14, 1, 20, 1, 62, 1, 1, 5, 5, 5, 'good', '2018-09-10 00:00:00'),
(15, 1, 20, 1, 64, 1, 2, 4, 4, 4, '', '2018-09-10 00:00:00'),
(16, 1, 20, 1, 65, 1, 3, 3, 4, 4, '', '2018-09-10 00:00:00'),
(17, 1, 20, 1, 62, 2, 1, 5, 5, 5, '', '2018-09-10 00:00:00'),
(18, 1, 20, 1, 64, 2, 2, 5, 5, 5, '', '2018-09-10 00:00:00'),
(19, 1, 20, 1, 65, 2, 3, 5, 5, 5, '', '2018-09-10 00:00:00'),
(20, 1, 20, 1, 65, 2, 4, 5, 5, 5, '', '2018-09-10 00:00:00'),
(21, 1, 20, 1, 69, 2, 5, 5, 5, 5, '', '2018-09-10 00:00:00'),
(22, 1, 20, 1, 68, 2, 6, 5, 5, 5, '', '2018-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hods`
--

DROP TABLE IF EXISTS `hods`;
CREATE TABLE IF NOT EXISTS `hods` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `departments_id` int(11) UNSIGNED DEFAULT NULL,
  `teachers_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_hods_departments` (`departments_id`),
  KEY `index_foreignkey_hods_teachers` (`teachers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`id`, `departments_id`, `teachers_id`) VALUES
(5, 20, 64),
(6, 23, 67);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '15fa81f9513ec9a57a4df875322b80f5', 'admin'),
(68, 'susangeorge99@gmail.com', '4832f3f2be7c29fb3d2b33c474e87bc4', 'teacher'),
(69, 'tjtharappel@gmail.com', '7ae52fbaac51496a022d5c66acf0e8ab', 'teacher'),
(70, 'binuthomas@gmail.com', 'c4408458f8b30cfea2973f9cd78bbdb3', 'teacher'),
(71, 'bijuxavior985@yahoo.co.in', 'be4945335804f03379f6341b5c3b1520', 'teacher'),
(72, 'asha99@gmail.com', '394438d4e8fa600b3fea3262ddc31b0d', 'teacher'),
(73, 'amitha@outlook.com', '540c605eff92269a738e12743b93cbc1', 'teacher'),
(74, 'sasissasi@live.com', '791fb3e2c47016b86aa25568d02432d2', 'teacher'),
(75, 'merinmarythomas@gmail.com', '748519533748d0bb5ac1335587150f56', 'teacher'),
(78, 'merilynjames@yahoo.com', '7ae52fbaac51496a022d5c66acf0e8ab', 'student'),
(79, 'kaniskarthika@gmail.com', '7ae52fbaac51496a022d5c66acf0e8ab', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `mobile` double DEFAULT NULL,
  `courses_id` int(11) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dpurl` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `login_id` int(11) UNSIGNED DEFAULT NULL,
  `academics_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_students_courses` (`courses_id`),
  KEY `index_foreignkey_students_login` (`login_id`),
  KEY `index_foreignkey_students_academics` (`academics_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `mobile`, `courses_id`, `address`, `gender`, `dpurl`, `status`, `login_id`, `academics_id`) VALUES
(1, 'Merilyn James', 'merilynjames@yahoo.com', 8574122574, 1, 'Tharappel (H),Thomas Villa\r\nAthirampuzha P.O,\r\nKottayam\r\npin: 686562', 'female', 'f23aba329438e0b0c702078efb0574db.jpg', 'approved', 78, 1),
(2, 'Kani S Karthika', 'kaniskarthika@gmail.com', 8822448833, 1, 'No', 'female', '156866e9d5bb05a4d1172e1e356865df.jpg', 'approved', 79, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `courses_id` int(11) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `semester` int(11) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `examtype` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_subjects_courses` (`courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `courses_id`, `code`, `name`, `semester`, `type`, `examtype`) VALUES
(1, 1, 'COM101', 'Communicative English', 1, 'Complementary', 'Theory'),
(2, 1, 'BCS101', 'Introduction to IT', 1, 'Core', 'Theory'),
(3, 1, 'BCS102', 'Programming In C', 1, 'Core', 'Theory'),
(4, 1, 'BCS103', 'Programming In C (Lab)', 1, 'Core', 'Pratical'),
(5, 1, 'COM102', 'Mathematics', 1, 'Complementary', 'Theory'),
(6, 1, 'COM103', 'Statistics', 1, 'Complementary', 'Theory'),
(7, 3, 'BMA 101', 'Linear Algebra', 1, 'Core', 'Theory'),
(8, 2, 'MCS1001', 'Discrete Mathematics', 1, 'Core', 'Theory'),
(9, 2, 'MCS1002', 'Advanced Data Structure ', 1, 'Core', 'Theory'),
(10, 2, 'MCS1003', 'Programming in Prolog', 1, 'Core', 'Theory'),
(11, 2, 'MCS1004', 'Programming in Prolog (Lab)', 1, 'Core', 'Pratical'),
(12, 2, 'MCS1005', 'Computer Organization', 1, 'Core', 'Theory');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `mobile` double DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dpurl` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `login_id` int(11) UNSIGNED DEFAULT NULL,
  `departments_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_teachers_login` (`login_id`),
  KEY `index_foreignkey_teachers_departments` (`departments_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `mobile`, `gender`, `address`, `dpurl`, `status`, `login_id`, `departments_id`) VALUES
(62, 'Sneha Susan George', 'susangeorge99@gmail.com', 9856231245, 'female', 'noting noting noting', '78bea60f42bf72a369edd515a7c94376.jpg', 'approved', 68, 20),
(64, 'Binu Thomas', 'binuthomas@gmail.com', 7856322145, 'female', 'adsfadsfadsfadsfdas', '58acfe552ef33244f646f6d4bb178250.jpg', 'approved', 70, 20),
(65, 'Biju Xavior', 'bijuxavior985@yahoo.co.in', 8845122356, 'male', 'Thalayolaparabu', 'c07ab402cdfd6f548ff67503ab957e78.jpg', 'approved', 71, 20),
(66, 'Asha Laskshmi', 'asha99@gmail.com', 4859535689, 'female', 'Ettumanoor', '6027189398cb1e838462fe8a10f8210b.jpg', 'approved', 72, 20),
(67, 'Amitha Saji', 'amitha@outlook.com', 5889563212, 'female', 'Palathra', 'c3cdb70076f6d34c92c1c3b7e39422fb.jpg', 'approved', 73, 23),
(68, 'Sasi S Sasi', 'sasissasi@live.com', 2222222222, 'male', 'Arivipuram', '487d546bb66b5e6725170a5359fccd4d.jpg', 'approved', 74, 23),
(69, 'Merin Mary Thomas', 'merinmarythomas@gmail.com', 7854122365, 'female', 'Bonakadu', '03f591284fd6bf4eb30cfe45dbbcd63e.jpg', 'approved', 75, 23);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academics`
--
ALTER TABLE `academics`
  ADD CONSTRAINT `c_fk_academics_courses_id` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `assignedsubjects`
--
ALTER TABLE `assignedsubjects`
  ADD CONSTRAINT `c_fk_assignedsubjects_academics_id` FOREIGN KEY (`academics_id`) REFERENCES `academics` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_assignedsubjects_subjects_id` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_assignedsubjects_teachers_id` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `c_fk_courses_departments_id` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `feedbackrecords`
--
ALTER TABLE `feedbackrecords`
  ADD CONSTRAINT `c_fk_feedbackrecodes_academics_id` FOREIGN KEY (`academics_id`) REFERENCES `academics` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_feedbackrecodes_courses_id` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_feedbackrecodes_departments_id` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_feedbackrecodes_students_id` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_feedbackrecodes_subjects_id` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_feedbackrecodes_teachers_id` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `hods`
--
ALTER TABLE `hods`
  ADD CONSTRAINT `c_fk_hods_departments_id` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_hods_teachers_id` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `c_fk_students_academics_id` FOREIGN KEY (`academics_id`) REFERENCES `academics` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_students_courses_id` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_students_login_id` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `c_fk_subjects_courses_id` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `c_fk_teachers_departments_id` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_teachers_login_id` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
