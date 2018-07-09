-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2018 at 12:59 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatadmin`
--

CREATE TABLE `chatadmin` (
  `idchatadmin` int(15) NOT NULL,
  `textchatadmin` text NOT NULL,
  `chat_memberid` int(15) NOT NULL,
  `dt_admin` datetime NOT NULL,
  `textchatuser` text NOT NULL,
  `chat_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idMember` int(15) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) CHARACTER SET utf32 NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `statusUser` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idMember`, `user`, `pass`, `fname`, `lname`, `tel`, `addr`, `statusUser`) VALUES
(28, 'test', '123456', '123456', 'test', '094775704', 'aaawwwqq8', 2),
(29, 'admin', '123456', '123456', 'aaa', '0877798214', 'dawagf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifacation`
--

CREATE TABLE `notifacation` (
  `idNoti` int(15) NOT NULL,
  `proplem` varchar(50) NOT NULL,
  `proplemEtc` varchar(200) DEFAULT NULL,
  `statusNotify` int(2) NOT NULL,
  `notiUser` varchar(15) NOT NULL,
  `Date` text NOT NULL,
  `Date_repair` date NOT NULL,
  `Repairman` text NOT NULL,
  `equipment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifacation`
--

INSERT INTO `notifacation` (`idNoti`, `proplem`, `proplemEtc`, `statusNotify`, `notiUser`, `Date`, `Date_repair`, `Repairman`, `equipment`) VALUES
(27, 'เครื่องยังทำงานอยู่ แต่ภาพไม่ขึ้น ', '', 0, 'test', '2018-03-09', '2018-06-30', 'aaaaaa', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatadmin`
--
ALTER TABLE `chatadmin`
  ADD PRIMARY KEY (`idchatadmin`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idMember`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `notifacation`
--
ALTER TABLE `notifacation`
  ADD PRIMARY KEY (`idNoti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatadmin`
--
ALTER TABLE `chatadmin`
  MODIFY `idchatadmin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idMember` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notifacation`
--
ALTER TABLE `notifacation`
  MODIFY `idNoti` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
