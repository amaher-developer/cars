-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2016 at 01:36 PM
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
(1, 1, 'maher', 'maher@maher.com', '01002509905', 'maher', '', 1473955759, 1, 1, 1, 0),
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
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

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
(168, 1, 1473193018, 1, 'maher login at 2016-09-06 22:16:58', '', ''),
(169, 1, 1473953252, 1, 'maher login at 2016-09-15 17:27:32', '', ''),
(170, 1, 1473955757, 2, 'maher logout at 2016-09-15 18:09:17', '', ''),
(171, 1, 1473955759, 1, 'maher login at 2016-09-15 18:09:19', '', '');

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
(1, 'Super Super Admin', 'adminAdd,newsAdd,newsEdit,adminGroupEdit,places,categoryEdit,placeAdd,placeEdit,categoryAdd,default,login,adminGroups,userMail,adminGroupAdd,userEdit,admins,advEdit,categories,advAdd,news,config,ads,contacts', 0),
(11, 'Super Admin', 'ads,advAdd,advEdit,categories,categoryAdd,categoryEdit,config,contacts,default,login,news,newsAdd,newsEdit,placeAdd,placeEdit,places', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `districtId` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `make` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `motor` int(11) NOT NULL,
  `kilometer` int(11) NOT NULL,
  `shape` int(3) NOT NULL,
  `door` int(2) NOT NULL,
  `gearbox` int(2) NOT NULL,
  `tradable` tinyint(4) NOT NULL,
  `title` varchar(350) NOT NULL,
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
  `views` int(11) NOT NULL,
  `aircondition` tinyint(4) NOT NULL,
  `electricwindows` tinyint(4) NOT NULL,
  `sunroof` tinyint(4) NOT NULL,
  `ABS` tinyint(4) NOT NULL,
  `centerlock` tinyint(4) NOT NULL,
  `alarm` tinyint(4) NOT NULL,
  `cruisecontrol` tinyint(4) NOT NULL,
  `EBD` tinyint(4) NOT NULL,
  `powerstearing` tinyint(4) NOT NULL,
  `airbags` tinyint(4) NOT NULL,
  `radiocassette` tinyint(4) NOT NULL
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
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(4) NOT NULL,
  `countryId` int(3) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_en` varchar(250) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countryId`, `name`, `name_en`, `latitude`, `longitude`) VALUES
(1, 1, 'Ø§Ù„Ù‚Ø§Ù‡Ø±Ø©', 'Cairo', 30.1294930441163, 31.2303957236206),
(2, 1, 'Ø§Ù„Ø§Ø³ÙƒÙ†Ø¯Ø±ÙŠØ©', 'Alexandria', 31.1033167610819, 29.9395021689331),
(3, 1, 'Ø§Ù„Ø¬ÙŠØ²Ø©', 'Giza', 29.9868602546576, 31.2358888876831),
(4, 1, 'Ø§Ù„Ù‚Ù„ÙŠÙˆØ¨ÙŠØ©', 'Qalyubia', 30.4425600348165, 31.1974367392456),
(5, 1, 'Ø§Ù„Ù…Ù†ÙˆÙÙŠØ©', 'Minufiyah', 30.7451831958853, 31.0161623251831),
(6, 1, 'Ø§Ù„ØºØ±Ø¨ÙŠØ©', 'Gharbia', 30.7451831958853, 31.0271486533081),
(7, 1, 'Ø§Ù„Ø´Ø±Ù‚ÙŠØ©', 'Sharqiya', 30.5561544420763, 31.2413820517456),
(8, 1, 'ÙƒÙØ± Ø§Ù„Ø´ÙŠØ®', 'Kafr El Sheikh', 31.0374456231032, 31.3842043173706),
(9, 1, 'Ø§Ù„Ø¯Ù‚Ù‡Ù„ÙŠØ©', 'Dakahlia', 31.032738796183, 31.3732179892456),
(10, 1, 'Ø§Ø³ÙˆØ§Ù†', 'Aswan', 24.0399877828997, 32.8618654501831),
(11, 1, 'Ø§Ø³ÙŠÙˆØ·', 'Asyut', 27.1506105596074, 31.1479982626831),
(12, 1, 'Ø§Ù„Ø¨Ø­ÙŠØ±Ø© ', 'Beheira', 31.0186169196421, 30.4723390829956),
(13, 1, 'Ø¨Ù†ÙŠ Ø³ÙˆÙŠÙ', 'Beni Suef', 29.0691771681412, 31.0601076376831),
(14, 1, 'Ø¯Ù…ÙŠØ§Ø·', 'Damietta', 31.4132362298121, 31.8085512411988),
(15, 1, 'Ø§Ù„ÙÙŠÙˆÙ…', 'Fayyum', 29.2897958611018, 30.8513674033081),
(16, 1, 'Ø§Ù„Ø§Ø³Ù…Ø§Ø¹ÙŠÙ„ÙŠØ©', 'Ismailia', 30.5892611414596, 32.2686037314331),
(17, 1, 'Ù…Ø·Ø±ÙˆØ­', 'Marsa Matruh', 31.3522720093676, 27.2313722861206),
(18, 1, 'Ø§Ù„Ù…Ù†ÙŠØ§', 'Minya', 28.0851100056798, 30.7634767783081),
(19, 1, 'Ø§Ù„ÙˆØ§Ø¯ÙŠ Ø§Ù„Ø¬Ø¯ÙŠØ¯', 'New Valley', 25.4021411869729, 30.5931886923706),
(20, 1, 'Ø´Ù…Ø§Ù„ Ø³ÙŠÙ†Ø§Ø¡', 'North Sinai', 31.1080200959217, 33.8011965048706),
(21, 1, 'Ø¨ÙˆØ±Ø³Ø¹ÙŠØ¯', 'Port Said', 31.2002758683839, 32.3461946738159),
(22, 1, 'Ù‚Ù†Ø§', 'Qena', 26.149072466884, 32.7080568564331),
(23, 1, 'Ø§Ù„Ø¨Ø­Ø± Ø§Ù„Ø§Ø­Ù…Ø±', 'Red Sea', 27.2092496272562, 33.8066896689331),
(24, 1, 'Ø³ÙˆÙ‡Ø§Ø¬', 'Sohag', 26.5477927889032, 31.6973146689331),
(25, 1, 'Ø¬Ù†ÙˆØ¨ Ø³ÙŠÙ†Ø§Ø¡ ', 'South Sinai', 28.0657228966674, 34.1472658408081),
(26, 1, 'Ø§Ù„Ø³ÙˆÙŠØ³', 'Suez', 29.9630681583952, 32.5515016806519),
(27, 1, 'Ø§Ù„Ø§Ù‚ØµØ±', 'Luxor', 25.6549412787938, 32.6201662314331);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`id` int(4) NOT NULL,
  `cityId` int(4) NOT NULL,
  `name` varchar(250) NOT NULL,
  `name_en` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=378 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `cityId`, `name`, `name_en`) VALUES
(1, 2, 'Ø£Ø¨ÙˆÙ‚ÙŠØ±', 'Abu Qir'),
(2, 2, 'Ø§Ù„Ø¹Ø¬Ù…ÙŠ', 'Agami'),
(3, 2, 'Ø§Ù„Ø­Ø¶Ø±Ù‡', 'Al Hadrah'),
(4, 2, 'Ø§Ù„Ø£Ø³ÙƒÙ†Ø¯Ø±ÙŠØ©', 'Alexandria'),
(5, 2, 'Ø§Ù„Ø¹Ø§Ù…Ø±ÙŠØ©', 'Amreya'),
(6, 2, 'Ø§Ù„Ø¹ØµØ§ÙØ±Ø©', 'Asafra'),
(7, 2, 'Ø§Ù„Ø¹Ø·Ø§Ø±ÙŠÙ†', 'Attarin'),
(8, 2, 'Ø§Ù„Ø¹ÙˆØ§ÙŠØ¯', 'Awayed'),
(9, 2, 'Ø§Ù„Ø£Ø²Ø±ÙŠØ·Ø©', 'Azarita'),
(10, 2, 'Ø¨Ø§ÙƒÙˆØ³', 'Bacchus'),
(11, 2, 'Ø¨Ø­Ø±ÙŠ ÙˆØ§Ù„Ø£Ù†ÙÙˆØ´ÙŠ', 'Bahray - Anfoshy'),
(12, 2, 'Ø¨ÙˆÙ„ÙƒÙ„ÙŠ', 'Bolkly'),
(13, 2, 'Ø¨Ø±Ø¬ Ø§Ù„Ø¹Ø±Ø¨', 'Borg al-Arab'),
(14, 2, 'ÙƒØ§Ù…Ø¨ Ø´ÙŠØ²Ø§Ø±', 'Camp Caesar'),
(15, 2, 'ÙƒÙ„ÙŠÙˆØ¨Ø§ØªØ±Ø§', 'Cleopatra'),
(16, 2, 'Ø§Ù„Ø¯Ø®Ù„ÙŠØ©', 'Dekheila'),
(17, 2, 'Ø§Ù„Ø¸Ø§Ù‡Ø±ÙŠØ©', 'Dhahria'),
(18, 2, 'Ø§Ù„Ù…Ø§ÙƒØ³', 'El Max'),
(19, 2, 'ÙÙ„Ù…Ù†Ø¬', 'Fleming'),
(20, 2, 'Ø¬Ù†Ø§ÙƒÙ„ÙŠØ³', 'Gianaclis'),
(21, 2, 'Ø¬Ù„ÙŠÙ…', 'Glim'),
(22, 2, 'Ø§Ù„Ø¬Ù…Ø±Ùƒ', 'Gomrok'),
(23, 2, 'Ø§Ù„Ù‚Ø¨Ø§Ø±ÙŠ', 'Kabbary'),
(24, 2, 'ÙƒÙØ± Ø¹Ø¨Ø¯Ùˆ', 'Kafr Abdo'),
(25, 2, 'ÙƒØ±Ù…ÙˆØ²', 'Karmous'),
(26, 2, 'ÙƒÙˆÙ… Ø§Ù„Ø¯ÙƒØ©', 'Koum al-Dikka'),
(27, 2, 'Ø§Ù„Ù„Ø¨Ø§Ù†', 'Labban'),
(28, 2, 'Ù„ÙˆØ±Ø§Ù†', 'Laurent'),
(29, 2, 'Ø§Ù„Ù…Ø¹Ù…ÙˆØ±Ø©', 'Maamoura'),
(30, 2, 'Ø§Ù„Ù…Ù†Ø¯Ø±Ø©', 'Mandara'),
(31, 2, 'Ø§Ù„Ù…Ù†Ø´ÙŠØ©', 'Manshiyya'),
(32, 2, 'Ù…ÙŠØ§Ù…ÙŠ', 'Miami'),
(33, 2, 'Ù…ÙŠÙ†Ø§ Ø§Ù„Ø¨ØµÙ„', 'Mina al-Basal'),
(34, 2, 'Ù…Ø­Ø±Ù… Ø¨Ùƒ', 'Moharam Bik'),
(35, 2, 'Ø§Ù„Ù…Ù†ØªØ²Ø©', 'Montazah'),
(36, 2, 'Ø§Ù„Ù†Ø®ÙŠÙ„', 'Nakheel'),
(37, 2, 'Ø§Ù„Ù†Ø²Ù‡Ø©', 'Nozha'),
(38, 2, 'Ù…Ø­Ø·Ø© Ø§Ù„Ø±Ù…Ù„', 'Raml Station'),
(39, 2, 'Ø±Ø£Ø³ Ø§Ù„ØªÙŠÙ†', 'Ras El Tin'),
(40, 2, 'Ø³Ø§Ø¨Ø§ Ø¨Ø§Ø´Ø§', 'Saba Pasha'),
(41, 2, 'Ø§Ù„ØµØ§Ù„Ø­ÙŠØ©', 'Salehia'),
(42, 2, 'Ø³Ø§Ù† Ø³ØªÙŠÙØ§Ù†Ùˆ', 'San Stefano'),
(43, 2, 'Ø´Ø¯Ø³', 'Schutz'),
(44, 2, 'Ø§Ù„Ø³ÙŠÙˆÙ', 'Seyouf'),
(45, 2, 'Ø§Ù„Ø´Ø·Ø¨ÙŠ', 'Shatby'),
(46, 2, 'Ø³ÙŠØ¯ÙŠ Ø¨Ø´Ø±', 'Sidi Beshr'),
(47, 2, 'Ø³ÙŠØ¯ÙŠ Ø¬Ø§Ø¨Ø±', 'Sidi Gaber'),
(48, 2, 'Ø³Ù…ÙˆØ­Ø©', 'Smoha'),
(49, 2, 'Ø³Ø¨ÙˆØ±ØªÙ†Ø¬', 'Sporting'),
(50, 2, 'Ø³ØªØ§Ù†Ù„ÙŠ', 'Stanley'),
(51, 2, 'Ø·ÙˆØ³ÙˆÙ†', 'Tosson'),
(52, 2, 'ÙÙŠÙƒØªÙˆØ±ÙŠØ§', 'Victoria'),
(53, 2, 'Ø§Ù„ÙˆØ±Ø¯ÙŠØ§Ù†', 'Wardian'),
(54, 2, 'Ø²ÙŠØ²ÙŠÙ†ÙŠØ§', 'Zezenia'),
(55, 10, 'Ø£Ø¨ÙˆØ³Ù…Ø¨Ù„', 'Abou Simbel'),
(56, 10, 'Ø£Ø¨ÙˆØ§Ù„Ø±ÙŠØ´', 'Abou al-Reish'),
(57, 10, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ø³ÙˆØ§Ù†', 'Aswan City'),
(58, 10, 'Ø§Ù„Ø¨ØµÙŠÙ„ÙŠØ©', 'Basiliah'),
(59, 10, 'Ø¯Ø±Ø§Ùˆ', 'Daraw'),
(60, 10, 'Ø§Ø¯ÙÙˆ', 'Edfu'),
(61, 10, 'ÙƒÙ„Ø§Ø¨Ø´Ø©', 'Kalabsha'),
(62, 10, 'ÙƒÙˆÙ… Ø§Ù…Ø¨Ùˆ', 'Kom Ombo'),
(63, 10, 'Ù†ØµØ± Ø§Ù„Ù†ÙˆØ¨Ø©', 'Nasr al-Noba'),
(64, 10, 'Ø§Ù„Ø±Ø¯ÙŠØ³ÙŠØ©', 'Rdesiah'),
(65, 10, 'ØµØ­Ø§Ø±ÙŠ', 'Sahara'),
(66, 10, 'Ø§Ù„Ø³Ø¨Ø§Ø¹ÙŠØ©', 'Sebaeiah'),
(67, 11, 'Ø§Ø¨Ù†ÙˆØ¨', 'Abnub'),
(68, 11, 'Ø£Ø¨Ùˆ ØªÙŠØ¬', 'Abu Teeg'),
(69, 11, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ø³ÙŠÙˆØ·', 'Asyut City'),
(70, 11, 'Ø§Ù„Ø¨Ø¯Ø§Ø±ÙŠ', 'Badari'),
(71, 11, 'Ø¯ÙŠØ±ÙˆØ·', 'Dairut'),
(72, 11, 'Ø§Ù„ÙØªØ§Ø­', 'Fateh'),
(73, 11, 'Ø§Ù„ØºÙ†Ø§ÙŠÙ…', 'Ghanayem'),
(74, 11, 'Ù…Ù†ÙÙ„ÙˆØ·', 'Manfalut'),
(75, 11, 'Ø§Ù„Ù‚ÙˆØµÙŠØ©', 'Qusiya'),
(76, 11, 'Ø³Ø§Ø­Ù„ Ø³Ù„ÙŠÙ…', 'Sahel Selim'),
(77, 11, 'ØµØ¯ÙØ§', 'Sedfa'),
(78, 12, 'Ø£Ø¨ÙˆØ­Ù…Øµ', 'Abou Homs'),
(79, 12, 'Ø£Ø¨ÙˆØ§Ù„Ù…Ø·Ø§Ù…ÙŠØ±', 'Abuu al-Matamer'),
(80, 12, 'Ø¨Ø¯Ø±', 'Badr'),
(81, 12, 'Ø¯Ù…Ù†Ù‡ÙˆØ±', 'Damanhour'),
(82, 12, 'Ø§Ù„Ø¯Ù„Ù†Ø¬Ø§Øª', 'Delengat'),
(83, 12, 'Ø§Ø¯ÙƒÙˆ', 'Edko'),
(84, 12, 'Ø§ÙŠØªØ§ÙŠ Ø§Ù„Ø¨Ø§Ø±ÙˆØ¯', 'Etay al-Barud'),
(85, 12, 'Ø­ÙˆØ´ Ø¹ÙŠØ³ÙŠ', 'Hosh Essa'),
(86, 12, 'ÙƒÙØ± Ø§Ù„Ø¯ÙˆØ§Ø±', 'Kafr al-Dawwar'),
(87, 12, 'ÙƒÙˆÙ… Ø­Ù…Ø§Ø¯Ù‡', 'Kom Hamadah'),
(88, 12, 'Ø§Ù„Ù…Ø­Ù…ÙˆØ¯ÙŠØ©', 'Mahmoudiyah'),
(89, 12, 'Ø§Ù„Ù†ÙˆØ¨Ø§Ø±ÙŠØ© Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'Nubariyah'),
(90, 12, 'Ø§Ù„Ø±Ø­Ù…Ø§Ù†ÙŠØ©', 'Rahmaniya'),
(91, 12, 'Ø±Ø´ÙŠØ¯', 'Rashid'),
(92, 12, 'Ø´Ø¨Ø±Ø§Ø®ÙŠØª', 'Shubrakhit'),
(93, 12, 'ÙˆØ§Ø¯ÙŠ Ø§Ù„Ù†Ø·Ø±ÙˆÙ†', 'Wadi al-Natrun'),
(94, 13, 'Ø§Ù„ÙØ´Ù†', 'Al Feshn'),
(95, 13, 'Ø§Ù„ÙˆØ§Ø³Ø·ÙŠ', 'Al Wasty'),
(96, 13, 'Ø¨Ø¨Ø§', 'Beba'),
(97, 13, 'Ù…Ø¯ÙŠÙ†Ø© Ø¨Ù†ÙŠ Ø³ÙˆÙŠÙ', 'Beni Suef City'),
(98, 13, 'Ø§Ù‡Ù†Ø§Ø³ÙŠØ§', 'Ehnasia'),
(99, 13, 'Ù†Ø§ØµØ±', 'Nasser'),
(100, 13, 'Ø¨Ù†ÙŠ Ø³ÙˆÙŠÙ Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Beni Suef'),
(101, 13, 'Ø³Ù…Ø³Ø·Ø§', 'Samasta'),
(102, 1, 'Ø§Ù„Ø¹Ø§Ø´Ø± Ù…Ù† Ø±Ù…Ø¶Ø§Ù†', '10th Ramadan City'),
(103, 1, 'Ø§Ù„Ø¹Ø¨Ø§Ø³ÙŠØ©', 'Abasiya'),
(104, 1, 'Ø¹ÙŠÙ† Ø´Ù…Ø³', 'Ain Shams'),
(105, 1, 'Ø§Ù„Ø¹ØªØ¨Ø©', 'Ataba'),
(106, 1, 'Ø¨Ø§Ø¨ Ø§Ù„Ø´Ø¹Ø±ÙŠØ©', 'Bab al-Shereia'),
(107, 1, 'Ø§Ù„Ø¨Ø³Ø§ØªÙŠÙ†', 'Basateen'),
(108, 1, 'Ø¨ÙˆÙ„Ø§Ù‚', 'Boulaq'),
(109, 1, 'Ø¯Ø§Ø± Ø§Ù„Ø³Ù„Ø§Ù…', 'Dar al-Salaam'),
(110, 1, 'Ø§Ù„Ø¯Ø±Ø¨ Ø§Ù„Ø§Ø­Ù…Ø±', 'Darb al-Ahmar'),
(111, 1, 'Ø§Ù„Ø¯Ø±Ø§Ø³Ø©', 'Darrasa'),
(112, 1, 'ÙˆØ³Ø· Ø§Ù„Ù‚Ø§Ù‡Ø±Ø©', 'Downtown Cairo'),
(113, 1, 'Ø§Ù„ØªØ¬Ù…Ø¹ Ø§Ù„Ø®Ø§Ù…Ø³', 'Fifth Settlement'),
(114, 1, 'Ø§Ù„Ø¬Ù…Ø§Ù„ÙŠØ©', 'Gamaleya'),
(115, 1, 'Ø¬Ø§Ø±Ø¯Ù† Ø³ÙŠØªÙŠ', 'Garden City'),
(116, 1, 'Ø­Ø¯Ø§Ø¦Ù‚ Ø§Ù„Ù‚Ø¨Ø©', 'Hadayek al-Kobba'),
(117, 1, 'Ù…ØµØ± Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'Heliopolis'),
(118, 1, 'Ø§Ù„Ø­Ù„Ù…ÙŠØ©', 'Helmeya'),
(119, 1, 'Ø§Ù„Ø­Ù„Ù…ÙŠØ© Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'Helmeya al-Gadeda'),
(120, 1, 'Ø­Ù„ÙˆØ§Ù†', 'Helwan'),
(121, 1, 'Ø§Ù„Ù‚Ø·Ø§Ù…ÙŠØ©', 'Katameya'),
(122, 1, 'Ø§Ù„Ø®Ù„ÙŠÙØ©', 'Khalifa'),
(123, 1, 'Ø§Ù„Ù…Ø¹ØµØ±Ø©', 'Ma sara'),
(124, 1, 'Ø§Ù„Ù…Ø¹Ø§Ø¯ÙŠ', 'Maadi'),
(125, 1, 'Ø§Ù„Ù…Ø±Ø¬', 'Marg'),
(126, 1, 'Ù…ØµØ± Ø§Ù„Ù‚Ø¯ÙŠÙ…Ø©', 'Masr al-Kadema'),
(127, 1, 'Ø§Ù„Ù…Ø·Ø±ÙŠØ©', 'Matareya'),
(128, 1, 'Ø§Ù„Ù…Ù‚Ø·Ù…', 'Mokattam'),
(129, 1, 'Ø§Ù„Ù…ÙˆØ³ÙƒÙŠ', 'Moski'),
(130, 1, 'Ø§Ù„Ù…Ù†ÙŠØ±Ø© Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'Mounira al-Gadeda'),
(131, 1, 'Ù…Ø¯ÙŠÙ†Ø© Ù†ØµØ±', 'Nasr City'),
(132, 1, 'Ø§Ù„Ù‚Ø§Ù‡Ø±Ø© Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Cairo'),
(133, 1, 'Ø§Ù„Ù†Ø²Ù‡Ø©', 'Nozha'),
(134, 1, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø¹Ø¨ÙˆØ±', 'Obour City'),
(135, 1, 'Ù‚ØµØ± Ø§Ù„Ù†ÙŠÙ„', 'Qasr al-Nil'),
(136, 1, 'Ø±Ù…Ø³ÙŠØ³ ÙˆØ§Ù…ØªØ¯Ø§Ø¯ Ø±Ù…Ø³ÙŠØ³', 'Ramses + Ramses Extension'),
(137, 1, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø±Ø­Ø§Ø¨', 'Rehab City'),
(138, 1, 'Ø±ÙˆØ¶ Ø§Ù„ÙØ±Ø¬', 'Rod al-Farag'),
(139, 1, 'Ø§Ù„Ø±ÙˆØ¶Ø©', 'Roda'),
(140, 1, 'Ø§Ù„Ø³Ø§Ø­Ù„', 'Sahel'),
(141, 1, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø³Ù„Ø§Ù…', 'Salam City'),
(142, 1, 'Ø§Ù„Ø³ÙŠØ¯Ù‡ Ø²ÙŠÙ†Ø¨', 'Sayeda Zeinab'),
(143, 1, 'Ø§Ù„Ø´Ø±Ø§Ø¨ÙŠØ©', 'Sharabeya'),
(144, 1, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø´Ø±ÙˆÙ‚', 'Shorouk City'),
(145, 1, 'Ø´Ø¨Ø±Ø§', 'Shubra'),
(146, 1, 'Ø§Ù„ØªØ¨ÙŠÙ†', 'Tebeen'),
(147, 1, 'Ø·Ø±Ø©', 'Tura'),
(148, 1, 'Ø§Ù„ÙˆØ§ÙŠÙ„ÙŠ', 'Waili'),
(149, 1, 'Ø§Ù„Ø²Ù…Ø§Ù„Ùƒ', 'Zamalek'),
(150, 1, 'Ø§Ù„Ø²Ø§ÙˆÙŠÙ‡ Ø§Ù„Ø­Ù…Ø±Ø§', 'Zawya al-Hamra'),
(151, 1, 'Ø§Ù„Ø²ÙŠØªÙˆÙ†', 'Zaytoun'),
(152, 9, 'Ø£Ø¬Ø§', 'Aga'),
(153, 9, 'Ø£Ø®Ø·Ø§Ø¨', 'Akhtab'),
(154, 9, 'Ø¨Ù†ÙŠ Ø¹Ø¨ÙŠØ¯', 'Bani Ubayd'),
(155, 9, 'Ø¨Ù„Ù‚Ø§Ø³', 'Belqas'),
(156, 9, 'Ø¯ÙƒØ±Ù†Ø³', 'Dikirnis'),
(157, 9, 'Ø§Ù„Ø¬Ù…Ø§Ù„ÙŠØ©', 'Gamaleya'),
(158, 9, 'Ø¬Ù…ØµØ©', 'Gamasa'),
(159, 9, 'Ø§Ù„Ù…Ù†ØµÙˆØ±Ø©', 'Mansura'),
(160, 9, 'Ø§Ù„Ù…Ù†Ø²Ù„Ø©', 'Manzala'),
(161, 9, 'Ø§Ù„Ù…Ø·Ø±ÙŠØ©', 'Matareya'),
(162, 9, 'Ù…Ù†ÙŠØ© Ø§Ù„Ù†ØµØ±', 'Minat al-Nasr'),
(163, 9, 'Ù…ÙŠØª ØºÙ…Ø±', 'Mit Ghamr'),
(164, 9, 'Ù…ÙŠØª Ø³Ù„Ø³ÙŠÙ„', 'Mit Slseel'),
(165, 9, 'Ù†Ø¨Ø±ÙˆØ©', 'Nabaruh'),
(166, 9, 'Ø´Ø±Ø¨ÙŠÙ†', 'Shirbin'),
(167, 9, 'Ø§Ù„Ø³Ù†Ø¨Ù„Ø§ÙˆÙŠÙ†', 'Sinbillawain'),
(168, 9, 'Ø·Ù„Ø®Ø§', 'Talkha'),
(169, 9, 'ØªÙ…ÙŠ Ø§Ù„Ø§Ù…Ø¯ÙŠØ¯', 'Tama al-Amdeed'),
(170, 14, 'Ù…Ø¯ÙŠÙ†Ø© Ø¯Ù…ÙŠØ§Ø·', 'Damietta City'),
(171, 14, 'Ø¹Ø²Ø¨Ø© Ø§Ù„Ø¨Ø±Ø¬', 'Ezbet al-Burj'),
(172, 14, 'ÙØ§Ø±Ø³ÙƒÙˆØ±', 'Fareskour'),
(173, 14, 'ÙƒÙØ± Ø³Ø¹Ø¯', 'Kafr Saad'),
(174, 14, 'ÙƒÙØ± Ø§Ù„Ø¨Ø·ÙŠØ®', 'Kafr al-Bateekh'),
(175, 14, 'Ù…ÙŠØª Ø£Ø¨ÙˆØºØ§Ù„Ø¨', 'Mit Abughalb'),
(176, 14, 'Ø¯Ù…ÙŠØ§Ø· Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Damietta'),
(177, 14, 'Ø±Ø§Ø³ Ø§Ù„Ø¨Ø±', 'Ras al-Bar'),
(178, 14, 'Ø§Ù„Ø±ÙˆØ¶Ø©', 'Rodah'),
(179, 14, 'Ø§Ù„Ø³Ø±Ùˆ', 'Saro'),
(180, 14, 'Ø§Ù„Ø²Ø±Ù‚Ø§', 'Zarqa'),
(181, 15, 'Ø£Ø·Ø³Ø§', 'Atssa'),
(182, 15, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„ÙÙŠÙˆÙ…', 'Fayoum City'),
(183, 15, 'Ø¥Ø¨Ø´ÙˆØ§ÙŠ', 'Ibshway'),
(184, 15, 'Ø§Ù„ÙÙŠÙˆÙ… Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Fayoum'),
(185, 15, 'Ø³Ù†ÙˆØ±Ø³', 'Sinnuras'),
(186, 15, 'Ø·Ø§Ù…ÙŠØ©', 'Tamiya'),
(187, 15, 'ÙŠÙˆØ³Ù Ø§Ù„ØµØ¯ÙŠÙ‚', 'Yusuf al-Sadiq'),
(188, 6, 'Ø¨Ø³ÙŠÙˆÙ†', 'Basyoun'),
(189, 6, 'ÙƒÙØ± Ø§Ù„Ø²ÙŠØ§Øª', 'Kafr al-Zayat'),
(190, 6, 'Ø§Ù„Ù…Ø­Ù„Ø© Ø§Ù„ÙƒØ¨Ø±ÙŠ', 'Mahalla al-Kobra'),
(191, 6, 'Ù‚Ø·ÙˆØ±', 'Qutour'),
(192, 6, 'Ø³Ù…Ù†ÙˆØ¯', 'Samanoud'),
(193, 6, 'Ø§Ù„Ø³Ù†Ø·Ø©', 'Santa'),
(194, 6, 'Ø·Ù†Ø·Ø§', 'Tanta'),
(195, 6, 'Ø²ÙØªÙŠ', 'Zefta'),
(196, 26, 'Ø§Ù„Ø¹ÙŠÙ† Ø§Ù„Ø³Ø®Ù†Ø©', 'Ain Sukhna'),
(197, 26, 'Ø­ÙŠ Ø§Ù„Ø£Ø±Ø¨Ø¹ÙŠÙ†', 'Arbaeen'),
(198, 26, 'Ø­ÙŠ Ø¹ØªØ§Ù‚Ø©', 'Attaka'),
(199, 26, 'ÙÙŠØµÙ„', 'Faisal'),
(200, 26, 'Ø­ÙŠ Ø§Ù„Ø¬Ù†Ø§ÙŠÙ†', 'Ganayen'),
(201, 26, 'Ø­ÙŠ Ø§Ù„Ø³ÙˆÙŠØ³', 'Suez District'),
(202, 25, 'Ø£Ø¨Ùˆ Ø±Ø¯ÙŠØ³', 'Abu Rudeis'),
(203, 25, 'Ø£Ø¨Ùˆ Ø²Ù†ÙŠÙ…Ø©', 'Abu Zenimah'),
(204, 25, 'Ø¯Ù‡Ø¨', 'Dahab'),
(205, 25, 'Ù†ÙˆÙŠØ¨Ø¹', 'Nuweiba'),
(206, 25, 'Ø±Ø£Ø³ Ø³Ø¯Ø±', 'Ras Sidr'),
(207, 25, 'Ø´Ø±Ù… Ø§Ù„Ø´ÙŠØ®', 'Sharm al-Sheikh'),
(208, 25, 'Ø³Ø§Ù†Øª ÙƒØ§ØªØ±ÙŠÙ†', 'St. Catherine'),
(209, 25, 'Ø·Ø§Ø¨Ø§', 'Taba'),
(210, 25, 'Ø·ÙˆØ± Ø³ÙŠÙ†Ø§Ø¡', 'Tor Sinai'),
(211, 24, 'Ø£Ø®Ù…ÙŠÙ…', 'Akhmim'),
(212, 24, 'Ø§Ù„Ø¹Ø³ÙŠØ±Ø§Øª', 'Alasirat'),
(213, 24, 'Ø§Ù„Ø¨Ù„ÙŠÙ†Ø§', 'Baliana'),
(214, 24, 'Ø¯Ø§Ø± Ø§Ù„Ø³Ù„Ø§Ù…', 'Dar es-Salam'),
(215, 24, 'Ø¬Ø±Ø¬Ø§', 'Girga'),
(216, 24, 'Ø¬Ù‡ÙŠÙ†Ø©', 'Juhaynah'),
(217, 24, 'Ø§Ù„Ù…Ø±Ø§ØºØ©', 'Maragha'),
(218, 24, 'Ø§Ù„Ù…Ù†Ø´Ø£Ø©', 'Monshaa'),
(219, 24, 'Ø³Ø§Ù‚Ù„ØªÙ‡', 'Sakaltah'),
(220, 24, 'Ù…Ø¯ÙŠÙ†Ø© Ø³ÙˆÙ‡Ø§Ø¬', 'Sohag City'),
(221, 24, 'Ø·Ù‡Ø·Ø§', 'Tahta'),
(222, 24, 'Ø·Ù…Ø§', 'Tama'),
(223, 7, 'Ø§Ù„Ø¹Ø§Ø´Ø± Ù…Ù† Ø±Ù…Ø¶Ø§Ù†', '10th of Ramadan'),
(224, 7, 'Ø£Ø¨Ùˆ Ø­Ù…Ø§Ø¯', 'Abu Hammad'),
(225, 7, 'Ø£Ø¨Ùˆ ÙƒØ¨ÙŠØ±', 'Abu Kabir'),
(226, 7, 'Ø§Ù„Ù‚Ù†Ø§ÙŠØ§Øª', 'Alqnayat'),
(227, 7, 'Ø£ÙˆÙ„Ø§Ø¯ ØµÙ‚Ø±', 'Awlad Saqr'),
(228, 7, 'Ø¨Ù„Ø¨ÙŠØ³', 'Bilbeis'),
(229, 7, 'Ø¯ÙŠØ±Ø¨ Ù†Ø¬Ù…', 'Deyerb Negm'),
(230, 7, 'ÙØ§Ù‚ÙˆØ³', 'Faqous'),
(231, 7, 'Ù‡Ù‡ÙŠØ§', 'Hihya'),
(232, 7, 'Ø§Ù„Ø­Ø³ÙŠÙ†ÙŠØ©', 'Husseiniya'),
(233, 7, 'Ø§Ù„Ø¥Ø¨Ø±Ø§Ù‡ÙŠÙ…ÙŠØ©', 'Ibrahemyah'),
(234, 7, 'ÙƒÙØ± ØµÙ‚Ø±', 'Kafr Saqr'),
(235, 7, 'Ù…Ø´ØªÙˆÙ„ Ø§Ù„Ø³ÙˆÙ‚', 'Mashtool al-Souk'),
(236, 7, 'Ù…Ù†ÙŠØ§ Ø§Ù„Ù‚Ù…Ø­', 'Minya al-Qamh'),
(237, 7, 'Ø§Ù„ØµØ§Ù„Ø­ÙŠØ© Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Salhia'),
(238, 7, 'Ø§Ù„Ù‚Ø±ÙŠÙ†', 'Qareen'),
(239, 7, 'Ø§Ù„Ø²Ù‚Ø§Ø²ÙŠÙ‚', 'Zagazig'),
(240, 23, 'Ø§Ù„Ø¹Ø±Ø¯Ù‚Ø©', 'Hurghada'),
(241, 23, 'Ù…Ø±Ø³ÙŠ Ø¹Ù„Ù…', 'Marsa Alam'),
(242, 23, 'Ø§Ù„Ù‚ØµÙŠØ±', 'Qusair'),
(243, 23, 'Ø±Ø£Ø³ ØºØ§Ø±Ø¨', 'Ras Gharib'),
(244, 23, 'Ø³ÙØ§Ø¬Ø§', 'Safaga'),
(245, 23, 'Ø´Ù„Ø§ØªÙŠÙ†', 'Shalateen'),
(246, 3, '6 Ø£ÙƒØªÙˆØ¨Ø±', '6th of October'),
(247, 3, 'Ø£Ø¨Ùˆ Ø±ÙˆØ§Ø´', 'Abu Rawash'),
(248, 3, 'Ø§Ù„Ø¹Ø¬ÙˆØ²Ø©', 'Agouza'),
(249, 3, 'Ø§Ù„Ø¹Ø²ÙŠØ²ÙŠØ©', 'Azizia'),
(250, 3, 'Ø§Ù„Ø¨Ø¯Ø±Ø´ÙŠÙ†', 'Badrasheen'),
(251, 3, 'Ø§Ù„Ø¨Ø±Ø§Ø¬ÙŠÙ„', 'Baragil'),
(252, 3, 'Ø¨Ø´ØªÙŠÙ„', 'Bashtil'),
(253, 3, 'Ø¨ÙˆÙ„Ø§Ù‚ Ø§Ù„Ø¯ÙƒØ±ÙˆØ±', 'Boulaq Dakrour'),
(254, 3, 'Ø¬Ø²ÙŠØ±Ø© Ø§Ù„Ø¯Ù‡Ø¨ ÙˆÙƒÙˆÙ„Ø¯ÙŠØ±', 'Dahab Island and Coldair'),
(255, 3, 'Ø¯Ù‡Ø´ÙˆØ±', 'Dahshur'),
(256, 3, 'Ø§Ù„Ø¯Ù‚ÙŠ', 'Dokki'),
(257, 3, 'ÙÙŠØµÙ„', 'Faisal'),
(258, 3, 'Ø­ÙŠ Ø§Ù„Ø¬ÙŠØ²Ø©', 'Giza District'),
(259, 3, 'Ø­Ø¯Ø§ÙŠÙ‚ Ø§Ù„Ø£Ù‡Ø±Ø§Ù…', 'Hadayek al-Ahram'),
(260, 3, 'Ø§Ù„Ù‡Ø±Ù…', 'Haram'),
(261, 3, 'Ø§Ù„Ø­Ø±Ø§Ù†ÙŠØ©', 'Haraneya'),
(262, 3, 'Ø§Ù„Ø­ÙˆØ§Ù…Ø¯ÙŠØ©', 'Hawamdeya'),
(263, 3, 'Ø£Ù…Ø¨Ø§Ø¨Ø©', 'Imbaba'),
(264, 3, 'ÙƒÙØ± Ø·Ù‡Ø±Ù…Ø³', 'Kafr Tohormos'),
(265, 3, 'ÙƒØ±Ø¯Ø§Ø³Ø©', 'Kerdasa'),
(266, 3, 'Ø§Ù„ÙƒÙŠØª ÙƒØ§Øª', 'Kit Kat'),
(267, 3, 'Ø§Ù„Ù…Ù†ØµÙˆØ±ÙŠØ©', 'Mansuriyya'),
(268, 3, 'Ù…Ø±ÙƒØ² Ø§Ù„Ø¬ÙŠØ²Ø©', 'Markaz al-Giza'),
(269, 3, 'Ù…ÙŠØª Ø¹Ù‚Ø¨Ø©', 'Mit Oqba'),
(270, 3, 'Ø§Ù„Ù…Ù‡Ù†Ø¯Ø³ÙŠÙ†', 'Mohandessin'),
(271, 3, 'Ø§Ù„Ù…Ù†ÙŠØ¨', 'Moneeb'),
(272, 3, 'Ù†Ø§Ù‡ÙŠØ§', 'Nahia'),
(273, 3, 'Ø§Ù„Ø¹Ù…Ø±Ø§Ù†ÙŠØ©', 'Omrania'),
(274, 3, 'Ø£ÙˆØ³ÙŠÙ…', 'Oseem'),
(275, 3, 'Ø§Ù„Ù‚Ø±ÙŠØ© Ø§Ù„ÙØ±Ø¹ÙˆÙ†ÙŠØ©', 'Pharaonic Village'),
(276, 3, 'Ø§Ù„Ø±Ù…Ø§ÙŠØ©', 'Remaia'),
(277, 3, 'Ø§Ù„ØµÙ', 'Saf'),
(278, 3, 'ØµÙØ·', 'Saft'),
(279, 3, 'Ø§Ù„ØµØ­ÙÙŠÙŠÙ†', 'Sahafieen'),
(280, 3, 'Ø³Ø§Ù‚ÙŠØ© Ù…ÙƒÙŠ', 'Sakyet Mekky'),
(281, 3, 'Ø³Ù‚Ø§Ø±Ø©', 'Saqqara'),
(282, 3, 'Ø§Ù„Ø´ÙŠØ® Ø²Ø§ÙŠØ¯', 'Sheikh Zayed'),
(283, 3, 'Ø³ÙˆÙ‚ Ø§Ù„Ø£Ø­Ø¯', 'Souk al-Ahad'),
(284, 3, 'ØªØ±Ø³Ø§', 'Tersa'),
(285, 3, 'Ø§Ù„ÙˆØ±Ø§Ù‚', 'Warraq'),
(286, 16, 'Ø£Ø¨ÙˆØµÙˆÙŠØ±', 'Abu Swear'),
(287, 16, 'ÙØ§ÙŠØ¯', 'Fayed'),
(288, 16, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø£Ø³Ù…Ø§Ø¹ÙŠÙ„ÙŠØ©', 'Ismailia City'),
(289, 16, 'Ø§Ù„Ù‚Ù†Ø·Ø±Ø© Ø´Ø±Ù‚', 'Kantara East'),
(290, 16, 'Ø§Ù„Ù‚Ù†Ø·Ø±Ø© ØºØ±Ø¨', 'Kantara West'),
(291, 16, 'Ø§Ù„Ù‚ØµØ§ØµÙŠÙ†', 'Qassaseen'),
(292, 16, 'Ø§Ù„ØªÙ„ Ø§Ù„ÙƒØ¨ÙŠØ±', 'Tal al-Kebeer'),
(293, 8, 'Ø¨ÙŠÙ„Ø§', 'Bella'),
(294, 8, 'Ø§Ù„Ø¨Ø±Ù„Ø³', 'Brolos'),
(295, 8, 'Ø¯Ø³ÙˆÙ‚', 'Desouk'),
(296, 8, 'ÙÙˆÙ‡', 'Fouh'),
(297, 8, 'Ø§Ù„Ø­Ø§Ù…ÙˆÙ„', 'Hamoul'),
(298, 8, 'Ù…Ø¯ÙŠÙ†Ø© ÙƒÙØ±Ø§Ù„Ø´ÙŠØ®', 'Kafr al-Sheikh City'),
(299, 8, 'Ù…Ø·ÙˆØ¨Ø³', 'Motobas'),
(300, 8, 'Ù‚Ù„ÙŠÙ†', 'Qaleen'),
(301, 8, 'Ø§Ù„Ø±ÙŠØ§Ø¶', 'Riyadh'),
(302, 8, 'Ø³ÙŠØ¯ÙŠ Ø³Ø§Ù„Ù…', 'Sidi Salem'),
(303, 27, 'Ø£Ø±Ù…Ù†Øª', 'Armant'),
(304, 27, 'Ø§Ù„Ø¨ÙŠØ§Ø¶ÙŠØ©', 'Bayadeya'),
(305, 27, 'Ø¥Ø³Ù†Ø§', 'Isna'),
(306, 27, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ø£Ù‚ØµØ±', 'Luxor City'),
(307, 27, 'Ø§Ù„Ù‚Ø±Ù†Ø©', 'Qurna'),
(308, 27, 'Ø§Ù„Ø·ÙˆØ¯', 'Tod'),
(309, 27, 'Ø§Ù„Ø²ÙŠÙ†ÙŠØ©', 'Zinnia'),
(310, 17, 'Ø§Ù„Ø¹Ù„Ù…ÙŠÙ†', 'Alamein'),
(311, 17, 'Ø¨Ø±Ø§Ù†ÙŠ', 'Barany'),
(312, 17, 'Ø§Ù„Ø¶Ø¨Ø¹Ø©', 'Dabaa'),
(313, 17, 'Ø§Ù„Ø­Ù…Ø§Ù…', 'Hammam'),
(314, 17, 'Ù…Ø±Ø³ÙŠ Ù…Ø·Ø±ÙˆØ­', 'Marsa Matrouh'),
(315, 17, 'Ø§Ù„Ù†Ø¬ÙŠÙ„Ø©', 'Nagela'),
(316, 17, 'Ø§Ù„Ø³Ù„ÙˆÙ…', 'Salloum'),
(317, 17, 'Ø³ÙŠÙˆØ©', 'Siwa'),
(318, 18, 'Ø£Ø¨ÙˆÙ‚Ø±Ù‚Ø§Øµ', 'Abu Qurqas'),
(319, 18, 'Ø§Ù„Ø¹Ø¯ÙˆØ©', 'Adwa'),
(320, 18, 'Ø¨Ù†ÙŠ Ù…Ø²Ø§Ø±', 'Beni Mazar'),
(321, 18, 'Ø¯ÙŠØ± Ù…ÙˆØ§Ø³', 'Deir Mawas'),
(322, 18, 'Ù…ØºØ§ØºØ©', 'Maghagha'),
(323, 18, 'Ù…Ù„ÙˆÙŠ', 'Malawi'),
(324, 18, 'Ù…Ø·Ø§ÙŠ', 'Matay'),
(325, 18, 'Ù…Ø¯ÙŠÙ†Ø© Ø§Ù„Ù…Ù†ÙŠØ§', 'Minya City'),
(326, 18, 'Ø§Ù„Ù…Ù†ÙŠØ§ Ø§Ù„Ø¬Ø¯ÙŠØ¯Ø©', 'New Minya'),
(327, 18, 'Ø³Ù…Ø§Ù„ÙˆØ·', 'Samalut'),
(328, 5, 'Ø£Ø´Ù…ÙˆÙ†', 'Ashmon'),
(329, 5, 'Ø§Ù„Ø¨Ø§Ø¬ÙˆØ±', 'Bagour'),
(330, 5, 'Ø¨Ø±ÙƒØ© Ø§Ù„Ø³Ø¨Ø¹', 'Berket al-Sabaa'),
(331, 5, 'Ù…Ù†ÙˆÙ', 'Menouf'),
(332, 5, 'Ù‚ÙˆÙŠØ³Ù†Ø§', 'Quesna'),
(333, 5, 'Ø§Ù„Ø³Ø§Ø¯Ø§Øª', 'Sadat'),
(334, 5, 'Ø³Ø±Ø³ Ø§Ù„Ù„Ø¨Ù†', 'Sers al-Lyan'),
(335, 5, 'Ø´Ø¨ÙŠÙ† Ø§Ù„ÙƒÙˆÙ…', 'Shebin al-Koum'),
(336, 5, 'Ø§Ù„Ø´Ù‡Ø¯Ø§Ø¡', 'Shohadaa'),
(337, 5, 'ØªÙ„Ø§', 'Tala'),
(338, 19, 'Ø¨Ù„Ø§Ø·', 'Balat'),
(339, 19, 'Ø§Ù„Ø¯Ø®Ù„Ø©', 'Dakhla'),
(340, 19, 'Ø§Ù„ÙØ±Ø§ÙØ±Ø©', 'Farafra'),
(341, 19, 'Ø§Ù„Ø®Ø§Ø±Ø¬Ø©', 'Kharga'),
(342, 19, 'Ù…Ø¯ÙŠÙ†Ø© Ù…ÙˆØ·', 'Mut'),
(343, 19, 'Ø¨Ø§Ø±ÙŠØ³', 'Paris'),
(344, 20, 'Ø§Ù„Ø¹Ø±ÙŠØ´', 'Arish'),
(345, 20, 'Ø¨Ø¦Ø± Ø§Ù„Ø¹Ø¨Ø¯', 'Bir al-Abed'),
(346, 20, 'Ø§Ù„Ø­Ø³Ù†Ø©', 'Hasana'),
(347, 20, 'Ù†Ø®Ù„', 'Nakhl'),
(348, 20, 'Ø±ÙØ­', 'Rafah'),
(349, 20, 'Ø§Ù„Ø´ÙŠØ® Ø²ÙˆÙŠØ¯', 'Sheikh Zoweyd'),
(350, 21, 'Ø­ÙŠ Ø§Ù„Ø¹Ø±Ø¨', 'Arab District'),
(351, 21, 'Ø­ÙŠ Ø§Ù„Ø¶ÙˆØ§Ø­ÙŠ', 'Dawahy District'),
(352, 21, 'Ø­ÙŠ Ø§Ù„Ø¬Ù†ÙˆØ¨', 'Ganoub District'),
(353, 21, 'Ø­ÙŠ Ø§Ù„Ù…Ù†Ø§Ø®', 'Manakh District'),
(354, 21, 'Ù…Ø¯ÙŠÙ†Ø© Ø¨ÙˆØ±ÙØ¤Ø§Ø¯', 'Port Fouad'),
(355, 21, 'Ø­ÙŠ Ø§Ù„Ø´Ø±Ù‚', 'Sharq District'),
(356, 21, 'Ø­ÙŠ Ø§Ù„Ø²Ù‡ÙˆØ±', 'Zohour District'),
(357, 4, 'Ø¨Ù‡ØªÙŠÙ…', 'Bahtim'),
(358, 4, 'Ø¨Ù†Ù‡Ø§', 'Banha'),
(359, 4, 'Ø§Ù„Ø¹Ø¨ÙˆØ±', 'El Ubour'),
(360, 4, 'ÙƒÙØ± Ø´ÙƒØ±', 'Kafr Shukr'),
(361, 4, 'Ø§Ù„Ø®Ø§Ù†ÙƒØ©', 'Khanka'),
(362, 4, 'Ø§Ù„Ø®ØµÙˆØµ', 'Khosous'),
(363, 4, 'Ù‚Ù‡Ø§', 'Qaha'),
(364, 4, 'Ù‚Ù„ÙŠÙˆØ¨', 'Qalyub'),
(365, 4, 'Ø§Ù„Ù‚Ù†Ø§Ø·Ø± Ø§Ù„Ø®ÙŠØ±ÙŠØ©', 'Qanater al-Khairia'),
(366, 4, 'Ø´Ø¨ÙŠÙ† Ø§Ù„Ù‚Ù†Ø§Ø·Ø±', 'Shebin al-Qanater'),
(367, 4, 'Ø´Ø¨Ø±Ø§ Ø§Ù„Ø®ÙŠÙ…Ø©', 'Shubra al-Khaimah'),
(368, 4, 'Ø·ÙˆØ®', 'Tookh'),
(369, 22, 'Ø£Ø¨Ùˆ ØªØ´Øª', 'Abu Tisht'),
(370, 22, 'ÙØ±Ø´ÙˆØ·', 'Farshout'),
(371, 22, 'Ù‚ÙØ·', 'Keft'),
(372, 22, 'Ù†Ø¬Ø¹ Ø­Ù…Ø§Ø¯ÙŠ', 'Nag Hammadi'),
(373, 22, 'Ù†Ù‚Ø§Ø¯Ø©', 'Nakada'),
(374, 22, 'Ù…Ø¯ÙŠÙ†Ø© Ù‚Ù†Ø§', 'Qena City'),
(375, 22, 'Ù‚ÙˆØµ', 'Quos'),
(376, 22, 'Ø´Ù†Ø§', 'Shna'),
(377, 22, 'Ø§Ù„ÙˆÙ‚Ù', 'Wakf');

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
 ADD PRIMARY KEY (`id`), ADD KEY `visible` (`visible`), ADD KEY `activate` (`activate`), ADD KEY `userId` (`userId`), ADD KEY `cityId` (`cityId`), ADD KEY `districtId` (`districtId`), ADD KEY `make` (`make`), ADD KEY `model` (`model`), ADD KEY `type` (`type`);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD KEY `latitude` (`latitude`), ADD KEY `longitude` (`longitude`), ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id`), ADD KEY `cityId` (`cityId`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=172;
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=378;
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
