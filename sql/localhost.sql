-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 09:57 AM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feedback`
--
CREATE DATABASE IF NOT EXISTS `feedback` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `feedback`;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(8) NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(500) NOT NULL,
  `batch_prefix` varchar(50) NOT NULL,
  `year_of_admission` year(4) NOT NULL,
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10000004 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(5) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(500) NOT NULL,
  `course_level` char(1) NOT NULL,
  `dept_id` int(5) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10003 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` int(5) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(500) NOT NULL,
  `dept_code` char(3) NOT NULL,
  PRIMARY KEY (`dept_id`),
  UNIQUE KEY `dept_code` (`dept_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10011 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(5) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(500) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `dept_id` int(5) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10015 ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `t_id` int(10) NOT NULL,
  `A1` int(1) NOT NULL,
  `A2` int(1) NOT NULL,
  `A3` int(1) NOT NULL,
  `A4` int(1) NOT NULL,
  `A5` int(1) NOT NULL,
  `A6` int(1) NOT NULL,
  `B1` int(1) NOT NULL,
  `B2` int(1) NOT NULL,
  `B3` int(1) NOT NULL,
  `B4` int(1) NOT NULL,
  `B5` int(1) NOT NULL,
  `B6` int(1) NOT NULL,
  `B7` int(1) NOT NULL,
  `B8` int(1) NOT NULL,
  `C1` int(1) NOT NULL,
  `C2` int(1) NOT NULL,
  `C3` int(1) NOT NULL,
  `C4` int(1) NOT NULL,
  `C5` int(1) NOT NULL,
  `C6` int(1) NOT NULL,
  `D1` int(1) NOT NULL,
  `D2` int(1) NOT NULL,
  `D3` int(1) NOT NULL,
  `D4` int(1) NOT NULL,
  `D5` int(1) NOT NULL,
  `D6` int(1) NOT NULL,
  `D7` int(1) NOT NULL,
  `D8` int(1) NOT NULL,
  `E1` int(1) NOT NULL,
  `E2` int(1) NOT NULL,
  `E3` int(1) NOT NULL,
  `E4` int(1) NOT NULL,
  `E5` int(1) NOT NULL,
  `E6` int(1) NOT NULL,
  `F1` int(1) NOT NULL,
  `F2` int(1) NOT NULL,
  `F3` int(1) NOT NULL,
  `F4` int(1) NOT NULL,
  `F5` int(1) NOT NULL,
  `F6` int(1) NOT NULL,
  `F7` int(1) NOT NULL,
  `comments` text,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int(5) NOT NULL AUTO_INCREMENT,
  `sem_name` varchar(500) NOT NULL,
  `course_id` int(5) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10006 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(10) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(500) NOT NULL,
  `batch_id` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000000003 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(10) NOT NULL AUTO_INCREMENT,
  `subject_code` char(7) NOT NULL,
  `subject_name` varchar(500) NOT NULL,
  `sem_id` int(5) NOT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_code` (`subject_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000000018 ;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
CREATE TABLE IF NOT EXISTS `teaches` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_id` int(10) NOT NULL,
  `batch_id` int(8) NOT NULL,
  `faculty_id` int(5) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000000018 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
