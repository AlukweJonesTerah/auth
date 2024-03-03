-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2024 at 12:03 PM
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
-- Database: `loginsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `uid` int NOT NULL AUTO_INCREMENT COMMENT 'This is the primary key that identifies each individual user. It''s auto-incremented.',
  `regno` varchar(20) DEFAULT NULL COMMENT 'This is the registration number of the user',
  `uname` varchar(20) NOT NULL COMMENT 'This is the username, used to identify the user''s handle as well as login credential.',
  `uemail` varchar(30) NOT NULL COMMENT 'Email is used primarily for password recovery, but it can also be used for contact information and can be updated.',
  `psw` varchar(64) NOT NULL COMMENT 'The password is used for user account authentication and serves as the first line of defense against unauthorized access.',
  `addr` varchar(35) DEFAULT NULL COMMENT 'The address is used to store place of residence',
  `phoneno` int DEFAULT NULL COMMENT 'This is the user''s phone number',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `regno`, `uname`, `uemail`, `psw`, `addr`, `phoneno`) VALUES
(33, 'CS/M/0000/00/00', 'Jacky', 'mugeha@gmail.com', '$2y$10$1t.9QoE./7lHzzDjee7VgOuQodZTvfINOJzKSQZWX.FscBIFwYKP.', '12345', 110003602),
(32, NULL, 'Karume', 'skarume@kabarak.ac.ke', '$2y$10$yTak55nAM9VnWFOT9Cv.de5zOtUU4R7ZZ2xSDBx3rMYmZDiSt.tdu', NULL, NULL),
(31, NULL, 'kalima', 'kalima@gmail.com', '$2y$10$bIwHAvGMwb1C6RqHS3ny7u/Ujjf4Ml.GwfNUnT2HJONGDFG1JBrSa', NULL, NULL),
(30, 'inte/m/0901', 'Kenn', 'kennethk@kabarak.ac.ke', '$2y$10$XGsYUCHm4p2T7ZC.1lMw6.FIt.w6h9RDO2.YvrHcKGwzF.pV6S3Im', '4371-30100', 705346371),
(29, 'CS/M/0741/05/22', 'Gascoigne', 'audreychelangat2003@gmail.com', '$2y$10$KYTFXPIC/QpUqppEJAPIjeuqL4XXc3fKKdD3nDFGnO9Bf0LsiaSEW', '12345', 110003602),
(28, 'CS/M/0000/00/00', 'tisa9', 'tawinia6@gmail.com', '$2y$10$5.awfDUCuj1aIWOBIdgRL.C7Bqn8tOYmTrmUIWxc7pVMGkYlnzqBm', '12345', 110003602);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(27, 'skarume@kabarak.ac.ke', '8c57b5a51cfabfb7', '$2y$10$3.hVBiS2zO0G1GgWrN7LIO8V8Z7/oTtrac/bnot1mCrK/LBrju0za', '1699274811'),
(9, 'dani@gmail.com', '65077db764479672', '$2y$10$fky.kyeMA7PdDuIvmqUVPuPZilJ/f/PYG0BvK/93qZDKiUBMvD2hC', '1698829589'),
(31, 'mugeha@gmail.com', '82d71ed69dae9511', '$2y$10$QwKlha4aoYZa2gNrgJ8.2OrDUqIxoqyjGb2S78fkbFsXEOiBSHsim', '1708338539'),
(35, 'tawinia6@gmail.com', '9a2d86546a6e947d', '$2y$10$X8a5yfi6lPQHXkYv3FFlQusyv16SlmEEXRznoXqPokS7JD3wqNzBG', '1708339223');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
