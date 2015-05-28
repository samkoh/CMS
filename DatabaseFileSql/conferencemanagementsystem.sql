-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 03:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `conferencemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE IF NOT EXISTS `conferences` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conferenceName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acronym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `websiteUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conferenceEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` int(11) NOT NULL,
  `faxNo` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`id`, `user_id`, `conferenceName`, `acronym`, `theme`, `address`, `websiteUrl`, `conferenceEmail`, `contactNo`, `faxNo`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 'sam910615@gmail.com', 'First-Conference', 'first', 'First', '22,Jln Sri Serdang,23000', 'www.firstConference.com', 'test@mail.com', 12345, 12345, '2015-05-24', '2015-05-24', '2015-05-24 15:08:40', '2015-05-24 15:08:40'),
(2, 'sam910615@gmail.com', 'Second-Conference', 'secConf', 'Information System', 'Universiti Putra Malaysia', 'www.secondConf.com.my', 'secondConf@mail.com', 123456789, 3456789, '2015-05-24', '2015-05-27', '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(3, 'sam910615@gmail.com', 'Test20150527', 'Test20150527', 'Test20150527', 'Test20150527', 'www.Test20150527.com', 'Test20150527@mail.com', 123, 123, '0000-00-00', '0000-00-00', '2015-05-26 08:10:20', '2015-05-26 08:10:20'),
(4, 'sam910615@gmail.com', 'Test20150528', 'Test20150528', 'Test20150528', 'Test20150528', 'www.Test20150528.com', 'Test20150528@mail.com', 123, 123, '0000-00-00', '0000-00-00', '2015-05-27 16:09:24', '2015-05-27 16:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `conference_topic`
--

CREATE TABLE IF NOT EXISTS `conference_topic` (
`id` int(10) unsigned NOT NULL,
  `conference_id` bigint(20) unsigned NOT NULL,
  `topic_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conference_topic`
--

INSERT INTO `conference_topic` (`id`, `conference_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2015-05-24 15:09:53', '2015-05-24 15:09:53'),
(2, 1, 7, '2015-05-24 15:09:53', '2015-05-24 15:09:53'),
(3, 2, 3, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(4, 2, 5, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(5, 2, 6, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(6, 2, 7, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(7, 2, 13, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(8, 2, 17, '2015-05-24 07:11:40', '2015-05-24 07:11:40'),
(9, 3, 5, '2015-05-26 08:10:21', '2015-05-26 08:10:21'),
(10, 3, 6, '2015-05-26 08:10:21', '2015-05-26 08:10:21'),
(11, 4, 5, '2015-05-27 16:09:24', '2015-05-27 16:09:24'),
(12, 4, 7, '2015-05-27 16:09:24', '2015-05-27 16:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_registration_status`
--

CREATE TABLE IF NOT EXISTS `invitation_registration_status` (
`id` int(10) unsigned NOT NULL,
  `statusId` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invitation_registration_status`
--

INSERT INTO `invitation_registration_status` (`id`, `statusId`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'without invitation', '2015-05-27 05:37:32', '2015-05-27 05:37:32'),
(2, 1, 'with invitation', '2015-05-27 05:37:32', '2015-05-27 05:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `message_logs`
--

CREATE TABLE IF NOT EXISTS `message_logs` (
`id` bigint(20) unsigned NOT NULL,
  `conference_id` bigint(20) unsigned DEFAULT NULL,
  `conference_hash_id` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_logs`
--

INSERT INTO `message_logs` (`id`, `conference_id`, `conference_hash_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 'eyJpdiI6InVOWUlHMUdEaWwxVnNmSXVtMk50WUE9PSIsInZhbHVlIjoibmZlVnlcL2VVZENPalhQK05kVGgyTGc9PSIsIm1hYyI6IjBmN2I3YjI1ZWUzMGMzMTA3MWIxY2VlNzgzY2ZlODdkZTA3NjE5YmMwZTA4ZjAzMTBlNWUzZTg3ZTY3OTM4YzEifQ==', 'sam910615@gmail.com', 'Hello, sam koh with email sam910615@gmail.com\r\n\r\nI am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/eyJpdiI6InVOWUlHMUdEaWwxVnNmSXVtMk50WUE9PSIsInZhbHVlIjoibmZlVnlcL2VVZENPalhQK05kVGgyTGc9PSIsIm1hYyI6IjBmN2I3YjI1ZWUzMGMzMTA3MWIxY2VlNzgzY2ZlODdkZTA3NjE5YmMwZTA4ZjAzMTBlNWUzZTg3ZTY3OTM4YzEifQ==\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-25 04:12:24', '2015-05-25 04:12:24'),
(2, 2, '13da4f341157fab5a2810dce3d582217', 'sam910615@gmail.com', 'Hello, sam koh with email sam910615@gmail.com\r\n\r\nI am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-25 04:18:50', '2015-05-25 04:18:50'),
(3, 2, '$2y$10$xLyEmQB.sGdIiX1IulQkFuO4AXaH.6bG4o9SXKzLTH4.1iRGzpAYa', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\nI am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/$2y$10$xLyEmQB.sGdIiX1IulQkFuO4AXaH.6bG4o9SXKzLTH4.1iRGzpAYa\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-25 17:21:00', '2015-05-25 17:21:00'),
(4, 1, '$2y$10$I7vvBfYPs4XqKk5KTWKLGuDk1My0ssVuwaTHzUIWeFveI2tiwNWS2', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\nI am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/$2y$10$I7vvBfYPs4XqKk5KTWKLGuDk1My0ssVuwaTHzUIWeFveI2tiwNWS2\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-25 17:26:00', '2015-05-25 17:26:00'),
(5, 1, '$2y$10$BrLGvAxMw/guVFUOsB7VZ.5oST3m.bi95DxgS4CZkGsSNgeCqDEea', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\nI am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/$2y$10$BrLGvAxMw/guVFUOsB7VZ.5oST3m.bi95DxgS4CZkGsSNgeCqDEea\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 04:17:41', '2015-05-26 04:17:41'),
(6, 2, '$2y$10$zXSP7ilrVIhVuozUNE9JC.Crk/2AUF/fxoLxEZCkoENtZ5Ow6ivku', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\nI am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/$2y$10$zXSP7ilrVIhVuozUNE9JC.Crk/2AUF/fxoLxEZCkoENtZ5Ow6ivku\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 04:21:24', '2015-05-26 04:21:24'),
(7, 2, '13da4f341157fab5a2810dce3d582217', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\nI am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 04:25:21', '2015-05-26 04:25:21'),
(8, 1, '13da4f341157fab5a2810dce3d582217', 'test', '<!DOCTYPE html>\r\n<html lang="en-US">\r\n<head>\r\n    <meta charset="utf-8">\r\n</head>\r\n<body>\r\n<h2>Paper Committee Joining Request</h2>\r\n<div>\r\n    Hello, test , email sam910615@gmail.com\r\n</div>\r\n<div>         I am the program chair of First-Conference 2015.\r\n    </div>\r\n<div>\r\n    I am here to invite you to become one of the Paper Committee Member of this conference.\r\n</div>\r\n<div>\r\n    If you are interested in joining us, please click the following link to register before 1st July 2015\r\n</div>\r\n<div>\r\n    http://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n</div>\r\n<div>\r\n    Please do reply me if you are not interested in joining us.\r\n</div>\r\n<div>\r\n    Thank You,\r\n</div>\r\n<div>\r\n    Sincerely,\r\n</div>\r\n<div>\r\n    sam\r\n    sam910615@gmail.com\r\n</div>\r\n</body>\r\n</html>', '2015-05-26 04:36:38', '2015-05-26 04:36:38'),
(9, 1, '13da4f341157fab5a2810dce3d582217', 'test', '<h2>Hello test</h2>\r\n<p> http://localhost/auth/show/13da4f341157fab5a2810dce3d582217 </p>', '2015-05-26 04:44:11', '2015-05-26 04:44:11'),
(10, 2, '13da4f341157fab5a2810dce3d582217', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 05:09:48', '2015-05-26 05:09:48'),
(11, 2, '13da4f341157fab5a2810dce3d582217', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 06:44:39', '2015-05-26 06:44:39'),
(12, 3, '13da4f341157fab5a2810dce3d582217', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Test20150527 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/13da4f341157fab5a2810dce3d582217\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 08:10:38', '2015-05-26 08:10:38'),
(13, 3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Test20150527 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/eccbc87e4b5ce2fe28308fd9f2a7baf3\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 08:19:08', '2015-05-26 08:19:08'),
(14, 3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Test20150527 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/eccbc87e4b5ce2fe28308fd9f2a7baf3\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 15:54:30', '2015-05-26 15:54:30'),
(15, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 16:39:32', '2015-05-26 16:39:32'),
(16, 2, 'c81e728d9d4c2f636f067f89cc14862c', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c81e728d9d4c2f636f067f89cc14862c\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 21:39:21', '2015-05-26 21:39:21'),
(17, 2, 'c81e728d9d4c2f636f067f89cc14862c', 'test', 'Hello, test with email nescafe@mail.com\r\n\r\n    I am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c81e728d9d4c2f636f067f89cc14862c\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-26 22:21:23', '2015-05-26 22:21:23'),
(18, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 08:21:24', '2015-05-27 08:21:24'),
(19, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 08:24:07', '2015-05-27 08:24:07'),
(20, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b?=sam910615@gmail.com\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 08:46:01', '2015-05-27 08:46:01'),
(21, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b?=sam910615@gmail.com\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 08:47:06', '2015-05-27 08:47:06'),
(22, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/array(c4ca4238a0b923820dcc509a6f75849b?=sam910615@gmail.com)\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 09:00:27', '2015-05-27 09:00:27'),
(23, 1, 'c4ca4238a0b923820dcc509a6f75849b', 'test', 'Hello, test with email sam910615@gmail.com\r\n\r\n    I am the program chair of First-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c4ca4238a0b923820dcc509a6f75849b?=sam910615@gmail.com\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 09:06:46', '2015-05-27 09:06:46'),
(24, 2, 'c81e728d9d4c2f636f067f89cc14862c', 'test', 'Hello, test20150528 with email sam910615@gmail.com\r\n\r\n    I am the program chair of Second-Conference 2015.\r\n\r\nI am here to invite you to become one of the Paper Committee Member of this conference.\r\n\r\nIf you are interested in joining us, please click the following link to register before 1st July 2015\r\n\r\nhttp://localhost/auth/show/c81e728d9d4c2f636f067f89cc14862c\r\n\r\nPlease do reply me if you are not interested in joining us.\r\n\r\nThank You,\r\n\r\nSincerely,\r\n\r\nsam\r\n\r\nsam910615@gmail.com', '2015-05-27 15:56:48', '2015-05-27 15:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_05_10_132441_create_users_table', 1),
('2015_05_10_132623_create_password_resets_table', 2),
('2015_05_10_132704_create_conferences_table', 3),
('2015_05_10_133248_create_topics_table', 4),
('2015_05_10_133349_create_papers_table', 5),
('2015_05_10_133920_create_conference_topic_table', 6),
('2015_05_10_145525_create_users_table', 7),
('2015_05_10_145646_create_password_resets_table', 8),
('2015_05_10_145720_create_conferences_table', 9),
('2015_05_10_145807_create_topics_table', 10),
('2015_05_10_145925_create_papers_table', 11),
('2015_05_10_150310_create_conference_topic_table', 12),
('2015_05_11_031452_create_paper_evaluations_table', 13),
('2015_05_12_122715_create_paper_discussions_table', 14),
('2015_05_12_122943_create_paper_discussions_table', 15),
('2015_05_11_031452_create_paper_reviews_table', 16),
('2015_05_15_092157_create_address_country_table', 17),
('2015_05_15_092249_create_address_table', 18),
('2015_05_16_112725_create_user_role_table', 19),
('2015_05_16_120940_create_users_user_role_table', 20),
('2015_05_17_015410_create_recipients_message_logs_table', 21),
('2015_05_17_161246_create_message_logs_table', 22),
('2015_05_17_162213_create_recipient_message_logs_table', 23),
('2015_05_18_022314_create_review_evaluation_definition_table', 24),
('2015_05_21_054859_create_paper_discussion_definition_table', 25),
('2015_05_21_160622_create_user_conferences_table', 26),
('2015_05_22_152445_create_user_role_table', 27),
('2015_05_22_153005_create_user_user_roles_table', 27),
('2015_05_23_152132_create_user_roles_table', 28),
('2015_05_24_140239_create_user_user_roles_table', 29),
('2015_05_27_053129_create_invitation_registration_status_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE IF NOT EXISTS `papers` (
`id` bigint(20) unsigned NOT NULL,
  `conference_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `committeeApprove_id` bigint(20) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abstractContent` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `averageMarks` decimal(10,2) NOT NULL,
  `fullPaperUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cameraReadyUrl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `conference_id`, `user_id`, `committeeApprove_id`, `title`, `abstractContent`, `status`, `tempStatus`, `averageMarks`, `fullPaperUrl`, `cameraReadyUrl`, `created_at`, `updated_at`) VALUES
(1, NULL, 'conan@gmail.com', NULL, 'Sample Paper for IEEE Sponsored Conferences & Symposia', 'The abstract goes here. What you need to do is to\r\ninsert your abstract here. Please try to make it less than 150\r\nwords. We suggest that you read this document carefully before\r\nyou begin preparing your manuscript. IEEE does not want\r\nconference papers to have keywords so you should remove your\r\nkeyword list. Also, at this time, IEEE only has some general\r\nguidelines about the format for conference papers. It is up to\r\neach individual conference to decide which format to use. In\r\norder to have a uniform look for all papers published in the\r\nWCCI 2006 Proceeding, we require that every author follow\r\nthe format of this sample paper. This sample paper is for latex\r\nusers. Authors may use the sample paper here to produce their\r\nown papers by following the same format as this sample paper.', '1', '-3', '0.00', 'cf112bb1da658842f3a644c43f1f85e1', NULL, '2015-05-24 07:18:20', '2015-05-25 17:48:12'),
(2, NULL, 'conan@gmail.com', NULL, 'Fast Neutron Covariances for Evaluated Data Files', 'We describe implementation of the KALMAN code in the EMPIRE system\r\nand present rst covariance data generated for Gd and Ir isotopes. A complete\r\nset of covariances, in the full energy range, was produced for the chain of 8\r\nGadolinium isotopes for total, elastic, capture, total inelastic (MT=4), (n,2n),\r\n(n,p) and (n,alpha) reactions. Our correlation matrices, based on combination\r\nof model calculations and experimental data, are characterized by positive\r\nmid-range and negative long-range correlations. They differ from the modelgenerated\r\ncovariances that tend to show strong positive long-range correlations\r\nand those determined solely from experimental data that result in nearly diagonal\r\nmatrices. We have studied shapes of correlation matrices obtained in the\r\ncalculations and interpreted them in terms of the underlying reaction models.\r\nAn important result of this study is the prediction of narrow energy ranges with', '', '-1', '0.00', '6f82ab79e0a3d0a3fc54fdbba31b9820', NULL, '2015-05-24 08:28:22', '2015-05-25 08:49:14'),
(3, NULL, 'conan@gmail.com', NULL, 'An Example Conference Paper', 'The abstract contains a brief overview of the paper. It should be relatively short. There is usually\r\na “sales job” in the abstract too, meaning that you should have one or two sentences explaining\r\nwhy your work is the best thing since sliced bread. For example, “the results of this experimental\r\nindicate that, contrary to popular opinion, the replacement policies have very little impact on the\r\nmiss rate of the cache.”', '', '1', '0.00', '143e2988e94e94c833cbc8449a6c87e9', NULL, '2015-05-26 06:25:56', '2015-05-26 06:29:26'),
(4, NULL, 'test@gmail.com', NULL, 'Test20150527', 'Test20150527', '-1', '-3', '0.00', 'bd4b31fa6924665c362d1ba9cf59a65a', NULL, '2015-05-26 08:24:00', '2015-05-26 08:29:16'),
(5, NULL, 'testAuthor20150528@gmail.com', NULL, 'TestPaper20150528', 'TestPaper20150528', '', '-3', '0.00', '1aa6da78df96f4d5c7dde1e0fb4bb3d6', NULL, '2015-05-27 16:02:29', '2015-05-27 16:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `paper_discussions`
--

CREATE TABLE IF NOT EXISTS `paper_discussions` (
`id` int(10) unsigned NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_id` bigint(20) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_discussions`
--

INSERT INTO `paper_discussions` (`id`, `user_id`, `paper_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'john@gmail.com', 1, 'Test John', 1, '2015-05-25 08:40:58', '2015-05-25 08:40:58'),
(2, 'nikki@gmail.com', 1, 'Nikki comment', 1, '2015-05-25 08:42:00', '2015-05-25 08:42:00'),
(3, 'john@gmail.com', 1, 'Hi ', 1, '2015-05-25 08:42:58', '2015-05-25 08:42:58'),
(4, 'john@gmail.com', 1, 'This is John', 1, '2015-05-25 08:48:36', '2015-05-25 08:48:36'),
(5, 'john@gmail.com', 2, 'John here', 1, '2015-05-25 08:49:53', '2015-05-25 08:49:53'),
(6, 'john@gmail.com', 2, 'Ello', 1, '2015-05-25 08:54:49', '2015-05-25 08:54:49'),
(7, 'nikki@gmail.com', 2, 'i am nikki', 1, '2015-05-25 08:55:13', '2015-05-25 08:55:13'),
(8, 'sam910615@gmail.com', 1, 'i am conference chair', 1, '2015-05-25 17:04:07', '2015-05-25 17:04:07'),
(9, 'sam910615@gmail.com', 1, 'Please discuss on this paper', 1, '2015-05-25 17:49:22', '2015-05-25 17:49:22'),
(10, 'dean@gmail.com', 1, 'The content is good but i have no idea why this paper is being rejected', 1, '2015-05-25 17:49:54', '2015-05-25 17:49:54'),
(11, 'sam910615@gmail.com', 1, 'Any example that can support your view?\r\n#Reviewer : 3\r\n', 1, '2015-05-26 03:38:43', '2015-05-26 03:38:43'),
(12, 'dean@gmail.com', 4, 'I am Dean, first comment', 1, '2015-05-26 08:27:36', '2015-05-26 08:27:36'),
(13, 'john@gmail.com', 4, 'I am dean, second comment', 1, '2015-05-26 08:28:05', '2015-05-26 08:28:05'),
(14, 'nikki@gmail.com', 4, 'I am nikki, third comment', 1, '2015-05-26 08:28:35', '2015-05-26 08:28:35'),
(15, 'sam910615@gmail.com', 4, 'I am conference chair', 1, '2015-05-26 08:28:49', '2015-05-26 08:28:49'),
(16, 'sam910615@gmail.com', 4, 'Hi guys', 1, '2015-05-26 22:43:09', '2015-05-26 22:43:09'),
(17, 'john@gmail.com', 4, 'Hello', 1, '2015-05-27 07:48:29', '2015-05-27 07:48:29'),
(18, 'sam910615@gmail.com', 5, 'This paper is conflicting', 1, '2015-05-27 16:06:54', '2015-05-27 16:06:54'),
(19, 'dean@gmail.com', 5, 'What do you mean ?', 1, '2015-05-27 16:07:11', '2015-05-27 16:07:11'),
(20, 'sam910615@gmail.com', 5, 'Conflict', 1, '2015-05-27 17:29:15', '2015-05-27 17:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `paper_discussion_definition`
--

CREATE TABLE IF NOT EXISTS `paper_discussion_definition` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_discussion_definition`
--

INSERT INTO `paper_discussion_definition` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Active', '2015-05-21 16:24:44', '2015-05-21 16:24:44'),
(2, 'Deactive', '2015-05-21 16:24:44', '2015-05-21 16:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviews`
--

CREATE TABLE IF NOT EXISTS `paper_reviews` (
`id` bigint(20) unsigned NOT NULL,
  `tempId` int(11) DEFAULT NULL,
  `reviewer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assigned_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paper_id` bigint(20) unsigned NOT NULL,
  `score` decimal(8,2) NOT NULL,
  `paperEvaluation` tinyint(255) DEFAULT NULL,
  `confidenceLevel` tinyint(11) DEFAULT NULL,
  `quality` tinyint(255) DEFAULT NULL,
  `rationale` tinyint(255) DEFAULT NULL,
  `hypothesis` tinyint(255) DEFAULT NULL,
  `manuscript` tinyint(255) DEFAULT NULL,
  `structure` tinyint(255) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `reviewed_date` datetime NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paper_reviews`
--

INSERT INTO `paper_reviews` (`id`, `tempId`, `reviewer_id`, `assigned_by`, `paper_id`, `score`, `paperEvaluation`, `confidenceLevel`, `quality`, `rationale`, `hypothesis`, `manuscript`, `structure`, `comment`, `reviewed_date`, `flag`, `created_at`, `updated_at`) VALUES
(1, 1, 'john@gmail.com', 'sam910615@gmail.com', 1, '0.00', -2, 2, -2, -2, -2, -2, -2, '', '2015-05-25 16:40:36', 6, '2015-05-25 08:40:09', '2015-05-25 08:40:36'),
(2, 2, 'nikki@gmail.com', 'sam910615@gmail.com', 1, '0.00', -2, 0, -2, -2, -2, -2, -2, '', '2015-05-25 16:41:47', 6, '2015-05-25 08:40:14', '2015-05-25 08:41:47'),
(3, 1, 'nikki@gmail.com', 'sam910615@gmail.com', 2, '0.00', -2, 0, -2, -2, -2, -2, -2, '', '2015-05-25 16:49:14', 6, '2015-05-25 08:48:54', '2015-05-25 08:49:14'),
(4, 2, 'john@gmail.com', 'sam910615@gmail.com', 2, '0.00', -2, 4, -2, -2, -2, -2, -2, '', '2015-05-25 16:49:34', 6, '2015-05-25 08:48:59', '2015-05-25 08:49:34'),
(5, 3, 'dean@gmail.com', 'sam910615@gmail.com', 1, '0.00', 1, 2, 2, 1, 1, 1, 1, '', '2015-05-26 01:48:12', 6, '2015-05-25 17:47:20', '2015-05-25 17:48:12'),
(6, 1, 'dean@gmail.com', 'sam910615@gmail.com', 3, '0.00', 2, 4, 0, 1, 1, 0, 1, 'Totally agree with confidence', '2015-05-26 14:29:25', 6, '2015-05-26 06:28:19', '2015-05-26 06:29:25'),
(7, 1, 'john@gmail.com', 'sam910615@gmail.com', 4, '0.00', -1, 2, -2, -2, -2, -2, -2, '', '2015-05-27 15:48:20', 6, '2015-05-26 08:24:24', '2015-05-27 07:48:20'),
(8, 2, 'nikki@gmail.com', 'sam910615@gmail.com', 4, '0.00', 2, 3, -2, -2, -2, -2, -2, '', '2015-05-26 16:26:00', 6, '2015-05-26 08:24:29', '2015-05-26 08:26:00'),
(9, 3, 'dean@gmail.com', 'sam910615@gmail.com', 4, '0.00', -1, 4, -2, -2, -2, -2, -2, '', '2015-05-26 16:26:43', 6, '2015-05-26 08:24:33', '2015-05-26 08:26:43'),
(10, 1, 'john@gmail.com', 'sam910615@gmail.com', 5, '0.00', 1, 3, 1, 1, -1, 1, 0, 'This paper overall is ok', '2015-05-28 00:04:23', 6, '2015-05-27 16:03:05', '2015-05-27 16:04:23'),
(11, 2, 'dean@gmail.com', 'sam910615@gmail.com', 5, '0.00', -1, 2, -2, -2, -2, -2, -2, 'Rejected', '2015-05-28 00:05:56', 6, '2015-05-27 16:03:15', '2015-05-27 16:05:56'),
(12, 2, 'nikki@gmail.com', 'sam910615@gmail.com', 3, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 6, '2015-05-27 17:28:38', '2015-05-27 17:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipient_message_logs`
--

CREATE TABLE IF NOT EXISTS `recipient_message_logs` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recipient_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `messagelog_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recipient_message_logs`
--

INSERT INTO `recipient_message_logs` (`id`, `user_id`, `recipient_id`, `messagelog_id`, `created_at`, `updated_at`) VALUES
(1, 'sam910615@gmail.com', 'dean@gmail.com', 16, '2015-05-27 05:48:44', '2015-05-27 05:48:44'),
(2, 'sam910615@gmail.com', 'nikki@gmail.com', 16, '2015-05-27 05:48:44', '2015-05-27 05:48:44'),
(3, 'sam910615@gmail.com', 'john@gmail.com', 16, '2015-05-27 05:49:06', '2015-05-27 05:49:06'),
(4, 'sam910615@gmail.com', 'oligo@gmail.com', 16, '2015-05-27 05:50:09', '2015-05-27 05:50:09'),
(5, 'sam910615@gmail.com', 'ryback@gmail.com', 16, '2015-05-27 05:50:09', '2015-05-27 05:50:09'),
(6, 'sam910615@gmail.com', 'nescafe@mail.com', 17, '2015-05-26 22:21:23', '2015-05-26 22:21:23'),
(13, 'sam910615@gmail.com', 'sam910615@gmail.com', 24, '2015-05-27 15:56:48', '2015-05-27 15:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `review_evaluation_definition`
--

CREATE TABLE IF NOT EXISTS `review_evaluation_definition` (
`id` int(10) unsigned NOT NULL,
  `evaluation_id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review_evaluation_definition`
--

INSERT INTO `review_evaluation_definition` (`id`, `evaluation_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Strongly Accept', '2015-05-18 02:28:57', '2015-05-18 02:28:57'),
(2, 1, 'Accept', '2015-05-18 02:28:57', '2015-05-18 02:28:57'),
(3, 0, 'Border Line', '2015-05-18 02:29:22', '2015-05-17 16:00:00'),
(4, -1, 'Reject', '2015-05-18 02:29:22', '2015-05-18 02:29:22'),
(5, -2, 'Strongly Reject', '2015-05-18 02:29:40', '2015-05-18 02:29:40'),
(6, 6, 'Review Flag On', '2015-05-21 09:31:20', '2015-05-21 09:31:20'),
(7, 7, 'Review Flag Off', '2015-05-21 09:31:20', '2015-05-21 09:31:20'),
(8, -3, 'Conflict', '2015-05-21 13:05:11', '2015-05-21 13:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Software', '2015-05-10 15:25:37', '2015-05-10 15:25:37'),
(4, 'Sustainable Production', '2015-05-10 15:25:43', '2015-05-10 15:25:43'),
(5, 'Big Data and Data Mining', '2015-05-10 15:25:47', '2015-05-10 15:25:47'),
(6, 'Cloud Computing for Automation', '2015-05-10 15:25:51', '2015-05-10 15:25:51'),
(7, 'Computer Science', '2015-05-10 15:25:54', '2015-05-10 15:25:54'),
(8, 'Environmental Science', '2015-05-10 15:25:59', '2015-05-10 15:25:59'),
(9, 'Business Management', '2015-05-12 16:38:27', '2015-05-12 16:38:27'),
(10, 'Economics', '2015-05-14 08:30:03', '2015-05-14 08:30:03'),
(11, 'Medic', '2015-05-17 06:45:17', '2015-05-17 06:45:17'),
(12, 'Environmental ', '2015-05-17 06:49:10', '2015-05-17 06:49:10'),
(13, 'Software Engineering', '2015-05-17 06:50:12', '2015-05-17 06:50:12'),
(14, 'Dental', '2015-05-17 06:50:36', '2015-05-17 06:50:36'),
(15, 'Weather', '2015-05-17 06:55:38', '2015-05-17 06:55:38'),
(16, 'Business Foundation', '2015-05-17 06:57:32', '2015-05-17 06:57:32'),
(17, 'Discrete Computing', '2015-05-17 06:58:12', '2015-05-17 06:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(20) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nameTitlePrefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `nationalIdentityNo` int(11) NOT NULL,
  `addressLine1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addressLine2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addressLine3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postalCode` int(20) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `faxNo` bigint(20) NOT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paymentModelId` bigint(20) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registerUponInvitation` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `nameTitlePrefix`, `gender`, `dateOfBirth`, `nationalIdentityNo`, `addressLine1`, `addressLine2`, `addressLine3`, `city`, `state`, `postalCode`, `country`, `contactNo`, `faxNo`, `education`, `paymentModelId`, `remember_token`, `registerUponInvitation`, `created_at`, `updated_at`) VALUES
(1, 'sam', 'koh', 'sam910615@gmail.com', '$2y$10$pgwxlPp9MDWmrvedZwjpIuBCa9QQHlCaxPGXVMoEX30uCkv94RqoC', 'Mr', 'Male', '2015-05-24', 123123, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'India', 123456789, 120123, 'Queensland', 0, 'L8LsEdE0ZoDeEiBqXXlXJK8VshtNNLDbAyWNEADfkOm7oFkf7YtANxNNUo3A', 0, '2015-05-24 07:05:39', '2015-05-27 08:42:42'),
(2, 'John', 'Cena', 'john@gmail.com', '$2y$10$c0c6K6iO65kIJzP/M503J.hUPJ1kSmTU39H8SAebwiY5fV21.UQky', 'Mr', 'Male', '2015-05-24', 1, '1', 'q', '', 'Puchong', 'Selangor', 43300, 'United State', 12345, 132132132132, 'Queensland', 0, 'jq233wjLh32NgQCK8ZXjfc0h9OnPPyirJZ5UZoOG7M99FPO6qCGyXvPpEwxQ', 1, '2015-05-24 07:13:37', '2015-05-27 16:05:27'),
(3, 'Nikki', 'Bella', 'nikki@gmail.com', '$2y$10$O6dYcPSl7DneI2p4eJWDROtEdgiQS4lGi0S9CtOwlfi9M/GMMcXGu', 'Miss', 'Female', '2015-05-05', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'India', 123456789, 3456789, 'Queensland', 0, 'pPeRCtQlQ04QFsAw48YSYh9Gn1Ix1t8QLJGmeGLpo7s14YJNnlMoDPQuIIHD', 1, '2015-05-24 07:15:03', '2015-05-27 07:35:49'),
(4, 'Dean', 'Ambros', 'dean@gmail.com', '$2y$10$1cuVqtH560/Kzh2t3Uv2TOwbEeAB33F6ftKZ0J/Wj39R8SPH0LhAq', 'Dr', 'Male', '2015-05-17', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'India', 123456789, 3456789, 'Queensland', 0, 'Newxv0llvtkfkskl3ikGhGFA9rbiFBJ5RAVpk6B05MXANyLf5qTdpRCBzKnL', 1, '2015-05-24 07:16:47', '2015-05-26 08:27:43'),
(5, 'conan', 'beast', 'conan@gmail.com', '$2y$10$Q3trnfEMDSFKt6lCi79zMeHvDn0LVqbDKMegc79qo6FG/iNs2k4YC', 'Professor', 'Male', '2015-05-04', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'India', 123456789, 3456789, 'Queensland', 0, 'UhU0NhLwCNJTv9sxZaEb9FDBUDrBgIWBM8MMSpkLpP2niT4EMNiuqXLC6juo', 0, '2015-05-24 07:17:26', '2015-05-27 08:22:30'),
(23, 'test20150525', 'test', 'test@gmail.com', '$2y$10$ofip1LAghnJNEqTtRoXfU.YcNkONlhDJD77aNZsAh.MvgMeaHNqoi', 'Mr', 'Male', '2015-05-18', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'United Kingdom', 123456789, 3456789, 'Queensland', 0, 'rsjn6XaskmeLjkGCYr98obi2s7jTx8GFYQpjl4YiPbtRKjBmzD9qGV4PVq64', 0, '2015-05-26 08:23:21', '2015-05-26 08:24:48'),
(24, 'test20150528', 'koh', 'test20150528@gmail.com', '$2y$10$TdCRYIwkttYIEkE.l4ZcJ.w2lP78i0/jzDujvh6/jCEuOMWPMl1gm', 'Sir', 'Male', '2015-05-27', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'United Kingdom', 123456789, 3456789, 'Queensland', 0, 'I6lSywthtLkN7dOSarrkVKbRrRXjTkjKTlKLW0McHK4YLInmrdC6XRTRdCou', 1, '2015-05-27 15:57:50', '2015-05-27 16:01:03'),
(25, 'testAuthor20150528', 'koh', 'testAuthor20150528@gmail.com', '$2y$10$rS9aBfVCwOcN/8Q462/mJOVcc3nOAgFj7mkh3LQ7syVBSybpWfsKe', 'Sir', 'Male', '2015-05-25', 123456, '123, 18/28', 'Jalan Sri Serdang', 'Seri Kembangan', 'Seri Kembangan', 'Selangor', 43300, 'United Kingdom', 123, 3456789, 'Queensland', 0, 'oTDfW538hlQxBbWbHHMA0sJHQjDfaG1mEMYFVSyW5xdofd4XoARRTUQ7VaJB', 0, '2015-05-27 16:01:44', '2015-05-27 16:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_conferences`
--

CREATE TABLE IF NOT EXISTS `user_conferences` (
`id` bigint(20) unsigned NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conference_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
`id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Conference Chair', 'conference_chair', '', '2015-05-24 00:44:58', '2015-05-24 00:44:58'),
(2, 'Conference Manager', 'conference_manager', '', '2015-05-24 00:55:52', '2015-05-24 00:55:52'),
(3, 'Program Committee', 'program_committee', '', '2015-05-24 00:57:25', '2015-05-24 00:57:25'),
(4, 'Technical Committee', 'technical_committee', '', '2015-05-24 00:57:25', '2015-05-24 00:57:25'),
(5, 'Reviewer', 'reviewer', '', '2015-05-24 00:57:25', '2015-05-24 00:57:25'),
(6, 'Author', 'author', '', '2015-05-24 00:57:25', '2015-05-24 00:57:25'),
(7, 'Participant', 'participant', '', '2015-05-24 00:57:25', '2015-05-24 00:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_user_roles`
--

CREATE TABLE IF NOT EXISTS `user_user_roles` (
  `user_table_id` bigint(20) unsigned NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role_id` bigint(20) unsigned NOT NULL,
  `conference_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_user_roles`
--

INSERT INTO `user_user_roles` (`user_table_id`, `user_id`, `user_role_id`, `conference_id`, `created_at`, `updated_at`) VALUES
(1, 'sam910615@gmail.com', 1, 1, '2015-05-24 15:09:10', '2015-05-24 15:09:10'),
(2, 'john@gmail.com', 5, 1, '2015-05-24 07:13:37', '2015-05-24 07:13:37'),
(3, 'nikki@gmail.com', 5, 1, '2015-05-24 07:15:03', '2015-05-24 07:15:03'),
(4, 'dean@gmail.com', 5, 1, '2015-05-24 07:16:48', '2015-05-24 07:16:48'),
(5, 'conan@gmail.com', 6, 1, '2015-05-24 07:17:26', '2015-05-24 07:17:26'),
(23, 'test@gmail.com', 5, 3, '2015-05-26 08:23:21', '2015-05-26 08:23:21'),
(5, 'conan@gmail.com', 5, 1, '2015-05-27 16:02:52', '2015-05-27 16:02:52'),
(24, 'test20150528@gmail.com', 5, 2, '2015-05-27 15:57:50', '2015-05-27 15:57:50'),
(25, 'testAuthor20150528@gmail.com', 6, 1, '2015-05-27 16:01:44', '2015-05-27 16:01:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
 ADD PRIMARY KEY (`id`), ADD KEY `conferences_user_id_foreign` (`user_id`);

--
-- Indexes for table `conference_topic`
--
ALTER TABLE `conference_topic`
 ADD PRIMARY KEY (`id`), ADD KEY `conference_topic_conference_id_foreign` (`conference_id`), ADD KEY `conference_topic_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `invitation_registration_status`
--
ALTER TABLE `invitation_registration_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_logs`
--
ALTER TABLE `message_logs`
 ADD PRIMARY KEY (`id`), ADD KEY `message_logs_conference_id_foreign` (`conference_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
 ADD PRIMARY KEY (`id`), ADD KEY `papers_conference_id_foreign` (`conference_id`), ADD KEY `papers_user_id_foreign` (`user_id`), ADD KEY `papers_committeeapprove_id_foreign` (`committeeApprove_id`);

--
-- Indexes for table `paper_discussions`
--
ALTER TABLE `paper_discussions`
 ADD PRIMARY KEY (`id`), ADD KEY `paper_discussions_user_id_foreign` (`user_id`), ADD KEY `paper_discussions_paper_id_foreign` (`paper_id`);

--
-- Indexes for table `paper_discussion_definition`
--
ALTER TABLE `paper_discussion_definition`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paper_reviews`
--
ALTER TABLE `paper_reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `paper_reviews_reviewer_id_foreign` (`reviewer_id`), ADD KEY `paper_reviews_assigned_by_foreign` (`assigned_by`), ADD KEY `paper_reviews_paper_id_foreign` (`paper_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipient_message_logs`
--
ALTER TABLE `recipient_message_logs`
 ADD PRIMARY KEY (`id`), ADD KEY `recipient_message_logs_user_id_foreign` (`user_id`), ADD KEY `recipient_message_logs_messagelog_id_foreign` (`messagelog_id`);

--
-- Indexes for table `review_evaluation_definition`
--
ALTER TABLE `review_evaluation_definition`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_conferences`
--
ALTER TABLE `user_conferences`
 ADD PRIMARY KEY (`id`), ADD KEY `user_conferences_user_id_foreign` (`user_id`), ADD KEY `user_conferences_conference_id_foreign` (`conference_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_roles`
--
ALTER TABLE `user_user_roles`
 ADD KEY `user_user_roles_user_table_id_foreign` (`user_table_id`), ADD KEY `user_user_roles_user_id_foreign` (`user_id`), ADD KEY `user_user_roles_user_role_id_foreign` (`user_role_id`), ADD KEY `user_user_roles_conference_id_foreign` (`conference_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conferences`
--
ALTER TABLE `conferences`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conference_topic`
--
ALTER TABLE `conference_topic`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invitation_registration_status`
--
ALTER TABLE `invitation_registration_status`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message_logs`
--
ALTER TABLE `message_logs`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paper_discussions`
--
ALTER TABLE `paper_discussions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `paper_discussion_definition`
--
ALTER TABLE `paper_discussion_definition`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paper_reviews`
--
ALTER TABLE `paper_reviews`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recipient_message_logs`
--
ALTER TABLE `recipient_message_logs`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `review_evaluation_definition`
--
ALTER TABLE `review_evaluation_definition`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_conferences`
--
ALTER TABLE `user_conferences`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conferences`
--
ALTER TABLE `conferences`
ADD CONSTRAINT `conferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `conference_topic`
--
ALTER TABLE `conference_topic`
ADD CONSTRAINT `conference_topic_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `conference_topic_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_logs`
--
ALTER TABLE `message_logs`
ADD CONSTRAINT `message_logs_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
ADD CONSTRAINT `papers_committeeapprove_id_foreign` FOREIGN KEY (`committeeApprove_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `papers_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `papers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `paper_discussions`
--
ALTER TABLE `paper_discussions`
ADD CONSTRAINT `paper_discussions_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `paper_discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `paper_reviews`
--
ALTER TABLE `paper_reviews`
ADD CONSTRAINT `paper_reviews_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`email`) ON DELETE CASCADE,
ADD CONSTRAINT `paper_reviews_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `paper_reviews_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `recipient_message_logs`
--
ALTER TABLE `recipient_message_logs`
ADD CONSTRAINT `recipient_message_logs_messagelog_id_foreign` FOREIGN KEY (`messagelog_id`) REFERENCES `message_logs` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `recipient_message_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `user_conferences`
--
ALTER TABLE `user_conferences`
ADD CONSTRAINT `user_conferences_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_conferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `user_user_roles`
--
ALTER TABLE `user_user_roles`
ADD CONSTRAINT `user_user_roles_conference_id_foreign` FOREIGN KEY (`conference_id`) REFERENCES `conferences` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`email`) ON DELETE CASCADE,
ADD CONSTRAINT `user_user_roles_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `user_user_roles_user_table_id_foreign` FOREIGN KEY (`user_table_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
