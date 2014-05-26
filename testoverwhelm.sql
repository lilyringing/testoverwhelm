-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2014 年 05 月 26 日 19:20
-- 伺服器版本: 5.5.32
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `testoverwhelm`
--
CREATE DATABASE IF NOT EXISTS `testoverwhelm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testoverwhelm`;

-- --------------------------------------------------------

--
-- 表的結構 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answerid` int(11) NOT NULL AUTO_INCREMENT,
  `questionid` int(11) NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `good` int(10) unsigned DEFAULT NULL,
  `bad` int(10) unsigned DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`answerid`),
  KEY `question_id` (`questionid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentid` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`commentid`),
  KEY `fileid` (`fileid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `timeid` int(5) NOT NULL,
  `subject` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `professor` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`fileid`),
  KEY `fileid` (`fileid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`questionid`),
  KEY `fileid` (`fileid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 匯出資料表的 Constraints
--

--
-- 資料表的 Constraints `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `question_id` FOREIGN KEY (`questionid`) REFERENCES `question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_id` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `file_id2` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
