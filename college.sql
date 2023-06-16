-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 05:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
  `UserID` int(255) NOT NULL,
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
  `User_ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LeaveType` varchar(255) NOT NULL,
  `Leave_days` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `From_Date` date NOT NULL,
  `To_Date` date NOT NULL,
  `Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(100) NOT NULL,
  `User_Pass` varchar(9999) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `User_Dept` varchar(255) NOT NULL,
  `User_email` varchar(255) NOT NULL,
  `User_company` varchar(100) NOT NULL,
  `User_contact` int(20) NOT NULL,
  `User_Type` varchar(255) NOT NULL,
  `User_Salary` int(255) DEFAULT NULL,
  `User_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Pass`, `User_name`, `User_Dept`, `User_email`, `User_company`, `User_contact`, `User_Type`, `User_Salary`, `User_date`) VALUES
('1181202173', '981027', 'Lynn', 'HR', 'Lynn@gmail.com', 'MMU', '+60177663006', 'HR', 3500, '2020-09-09'),
('1181202510', '012720', 'Wensing', 'IT', 'Wensing@gmail.com', 'MMU', '+6017479623', 'IT', 2500, '2020-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `userclocking`
--

CREATE TABLE `userclocking` (
  `Clocking_ID` int(255) NOT NULL,
  `Clock_IN_Time` time NOT NULL,
  `Clock_OUT_Time` time DEFAULT NULL,
  `Clock_Date` date NOT NULL,
  `LocationLatitude` decimal(20,15) NOT NULL,
  `LocationLongitude` decimal(20,15) NOT NULL,
  `User_ID` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userclocking`
--

INSERT INTO `userclocking` (`Clocking_ID`, `Clock_IN_Time`, `Clock_OUT_Time`, `Clock_Date`, `LocationLatitude`, `LocationLongitude`, `User_ID`) VALUES
(1, '14:43:03', '14:43:06', '2020-10-11', '2.925664479845092', '101.636866260063300', '123456');


-- --------------------------------------------------------

--
-- Table structure for table `userleave`
--

CREATE TABLE `userleave` (
  `User_ID` int(255) NOT NULL,
  `Annual_Leave` int(255) NOT NULL,
  `Medical_Leave` int(255) NOT NULL,
  `Hospital_Leave` int(255) NOT NULL,
  `Lastupdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userleave`
--

INSERT INTO `userleave` (`User_ID`, `Annual_Leave`, `Medical_Leave`, `Hospital_Leave`, `Lastupdate`) VALUES
('1181202510', 14, 14, 14, '2020-09-10');

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
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `userclocking`
--
ALTER TABLE `userclocking`
  ADD PRIMARY KEY (`Clocking_ID`),
  ADD KEY `User_ID` (`User_ID`);

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

--
-- AUTO_INCREMENT for table `userclocking`
--
ALTER TABLE `userclocking`
  MODIFY `Clocking_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaverecords`
--
ALTER TABLE `leaverecords`
  ADD CONSTRAINT `leaverecords_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `userclocking`
--
ALTER TABLE `userclocking`
  ADD CONSTRAINT `userclocking_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
