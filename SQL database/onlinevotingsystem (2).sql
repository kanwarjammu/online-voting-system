-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 08:50 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindb`
--

CREATE TABLE `admindb` (
  `adminID` int(4) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindb`
--

INSERT INTO `admindb` (`adminID`, `Firstname`, `Lastname`, `Email`, `Password`) VALUES
(1, 'Kanwar', 'singh', 'kanwarpal@gmail.com', '123'),
(2, 'Davinder', 'Sharma', 'davinder@gmail.com', '12345'),
(3, 'Mandeep', 'Kaur', 'mandeep@gmail.com', '123456'),
(4, 'Roneet', 'Kumar', 'roneet@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `candidatesdb`
--

CREATE TABLE `candidatesdb` (
  `CandidateID` int(4) NOT NULL,
  `CandidateName` varchar(20) NOT NULL,
  `positionID` int(4) NOT NULL,
  `votes` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidatesdb`
--

INSERT INTO `candidatesdb` (`CandidateID`, `CandidateName`, `positionID`, `votes`) VALUES
(1, 'John', 3, 9),
(3, 'David', 2, 2),
(4, 'Chris', 10, 5),
(5, 'Justin', 1, 2),
(6, 'Andrew', 11, 1),
(7, 'Kay', 12, 2),
(8, 'Mohammed', 12, 2),
(9, 'john', 11, 0),
(10, 'sharma ji', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `positionsdb`
--

CREATE TABLE `positionsdb` (
  `PositionID` varchar(4) NOT NULL,
  `PositionName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positionsdb`
--

INSERT INTO `positionsdb` (`PositionID`, `PositionName`) VALUES
('1', 'PM'),
('11', 'Mayor'),
('12', 'Director'),
('13', 'vc'),
('2', 'CM'),
('3', 'MP'),
('4', 'MLA'),
('5', 'HOD'),
('6', 'Secretary'),
('7', 'representative'),
('8', 'HodPHP'),
('9', 'Assistant Manager');

-- --------------------------------------------------------

--
-- Table structure for table `voterdb`
--

CREATE TABLE `voterdb` (
  `VoterID` int(4) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voterdb`
--

INSERT INTO `voterdb` (`VoterID`, `FirstName`, `LastName`, `Email`, `Password`) VALUES
(1405, 'Hao', 'han', 'hao@gmail.com', '123'),
(1455, 'Liji', 'Anna Jiji', 'liji', '123'),
(3721, 'legend', 'sharma', 'sharma@gmail.com', '123'),
(5908, 'roop', 'singh', 'rupinder', '456'),
(6232, 'kanwarpal', 'singh', 'kanwar@gmail.com', '123'),
(6696, 'kanwalpreet', 'kaur', 'kanwal', '123'),
(6747, 'Gaurav', 'Sharma', 'Gaurav@gmail.com', '123'),
(6889, 'smith', 'white', 'smith@gmail.com', '123'),
(7083, 'Ram', 'Jup', 'Ramya', '456'),
(7691, 'zxfghj', 'zxfghjk', 'dfghjk@gmail.com', '123'),
(8248, 'Sulakhan', 'singh', 'sulakhan@gmail.com', '123'),
(9377, 'roneet', 'kumar', 'roneet@gmail.com', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindb`
--
ALTER TABLE `admindb`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `candidatesdb`
--
ALTER TABLE `candidatesdb`
  ADD PRIMARY KEY (`CandidateID`);

--
-- Indexes for table `positionsdb`
--
ALTER TABLE `positionsdb`
  ADD PRIMARY KEY (`PositionID`);

--
-- Indexes for table `voterdb`
--
ALTER TABLE `voterdb`
  ADD PRIMARY KEY (`VoterID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatesdb`
--
ALTER TABLE `candidatesdb`
  MODIFY `CandidateID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
