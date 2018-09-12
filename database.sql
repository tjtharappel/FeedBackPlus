-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2018 at 04:21 PM
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
  `strength` double DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_academics_courses` (`courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `academics`
--

TRUNCATE TABLE `academics`;
--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `courses_id`, `strength`, `date`) VALUES
(2, NULL, 50, '2018-09-11');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `assignedsubjects`
--

TRUNCATE TABLE `assignedsubjects`;
--
-- Dumping data for table `assignedsubjects`
--

INSERT INTO `assignedsubjects` (`id`, `academics_id`, `teachers_id`, `subjects_id`) VALUES
(2, 2, 3, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `courses`
--

TRUNCATE TABLE `courses`;
--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `departments_id`, `name`, `duration`, `type`, `pattern`) VALUES
(3, NULL, 'MCA', 3, 'PG', 'semester');

--
-- Triggers `courses`
--
DROP TRIGGER IF EXISTS `delete_course`;
DELIMITER $$
CREATE TRIGGER `delete_course` BEFORE DELETE ON `courses` FOR EACH ROW BEGIN
delete from students where students.courses_id = old.id;
delete from feedbackrecords where courses_id = old.id;
delete from subjects where courses_id = old.id;
delete from academics where courses_id = old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `departments`
--

TRUNCATE TABLE `departments`;
--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(5, 'Computer Science'),
(6, 'Mathematics'),
(7, 'English'),
(8, 'Microbiology');

--
-- Triggers `departments`
--
DROP TRIGGER IF EXISTS `delete_departments`;
DELIMITER $$
CREATE TRIGGER `delete_departments` BEFORE DELETE ON `departments` FOR EACH ROW BEGIN
delete from teachers where departments_id = old.id;
delete from courses where departments_id = old.id;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `feedbackrecords`
--

TRUNCATE TABLE `feedbackrecords`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `hods`
--

TRUNCATE TABLE `hods`;
--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`id`, `departments_id`, `teachers_id`) VALUES
(1, 5, 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `login`
--

TRUNCATE TABLE `login`;
--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '15fa81f9513ec9a57a4df875322b80f5', 'admin'),
(4, 'thomasmuller@muller.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher'),
(5, 'asha99@gmail.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher'),
(6, 'tjtharappel@gmail.com', 'b03842f3a4955934bbe85edc8799083a', 'student'),
(7, 'susangeorge99@gmail.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher'),
(8, 'josejamestharappel@gmail.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher'),
(9, 'binuthomas@gmail.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher'),
(10, 'snehasadasivan@yahoo.com', 'b03842f3a4955934bbe85edc8799083a', 'teacher');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `students`
--

TRUNCATE TABLE `students`;
--
-- Triggers `students`
--
DROP TRIGGER IF EXISTS `delete_students`;
DELIMITER $$
CREATE TRIGGER `delete_students` BEFORE DELETE ON `students` FOR EACH ROW BEGIN
DELETE from feedbackrecords WHERE students_id =old.id;
DELETE FROM login
    WHERE login.id = old.login_id;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `subjects`
--

TRUNCATE TABLE `subjects`;
--
-- Triggers `subjects`
--
DROP TRIGGER IF EXISTS `delete_subjects`;
DELIMITER $$
CREATE TRIGGER `delete_subjects` BEFORE DELETE ON `subjects` FOR EACH ROW BEGIN
delete from feedbackrecords where subjects_id = old.id;
delete from assignedsubjects where subjects_id = old.id;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Truncate table before insert `teachers`
--

TRUNCATE TABLE `teachers`;
--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `mobile`, `gender`, `address`, `dpurl`, `status`, `login_id`, `departments_id`) VALUES
(3, 'Thomas Muller', 'thomasmuller@muller.com', 8891847029, 'male', 'Tharappel (H),Thomas Villa,\r\nAthirampuzha P.O,\r\nKottayam\r\npin:686562', '19fcf2047cfabad26207ebb6ecc56eac.jpg', 'approved', 4, NULL),
(5, 'Sneha Susan George', 'susangeorge99@gmail.com', 7755776611, 'female', 'Hello', 'f9f1136454c56a8efca2b93009d71c70.jpg', 'approved', 7, NULL),
(6, 'Jose James', 'josejamestharappel@gmail.com', 9988774455, 'male', 'hesoyam0481', 'f57fcacf059f78e6c28a8546e00cb237.jpg', 'approved', 8, NULL),
(7, 'Binu Thomas', 'binuthomas@gmail.com', 9988556610, 'female', 'Angels ladies hostel, Near sriram mens PG,\r\n2nd cross street sri sai nagar,\r\nthoralpakkam, chennai pin:600097', '3aa9a8e24b45fd146cf1d6b79631bdea.jpg', 'approved', 9, 5),
(8, 'Sneha Sadasivan', 'snehasadasivan@yahoo.com', 7744557710, 'female', 'Nothing Nothing', 'cfbe0ee90feddaaadcd50de40cf476f1.jpg', 'approved', 10, 5);

--
-- Triggers `teachers`
--
DROP TRIGGER IF EXISTS `delete_teachers`;
DELIMITER $$
CREATE TRIGGER `delete_teachers` BEFORE DELETE ON `teachers` FOR EACH ROW BEGIN
delete from feedbackrecords where teachers_id=old.id;
delete from login where id =old.login_id;
delete from assignedsubjects where teachers_id=old.id;
delete from hods where teachers_id=old.id;
END
$$
DELIMITER ;

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
