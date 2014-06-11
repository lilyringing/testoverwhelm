-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 建立日期: 2014 年 06 月 11 日 05:37
-- 伺服器版本: 5.5.34
-- PHP 版本: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `testoverwhelm`
--

-- --------------------------------------------------------

--
-- 資料表結構 `newanswer`
--

CREATE TABLE IF NOT EXISTS `newanswer` (
  `answerid` int(11) NOT NULL,
  `fileid` int(11) NOT NULL,
  `account` varchar(25) NOT NULL,
  `updatetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`answerid`),
  KEY `fileid` (`fileid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `newanswer`
--

INSERT INTO `newanswer` (`answerid`, `fileid`, `account`, `updatetime`) VALUES
(2, 1, 'Lily', '2014-06-09 22:45:18'),
(3, 1, 'Johnny', '2014-06-09 22:45:27'),
(4, 1, 'Lily', '2014-06-09 22:45:39'),
(5, 1, 'Lily', '2014-06-09 22:45:39');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `newanswer`
--
ALTER TABLE `newanswer`
  ADD CONSTRAINT `newanswer_ibfk_4` FOREIGN KEY (`answerid`) REFERENCES `answer` (`answerid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `newanswer_ibfk_5` FOREIGN KEY (`fileid`) REFERENCES `file` (`fileid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
