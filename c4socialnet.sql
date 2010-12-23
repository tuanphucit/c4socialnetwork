-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2010 at 06:03 PM
-- Server version: 5.1.47
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c4socialnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `c4_comment`
--

CREATE TABLE IF NOT EXISTS `c4_comment` (
  `COMMENT_ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `COMMENT_creator` int(20) unsigned NOT NULL,
  `COMMENT_position` int(20) unsigned NOT NULL,
  `COMMENT_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COMMENT_content` varchar(2000) NOT NULL,
  `COMMENT_flag` tinyint(1) NOT NULL,
  `COMMENT_approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`COMMENT_ID`,`COMMENT_creator`,`COMMENT_position`),
  KEY `COMMENT_creator` (`COMMENT_creator`),
  KEY `COMMENT_position` (`COMMENT_position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c4_comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `c4_commentno`
--

CREATE TABLE IF NOT EXISTS `c4_commentno` (
  `COMMENT_ID` int(20) unsigned NOT NULL,
  `user_ID` int(20) unsigned NOT NULL,
  KEY `COMMENT_ID` (`COMMENT_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c4_commentno`
--


-- --------------------------------------------------------

--
-- Table structure for table `c4_event`
--

CREATE TABLE IF NOT EXISTS `c4_event` (
  `EVENT_ID` int(20) unsigned NOT NULL,
  `EVENT_NAME` varchar(100) NOT NULL,
  `EVENT_CREATORID` int(20) unsigned NOT NULL,
  `EVENT_STARTTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EVENT_ENDTIME` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `EVENT_INTRO` varchar(2000) NOT NULL,
  `event_public` int(1) NOT NULL,
  `event_flag` int(1) NOT NULL,
  `event_approved` int(1) NOT NULL,
  PRIMARY KEY (`EVENT_ID`,`EVENT_CREATORID`),
  KEY `EVENT_CREATORID` (`EVENT_CREATORID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c4_event`
--

INSERT INTO `c4_event` (`EVENT_ID`, `EVENT_NAME`, `EVENT_CREATORID`, `EVENT_STARTTIME`, `EVENT_ENDTIME`, `EVENT_INTRO`, `event_public`, `event_flag`, `event_approved`) VALUES
(2, 'sua lai event', 1, '2010-12-25 17:24:07', '2010-11-25 00:00:00', 'vu an nhau ngay 8/11/2010', 1, 0, 1),
(36, 'sua lai event', 1, '2010-12-22 17:24:07', '2010-11-09 00:00:00', 'vu an nhau ngay 8/11/2010', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c4_eventattend`
--

CREATE TABLE IF NOT EXISTS `c4_eventattend` (
  `EVENT_ID` int(20) unsigned NOT NULL,
  `user_ID` int(20) unsigned NOT NULL,
  `EVENTATTEND_STATUS` int(2) NOT NULL,
  PRIMARY KEY (`EVENT_ID`,`user_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c4_eventattend`
--

INSERT INTO `c4_eventattend` (`EVENT_ID`, `user_ID`, `EVENTATTEND_STATUS`) VALUES
(2, 6, 0),
(2, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `c4_friend`
--

CREATE TABLE IF NOT EXISTS `c4_friend` (
  `USER_ID` int(20) unsigned NOT NULL,
  `FRIEND_ID` int(20) unsigned NOT NULL,
  `FRIEND_Status` int(2) unsigned NOT NULL,
  PRIMARY KEY (`USER_ID`,`FRIEND_ID`),
  KEY `FRIEND_ID` (`FRIEND_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c4_friend`
--

INSERT INTO `c4_friend` (`USER_ID`, `FRIEND_ID`, `FRIEND_Status`) VALUES
(1, 4, 1),
(9, 1, 1),
(14, 1, 1),
(14, 9, 1),
(26, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c4_group`
--

CREATE TABLE IF NOT EXISTS `c4_group` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `group_leader` int(20) unsigned NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `group_leader` (`group_leader`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `c4_group`
--

INSERT INTO `c4_group` (`group_id`, `group_name`, `group_leader`) VALUES
(1, 'ADMIN ok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `c4_grouplist`
--

CREATE TABLE IF NOT EXISTS `c4_grouplist` (
  `group_id` int(20) NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  KEY `group_id` (`group_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c4_grouplist`
--


-- --------------------------------------------------------

--
-- Table structure for table `c4_parent`
--

CREATE TABLE IF NOT EXISTS `c4_parent` (
  `c4_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `c4_approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`c4_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `c4_parent`
--

INSERT INTO `c4_parent` (`c4_id`, `c4_approved`) VALUES
(1, 0),
(2, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `c4_post`
--

CREATE TABLE IF NOT EXISTS `c4_post` (
  `POST_ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `POST_position` int(20) unsigned NOT NULL,
  `POST_creator` int(20) unsigned NOT NULL,
  `POST_KIND` int(2) unsigned NOT NULL,
  `POST_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `POST_content` varchar(5000) DEFAULT NULL,
  `POST_link` varchar(100) DEFAULT NULL,
  `POST_flag` tinyint(1) NOT NULL,
  `POST_approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`POST_ID`,`POST_position`,`POST_creator`),
  KEY `POST_creator` (`POST_creator`),
  KEY `POST_position` (`POST_position`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `c4_post`
--

INSERT INTO `c4_post` (`POST_ID`, `POST_position`, `POST_creator`, `POST_KIND`, `POST_DATE`, `POST_content`, `POST_link`, `POST_flag`, `POST_approved`) VALUES
(4, 26, 26, 0, '2010-12-18 16:34:21', 'Post đầu tiên!', '', 0, 1),
(5, 25, 26, 0, '2010-12-18 16:38:41', 'Ê mày là thằng nào đấy?', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c4_postno`
--

CREATE TABLE IF NOT EXISTS `c4_postno` (
  `POST_ID` int(20) unsigned NOT NULL,
  `user_ID` int(20) unsigned NOT NULL,
  KEY `POST_ID` (`POST_ID`),
  KEY `user_ID` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c4_postno`
--

INSERT INTO `c4_postno` (`POST_ID`, `user_ID`) VALUES
(5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `c4_user`
--

CREATE TABLE IF NOT EXISTS `c4_user` (
  `USER_ID` int(20) unsigned NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `User_login` varchar(60) NOT NULL,
  `User_name` varchar(60) NOT NULL,
  `User_seniorID` int(20) NOT NULL,
  `USER_avatar` varchar(100) NOT NULL,
  `User_ROLE` int(2) NOT NULL,
  `User_email` varchar(100) NOT NULL,
  `User_url` varchar(100) DEFAULT NULL,
  `User_YM` varchar(60) DEFAULT NULL,
  `User_skype` varchar(60) DEFAULT NULL,
  `User_Mobile` varchar(11) DEFAULT NULL,
  `User_schoolYear` int(10) NOT NULL,
  `User_status` int(2) NOT NULL,
  `User_birthday` date NOT NULL,
  `User_sex` varchar(10) NOT NULL,
  `User_resident` varchar(60) DEFAULT NULL,
  `User_NativeVillage` varchar(60) DEFAULT NULL,
  `User_favoriteQuote` varchar(200) DEFAULT NULL,
  `User_bio` varchar(500) DEFAULT NULL,
  `USER_BOOK` varchar(50) DEFAULT NULL,
  `USER_MUSIC` varchar(50) DEFAULT NULL,
  `USER_INTERESTED` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `User_login` (`User_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c4_user`
--

INSERT INTO `c4_user` (`USER_ID`, `user_password`, `User_login`, `User_name`, `User_seniorID`, `USER_avatar`, `User_ROLE`, `User_email`, `User_url`, `User_YM`, `User_skype`, `User_Mobile`, `User_schoolYear`, `User_status`, `User_birthday`, `User_sex`, `User_resident`, `User_NativeVillage`, `User_favoriteQuote`, `User_bio`, `USER_BOOK`, `USER_MUSIC`, `USER_INTERESTED`) VALUES
(1, '', 'a', 'aname', 2, '1/avatar/avatar1.jpg', 1, 'fsdfsfdsfdsfdsf', NULL, NULL, NULL, NULL, 52, 1, '2010-11-08', 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2345', 'user2', 'user2name', 1, '4/avatar/avatar1.jpg', 1, 'mailuser2', 'user2 url', '$userYM', '$userSkype', '$userMobile', 52, 1, '2010-11-08', 'male', '$userResident', '$userNativeVillage', '$userFavoriteQuote', '$userBio', '$userBook', '$userMusic', '$userInterested'),
(6, 'test password', 'testuser3', 'nameOfTestUser3', 1, 'user avatar', 1, 'testUser3$mail', NULL, NULL, NULL, NULL, 52, 1, '2010-11-08', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'test password', 'testuser4', 'nameOfTestUser4', 1, '9/avatar/avatar2.jpg', 1, 'testUser4$mail', NULL, NULL, NULL, NULL, 52, 1, '2010-11-08', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '48680b411bacd194542930cd207b2ea6', 'matrixtheone', 'Do Viet Cuong', 1, '14/avatar/avatar.jpg', 1, 'cuongseo3489@gmail.com', NULL, NULL, NULL, NULL, 4, 1, '1989-04-03', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'e10adc3949ba59abbe56e057f20f883e', 'cuongdv', 'Cuong kid', 1, '../user/image01.jpg', 1, 'cuongseo3489@gmail.com', NULL, NULL, NULL, NULL, 52, 1, '1989-04-03', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'c4ca4238a0b923820dcc509a6f75849b', 'chungth', 'Trần Huy Chung', 1, '../user/image01.jpg', 1, '2ehanoi@gmail.com', NULL, NULL, NULL, NULL, 52, 1, '1930-01-01', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'c4ca4238a0b923820dcc509a6f75849b', 'cuongseo3489', 'Cường siêu nhân', 9, '../user/image01.jpg', 0, 'theking3489@gmail.com', NULL, NULL, NULL, NULL, 52, 1, '1989-04-03', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `comment_notification`
--
CREATE TABLE IF NOT EXISTS `comment_notification` (
`comment_id` int(20) unsigned
,`comment_creator` int(20) unsigned
,`comment_position` int(20) unsigned
,`user_id` int(20) unsigned
,`post_position` int(20) unsigned
,`post_kind` int(2) unsigned
,`comment_date` timestamp
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `post_notification`
--
CREATE TABLE IF NOT EXISTS `post_notification` (
`post_id` int(20) unsigned
,`post_position` int(20) unsigned
,`post_creator` int(20) unsigned
,`user_id` int(20) unsigned
,`post_date` timestamp
);
-- --------------------------------------------------------

--
-- Structure for view `comment_notification`
--
DROP TABLE IF EXISTS `comment_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_notification` AS (select `c4_commentno`.`COMMENT_ID` AS `comment_id`,`c4_comment`.`COMMENT_creator` AS `comment_creator`,`c4_comment`.`COMMENT_position` AS `comment_position`,`c4_commentno`.`user_ID` AS `user_id`,`c4_post`.`POST_position` AS `post_position`,`c4_post`.`POST_KIND` AS `post_kind`,`c4_comment`.`COMMENT_date` AS `comment_date` from ((`c4_comment` join `c4_commentno`) join `c4_post`) where ((`c4_comment`.`COMMENT_ID` = `c4_commentno`.`COMMENT_ID`) and (`c4_comment`.`COMMENT_position` = `c4_post`.`POST_ID`)));

-- --------------------------------------------------------

--
-- Structure for view `post_notification`
--
DROP TABLE IF EXISTS `post_notification`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_notification` AS (select `c4_post`.`POST_ID` AS `post_id`,`c4_post`.`POST_position` AS `post_position`,`c4_post`.`POST_creator` AS `post_creator`,`c4_postno`.`user_ID` AS `user_id`,`c4_post`.`POST_DATE` AS `post_date` from (`c4_post` join `c4_postno`) where (`c4_post`.`POST_ID` = `c4_postno`.`POST_ID`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `c4_comment`
--
ALTER TABLE `c4_comment`
  ADD CONSTRAINT `c4_comment_ibfk_1` FOREIGN KEY (`COMMENT_creator`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_comment_ibfk_2` FOREIGN KEY (`COMMENT_position`) REFERENCES `c4_post` (`POST_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_commentno`
--
ALTER TABLE `c4_commentno`
  ADD CONSTRAINT `c4_commentno_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_commentno_ibfk_2` FOREIGN KEY (`COMMENT_ID`) REFERENCES `c4_comment` (`COMMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_event`
--
ALTER TABLE `c4_event`
  ADD CONSTRAINT `c4_event_ibfk_1` FOREIGN KEY (`EVENT_CREATORID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_event_ibfk_2` FOREIGN KEY (`EVENT_ID`) REFERENCES `c4_parent` (`c4_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_eventattend`
--
ALTER TABLE `c4_eventattend`
  ADD CONSTRAINT `c4_eventattend_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_eventattend_ibfk_2` FOREIGN KEY (`EVENT_ID`) REFERENCES `c4_event` (`EVENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_friend`
--
ALTER TABLE `c4_friend`
  ADD CONSTRAINT `c4_friend_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_friend_ibfk_2` FOREIGN KEY (`FRIEND_ID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_group`
--
ALTER TABLE `c4_group`
  ADD CONSTRAINT `c4_group_ibfk_1` FOREIGN KEY (`group_leader`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_grouplist`
--
ALTER TABLE `c4_grouplist`
  ADD CONSTRAINT `c4_grouplist_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `c4_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_grouplist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_post`
--
ALTER TABLE `c4_post`
  ADD CONSTRAINT `c4_post_ibfk_1` FOREIGN KEY (`POST_creator`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_post_ibfk_2` FOREIGN KEY (`POST_position`) REFERENCES `c4_parent` (`c4_id`);

--
-- Constraints for table `c4_postno`
--
ALTER TABLE `c4_postno`
  ADD CONSTRAINT `c4_postno_ibfk_5` FOREIGN KEY (`POST_ID`) REFERENCES `c4_post` (`POST_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_postno_ibfk_6` FOREIGN KEY (`user_ID`) REFERENCES `c4_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c4_user`
--
ALTER TABLE `c4_user`
  ADD CONSTRAINT `c4_user_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `c4_parent` (`c4_id`) ON DELETE CASCADE ON UPDATE CASCADE;
