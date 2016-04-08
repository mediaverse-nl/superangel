-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 08 apr 2016 om 18:56
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `localhost`
--
CREATE DATABASE IF NOT EXISTS `localhost` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `localhost`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(25) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `c_subject` varchar(20) NOT NULL,
  `c_message` varchar(250) NOT NULL,
  `c_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `contact`
--

INSERT INTO `contact` (`c_id`, `c_name`, `c_email`, `c_subject`, `c_message`, `c_date_time`, `c_status`) VALUES
(1, 'deveron', 'deveron-reniers@hotmail.com', 'lorem ipsum', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '2015-12-03 07:34:08', 1),
(2, 'reniers', 'deveron-reniers@hotmail.com', 'lorem ipsum', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '2015-12-03 07:34:08', 1),
(3, 'awd', 'awd', 'wdad', 'awdadawd', '2015-12-03 18:34:39', 1),
(4, 'asdasd', 'def-lol-lol@hotmail.com', 'Wdawd', 'awdawd', '2015-12-03 18:43:00', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facets_categories`
--

CREATE TABLE IF NOT EXISTS `facets_categories` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_group` varchar(20) NOT NULL,
  `fc_name` varchar(20) NOT NULL,
  PRIMARY KEY (`fc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden uitgevoerd voor tabel `facets_categories`
--

INSERT INTO `facets_categories` (`fc_id`, `fc_group`, `fc_name`) VALUES
(1, 'maten', 'X'),
(4, 'maten', 'XL'),
(5, 'maten', 'XXL'),
(6, 'maten', 'XS'),
(7, 'maten', 'S'),
(8, 'maten', 'L'),
(9, 'kleding', 'T-shirts'),
(10, 'merken', 'Super Angel'),
(11, 'kleding', 'Jeans'),
(12, 'kleding', 'Broeken'),
(14, 'kleding', 'Jurken'),
(15, 'kleding', 'Rokken'),
(16, 'merken', 'Fictive Fashion'),
(17, 'merken', 'Jack & Jones'),
(18, 'merken', 'Acme Apparel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `facets_colorprint`
--

CREATE TABLE IF NOT EXISTS `facets_colorprint` (
  `fcp_id` int(11) NOT NULL AUTO_INCREMENT,
  `fcp_name` varchar(25) NOT NULL,
  `fcp_img_path` varchar(15) NOT NULL,
  PRIMARY KEY (`fcp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_question` varchar(50) NOT NULL,
  `f_answer` varchar(300) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `n_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `n_action` varchar(25) NOT NULL,
  `n_name` varchar(25) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=300 ;

--
-- Gegevens worden uitgevoerd voor tabel `notifications`
--

INSERT INTO `notifications` (`n_id`, `n_datetime`, `n_action`, `n_name`) VALUES
(1, '2015-11-22 19:52:59', 'verwijdert', 'product'),
(2, '2015-11-22 19:56:11', 'bericht', 'opmerking'),
(3, '2015-11-22 20:26:25', 'verwijderen', '6'),
(4, '2015-11-22 20:39:25', 'verwijderen', 'sadas'),
(5, '2015-11-22 20:42:46', 'verwijderen', 'dasd'),
(6, '2015-11-23 05:01:10', 'verwijdert', 'dasd'),
(7, '2015-11-23 05:02:41', 'verwijdert', 'dasd'),
(8, '2015-11-23 05:18:07', 'verwijdert', 'dasd'),
(9, '2015-11-23 05:18:10', 'verwijdert', 'dasd'),
(10, '2015-11-23 05:18:12', 'verwijdert', 'dasd'),
(11, '2015-11-23 06:15:54', 'toegevoegd', 'blauw t-shirt'),
(12, '2015-11-23 06:18:52', 'toegevoegd', 'rokken (rood)ss'),
(13, '2015-11-23 06:21:21', 'toegevoegd', 'blauw t-shirt'),
(14, '2015-11-23 06:25:16', 'toegevoegd', 'blauw t-shirt'),
(15, '2015-11-23 06:25:51', 'verwijdert', 'blauw t-shirt'),
(16, '2015-11-23 06:25:57', 'verwijdert', 'rokken (rood)ss'),
(17, '2015-11-23 06:26:01', 'verwijdert', 'blauw t-shirt'),
(18, '2015-11-24 11:31:34', 'verwijdert', ''),
(19, '2015-12-03 18:34:39', 'Bericht', 'wdad'),
(20, '2015-12-03 18:43:00', 'Bericht', 'Wdawd'),
(21, '2015-12-05 05:53:19', 'toegevoegd', 'awdawdawd blauw'),
(22, '2015-12-05 05:56:24', 'toegevoegd', 'rokken (rood)ss'),
(23, '2015-12-05 05:57:29', 'toegevoegd', 'chick met top'),
(24, '2015-12-05 05:58:10', 'toegevoegd', 'chick met top'),
(25, '2015-12-05 06:00:46', 'toegevoegd', 'asdas'),
(26, '2015-12-05 06:02:31', 'toegevoegd', 'deveron reniers'),
(27, '2015-12-05 15:22:34', 'toegevoegd', 'deveron reniers'),
(28, '2015-12-07 19:43:18', 'toegevoegd', 'asdasdasd1'),
(29, '2015-12-07 23:03:28', 'toegevoegd', 'awdawd'),
(30, '2015-12-07 23:03:30', 'toegevoegd', 'awdawd'),
(31, '2015-12-07 23:06:58', 'toegevoegd', 'deveron123'),
(32, '2015-12-07 23:06:59', 'toegevoegd', 'deveron123'),
(33, '2015-12-07 23:32:33', 'toegevoegd', 'rokje dana'),
(34, '2015-12-07 23:32:35', 'toegevoegd', 'rokje dana'),
(35, '2015-12-07 23:32:36', 'toegevoegd', 'rokje dana'),
(36, '2015-12-07 23:42:29', 'toegevoegd', 'deveron reniers'),
(37, '2015-12-07 23:42:30', 'toegevoegd', 'deveron reniers'),
(38, '2015-12-07 23:44:49', 'toegevoegd', 'awdawd'),
(39, '2015-12-07 23:44:50', 'toegevoegd', 'awdawd'),
(40, '2015-12-07 23:45:45', 'toegevoegd', 'awdawdagf'),
(41, '2015-12-07 23:45:47', 'toegevoegd', 'awdawdagf'),
(42, '2015-12-08 12:25:24', 'toegevoegd', 'ddddd'),
(43, '2015-12-08 12:25:25', 'toegevoegd', 'ddddd'),
(44, '2015-12-08 15:27:24', 'toegevoegd', 'rokje dana'),
(45, '2015-12-08 15:27:25', 'toegevoegd', 'rokje dana'),
(46, '2015-12-08 15:27:25', 'toegevoegd', 'rokje dana'),
(47, '2015-12-08 15:39:08', 'toegevoegd', 'rokje dana'),
(48, '2015-12-08 15:39:09', 'toegevoegd', 'rokje dana'),
(49, '2015-12-08 15:39:09', 'toegevoegd', 'rokje dana'),
(50, '2015-12-08 23:38:10', 'toegevoegd', 'wadawd'),
(51, '2015-12-08 23:38:11', 'toegevoegd', 'wadawd'),
(52, '2015-12-08 23:38:12', 'toegevoegd', 'wadawd'),
(53, '2015-12-08 23:40:39', 'toegevoegd', '44353'),
(54, '2015-12-08 23:40:40', 'toegevoegd', '44353'),
(55, '2015-12-08 23:40:40', 'toegevoegd', '44353'),
(56, '2015-12-08 23:42:22', 'toegevoegd', '44353'),
(57, '2015-12-08 23:42:23', 'toegevoegd', '44353'),
(58, '2015-12-08 23:42:24', 'toegevoegd', '44353'),
(59, '2015-12-08 23:42:48', 'toegevoegd', 'ae43434'),
(60, '2015-12-08 23:42:50', 'toegevoegd', 'ae43434'),
(61, '2015-12-08 23:42:51', 'toegevoegd', 'ae43434'),
(62, '2015-12-08 23:43:37', 'toegevoegd', 'ae43434'),
(63, '2015-12-08 23:43:39', 'toegevoegd', 'ae43434'),
(64, '2015-12-08 23:43:40', 'toegevoegd', 'ae43434'),
(65, '2015-12-08 23:48:45', 'verwijdert', '44353'),
(66, '2015-12-08 23:48:47', 'verwijdert', '44353'),
(67, '2015-12-08 23:49:23', 'toegevoegd', 'awdaw'),
(68, '2015-12-08 23:49:24', 'toegevoegd', 'awdaw'),
(69, '2015-12-08 23:49:24', 'toegevoegd', 'awdaw'),
(70, '2015-12-08 23:56:09', 'toegevoegd', 'asdawda'),
(71, '2015-12-08 23:56:10', 'toegevoegd', 'asdawda'),
(72, '2015-12-08 23:56:10', 'toegevoegd', 'asdawda'),
(73, '2015-12-08 23:59:59', 'toegevoegd', 'fdgsdf'),
(74, '2015-12-09 00:00:00', 'toegevoegd', 'fdgsdf'),
(75, '2015-12-09 00:00:01', 'toegevoegd', 'fdgsdf'),
(76, '2015-12-09 00:02:10', 'toegevoegd', 'awdawd'),
(77, '2015-12-09 00:02:11', 'toegevoegd', 'awdawd'),
(78, '2015-12-09 11:10:51', 'verwijdert', 'fdgsdf'),
(79, '2015-12-09 11:10:55', 'verwijdert', 'awdawd'),
(80, '2015-12-09 11:10:58', 'verwijdert', 'awdawd'),
(81, '2015-12-09 11:11:01', 'verwijdert', 'fdgsdf'),
(82, '2015-12-09 11:11:04', 'verwijdert', 'fdgsdf'),
(83, '2015-12-09 11:11:07', 'verwijdert', 'asdawda'),
(84, '2015-12-09 11:11:11', 'verwijdert', 'asdawda'),
(85, '2015-12-09 11:11:14', 'verwijdert', 'asdawda'),
(86, '2015-12-09 11:11:16', 'verwijdert', 'awdaw'),
(87, '2015-12-09 11:11:19', 'verwijdert', 'awdaw'),
(88, '2015-12-09 11:11:22', 'verwijdert', 'awdaw'),
(89, '2015-12-09 11:13:59', 'toegevoegd', 'dr'),
(90, '2015-12-09 11:14:00', 'toegevoegd', 'dr'),
(91, '2015-12-09 15:12:19', 'toegevoegd', '3rqad'),
(92, '2015-12-09 15:12:20', 'toegevoegd', '3rqad'),
(93, '2015-12-09 15:17:40', 'toegevoegd', '3rqad'),
(94, '2015-12-09 15:17:41', 'toegevoegd', '3rqad'),
(95, '2015-12-09 15:18:02', 'toegevoegd', 'fssfee'),
(96, '2015-12-09 15:18:03', 'toegevoegd', 'fssfee'),
(97, '2015-12-09 15:24:32', 'toegevoegd', 'eeeee33'),
(98, '2015-12-09 15:24:33', 'toegevoegd', 'eeeee33'),
(99, '2015-12-09 15:26:01', 'toegevoegd', 'eeeee33'),
(100, '2015-12-09 15:26:02', 'toegevoegd', 'eeeee33'),
(101, '2015-12-09 15:27:07', 'verwijdert', 'eeeee33'),
(102, '2015-12-09 15:28:13', 'toegevoegd', 'asdasd'),
(103, '2015-12-09 15:28:13', 'toegevoegd', 'asdasd'),
(104, '2015-12-09 15:28:14', 'toegevoegd', 'asdasd'),
(105, '2015-12-09 15:28:53', 'toegevoegd', 'asdasd'),
(106, '2015-12-09 15:28:54', 'toegevoegd', 'asdasd'),
(107, '2015-12-09 15:28:55', 'toegevoegd', 'asdasd'),
(108, '2015-12-09 15:30:19', 'toegevoegd', 'asdasd'),
(109, '2015-12-09 15:30:20', 'toegevoegd', 'asdasd'),
(110, '2015-12-09 15:30:21', 'toegevoegd', 'asdasd'),
(111, '2015-12-09 15:31:47', 'toegevoegd', 'bloes'),
(112, '2015-12-09 15:31:48', 'toegevoegd', 'bloes'),
(113, '2015-12-09 15:35:37', 'toegevoegd', 'rokje dana'),
(114, '2015-12-09 15:35:38', 'toegevoegd', 'rokje dana'),
(115, '2015-12-09 15:35:39', 'toegevoegd', 'rokje dana'),
(116, '2015-12-09 15:38:21', 'toegevoegd', 'sfsfsf'),
(117, '2015-12-09 15:38:22', 'toegevoegd', 'sfsfsf'),
(118, '2015-12-09 15:38:23', 'toegevoegd', 'sfsfsf'),
(119, '2015-12-09 15:38:24', 'toegevoegd', 'sfsfsf'),
(120, '2015-12-09 15:40:30', 'toegevoegd', 'asdasd'),
(121, '2015-12-09 15:40:31', 'toegevoegd', 'asdasd'),
(122, '2015-12-09 15:40:32', 'toegevoegd', 'asdasd'),
(123, '2015-12-09 23:48:29', 'toegevoegd', 'awdawd2222'),
(124, '2015-12-09 23:48:30', 'toegevoegd', 'awdawd2222'),
(125, '2015-12-09 23:58:28', 'toegevoegd', 'a32444'),
(126, '2015-12-09 23:58:29', 'toegevoegd', 'a32444'),
(127, '2015-12-10 00:00:21', 'toegevoegd', 'awdad'),
(128, '2015-12-10 00:00:23', 'toegevoegd', 'awdad'),
(129, '2015-12-10 00:00:24', 'toegevoegd', 'awdad'),
(130, '2015-12-10 00:00:25', 'toegevoegd', 'awdad'),
(131, '2015-12-10 00:00:27', 'toegevoegd', 'awdad'),
(132, '2015-12-10 00:06:13', 'toegevoegd', '1111111111'),
(133, '2015-12-10 00:06:14', 'toegevoegd', '1111111111'),
(134, '2015-12-10 00:06:16', 'toegevoegd', '1111111111'),
(135, '2015-12-10 00:06:52', 'toegevoegd', '1111111111'),
(136, '2015-12-10 00:06:54', 'toegevoegd', '1111111111'),
(137, '2015-12-10 00:06:56', 'toegevoegd', '1111111111'),
(138, '2015-12-10 00:07:03', 'toegevoegd', '1111111111'),
(139, '2015-12-10 00:07:05', 'toegevoegd', '1111111111'),
(140, '2015-12-10 00:07:07', 'toegevoegd', '1111111111'),
(141, '2015-12-10 00:07:32', 'toegevoegd', '2222222222222'),
(142, '2015-12-10 00:07:34', 'toegevoegd', '2222222222222'),
(143, '2015-12-10 00:07:36', 'toegevoegd', '2222222222222'),
(144, '2015-12-10 00:07:38', 'toegevoegd', '2222222222222'),
(145, '2015-12-10 14:53:33', 'toegevoegd', 'dad'),
(146, '2015-12-10 14:53:35', 'toegevoegd', 'dad'),
(147, '2015-12-10 14:53:38', 'toegevoegd', 'dad'),
(148, '2015-12-10 15:09:56', 'toegevoegd', 'wadwd'),
(149, '2015-12-10 15:09:59', 'toegevoegd', 'wadwd'),
(150, '2015-12-10 15:10:01', 'toegevoegd', 'wadwd'),
(151, '2015-12-10 15:12:34', 'toegevoegd', 'wqe'),
(152, '2015-12-10 15:12:36', 'toegevoegd', 'wqe'),
(153, '2015-12-10 15:12:39', 'toegevoegd', 'wqe'),
(154, '2015-12-10 15:18:03', 'toegevoegd', 'wrerw'),
(155, '2015-12-10 15:18:06', 'toegevoegd', 'wrerw'),
(156, '2015-12-10 15:18:08', 'toegevoegd', 'wrerw'),
(157, '2015-12-10 15:18:11', 'toegevoegd', 'wrerw'),
(158, '2015-12-11 04:06:49', 'toegevoegd', 'rokken (rood)ss'),
(159, '2015-12-11 04:06:50', 'toegevoegd', 'rokken (rood)ss'),
(160, '2015-12-11 04:06:50', 'toegevoegd', 'rokken (rood)ss'),
(161, '2015-12-11 04:11:47', 'toegevoegd', '3445345'),
(162, '2015-12-11 04:11:48', 'toegevoegd', '3445345'),
(163, '2015-12-11 04:21:56', 'toegevoegd', 'asdasd'),
(164, '2015-12-11 04:21:57', 'toegevoegd', 'asdasd'),
(165, '2015-12-11 04:24:43', 'toegevoegd', 'awdawdawdaw'),
(166, '2015-12-11 04:24:44', 'toegevoegd', 'awdawdawdaw'),
(167, '2015-12-11 04:27:09', 'toegevoegd', 'awdawdawdaw'),
(168, '2015-12-11 04:27:10', 'toegevoegd', 'awdawdawdaw'),
(169, '2015-12-11 04:27:12', 'toegevoegd', 'awdawdawdaw'),
(170, '2015-12-11 04:27:13', 'toegevoegd', 'awdawdawdaw'),
(171, '2015-12-11 04:27:59', 'toegevoegd', 'awdawd'),
(172, '2015-12-11 04:28:00', 'toegevoegd', 'awdawd'),
(173, '2015-12-11 04:29:29', 'toegevoegd', 'awdawd2222awd'),
(174, '2015-12-11 04:29:30', 'toegevoegd', 'awdawd2222awd'),
(175, '2015-12-11 04:30:40', 'toegevoegd', 'awdawd2222awd'),
(176, '2015-12-11 04:30:42', 'toegevoegd', 'awdawd2222awd'),
(177, '2015-12-11 04:31:05', 'toegevoegd', 'awdawd2222awd'),
(178, '2015-12-11 04:31:07', 'toegevoegd', 'awdawd2222awd'),
(179, '2015-12-11 04:32:46', 'toegevoegd', 'awdawd2222awd'),
(180, '2015-12-11 04:32:48', 'toegevoegd', 'awdawd2222awd'),
(181, '2015-12-11 04:33:20', 'toegevoegd', 'awdawd2222awd'),
(182, '2015-12-11 04:33:21', 'toegevoegd', 'awdawd2222awd'),
(183, '2015-12-11 04:33:44', 'toegevoegd', 'dsfdf'),
(184, '2015-12-11 04:33:46', 'toegevoegd', 'dsfdf'),
(185, '2015-12-11 04:35:51', 'toegevoegd', 'rtyertrt'),
(186, '2015-12-11 04:36:22', 'toegevoegd', 'rtyertrt'),
(187, '2015-12-11 04:37:12', 'toegevoegd', 'retwt'),
(188, '2015-12-11 04:37:15', 'toegevoegd', 'retwt'),
(189, '2015-12-11 04:37:17', 'toegevoegd', 'retwt'),
(190, '2015-12-11 16:04:54', 'toegevoegd', 'fdsfsdfsfd'),
(191, '2015-12-11 16:04:57', 'toegevoegd', 'fdsfsdfsfd'),
(192, '2015-12-11 17:00:38', 'toegevoegd', 'asdasd'),
(193, '2015-12-11 17:00:40', 'toegevoegd', 'asdasd'),
(194, '2015-12-12 03:53:10', 'toegevoegd', 'dsffsef'),
(195, '2015-12-12 03:53:18', 'toegevoegd', 'dsffsef'),
(196, '2015-12-12 03:53:26', 'toegevoegd', 'dsffsef'),
(197, '2015-12-12 03:53:54', 'toegevoegd', 'dsffsef'),
(198, '2015-12-12 03:54:01', 'toegevoegd', 'dsffsef'),
(199, '2015-12-12 03:54:09', 'toegevoegd', 'dsffsef'),
(200, '2015-12-12 03:59:05', 'toegevoegd', 'adawd'),
(201, '2015-12-12 03:59:06', 'toegevoegd', 'adawd'),
(202, '2015-12-12 03:59:07', 'toegevoegd', 'adawd'),
(203, '2015-12-12 06:49:20', 'toegevoegd', 'awdawd'),
(204, '2015-12-12 06:49:21', 'toegevoegd', 'awdawd'),
(205, '2015-12-12 06:49:21', 'toegevoegd', 'awdawd'),
(206, '2015-12-12 06:50:28', 'toegevoegd', 'awdawd'),
(207, '2015-12-12 06:50:28', 'toegevoegd', 'awdawd'),
(208, '2015-12-12 06:50:29', 'toegevoegd', 'awdawd'),
(209, '2015-12-12 07:16:09', 'toegevoegd', 'asdasd'),
(210, '2015-12-12 07:16:10', 'toegevoegd', 'asdasd'),
(211, '2015-12-12 07:49:27', 'toegevoegd', 'awdawd'),
(212, '2015-12-12 07:49:28', 'toegevoegd', 'awdawd'),
(213, '2015-12-12 07:51:23', 'toegevoegd', '23asdfasd'),
(214, '2015-12-12 07:51:24', 'toegevoegd', '23asdfasd'),
(215, '2015-12-12 07:53:07', 'toegevoegd', 'awdawd'),
(216, '2015-12-12 07:53:08', 'toegevoegd', 'awdawd'),
(217, '2015-12-12 07:53:09', 'toegevoegd', 'awdawd'),
(218, '2015-12-12 07:58:53', 'toegevoegd', 'asdasd'),
(219, '2015-12-12 07:58:54', 'toegevoegd', 'asdasd'),
(220, '2015-12-12 08:04:05', 'toegevoegd', 'awsdad'),
(221, '2015-12-12 08:04:06', 'toegevoegd', 'awsdad'),
(222, '2015-12-12 08:04:52', 'toegevoegd', 'awsdad'),
(223, '2015-12-12 08:04:53', 'toegevoegd', 'awsdad'),
(224, '2015-12-12 08:16:50', 'toegevoegd', 'awdad'),
(225, '2015-12-12 08:16:50', 'toegevoegd', 'awdad'),
(226, '2015-12-12 08:22:57', 'toegevoegd', 'awdad'),
(227, '2015-12-12 08:22:57', 'toegevoegd', 'awdad'),
(228, '2015-12-12 08:23:41', 'toegevoegd', 'awdad'),
(229, '2015-12-12 08:23:41', 'toegevoegd', 'awdad'),
(230, '2015-12-12 08:25:23', 'toegevoegd', 'awdad'),
(231, '2015-12-12 08:25:23', 'toegevoegd', 'awdad'),
(232, '2015-12-12 08:28:27', 'toegevoegd', 'awdad'),
(233, '2015-12-12 08:28:27', 'toegevoegd', 'awdad'),
(234, '2015-12-12 08:37:06', 'toegevoegd', 'awdad'),
(235, '2015-12-12 08:37:06', 'toegevoegd', 'awdad'),
(236, '2015-12-12 08:42:04', 'toegevoegd', 'awdad'),
(237, '2015-12-12 08:42:05', 'toegevoegd', 'awdad'),
(238, '2015-12-12 08:42:27', 'toegevoegd', 'awdad'),
(239, '2015-12-12 08:42:27', 'toegevoegd', 'awdad'),
(240, '2015-12-12 08:42:50', 'toegevoegd', 'awdawd2222'),
(241, '2015-12-12 08:42:51', 'toegevoegd', 'awdawd2222'),
(242, '2015-12-12 08:44:54', 'toegevoegd', 'awdaw'),
(243, '2015-12-12 08:44:54', 'toegevoegd', 'awdaw'),
(244, '2015-12-12 08:49:41', 'toegevoegd', 'awdawdafawd'),
(245, '2015-12-12 08:49:41', 'toegevoegd', 'awdawdafawd'),
(246, '2015-12-12 09:01:41', 'toegevoegd', 'awdeawdaw'),
(247, '2015-12-12 09:01:41', 'toegevoegd', 'awdeawdaw'),
(248, '2015-12-12 09:04:19', 'toegevoegd', 'awdawd'),
(249, '2015-12-12 09:04:19', 'toegevoegd', 'awdawd'),
(250, '2015-12-12 09:06:19', 'toegevoegd', 'awdad'),
(251, '2015-12-12 09:06:19', 'toegevoegd', 'awdad'),
(252, '2015-12-12 09:06:19', 'toegevoegd', 'awdad'),
(253, '2015-12-21 19:17:01', 'toegevoegd', 'deveron reniers'),
(254, '2015-12-21 19:17:01', 'toegevoegd', 'deveron reniers'),
(255, '2015-12-21 19:17:01', 'toegevoegd', 'deveron reniers'),
(256, '2015-12-21 23:56:27', 'verwijdert', 'deveron reniers'),
(257, '2015-12-21 23:56:30', 'verwijdert', 'deveron reniers'),
(258, '2015-12-21 23:56:32', 'verwijdert', 'deveron reniers'),
(259, '2015-12-21 23:56:32', 'verwijdert', 'deveron reniers'),
(260, '2015-12-21 23:56:33', 'verwijdert', 'deveron reniers'),
(261, '2015-12-21 23:56:33', 'verwijdert', 'deveron reniers'),
(262, '2015-12-21 23:56:34', 'verwijdert', 'awdad'),
(263, '2015-12-21 23:56:41', 'verwijdert', 'awdad'),
(264, '2015-12-21 23:56:41', 'verwijdert', 'awdad'),
(265, '2015-12-21 23:56:42', 'verwijdert', 'awdawd'),
(266, '2015-12-21 23:56:43', 'verwijdert', 'awdawd'),
(267, '2015-12-21 23:56:43', 'verwijdert', 'awdeawdaw'),
(268, '2015-12-21 23:56:44', 'verwijdert', 'awdeawdaw'),
(269, '2015-12-21 23:56:44', 'verwijdert', 'awdawdafawd'),
(270, '2015-12-21 23:56:45', 'verwijdert', 'awdawdafawd'),
(271, '2015-12-21 23:56:45', 'verwijdert', 'awdad'),
(272, '2015-12-21 23:56:46', 'verwijdert', 'awdad'),
(273, '2015-12-21 23:56:46', 'verwijdert', 'awsdad'),
(274, '2015-12-21 23:56:47', 'verwijdert', 'awsdad'),
(275, '2015-12-21 23:56:47', 'verwijdert', '23asdfasd'),
(276, '2015-12-21 23:56:48', 'verwijdert', '23asdfasd'),
(277, '2015-12-21 23:56:49', 'verwijdert', 'asdasd'),
(278, '2015-12-21 23:56:50', 'verwijdert', 'asdasd'),
(279, '2015-12-21 23:56:51', 'verwijdert', 'awdawd'),
(280, '2015-12-21 23:56:52', 'verwijdert', 'awdawd'),
(281, '2015-12-21 23:56:52', 'verwijdert', 'awdawd'),
(282, '2015-12-21 23:56:53', 'verwijdert', 'awdawd'),
(283, '2015-12-21 23:56:54', 'verwijdert', 'awdawd'),
(284, '2015-12-21 23:56:54', 'verwijdert', 'awdawd'),
(285, '2015-12-21 23:57:47', 'toegevoegd', 'jurkje'),
(286, '2015-12-21 23:57:47', 'toegevoegd', 'jurkje'),
(287, '2015-12-21 23:57:48', 'toegevoegd', 'jurkje'),
(288, '2015-12-21 23:59:59', 'toegevoegd', 'jurkje geel'),
(289, '2015-12-21 23:59:59', 'toegevoegd', 'jurkje geel'),
(290, '2015-12-21 23:59:59', 'toegevoegd', 'jurkje geel'),
(291, '2016-01-02 08:45:19', 'toegevoegd', 'deveron reniers'),
(292, '2016-01-02 08:45:19', 'toegevoegd', 'deveron reniers'),
(293, '2016-01-02 08:45:19', 'toegevoegd', 'deveron reniers'),
(294, '2016-01-02 08:45:53', 'toegevoegd', 'deveron reniers'),
(295, '2016-01-02 08:45:53', 'toegevoegd', 'deveron reniers'),
(296, '2016-01-02 08:45:53', 'toegevoegd', 'deveron reniers'),
(297, '2016-01-10 20:01:11', 'toegevoegd', 'fdgdfg'),
(298, '2016-01-10 20:01:11', 'toegevoegd', 'fdgdfg'),
(299, '2016-01-10 20:01:11', 'toegevoegd', 'fdgdfg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ordered_products`
--

CREATE TABLE IF NOT EXISTS `ordered_products` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `op_payment_id` varchar(32) NOT NULL,
  `op_product_id` int(11) NOT NULL,
  PRIMARY KEY (`op_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_id` varchar(32) NOT NULL,
  `transaction_id` varchar(32) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `description` varchar(29) NOT NULL,
  `paid` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ipadress` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `transaction_id`, `amount`, `description`, `paid`, `date`, `ipadress`) VALUES
(1, 1, 'tr_d0b0E3EA3v', '0', 435, 'desc', '0', '2016-01-28 01:15:55', ''),
(2, 1, 'tr_d0b0E3DRHN', '0', 435, 'desc', '0', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `postcode`
--

CREATE TABLE IF NOT EXISTS `postcode` (
  `id` int(11) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `postcode_id` int(10) unsigned NOT NULL,
  `pnum` smallint(4) unsigned NOT NULL,
  `pchar` char(2) NOT NULL,
  `minnumber` mediumint(10) unsigned NOT NULL,
  `maxnumber` mediumint(10) unsigned NOT NULL,
  `numbertype` enum('','mixed','even','odd') NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `city_id` smallint(5) unsigned DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `municipality_id` smallint(5) unsigned DEFAULT NULL,
  `province` enum('','Drenthe','Flevoland','Friesland','Gelderland','Groningen','Limburg','Noord-Brabant','Noord-Holland','Overijssel','Utrecht','Zeeland','Zuid-Holland') DEFAULT NULL,
  `province_code` enum('','DR','FL','FR','GE','GR','LI','NB','NH','OV','UT','ZE','ZH') DEFAULT NULL,
  `lat` decimal(15,13) DEFAULT NULL,
  `lon` decimal(15,13) DEFAULT NULL,
  `rd_x` decimal(31,20) DEFAULT NULL,
  `rd_y` decimal(31,20) DEFAULT NULL,
  `location_detail` enum('','exact','postcode','pnum','city') NOT NULL DEFAULT 'postcode',
  `changed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `postcode_number` (`postcode_id`,`minnumber`,`maxnumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `postcode`
--

INSERT INTO `postcode` (`id`, `postcode`, `postcode_id`, `pnum`, `pchar`, `minnumber`, `maxnumber`, `numbertype`, `street`, `city`, `city_id`, `municipality`, `municipality_id`, `province`, `province_code`, `lat`, `lon`, `rd_x`, `rd_y`, `location_detail`, `changed_date`) VALUES
(1, '5632CZ', 0, 0, '', 0, 0, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'postcode', '2015-12-15 01:41:22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(24) NOT NULL,
  `product_desc` varchar(250) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_units` int(11) NOT NULL DEFAULT '0',
  `product_status` int(11) DEFAULT NULL,
  `kleding` varchar(24) NOT NULL,
  `merken` varchar(24) NOT NULL,
  `kleuren` varchar(24) NOT NULL,
  `maten` varchar(24) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `type` (`kleding`),
  KEY `brand` (`merken`),
  KEY `colour` (`kleuren`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Gegevens worden uitgevoerd voor tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_code`, `product_price`, `product_date`, `product_units`, `product_status`, `kleding`, `merken`, `kleuren`, `maten`) VALUES
(57, 'jurkje', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '995769', '44.00', '2015-12-21 23:57:47', 5, NULL, 'Jurken', 'Super Angel', 'black', 'XL'),
(58, 'jurkje', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '995769', '44.00', '2015-12-21 23:57:47', 0, NULL, 'Jurken', 'Super Angel', 'black', 'XS'),
(59, 'jurkje', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '995769', '44.00', '2015-12-21 23:57:48', 5, NULL, 'Jurken', 'Super Angel', 'black', 'S'),
(60, 'jurkje geel', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '759239', '66.00', '2015-12-21 23:59:59', 2, NULL, 'Jurken', 'Fictive Fashion', 'black', 'X'),
(61, 'jurkje geel', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '759239', '66.00', '2015-12-21 23:59:59', 6, NULL, 'Jurken', 'Fictive Fashion', 'black', 'XL'),
(62, 'jurkje geel', 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met letters nam en ze door elkaar husselde om een font-cat', '759239', '66.00', '2015-12-21 23:59:59', 0, NULL, 'Jurken', 'Fictive Fashion', 'black', 'L'),
(63, 'deveron reniers', 'ytuyu', '759239', '48.00', '2016-01-02 08:45:19', 1, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'white', 'XL'),
(64, 'deveron reniers', 'ytuyu', '759239', '48.00', '2016-01-02 08:45:19', 3, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'white', 'XXL'),
(65, 'deveron reniers', 'ytuyu', '759239', '48.00', '2016-01-02 08:45:19', 0, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'white', 'XS'),
(66, 'deveron reniers', 'ytuyu', '667832', '48.00', '2016-01-02 08:45:53', 0, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'black', 'XL'),
(67, 'deveron reniers', 'ytuyu', '667832', '48.00', '2016-01-02 08:45:53', 0, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'black', 'XXL'),
(68, 'deveron reniers', 'ytuyu', '667832', '48.00', '2016-01-02 08:45:53', 0, NULL, 'Jurken', 'Jack &amp;amp; Jones', 'black', 'XS'),
(69, 'fdgdfg', 'sdfsdf', '463571', '45.00', '2016-01-10 20:01:11', 0, NULL, 'Super Angel', 'Super Angel', '', 'XL'),
(70, 'fdgdfg', 'sdfsdf', '463571', '45.00', '2016-01-10 20:01:11', 0, NULL, 'Super Angel', 'Super Angel', '', 'XXL'),
(71, 'fdgdfg', 'sdfsdf', '463571', '45.00', '2016-01-10 20:01:11', 0, NULL, 'Jeans', 'Super Angel', '', 'XS');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_facets`
--

CREATE TABLE IF NOT EXISTS `product_facets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_facts`
--

CREATE TABLE IF NOT EXISTS `product_facts` (
  `product_id` int(11) NOT NULL,
  `facet_id` int(11) NOT NULL,
  `facet_name` varchar(24) NOT NULL,
  `value` varchar(24) NOT NULL,
  KEY `product_id` (`product_id`),
  KEY `facet_id` (`facet_id`),
  KEY `facet_name` (`facet_name`),
  KEY `value` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `product_facts`
--

INSERT INTO `product_facts` (`product_id`, `facet_id`, `facet_name`, `value`) VALUES
(57, 1, 'merken', 'Super Angel'),
(57, 2, 'kleuren', 'black'),
(57, 3, 'maten', 'XL'),
(58, 1, 'merken', 'Super Angel'),
(58, 2, 'kleuren', 'black'),
(58, 3, 'maten', 'XS'),
(59, 1, 'merken', 'Super Angel'),
(59, 2, 'kleuren', 'black'),
(59, 3, 'maten', 'S'),
(60, 1, 'merken', 'Fictive Fashion'),
(60, 2, 'kleuren', 'black'),
(60, 3, 'maten', 'X'),
(61, 1, 'merken', 'Fictive Fashion'),
(61, 2, 'kleuren', 'black'),
(61, 3, 'maten', 'XL'),
(62, 1, 'merken', 'Fictive Fashion'),
(62, 2, 'kleuren', 'black'),
(62, 3, 'maten', 'L'),
(63, 1, 'merken', 'Jack &amp; Jones'),
(63, 2, 'kleuren', 'white'),
(63, 3, 'maten', 'XL'),
(64, 1, 'merken', 'Jack &amp; Jones'),
(64, 2, 'kleuren', 'white'),
(64, 3, 'maten', 'XXL'),
(65, 1, 'merken', 'Jack &amp; Jones'),
(65, 2, 'kleuren', 'white'),
(65, 3, 'maten', 'XS'),
(66, 1, 'merken', 'Jack &amp; Jones'),
(66, 2, 'kleuren', 'black'),
(66, 3, 'maten', 'XL'),
(67, 1, 'merken', 'Jack &amp; Jones'),
(67, 2, 'kleuren', 'black'),
(67, 3, 'maten', 'XXL'),
(68, 1, 'merken', 'Jack &amp; Jones'),
(68, 2, 'kleuren', 'black'),
(68, 3, 'maten', 'XS'),
(69, 1, 'merken', 'Super Angel'),
(69, 2, 'kleuren', ''),
(69, 3, 'maten', 'XL'),
(70, 1, 'merken', 'Super Angel'),
(70, 2, 'kleuren', ''),
(70, 3, 'maten', 'XXL'),
(71, 1, 'merken', 'Super Angel'),
(71, 2, 'kleuren', ''),
(71, 3, 'maten', 'XS');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_img`
--

CREATE TABLE IF NOT EXISTS `product_img` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `pi_product_id` int(11) NOT NULL,
  `pi_img_path` varchar(20) NOT NULL,
  PRIMARY KEY (`pi_id`),
  KEY `pi_product_id` (`pi_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=136 ;

--
-- Gegevens worden uitgevoerd voor tabel `product_img`
--

INSERT INTO `product_img` (`pi_id`, `pi_product_id`, `pi_img_path`) VALUES
(1, 1, 'bdwbfBOnXo.jpg'),
(2, 1, 'M1oRHqRlf1.jpg'),
(3, 1, 'ylOjBSVZop.jpg'),
(4, 2, 'bdwbfBOnXo.jpg'),
(5, 2, 'M1oRHqRlf1.jpg'),
(6, 2, 'ylOjBSVZop.jpg'),
(7, 3, 'bdwbfBOnXo.jpg'),
(8, 3, 'M1oRHqRlf1.jpg'),
(9, 3, 'ylOjBSVZop.jpg'),
(10, 4, 'PktVNjgLaF.jpg'),
(11, 4, 'D6FWru4bZN.jpg'),
(12, 5, 'PktVNjgLaF.jpg'),
(13, 5, 'D6FWru4bZN.jpg'),
(14, 6, 'PktVNjgLaF.jpg'),
(15, 6, 'D6FWru4bZN.jpg'),
(16, 7, 'DnXLJaPYsV.jpg'),
(17, 7, 'sBxRhc3fnS.jpg'),
(18, 7, 'a3fSWnDo7r.jpg'),
(19, 8, 'DnXLJaPYsV.jpg'),
(20, 8, 'sBxRhc3fnS.jpg'),
(21, 8, 'a3fSWnDo7r.jpg'),
(22, 9, 'extension not allowe'),
(23, 10, 'extension not allowe'),
(24, 11, 'p3lNuAho1y.jpg'),
(25, 12, 'p3lNuAho1y.jpg'),
(26, 13, 'extension not allowe'),
(27, 14, 'extension not allowe'),
(28, 15, 'extension not allowe'),
(29, 16, 'extension not allowe'),
(30, 17, 'extension not allowe'),
(31, 18, 'extension not allowe'),
(32, 19, 'extension not allowe'),
(33, 20, 'FRoJ7ftvHk.JPG'),
(34, 21, 'FRoJ7ftvHk.JPG'),
(35, 22, 'extension not allowe'),
(36, 23, 'extension not allowe'),
(37, 24, 'mppWJas2au.jpg'),
(38, 24, 'mQibs4iw9D.jpg'),
(39, 25, 'mppWJas2au.jpg'),
(40, 25, 'mQibs4iw9D.jpg'),
(41, 26, 'extension not allowe'),
(42, 27, 'extension not allowe'),
(43, 28, 'extension not allowe'),
(44, 29, 'extension not allowe'),
(45, 30, 'extension not allowe'),
(46, 31, 'extension not allowe'),
(47, 32, 'extension not allowe'),
(48, 33, 'extension not allowe'),
(49, 34, 'extension not allowe'),
(50, 35, 'extension not allowe'),
(51, 36, 'jpgextension not all'),
(52, 37, 'jpgextension not all'),
(53, 38, 'JPGextension not all'),
(54, 39, 'JPGextension not all'),
(55, 40, 'JPGextension not all'),
(56, 41, 'JPGextension not all'),
(57, 42, 'wa5DORLz0T.jpg'),
(58, 42, 'cBbukIVwoh.jpg'),
(59, 42, 'jigps5iwan.jpg'),
(60, 42, 'ixh8H3tngO.jpg'),
(61, 42, 'iacoY7FVUP.jpg'),
(62, 43, 'wa5DORLz0T.jpg'),
(63, 43, 'cBbukIVwoh.jpg'),
(64, 43, 'jigps5iwan.jpg'),
(65, 43, 'ixh8H3tngO.jpg'),
(66, 43, 'iacoY7FVUP.jpg'),
(67, 44, 'xK17ZQD6jZ.jpg'),
(68, 44, 'gKXhublHXE.jpg'),
(69, 45, 'xK17ZQD6jZ.jpg'),
(70, 45, 'gKXhublHXE.jpg'),
(71, 46, 'F45famhGtM.jpg'),
(72, 47, 'F45famhGtM.jpg'),
(73, 48, 'QyPmvlXUHg.jpg'),
(74, 48, 'gps8gPdkeb.jpg'),
(75, 48, 'VuJehLLiod.jpg'),
(76, 49, 'QyPmvlXUHg.jpg'),
(77, 49, 'gps8gPdkeb.jpg'),
(78, 49, 'VuJehLLiod.jpg'),
(79, 50, 'QyPmvlXUHg.jpg'),
(80, 50, 'gps8gPdkeb.jpg'),
(81, 50, 'VuJehLLiod.jpg'),
(82, 54, 'Vdtxbx2sby.jpg'),
(83, 54, 'AHbcZU8usc.jpg'),
(84, 54, '09FxuEK4lN.jpg'),
(85, 54, 'XguYeGi9oS.jpg'),
(86, 55, 'Vdtxbx2sby.jpg'),
(87, 55, 'AHbcZU8usc.jpg'),
(88, 55, '09FxuEK4lN.jpg'),
(89, 55, 'XguYeGi9oS.jpg'),
(90, 56, 'Vdtxbx2sby.jpg'),
(91, 56, 'AHbcZU8usc.jpg'),
(92, 56, '09FxuEK4lN.jpg'),
(93, 56, 'XguYeGi9oS.jpg'),
(94, 57, '4puCa80CYn.jpg'),
(95, 57, 'EuoJ4eCHaa.jpg'),
(96, 57, 'gxEQS6b5hi.jpg'),
(97, 58, '4puCa80CYn.jpg'),
(98, 58, 'EuoJ4eCHaa.jpg'),
(99, 58, 'gxEQS6b5hi.jpg'),
(100, 59, '4puCa80CYn.jpg'),
(101, 59, 'EuoJ4eCHaa.jpg'),
(102, 59, 'gxEQS6b5hi.jpg'),
(103, 60, 'goTIiFGdLr.jpg'),
(104, 60, '40dSotbc7i.jpg'),
(105, 60, 'vEpxpvK3UR.jpg'),
(106, 61, 'goTIiFGdLr.jpg'),
(107, 61, '40dSotbc7i.jpg'),
(108, 61, 'vEpxpvK3UR.jpg'),
(109, 62, 'goTIiFGdLr.jpg'),
(110, 62, '40dSotbc7i.jpg'),
(111, 62, 'vEpxpvK3UR.jpg'),
(112, 63, '9jIos3Y0CC.jpg'),
(113, 63, '8GlACrALwZ.jpg'),
(114, 64, '9jIos3Y0CC.jpg'),
(115, 64, '8GlACrALwZ.jpg'),
(116, 65, '9jIos3Y0CC.jpg'),
(117, 65, '8GlACrALwZ.jpg'),
(118, 66, 'WJCoLJRsTN.jpg'),
(119, 66, '9GG0zBlS9D.jpg'),
(120, 67, 'WJCoLJRsTN.jpg'),
(121, 67, '9GG0zBlS9D.jpg'),
(122, 68, 'WJCoLJRsTN.jpg'),
(123, 68, '9GG0zBlS9D.jpg'),
(124, 69, 'InyylesdPt.jpg'),
(125, 69, 'NCTN2hUAUB.jpg'),
(126, 69, 'GW8lDbCezm.jpg'),
(127, 69, 'bAU3Nli37h.jpg'),
(128, 70, 'InyylesdPt.jpg'),
(129, 70, 'NCTN2hUAUB.jpg'),
(130, 70, 'GW8lDbCezm.jpg'),
(131, 70, 'bAU3Nli37h.jpg'),
(132, 71, 'InyylesdPt.jpg'),
(133, 71, 'NCTN2hUAUB.jpg'),
(134, 71, 'GW8lDbCezm.jpg'),
(135, 71, 'bAU3Nli37h.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resettokens`
--

CREATE TABLE IF NOT EXISTS `resettokens` (
  `token` varchar(40) NOT NULL COMMENT 'The Unique Token Generated',
  `uid` int(11) NOT NULL COMMENT 'The User Id',
  `requested` varchar(20) NOT NULL COMMENT 'The Date when token was created'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `resettokens`
--

INSERT INTO `resettokens` (`token`, `uid`, `requested`) VALUES
('igPZIrZCZCb1ouPgiXg8FsxK8Pp0Sj1YU9ImsqNx', 2, '2015-12-18 23:51:39');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_user_id` int(11) NOT NULL,
  `sc_product_id` int(11) NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Gegevens worden uitgevoerd voor tabel `shopping_cart`
--

INSERT INTO `shopping_cart` (`sc_id`, `sc_user_id`, `sc_product_id`) VALUES
(28, 1, 64),
(29, 1, 64),
(30, 1, 64),
(43, 1, 61),
(44, 1, 61),
(45, 1, 61),
(46, 1, 61),
(47, 1, 61),
(48, 1, 61),
(49, 1, 61),
(50, 1, 61);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_salt` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `attempt` varchar(15) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `voornaam` varchar(35) NOT NULL,
  `voorletter` varchar(5) NOT NULL,
  `tussenvoegsel` varchar(8) NOT NULL,
  `achternaam` varchar(35) NOT NULL,
  `geslacht` varchar(6) NOT NULL,
  `geboortedatum` date NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `huisnummer` varchar(10) NOT NULL,
  `straat` varchar(50) NOT NULL,
  `woonplaats` varchar(30) NOT NULL,
  `land` varchar(30) NOT NULL,
  `telefoon` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `password_salt`, `created`, `attempt`, `status`, `voornaam`, `voorletter`, `tussenvoegsel`, `achternaam`, `geslacht`, `geboortedatum`, `postcode`, `huisnummer`, `straat`, `woonplaats`, `land`, `telefoon`, `mobile`) VALUES
(1, 'oollhhaa', 'def-lol-lol@hotmail.com', 'ff7ac4d9f4a18da130f91d640600114c2951d332ff0491a594ebc03e763745c7', 'rpsQTwFKHQghHBBFsNPj', '2015-11-14 23:15:49', '', 1, 'deveron', 'd. r.', '', 'reniers', 'man', '2014-11-18', '5632CZ', '11', 'dolphijnstraat', 'eindhoven', 'nederland', '040 2342342', '06 53779761'),
(8, 'sphinx', 'dever@hotmail.com', '6406fe919d8a4ece8eac03c9ffe3f6f0f4d64862a61853e7a1c08afe115676fa', 'bEhs4RAPdkGUEA6ljmDY', '2016-01-06 11:25:03', '0', 0, '', '', '', '', '0', '0000-00-00', '', '', '', '', '', '0', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
