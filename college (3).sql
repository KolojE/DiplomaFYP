-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 11:32 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `LogID` int(255) NOT NULL,
  `UserID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Allowance_Type` varchar(255) NOT NULL,
  `Allowance_Amounts` float NOT NULL,
  `Status` varchar(100) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`LogID`, `UserID`, `Name`, `Allowance_Type`, `Allowance_Amounts`, `Status`, `From_Date`, `To_Date`, `Remark`) VALUES
(1, ' 123456', 'whc', 'Petrol Allowance', 50, 'Approved', '2020-09-24', '2020-09-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `leaverecords`
--

CREATE TABLE `leaverecords` (
  `LogID` int(100) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LeaveType` varchar(255) NOT NULL,
  `Leave_days` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaverecords`
--

INSERT INTO `leaverecords` (`LogID`, `User_ID`, `Name`, `LeaveType`, `Leave_days`, `Status`, `From_Date`, `To_Date`, `Remark`) VALUES
(13, ' 123456', 'whc', 'Annual Leave', 2, 'Approved', '2020-09-23', '2020-09-24', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(100) NOT NULL,
  `User_Pass` varchar(9999) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `User_Dept` varchar(255) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_company` varchar(100) NOT NULL,
  `User_contact` varchar(20) NOT NULL,
  `User_Type` varchar(255) NOT NULL,
  `User_Salary` int(255) DEFAULT NULL,
  `User_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Pass`, `User_name`, `User_Dept`, `User_email`, `User_company`, `User_contact`, `User_Type`, `User_Salary`, `User_date`) VALUES
(' 1234567', '123456', 'WOON HC', '', 'whc@gmail.com', 'SE', '0177034609', '', NULL, '0000-00-00'),
(' 3038', '123456', 'whc123', '', 'woonwinchester@gmail.com', 'SE', '0177034609', 'Students', NULL, '0000-00-00'),
(' hcwoon1944', '123', 'WOON HC', '', 'whc@gmail.com', '123', '12312313', '', NULL, '0000-00-00'),
(' ss88a71x', '123456', 'WOON HC', '', 'whc@gmail.com', 'SE', '0177034609', '', NULL, '0000-00-00'),
(' ss88a71x1', '123456', 'WOON HC', '', 'whc@gmail.com', 'SE', '0177034609', '', NULL, '0000-00-00'),
(' ss88a71x2', '123456', 'WOON HC', '', 'whc@gmail.com', 'SE', '0177034609', '', NULL, '0000-00-00'),
('1122701764', '321062', 'Woon Hoe Chun', '', 'woonwinchester@gmail.com', 'Business admin', '0177034609', '', NULL, '2020-09-08'),
('123456', '123456', 'whc', 'IT', 'e.xia00@hotmail.com', 'Business admin', '0177034609', 'Staff', 2888, '2020-09-10'),
('321038', '123456', 'Yvonee', 'HR', 'Yvoone@gmail.com', 'Business admin', '012345678', 'HR', 0, '2020-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `userleave`
--

CREATE TABLE `userleave` (
  `User_ID` varchar(255) NOT NULL,
  `Annual_Leave` int(255) NOT NULL,
  `Medical_Leave` int(255) NOT NULL,
  `Hospital_Leave` int(255) NOT NULL,
  `Lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userleave`
--

INSERT INTO `userleave` (`User_ID`, `Annual_Leave`, `Medical_Leave`, `Hospital_Leave`, `Lastupdate`) VALUES
('', 0, 0, 0, '2020-09-02'),
('', 0, 2, 0, '2020-09-08'),
('123456', 14, 14, 14, '2020-09-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `leaverecords`
--
ALTER TABLE `leaverecords`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `LogID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaverecords`
--
ALTER TABLE `leaverecords`
  MODIFY `LogID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
