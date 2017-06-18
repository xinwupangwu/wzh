-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?06 �?18 �?14:17
-- 服务器版本: 5.7.16
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wzhbg`
--

-- --------------------------------------------------------

--
-- 表的结构 `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `day` varchar(45) DEFAULT NULL,
  `timestart` varchar(45) DEFAULT NULL,
  `timeend` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `timeprocess` varchar(45) DEFAULT NULL,
  `thing` tinytext,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `agenda`
--

INSERT INTO `agenda` (`aid`, `username`, `day`, `timestart`, `timeend`, `status`, `timeprocess`, `thing`) VALUES
(1, 'admin', '1', '-16', '-17-30', 'agenda-event anthracite-gradient', '4 PM - 5:30 PM', 'Event description'),
(3, 'admin', '2', '-16-30', '-17-30', 'agenda-event', '4:30 PM - 5:30 PM', 'Event description'),
(8, 'admin', '3', '-8', '-16', 'agenda-event anthracite-gradient', '8 AM - 16 AM', '复习'),
(11, 'admin', '4', '-8', '-17', 'agenda-event', '8AM --17PM', '复习'),
(15, 'admin', '5', '-13', '-15', 'agenda-event blue-gradient', '13 - 15', '1234'),
(16, 'admin', '6', '-8', '-10', 'agenda-event', '8--10', '汇报'),
(17, 'admin', '6', '-10', '-12', 'agenda-event blue-gradient', '8-12', '1111');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `filezui` varchar(45) DEFAULT NULL,
  `filetime` varchar(45) DEFAULT NULL,
  `filepeople` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `file`
--

INSERT INTO `file` (`id`, `filename`, `status`, `filezui`, `filetime`, `filepeople`) VALUES
(26, 'w7-1440x900.jpg', '公共', 'jpg', '2017-06-08 23:21:08', 'admin'),
(27, 'w132-1440x900.jpg', '公共', 'jpg', '2017-06-08 23:21:19', 'admin'),
(28, 'w150-1440x900.jpg', '公共', 'jpg', '2017-06-08 23:21:31', 'admin'),
(29, '12.asm', '公共', 'asm', '2017-06-08 23:21:48', 'admin'),
(30, '新建文本文档.txt', '公共', 'txt', '2017-06-08 23:23:11', 'admin'),
(31, 'w102-1440x900.jpg', '公共', 'jpg', '2017-06-09 08:56:45', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `msend` varchar(45) DEFAULT NULL,
  `mrec` varchar(45) DEFAULT NULL,
  `mtime` varchar(45) DEFAULT NULL,
  `mthing` tinytext,
  `mstatus` varchar(45) DEFAULT NULL,
  `mfujian` tinytext,
  `misstarck` int(11) DEFAULT NULL,
  `mtitle` tinytext,
  `misread` int(11) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`mid`, `msend`, `mrec`, `mtime`, `mthing`, `mstatus`, `mfujian`, `misstarck`, `mtitle`, `misread`) VALUES
(1, 'May Starck', 'admin', 'Mar 5', 'aaa', 'Clients', NULL, 1, 'Message subject', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `pwd` varchar(45) NOT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `eamil` varchar(45) DEFAULT NULL,
  `qq` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `ustatus` varchar(45) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `sex`, `eamil`, `qq`, `tel`, `ustatus`, `tag`) VALUES
(1, '2222', 'admin', '男', '674230431@qq.com', '674230431', '17826871691', 'admin', 'USER'),
(6, 'test', '123', '男', NULL, '111', '111', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
