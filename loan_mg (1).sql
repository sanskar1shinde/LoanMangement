-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 18, 2023 at 03:54 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_mg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `phoneno`) VALUES
(1, 'admin', '123#', 'Admin', 'admin@gmail.com', 9657326105),
(2, 'admin2', '123##', 'me', 'adme@gmail.com', 8087101965);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

DROP TABLE IF EXISTS `borrower`;
CREATE TABLE IF NOT EXISTS `borrower` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `bname` varchar(50) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `bphoneno` bigint NOT NULL,
  `bdob` date NOT NULL,
  `baadhar` bigint NOT NULL,
  `bpanno` varchar(10) NOT NULL,
  `boccupation` varchar(50) NOT NULL,
  `uid` int NOT NULL,
  `bemail` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`bid`, `bname`, `baddress`, `bphoneno`, `bdob`, `baadhar`, `bpanno`, `boccupation`, `uid`, `bemail`) VALUES
(21, 'sdsd', 'sdasdasd', 0, '2023-11-15', 0, 'sdasdsad', 'sadsadsad', 0, 'sdsadasd'),
(20, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(19, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(18, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(17, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(16, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(15, 'jhfhj', 'uyyyyyyyy', 55555555555567, '2023-11-23', 7575765765656, '6786786786', 'jkkljl', 0, 'gjjjjjjjjjjjjjjjj'),
(22, 'sdsd', 'sdasdasd', 0, '2023-11-15', 0, 'sdasdsad', 'sadsadsad', 0, 'sdsadasd'),
(23, 'sdsd', 'sdasdasd', 0, '2023-11-15', 0, 'sdasdsad', 'sadsadsad', 0, 'sdsadasd');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `lid` int NOT NULL AUTO_INCREMENT,
  `ltype` varchar(50) NOT NULL,
  `lplan` varchar(50) NOT NULL,
  `dsal` blob NOT NULL,
  `ditr` blob NOT NULL,
  `daddress` blob NOT NULL,
  `dbonafide` blob NOT NULL,
  `bid` int NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`lid`, `ltype`, `lplan`, `dsal`, `ditr`, `daddress`, `dbonafide`, `bid`) VALUES
(19, 'cash', '3', '', '', '', '', 23),
(18, 'education', '3', '', '', '', '', 22),
(17, 'education', '3', '', '', '', '', 17),
(16, 'home', '2', '', '', '', '', 16),
(15, 'home', '2', '', '', '', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `password`, `name`) VALUES
(1, 'a@gmail.com', '111', 'd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
