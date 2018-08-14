-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2015 at 07:20 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `motaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `albumid` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_bin NOT NULL,
  `descr` text COLLATE utf8_bin NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '1',
  `coverpic` int(9) NOT NULL DEFAULT '1',
  `picno` int(4) NOT NULL,
  `rate` float NOT NULL DEFAULT '0',
  `raters` int(9) NOT NULL DEFAULT '0',
  `date` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`albumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `name`, `descr`, `hidden`, `coverpic`, `picno`, `rate`, `raters`, `date`) VALUES
(1, 'اسم الألبومd', 'عنوانو', 0, 1, 5, 35, 13, 'تاريخة'),
(6, 'البوم جديد', 'شرح عنو', 0, 1, 0, 0, 0, ''),
(7, 'البوم جديد', 'شرح عنو', 0, 1, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
  `picid` int(9) NOT NULL AUTO_INCREMENT,
  `albumid` int(9) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`picid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pic`
--

INSERT INTO `pic` (`picid`, `albumid`, `url`, `hidden`) VALUES
(1, 99999, 'default.jpg', 0),
(2, 1, 'https://i.imgur.com/nVs3RyM.jpg', 0),
(6, 1, 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xlp1/v/t1.0-9/11951309_10204199673384593_4399585423531151597_n.jpg?oh=c3434a80b7e43804d12c03a3ceb03f86&oe=5677C328&__gda__=1449830518_2e25738e0d5919bebd24d1a047c81a7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `textid` int(3) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`textid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
