-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 أغسطس 2015 الساعة 14:34
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
-- بنية الجدول `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `albumid` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_bin NOT NULL,
  `descr` text COLLATE utf8_bin NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '1',
  `coverpic` int(9) NOT NULL DEFAULT '1',
  `picno` int(4) NOT NULL,
  `rate` float NOT NULL,
  PRIMARY KEY (`albumid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `album`
--

INSERT INTO `album` (`albumid`, `name`, `descr`, `hidden`, `coverpic`, `picno`, `rate`) VALUES
(1, 'الألبوم الأول', 'شرح عن الألبوم الأول', 0, 1, 5, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `pic`
--

CREATE TABLE IF NOT EXISTS `pic` (
  `picid` int(9) NOT NULL AUTO_INCREMENT,
  `albumid` int(9) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `rate` double NOT NULL,
  PRIMARY KEY (`picid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- إرجاع أو استيراد بيانات الجدول `pic`
--

INSERT INTO `pic` (`picid`, `albumid`, `url`, `hidden`, `rate`) VALUES
(1, 99999, 'default.jpg', 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `textid` int(3) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`textid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
