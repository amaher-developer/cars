-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 11:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `groupId` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `lastLogin` int(11) NOT NULL,
  `supperAdmin` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `groupId`, `name`, `email`, `mobile`, `password`, `note`, `lastLogin`, `supperAdmin`, `type`, `visible`, `deleted`) VALUES
(1, 1, 'maher', 'maher@maher.com', '01002509905', 'maher', '', 1473193018, 1, 1, 1, 0),
(10, 11, 'noura', 'nourelsayed_2010@yahoo.com', '01123150257', '01123150257', '', 0, 0, 0, 1, 0),
(8, 11, 'gemy', 'alfa_graphic@yahoo.com', '01093174220', '01093174220', '', 1472735734, 0, 0, 1, 0),
(9, 11, 'Ø§Ø­Ù…Ø¯ Ø²ÙƒÙŠ', 'ahmedzaky@yahoo.com', '01006221565', '01006221565', '', 1437345452, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `adminslog`
--

CREATE TABLE IF NOT EXISTS `adminslog` (
`id` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `note` text NOT NULL,
  `page` varchar(255) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminslog`
--

INSERT INTO `adminslog` (`id`, `adminId`, `date`, `type`, `note`, `page`, `url`) VALUES
(1, 1, 1437209154, 2, 'maher logout at 2015-07-18 08:45:54', '', ''),
(2, 1, 1437209192, 1, 'maher login at 2015-07-18 08:46:32', '', ''),
(3, 1, 1437213494, 1, 'maher login at 2015-07-18 09:58:14', '', ''),
(4, 1, 1437214688, 2, 'maher logout at 2015-07-18 10:18:08', '', ''),
(5, 8, 1437214705, 1, 'gemy login at 2015-07-18 10:18:25', '', ''),
(6, 8, 1437332445, 1, 'gemy login at 2015-07-19 19:00:45', '', ''),
(7, 8, 1437336550, 1, 'gemy login at 2015-07-19 20:09:10', '', ''),
(8, 8, 1437345034, 1, 'gemy login at 2015-07-19 22:30:34', '', ''),
(9, 8, 1437345414, 2, 'gemy logout at 2015-07-19 22:36:54', '', ''),
(10, 9, 1437345452, 1, 'Ø§Ø­Ù…Ø¯ Ø²ÙƒÙŠ login at 2015-07-19 22:37:32', '', ''),
(11, 8, 1437348473, 1, 'gemy login at 2015-07-19 23:27:53', '', ''),
(12, 8, 1437349525, 1, 'gemy login at 2015-07-19 23:45:25', '', ''),
(13, 8, 1437481210, 1, 'gemy login at 2015-07-21 12:20:10', '', ''),
(14, 8, 1437566568, 1, 'gemy login at 2015-07-22 12:02:48', '', ''),
(15, 1, 1437728224, 1, 'maher login at 2015-07-24 08:57:04', '', ''),
(16, 1, 1437815053, 1, 'maher login at 2015-07-25 09:04:13', '', ''),
(17, 1, 1437829787, 1, 'maher login at 2015-07-25 13:09:47', '', ''),
(18, 1, 1437942277, 1, 'maher login at 2015-07-26 20:24:37', '', ''),
(19, 8, 1438369693, 1, 'gemy login at 2015-07-31 19:08:13', '', ''),
(20, 8, 1438813974, 1, 'gemy login at 2015-08-05 22:32:53', '', ''),
(21, 1, 1439150240, 1, 'maher login at 2015-08-09 19:57:20', '', ''),
(22, 1, 1439155399, 1, 'maher login at 2015-08-09 21:23:19', '', ''),
(23, 1, 1439253503, 1, 'maher login at 2015-08-11 02:38:23', '', ''),
(24, 8, 1439590756, 1, 'gemy login at 2015-08-15 00:19:15', '', ''),
(25, 8, 1439591430, 2, 'gemy logout at 2015-08-15 00:30:30', '', ''),
(26, 8, 1439591530, 1, 'gemy login at 2015-08-15 00:32:10', '', ''),
(27, 8, 1439591714, 1, 'gemy login at 2015-08-15 00:35:14', '', ''),
(28, 1, 1439677396, 1, 'maher login at 2015-08-16 00:23:16', '', ''),
(29, 1, 1439682877, 1, 'maher login at 2015-08-16 01:54:37', '', ''),
(30, 8, 1439715709, 1, 'gemy login at 2015-08-16 11:01:49', '', ''),
(31, 8, 1439725937, 1, 'gemy login at 2015-08-16 13:52:17', '', ''),
(32, 8, 1439732022, 1, 'gemy login at 2015-08-16 15:33:42', '', ''),
(33, 1, 1439739412, 1, 'maher login at 2015-08-16 17:36:52', '', ''),
(34, 8, 1439799972, 1, 'gemy login at 2015-08-17 10:26:12', '', ''),
(35, 8, 1439851372, 1, 'gemy login at 2015-08-18 00:42:52', '', ''),
(36, 8, 1439856615, 1, 'gemy login at 2015-08-18 02:10:15', '', ''),
(37, 8, 1439926833, 1, 'gemy login at 2015-08-18 21:40:33', '', ''),
(38, 8, 1439941001, 1, 'gemy login at 2015-08-19 01:36:41', '', ''),
(39, 8, 1439977283, 1, 'gemy login at 2015-08-19 11:41:23', '', ''),
(40, 8, 1439983612, 1, 'gemy login at 2015-08-19 13:26:52', '', ''),
(41, 8, 1440507116, 1, 'gemy login at 2015-08-25 14:51:56', '', ''),
(42, 8, 1440684340, 1, 'gemy login at 2015-08-27 16:05:40', '', ''),
(43, 8, 1440764367, 1, 'gemy login at 2015-08-28 14:19:27', '', ''),
(44, 8, 1440764449, 1, 'gemy login at 2015-08-28 14:20:49', '', ''),
(45, 8, 1440868371, 1, 'gemy login at 2015-08-29 19:12:51', '', ''),
(46, 1, 1441173822, 1, 'maher login at 2015-09-02 08:03:42', '', ''),
(47, 8, 1441271633, 1, 'gemy login at 2015-09-03 11:13:53', '', ''),
(48, 1, 1441450588, 1, 'maher login at 2015-09-05 12:56:28', '', ''),
(49, 8, 1441636098, 1, 'gemy login at 2015-09-07 16:28:18', '', ''),
(50, 8, 1441921691, 1, 'gemy login at 2015-09-10 23:48:11', '', ''),
(51, 8, 1442173828, 1, 'gemy login at 2015-09-13 21:50:28', '', ''),
(52, 8, 1442393807, 1, 'gemy login at 2015-09-16 10:56:47', '', ''),
(53, 8, 1442410710, 1, 'gemy login at 2015-09-16 15:38:30', '', ''),
(54, 8, 1442480737, 1, 'gemy login at 2015-09-17 11:05:37', '', ''),
(55, 8, 1442493328, 1, 'gemy login at 2015-09-17 14:35:28', '', ''),
(56, 8, 1442498559, 1, 'gemy login at 2015-09-17 16:02:39', '', ''),
(57, 8, 1442501663, 1, 'gemy login at 2015-09-17 16:54:23', '', ''),
(58, 1, 1442596551, 1, 'maher login at 2015-09-18 19:15:51', '', ''),
(59, 8, 1442751364, 1, 'gemy login at 2015-09-20 14:16:04', '', ''),
(60, 8, 1442950269, 1, 'gemy login at 2015-09-22 21:31:09', '', ''),
(61, 8, 1443540206, 1, 'gemy login at 2015-09-29 17:23:26', '', ''),
(62, 8, 1443704002, 1, 'gemy login at 2015-10-01 14:53:22', '', ''),
(63, 8, 1443715194, 1, 'gemy login at 2015-10-01 17:59:54', '', ''),
(64, 8, 1443722566, 1, 'gemy login at 2015-10-01 20:02:46', '', ''),
(65, 8, 1443726013, 1, 'gemy login at 2015-10-01 21:00:13', '', ''),
(66, 8, 1443733117, 1, 'gemy login at 2015-10-01 22:58:37', '', ''),
(67, 8, 1443823494, 1, 'gemy login at 2015-10-03 00:04:54', '', ''),
(68, 8, 1444085520, 1, 'gemy login at 2015-10-06 00:52:00', '', ''),
(69, 8, 1444231173, 1, 'gemy login at 2015-10-07 17:19:33', '', ''),
(70, 8, 1444584271, 1, 'gemy login at 2015-10-11 19:24:31', '', ''),
(71, 8, 1444601061, 1, 'gemy login at 2015-10-12 00:04:21', '', ''),
(72, 8, 1444691083, 1, 'gemy login at 2015-10-13 01:04:43', '', ''),
(73, 8, 1444723918, 1, 'gemy login at 2015-10-13 10:11:58', '', ''),
(74, 8, 1444754089, 1, 'gemy login at 2015-10-13 18:34:49', '', ''),
(75, 8, 1444763273, 1, 'gemy login at 2015-10-13 21:07:53', '', ''),
(76, 8, 1444780140, 1, 'gemy login at 2015-10-14 01:49:00', '', ''),
(77, 8, 1444857249, 1, 'gemy login at 2015-10-14 23:14:09', '', ''),
(78, 8, 1444919509, 1, 'gemy login at 2015-10-15 16:31:49', '', ''),
(79, 8, 1444927321, 1, 'gemy login at 2015-10-15 18:42:01', '', ''),
(80, 8, 1444945848, 1, 'gemy login at 2015-10-15 23:50:48', '', ''),
(81, 8, 1445179849, 1, 'gemy login at 2015-10-18 16:50:49', '', ''),
(82, 8, 1445189947, 1, 'gemy login at 2015-10-18 19:39:07', '', ''),
(83, 8, 1445197016, 1, 'gemy login at 2015-10-18 21:36:56', '', ''),
(84, 8, 1445199193, 1, 'gemy login at 2015-10-18 22:13:13', '', ''),
(85, 8, 1445222734, 1, 'gemy login at 2015-10-19 04:45:34', '', ''),
(86, 1, 1445293373, 1, 'maher login at 2015-10-20 00:22:53', '', ''),
(87, 8, 1445305746, 1, 'gemy login at 2015-10-20 03:49:06', '', ''),
(88, 1, 1445434857, 1, 'maher login at 2015-10-21 15:40:57', '', ''),
(89, 1, 1445436737, 2, 'maher logout at 2015-10-21 16:12:17', '', ''),
(90, 1, 1445436738, 1, 'maher login at 2015-10-21 16:12:18', '', ''),
(91, 1, 1445436787, 2, 'maher logout at 2015-10-21 16:13:07', '', ''),
(92, 1, 1445436789, 1, 'maher login at 2015-10-21 16:13:09', '', ''),
(93, 8, 1445482783, 1, 'gemy login at 2015-10-22 04:59:43', '', ''),
(94, 8, 1445525736, 1, 'gemy login at 2015-10-22 16:55:36', '', ''),
(95, 8, 1445547994, 1, 'gemy login at 2015-10-22 23:06:34', '', ''),
(96, 8, 1445549310, 1, 'gemy login at 2015-10-22 23:28:30', '', ''),
(97, 8, 1445549607, 1, 'gemy login at 2015-10-22 23:33:27', '', ''),
(98, 8, 1445551309, 1, 'gemy login at 2015-10-23 00:01:49', '', ''),
(99, 8, 1445556275, 1, 'gemy login at 2015-10-23 01:24:35', '', ''),
(100, 8, 1445568018, 1, 'gemy login at 2015-10-23 04:40:18', '', ''),
(101, 8, 1445603757, 1, 'gemy login at 2015-10-23 14:35:57', '', ''),
(102, 8, 1445617081, 1, 'gemy login at 2015-10-23 18:18:01', '', ''),
(103, 8, 1445628650, 1, 'gemy login at 2015-10-23 21:30:50', '', ''),
(104, 1, 1445683119, 1, 'maher login at 2015-10-24 12:38:39', '', ''),
(105, 8, 1445716422, 1, 'gemy login at 2015-10-24 21:53:41', '', ''),
(106, 8, 1445720310, 1, 'gemy login at 2015-10-24 22:58:30', '', ''),
(107, 8, 1445728195, 1, 'gemy login at 2015-10-25 01:09:55', '', ''),
(108, 8, 1445733987, 1, 'gemy login at 2015-10-25 02:46:27', '', ''),
(109, 8, 1445880569, 1, 'gemy login at 2015-10-26 19:29:29', '', ''),
(110, 8, 1445974716, 1, 'gemy login at 2015-10-27 21:38:36', '', ''),
(111, 8, 1445981127, 1, 'gemy login at 2015-10-27 23:25:27', '', ''),
(112, 8, 1445986447, 1, 'gemy login at 2015-10-28 00:54:07', '', ''),
(113, 8, 1446063155, 1, 'gemy login at 2015-10-28 22:12:35', '', ''),
(114, 8, 1446078548, 1, 'gemy login at 2015-10-29 02:29:08', '', ''),
(115, 8, 1446078633, 2, 'gemy logout at 2015-10-29 02:30:33', '', ''),
(116, 8, 1446169714, 1, 'gemy login at 2015-10-30 03:48:34', '', ''),
(117, 8, 1446202806, 1, 'gemy login at 2015-10-30 13:00:06', '', ''),
(118, 8, 1446248568, 1, 'gemy login at 2015-10-31 01:42:48', '', ''),
(119, 8, 1446397592, 1, 'gemy login at 2015-11-01 19:06:32', '', ''),
(120, 8, 1446399882, 1, 'gemy login at 2015-11-01 19:44:42', '', ''),
(121, 8, 1446418815, 1, 'gemy login at 2015-11-02 01:00:15', '', ''),
(122, 8, 1446476487, 1, 'gemy login at 2015-11-02 17:01:27', '', ''),
(123, 8, 1446485830, 1, 'gemy login at 2015-11-02 19:37:10', '', ''),
(124, 8, 1446489209, 1, 'gemy login at 2015-11-02 20:33:29', '', ''),
(125, 8, 1446647059, 1, 'gemy login at 2015-11-04 16:24:19', '', ''),
(126, 8, 1446696362, 1, 'gemy login at 2015-11-05 06:06:02', '', ''),
(127, 8, 1446765294, 1, 'gemy login at 2015-11-06 01:14:54', '', ''),
(128, 8, 1447112265, 1, 'gemy login at 2015-11-10 01:37:45', '', ''),
(129, 8, 1447115810, 1, 'gemy login at 2015-11-10 02:36:50', '', ''),
(130, 8, 1447153119, 1, 'gemy login at 2015-11-10 12:58:39', '', ''),
(131, 8, 1447193514, 1, 'gemy login at 2015-11-11 00:11:54', '', ''),
(132, 8, 1447246014, 1, 'gemy login at 2015-11-11 14:46:54', '', ''),
(133, 8, 1447288743, 1, 'gemy login at 2015-11-12 02:39:03', '', ''),
(134, 8, 1447474594, 1, 'gemy login at 2015-11-14 06:16:34', '', ''),
(135, 8, 1447477443, 1, 'gemy login at 2015-11-14 07:04:03', '', ''),
(136, 1, 1447479268, 1, 'maher login at 2015-11-14 07:34:28', '', ''),
(137, 8, 1447510825, 1, 'gemy login at 2015-11-14 16:20:25', '', ''),
(138, 8, 1447520886, 1, 'gemy login at 2015-11-14 19:08:06', '', ''),
(139, 8, 1447529030, 1, 'gemy login at 2015-11-14 21:23:50', '', ''),
(140, 8, 1447541780, 1, 'gemy login at 2015-11-15 00:56:20', '', ''),
(141, 8, 1447597616, 1, 'gemy login at 2015-11-15 16:26:55', '', ''),
(142, 8, 1447630474, 1, 'gemy login at 2015-11-16 01:34:34', '', ''),
(143, 8, 1447667469, 1, 'gemy login at 2015-11-16 11:51:09', '', ''),
(144, 8, 1447707065, 1, 'gemy login at 2015-11-16 22:51:05', '', ''),
(145, 8, 1447717037, 1, 'gemy login at 2015-11-17 01:37:17', '', ''),
(146, 8, 1447857130, 1, 'gemy login at 2015-11-18 16:32:10', '', ''),
(147, 8, 1447874744, 1, 'gemy login at 2015-11-18 21:25:44', '', ''),
(148, 8, 1447895602, 1, 'gemy login at 2015-11-19 03:13:22', '', ''),
(149, 8, 1447946564, 1, 'gemy login at 2015-11-19 17:22:44', '', ''),
(150, 8, 1447975103, 1, 'gemy login at 2015-11-20 01:18:22', '', ''),
(151, 8, 1448045211, 1, 'gemy login at 2015-11-20 20:46:51', '', ''),
(152, 8, 1448052472, 1, 'gemy login at 2015-11-20 22:47:52', '', ''),
(153, 8, 1448117869, 1, 'gemy login at 2015-11-21 16:57:49', '', ''),
(154, 8, 1448213082, 1, 'gemy login at 2015-11-22 19:24:42', '', ''),
(155, 8, 1448366368, 1, 'gemy login at 2015-11-24 13:59:28', '', ''),
(156, 8, 1448826186, 1, 'gemy login at 2015-11-29 21:43:06', '', ''),
(157, 8, 1449186436, 1, 'gemy login at 2015-12-04 01:47:16', '', ''),
(158, 8, 1449651313, 1, 'gemy login at 2015-12-09 10:55:13', '', ''),
(159, 8, 1449692508, 1, 'gemy login at 2015-12-09 22:21:48', '', ''),
(160, 8, 1450357062, 1, 'gemy login at 2015-12-17 14:57:42', '', ''),
(161, 8, 1450364867, 1, 'gemy login at 2015-12-17 17:07:47', '', ''),
(162, 8, 1450406295, 1, 'gemy login at 2015-12-18 04:38:15', '', ''),
(163, 8, 1450537683, 1, 'gemy login at 2015-12-19 17:08:03', '', ''),
(164, 1, 1466939055, 1, 'maher login at 2016-06-26 13:04:15', '', ''),
(165, 8, 1472735734, 1, 'gemy login at 2016-09-01 15:15:34', '', ''),
(166, 1, 1473193010, 1, 'maher login at 2016-09-06 22:16:50', '', ''),
(167, 1, 1473193015, 2, 'maher logout at 2016-09-06 22:16:55', '', ''),
(168, 1, 1473193018, 1, 'maher login at 2016-09-06 22:16:58', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admins_groups`
--

CREATE TABLE IF NOT EXISTS `admins_groups` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins_groups`
--

INSERT INTO `admins_groups` (`id`, `name`, `permissions`, `deleted`) VALUES
(1, 'Super Super Admin', 'userAdd,newsAdd,newsEdit,userGroupEdit,places,categoryEdit,placeAdd,placeEdit,categoryAdd,default,login,userGroups,userMail,userGroupAdd,userEdit,users,advEdit,categories,advAdd,news,config,ads,contacts', 0),
(11, 'Super Admin', 'userAdd,newsAdd,newsEdit,userGroupEdit,places,categoryEdit,placeAdd,placeEdit,categoryAdd,default,login,userGroups,userMail,userGroupAdd,userEdit,users,advEdit,categories,advAdd,news,config,ads,contacts', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `udate` int(11) NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
`id` int(11) NOT NULL,
  `advId` int(11) NOT NULL,
  `reason` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `advId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`id` int(11) NOT NULL,
  `question` text NOT NULL,
  `userId` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cityId` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `udate` int(11) NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `block` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`), ADD KEY `visible` (`visible`), ADD KEY `deleted` (`deleted`), ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `adminslog`
--
ALTER TABLE `adminslog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins_groups`
--
ALTER TABLE `admins_groups`
 ADD PRIMARY KEY (`id`), ADD KEY `deleted` (`deleted`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
 ADD PRIMARY KEY (`id`), ADD KEY `visible` (`visible`), ADD KEY `activate` (`activate`), ADD KEY `userId` (`userId`), ADD KEY `cityId` (`cityId`), ADD KEY `districtId` (`districtId`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`), ADD KEY `questionId` (`questionId`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
 ADD PRIMARY KEY (`id`), ADD KEY `advId` (`advId`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `advId` (`advId`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`id`), ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `cityId` (`cityId`), ADD KEY `activate` (`activate`), ADD KEY `block` (`block`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `adminslog`
--
ALTER TABLE `adminslog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `admins_groups`
--
ALTER TABLE `admins_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
