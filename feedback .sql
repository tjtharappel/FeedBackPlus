-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2018 at 04:42 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
  `yearofjoin` int(11) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `dpurl` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `login_id` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_foreignkey_students_courses` (`courses_id`),
  KEY `index_foreignkey_students_login` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

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
-- Constraints for table `hods`
--
ALTER TABLE `hods`
  ADD CONSTRAINT `c_fk_hods_departments_id` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `c_fk_hods_teachers_id` FOREIGN KEY (`teachers_id`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
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
