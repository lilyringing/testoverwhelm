-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2014 年 06 月 08 日 10:04
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
  `good` int(10) unsigned NOT NULL DEFAULT '0',
  `bad` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`answerid`),
  KEY `question_id` (`questionid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 轉存資料表中的資料 `answer`
--

INSERT INTO `answer` (`answerid`, `questionid`, `answer`, `good`, `bad`, `userid`) VALUES
(2, 3, 'R0 → ε | 0R1 | 1R2\r\nR1 → ε | 0R1 | 1R3\r\nR2 → ε | 0R4 | 1R2\r\nR3 → ε | 1R4\r\nR4 → ε | 0R3\r\n(Note: useless production rules have been removed.)', 0, 0, 1),
(3, 3, 'test', 0, 0, 2),
(4, 1, 'D:/xampp/htdocs/Github/testoverwhelm/upload/TC20131A1.PNG', 0, 0, 1),
(5, 1, 'This is a test for the text answer of problem 1.', 0, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `comment`
--

INSERT INTO `comment` (`commentid`, `fileid`, `userid`, `comment`) VALUES
(1, 1, 1, 'Theroy of computing is really hard!!!');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 轉存資料表中的資料 `file`
--

INSERT INTO `file` (`fileid`, `timeid`, `subject`, `professor`, `userid`) VALUES
(1, 10221, '計算理論', '蔡益坤', 1);

-- --------------------------------------------------------

--
-- 表的結構 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `fileid` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`questionid`),
  KEY `fileid` (`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 轉存資料表中的資料 `question`
--

INSERT INTO `question` (`questionid`, `fileid`, `question`, `number`) VALUES
(1, 1, 'Let A = {a, b, c, d, e, f} and R = {(a, c), (b, c), (d, e)} (which is a binary relation on A).\r\n(a) Give a symmetric and transitive but not reﬂexive binary relation on A that includes\r\nR. Please present the relation using a directed graph.\r\n(b) Find the smallest equivalence relation on A that includes R. Please present the\r\nrelation using a directed graph.', 1),
(2, 1, 'Let L = {w ∈ {0, 1}∗ | w contains 011 as a substring or ends with a 0}.\n(a) Draw the state diagram of an NFA, with as few states as possible, that recognizes\nL. The fewer states your NFA has, the more points you will be credited for this\nproblem.\n(b) Convert the preceding NFA systematically into an equivalent DFA (using the proce-\ndure discussed in class). Do not attempt to optimize the number of states, though\nyou may omit the unreachable states.', 2),
(3, 1, 'Let L = {w ∈ {0, 1}∗ | w does not contain 011 or 100 as a substring}.\r\n(a) Draw the state diagram of a DFA, with as few states as possible, that recognizes\r\nL. The fewer states your DFA has, the more points you will be credited for this\r\nproblem.\r\n(b) Translate the DFA in (a) systematically to an equivalent context-free grammar (using\r\nthe procedure discussed in class).', 3),
(4, 1, 'test whether delete', 4);

-- --------------------------------------------------------

--
-- 表的結構 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 轉存資料表中的資料 `user`
--

INSERT INTO `user` (`userid`, `account`, `password`) VALUES
(1, 'Lily', '0000'),
(2, 'Johnny', 'johnny');

-- --------------------------------------------------------

--
-- 表的結構 `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `userid` int(11) NOT NULL,
  `questionid` int(11) NOT NULL,
  `gb` tinyint(1) NOT NULL,
  PRIMARY KEY (`questionid`,`userid`),
  KEY `userid` (`userid`),
  KEY `questionid` (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 匯出資料表的 Constraints
--

--
-- 資料表的 Constraints `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `question_id` FOREIGN KEY (`questionid`) REFERENCES `question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `file_id` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- 資料表的 Constraints `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`questionid`) REFERENCES `question` (`questionid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
