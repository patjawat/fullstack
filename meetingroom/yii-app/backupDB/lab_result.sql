-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Generation Time: 09 เม.ย. 2020 เมื่อ 01:15 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.10-MariaDB-1:10.4.10+maria~bionic
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meeting_room`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `room_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `events`
--

INSERT INTO `events` (`id`, `title`, `body`, `room_id`, `start`, `end`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(55, 'wedsdf', 'sdfsdfd', 1, '2020-04-06 08:00:00', '2020-04-06 15:00:00', '2020-04-08', '2020-04-09', 1, 1),
(56, 'wedsdf', 'sdfsdfd', 1, '2020-04-08 06:00:00', '2020-04-08 08:00:00', '2020-04-08', '2020-04-09', 1, 1),
(57, 'AAAAA', 'sdfsdfsdf', 1, '2020-04-10 04:30:00', '2020-04-10 11:00:00', '2020-04-09', '2020-04-09', 1, 1),
(58, 'werw', 'erwrwer', 2, '2020-04-09 05:30:00', '2020-04-09 06:30:00', '2020-04-09', '2020-04-09', 1, 1),
(59, 'erert', 'ertert', 1, '2020-03-30 11:00:00', '2020-04-01 11:00:00', '2020-04-09', '2020-04-09', 1, 1),
(60, 'ทดสอบเพิ่ม Events', 'Event Tesrt', 2, '2020-04-09 11:30:00', '2020-04-09 12:30:00', '2020-04-09', '2020-04-09', 1, 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL COMMENT 'รหัส',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อห้องประชุม',
  `class` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ห้องประชุม';

--
-- dump ตาราง `room`
--

INSERT INTO `room` (`id`, `name`, `class`, `color`) VALUES
(1, 'ห้องประชุมทรายแก้ว', NULL, NULL),
(2, 'ห้องประชุมทาริน', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
