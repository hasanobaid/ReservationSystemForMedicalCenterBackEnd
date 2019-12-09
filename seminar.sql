-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 04:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `clinicID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `checkin` tinyint(1) NOT NULL,
  `adate` date NOT NULL,
  `slottime` time NOT NULL,
  `appID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`clinicID`, `patientID`, `empID`, `checkin`, `adate`, `slottime`, `appID`) VALUES
(5, 850038746, 1234, 1, '2019-05-22', '08:20:00', 2),
(5, 850038746, 1234, 1, '2019-06-22', '08:20:00', 5),
(5, 401110796, 1234, 0, '2019-06-21', '09:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `childID` int(11) NOT NULL,
  `fatherID` int(11) NOT NULL,
  `motherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`childID`, `fatherID`, `motherID`) VALUES
(410149348, 850038746, 415035724);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `cityname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cityID`, `cityname`) VALUES
(1, 'ramallah'),
(2, 'nablus'),
(3, 'jenin');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinicID` int(11) NOT NULL,
  `clinicname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinicID`, `clinicname`) VALUES
(5, 'bone'),
(6, 'heart'),
(7, 'Dental'),
(8, 'Child');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_doctor`
--

CREATE TABLE `clinic_doctor` (
  `clinicID` int(11) NOT NULL,
  `empID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_doctor`
--

INSERT INTO `clinic_doctor` (`clinicID`, `empID`) VALUES
(5, 1234),
(7, 1236),
(8, 1245);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_insurance_price`
--

CREATE TABLE `clinic_insurance_price` (
  `clinicID` int(11) NOT NULL,
  `insuranceID` int(11) NOT NULL,
  `subinsuranceID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_insurance_price`
--

INSERT INTO `clinic_insurance_price` (`clinicID`, `insuranceID`, `subinsuranceID`, `price`) VALUES
(5, 2, 126, 50),
(5, 123, 124, 100),
(7, 123, 124, 100);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_price`
--

CREATE TABLE `clinic_price` (
  `clinicID` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `secondname` varchar(225) NOT NULL,
  `thirdname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phonenumber` varchar(225) NOT NULL,
  `mobilenumber` varchar(225) NOT NULL,
  `emergencynumber` varchar(225) NOT NULL,
  `cityID` int(11) NOT NULL,
  `qID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `dateofbirth` date NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `firstname`, `secondname`, `thirdname`, `lastname`, `username`, `email`, `phonenumber`, `mobilenumber`, `emergencynumber`, `cityID`, `qID`, `sID`, `jobID`, `gender`, `dateofbirth`, `address`) VALUES
(1234, 'ahmad', 'hadi', 'saad', 'shalabi', 'ahamd', 'ahmad@mail.com', '0293840', '056894857', '0569429898', 1, 2, 1, 1, 'male', '1987-02-01', 'ramallah manara'),
(1236, 'saed', 'ahmad', 'saed', 'matar', 'saed', 'saed@mail.com', '0567345623', '022834728', '0599289456', 1, 1, 1, 1, 'male', '1983-12-28', 'birzait university street'),
(1237, 'tamara', 'ahmad', 'mahmod', 'jabra', 'tamara', 'tamara@mail.com', '022932846', '0569101877', '0599202584', 1, 2, 2, 2, 'female', '1995-01-19', 'betunia al balad'),
(1238, 'khaled', 'tamer', 'khaled', 'jaber', 'khaled', 'khaled@mail.com', '022786758', '0599202654', '0569202456', 2, 4, 3, 3, 'male', '1972-11-11', 'nablus street'),
(1245, 'mohammad', 'abdulaziz', 'hatem', 'terawi', 'mohammad', 'mohammad@mail.com', '02039483', '05938472837', '05694287893', 1, 1, 1, 1, 'male', '1978-09-28', 'birzeit uni street ');

-- --------------------------------------------------------

--
-- Table structure for table `exception_date`
--

CREATE TABLE `exception_date` (
  `clinicID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `note` varchar(225) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exception_date`
--

INSERT INTO `exception_date` (`clinicID`, `empID`, `edate`, `start`, `end`, `note`, `status`) VALUES
(1, 1, '2019-12-31', '12:59:00', '13:57:00', 'no res', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuranceID` int(11) NOT NULL,
  `insurancecompany` varchar(225) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insuranceID`, `insurancecompany`, `update_date`) VALUES
(2, 'watania', '2019-05-16'),
(3, 'tkaful', '2019-05-15'),
(123, 'trust', '2019-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobID` int(11) NOT NULL,
  `jobname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobID`, `jobname`) VALUES
(1, 'doctor'),
(2, 'reception'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `firstname` varchar(225) NOT NULL,
  `secondname` varchar(225) NOT NULL,
  `thirdname` varchar(225) NOT NULL,
  `lastname` varchar(225) NOT NULL,
  `cityID` int(11) NOT NULL,
  `qID` int(11) NOT NULL,
  `insuranceID` int(11) NOT NULL,
  `subinsuranceID` int(11) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(225) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `address` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `balance` double NOT NULL,
  `insurancenum` int(11) NOT NULL,
  `password` varchar(225) NOT NULL,
  `relation` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `firstname`, `secondname`, `thirdname`, `lastname`, `cityID`, `qID`, `insuranceID`, `subinsuranceID`, `dateofbirth`, `email`, `phonenumber`, `mobilenumber`, `address`, `gender`, `balance`, `insurancenum`, `password`, `relation`) VALUES
(401110796, 'hasan', 'khaled', 'hasan', 'obaid', 1, 2, 3, 130, '1997-01-28', 'hasan.obaid@mail.com', '0222222', '0599999999', 'korom al shmalia', 'male', 12000, 1924, 'hasan', 'single'),
(410149348, 'majd', 'ahmad', 'khaled', 'abdullsalam', 2, 3, 123, 124, '2007-05-22', 'majd@mail.com', '0569122343', '022901020', 'al arabi street', 'male', 190, 1837, 'majd', 'child'),
(415035724, 'hadeel', 'amjad', 'abdalmajeed', 'saleem', 1, 2, 3, 131, '1998-07-23', 'hadeel@mail.com', '0569876234', '022986728', 'masioon street', 'female', 1987, 1647, 'hadeel', 'married'),
(850038746, 'hadi', 'saji', 'adel', 'jack', 1, 1, 2, 126, '1992-01-07', 'hadi@mail.com', '0569183490', '022967856', 'birzeit uni street', 'male', 1992, 1766, 'hadi', 'married');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payment`
--

CREATE TABLE `patient_payment` (
  `patientID` int(11) NOT NULL,
  `balance` double NOT NULL,
  `lastpaydate` date NOT NULL,
  `lastpaymentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_payment`
--

INSERT INTO `patient_payment` (`patientID`, `balance`, `lastpaydate`, `lastpaymentdate`) VALUES
(850038746, 350, '2019-06-07', '2019-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `patient_payment_detail`
--

CREATE TABLE `patient_payment_detail` (
  `patientID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `amount` double NOT NULL,
  `senddate` date NOT NULL,
  `paymenttype` varchar(225) NOT NULL,
  `paymentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_payment_detail`
--

INSERT INTO `patient_payment_detail` (`patientID`, `empID`, `amount`, `senddate`, `paymenttype`, `paymentID`) VALUES
(850038746, 1234, 100, '2019-06-06', 'cash', 18),
(850038746, 1234, 50, '2019-06-07', 'cash', 20),
(850038746, 1238, 100, '2019-06-07', 'Cash', 21),
(850038746, 1234, 100, '2019-06-07', 'cash', 22);

-- --------------------------------------------------------

--
-- Table structure for table `quantom`
--

CREATE TABLE `quantom` (
  `qID` int(11) NOT NULL,
  `cityID` int(11) NOT NULL,
  `qname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quantom`
--

INSERT INTO `quantom` (`qID`, `cityID`, `qname`) VALUES
(1, 1, 'birzeit'),
(2, 1, 'betunia'),
(3, 2, 'borein'),
(4, 2, 'rafidia'),
(5, 3, 'jenin camp'),
(6, 3, 'hadad');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scID` int(11) NOT NULL,
  `clinicID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `slot` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `sat` tinyint(1) NOT NULL,
  `sun` tinyint(1) NOT NULL,
  `mon` tinyint(1) NOT NULL,
  `tue` tinyint(1) NOT NULL,
  `wen` tinyint(1) NOT NULL,
  `thu` tinyint(1) NOT NULL,
  `fri` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scID`, `clinicID`, `empID`, `starttime`, `endtime`, `slot`, `startdate`, `enddate`, `sat`, `sun`, `mon`, `tue`, `wen`, `thu`, `fri`) VALUES
(8, 5, 1234, '08:00:00', '14:00:00', 20, '2019-05-16', '2019-05-28', 1, 0, 1, 0, 1, 0, 1),
(9, 8, 1245, '08:00:00', '14:00:00', 10, '2019-05-16', '2019-05-23', 1, 1, 1, 0, 0, 0, 0),
(15, 7, 1236, '08:00:00', '14:00:00', 30, '2019-06-06', '2019-07-06', 1, 0, 1, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `screenid` int(11) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `sID` int(11) NOT NULL,
  `sname` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`sID`, `sname`) VALUES
(1, 'doctor'),
(2, 'reception'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `subinsurance`
--

CREATE TABLE `subinsurance` (
  `subinsuranceID` int(11) NOT NULL,
  `insuranceID` int(11) NOT NULL,
  `membership` varchar(225) NOT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subinsurance`
--

INSERT INTO `subinsurance` (`subinsuranceID`, `insuranceID`, `membership`, `discount`) VALUES
(124, 123, 'Gold', 1),
(125, 123, 'Silver', 0.75),
(126, 2, 'premium', 0.95),
(127, 2, '3\'rd party', 0.25),
(130, 3, 'full', 1),
(131, 3, 'semi', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(225) NOT NULL,
  `empID` int(11) NOT NULL,
  `password` varchar(225) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `jobID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `empID`, `password`, `isActive`, `jobID`) VALUES
('ahamd', 1234, 'ahmad', 0, 1),
('khaled', 1238, 'khaled', 1, 3),
('mohammad', 1245, 'mohammad', 1, 1),
('saed', 1236, 'saed', 1, 1),
('tamara', 1237, 'tamara', 1, 2),
('user', 19827, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userscreen`
--

CREATE TABLE `userscreen` (
  `username` varchar(225) NOT NULL,
  `screenid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacation_date`
--

CREATE TABLE `vacation_date` (
  `clinicID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `vdate` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `note` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacation_date`
--

INSERT INTO `vacation_date` (`clinicID`, `empID`, `vdate`, `start`, `end`, `note`) VALUES
(1, 1, '2020-01-01', '00:00:00', '00:00:00', 'mo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appID`),
  ADD KEY `clinicID` (`clinicID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`childID`),
  ADD KEY `fatherID` (`fatherID`),
  ADD KEY `motherID` (`motherID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicID`);

--
-- Indexes for table `clinic_doctor`
--
ALTER TABLE `clinic_doctor`
  ADD PRIMARY KEY (`clinicID`),
  ADD KEY `empID` (`empID`);

--
-- Indexes for table `clinic_insurance_price`
--
ALTER TABLE `clinic_insurance_price`
  ADD PRIMARY KEY (`clinicID`,`insuranceID`,`subinsuranceID`),
  ADD KEY `insuranceID` (`insuranceID`),
  ADD KEY `subinsuranceID` (`subinsuranceID`);

--
-- Indexes for table `clinic_price`
--
ALTER TABLE `clinic_price`
  ADD PRIMARY KEY (`clinicID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`),
  ADD KEY `cityiD` (`cityID`),
  ADD KEY `qID` (`qID`),
  ADD KEY `sID` (`sID`),
  ADD KEY `jobID` (`jobID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`),
  ADD KEY `cityID` (`cityID`),
  ADD KEY `insuranceID` (`insuranceID`),
  ADD KEY `qID` (`qID`),
  ADD KEY `subinsuranceID` (`subinsuranceID`);

--
-- Indexes for table `patient_payment`
--
ALTER TABLE `patient_payment`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `patient_payment_detail`
--
ALTER TABLE `patient_payment_detail`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `quantom`
--
ALTER TABLE `quantom`
  ADD PRIMARY KEY (`qID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scID`),
  ADD KEY `empID` (`empID`),
  ADD KEY `clinicID` (`clinicID`),
  ADD KEY `scID` (`scID`,`clinicID`,`empID`) USING BTREE;

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`screenid`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `subinsurance`
--
ALTER TABLE `subinsurance`
  ADD PRIMARY KEY (`subinsuranceID`),
  ADD KEY `insuranceID` (`insuranceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `empID` (`empID`),
  ADD KEY `jobID` (`jobID`);

--
-- Indexes for table `userscreen`
--
ALTER TABLE `userscreen`
  ADD PRIMARY KEY (`username`,`screenid`),
  ADD KEY `screenid` (`screenid`);

--
-- Indexes for table `vacation_date`
--
ALTER TABLE `vacation_date`
  ADD KEY `clinicID` (`clinicID`),
  ADD KEY `empID` (`empID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `insuranceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_payment_detail`
--
ALTER TABLE `patient_payment_detail`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `quantom`
--
ALTER TABLE `quantom`
  MODIFY `qID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subinsurance`
--
ALTER TABLE `subinsurance`
  MODIFY `subinsuranceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`childID`) REFERENCES `patient` (`patientID`),
  ADD CONSTRAINT `child_ibfk_2` FOREIGN KEY (`fatherID`) REFERENCES `patient` (`patientID`),
  ADD CONSTRAINT `child_ibfk_3` FOREIGN KEY (`motherID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `clinic_doctor`
--
ALTER TABLE `clinic_doctor`
  ADD CONSTRAINT `clinic_doctor_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`),
  ADD CONSTRAINT `clinic_doctor_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `clinic_insurance_price`
--
ALTER TABLE `clinic_insurance_price`
  ADD CONSTRAINT `clinic_insurance_price_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`),
  ADD CONSTRAINT `clinic_insurance_price_ibfk_2` FOREIGN KEY (`insuranceID`) REFERENCES `insurance` (`insuranceID`),
  ADD CONSTRAINT `clinic_insurance_price_ibfk_3` FOREIGN KEY (`subinsuranceID`) REFERENCES `subinsurance` (`subinsuranceID`);

--
-- Constraints for table `clinic_price`
--
ALTER TABLE `clinic_price`
  ADD CONSTRAINT `clinic_price_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`cityiD`) REFERENCES `cities` (`cityID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`qID`) REFERENCES `quantom` (`qID`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`sID`) REFERENCES `specialist` (`sID`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`insuranceID`) REFERENCES `insurance` (`insuranceID`),
  ADD CONSTRAINT `patient_ibfk_4` FOREIGN KEY (`qID`) REFERENCES `quantom` (`qID`),
  ADD CONSTRAINT `patient_ibfk_5` FOREIGN KEY (`subinsuranceID`) REFERENCES `subinsurance` (`subinsuranceID`);

--
-- Constraints for table `patient_payment`
--
ALTER TABLE `patient_payment`
  ADD CONSTRAINT `patient_payment_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `patient_payment_detail`
--
ALTER TABLE `patient_payment_detail`
  ADD CONSTRAINT `patient_payment_detail_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `patient_payment_detail_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`);

--
-- Constraints for table `quantom`
--
ALTER TABLE `quantom`
  ADD CONSTRAINT `quantom_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `subinsurance`
--
ALTER TABLE `subinsurance`
  ADD CONSTRAINT `subinsurance_ibfk_1` FOREIGN KEY (`insuranceID`) REFERENCES `insurance` (`insuranceID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`jobID`) REFERENCES `job` (`jobID`);

--
-- Constraints for table `userscreen`
--
ALTER TABLE `userscreen`
  ADD CONSTRAINT `userscreen_ibfk_1` FOREIGN KEY (`screenid`) REFERENCES `screen` (`screenid`),
  ADD CONSTRAINT `userscreen_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `vacation_date`
--
ALTER TABLE `vacation_date`
  ADD CONSTRAINT `vacation_date_ibfk_1` FOREIGN KEY (`clinicID`) REFERENCES `clinic` (`clinicID`),
  ADD CONSTRAINT `vacation_date_ibfk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
