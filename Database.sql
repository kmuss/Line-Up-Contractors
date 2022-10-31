e-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2022 at 06:59 PM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmgt407_2022s_05_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ApprovedJobs`
--

CREATE TABLE `ApprovedJobs` (
  `ApprovedJobId` int(5) NOT NULL,
  `Decision` varchar(10) NOT NULL,
  `JobID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ApprovedJobs`
--

INSERT INTO `ApprovedJobs` (`ApprovedJobId`, `Decision`, `JobID`) VALUES
(57, 'Approved', 84),
(58, 'Approved', 85),
(59, 'Approved', 86),
(60, 'Approved', 87);

-- --------------------------------------------------------

--
-- Table structure for table `AssignedJobs`
--

CREATE TABLE `AssignedJobs` (
  `AssignJobId` int(5) NOT NULL,
  `EmployeeID` int(5) NOT NULL,
  `EmployeeName` varchar(100) NOT NULL,
  `JobID` int(5) NOT NULL,
  `ApprovedJobId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AssignedJobs`
--

INSERT INTO `AssignedJobs` (`AssignJobId`, `EmployeeID`, `EmployeeName`, `JobID`, `ApprovedJobId`) VALUES
(10, 0, 'Kemal Mussa', 0, 57),
(11, 0, 'Zain Abideen', 0, 58),
(12, 0, 'Michael Appiah', 0, 59),
(13, 0, 'Joel Guardado', 0, 60);

-- --------------------------------------------------------

--
-- Table structure for table `CustomerLogin`
--

CREATE TABLE `CustomerLogin` (
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CustomerLogin`
--

INSERT INTO `CustomerLogin` (`username`, `email`, `password`) VALUES
('chelsea', 'chelsea@gmail.com', '$2y$10$MfKSPtWnBwSvcie0ZanF3OEi7Rt6U9EjdPe9ehGP/untkR1WaME/2'),
('ishraqc', 'chowdhuryishraq1@gmail.com', '$2y$10$OWCIqlPFizlj5jcRb4aD9ue.rpn2p5rN2HqthWg2yL7lMJ.8qZNCm'),
('cool cool', 'cool.cool@gmail.com', '$2y$10$gYs3qMeInibQm6j2hg9LSuWyQbFUG254lZmZrB47YpybT.JrgMrLW'),
('customer', 'customer@email.com', '$2y$10$2ZRr4VV0B2eLoTjTpk8Dve42httPgvrpNWra4SXOazq7eDV/XAzFe'),
('example', 'ex@gmail.com', '$2y$10$jNxieZH5vbTIUZTIgrI8Run/FCUI3Tjn8TzwhLKWQxi8Qp1vvBXKu'),
('joel', 'joelguardado360@gmail.com', '$2y$10$wxb442MhZElGimmp3mCMPOrRCNWR/AXo9CjsOlPouR4sZNh.vDMfu'),
('John', 'John@gmail.com', '$2y$10$U/jJXK5r54npZ5iwEZMMne0mtTJY4LbHuJGPiATDYkvQxx23O1Ple'),
('semir', 'semir@gmail.com', '$2y$10$3clAycvI.37LtT1MKc/88.U0WLgVTEpTGYbdcDiWsVzDYOG.6/aLS'),
('user123', 'user@gmail.com', '$2y$10$oVQ0UW6K9YHw5XSpwlhuHuPQ5Yt5tQ9GVaUog1QqvW3wWvfVeLh2W');

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeAvailability`
--

CREATE TABLE `EmployeeAvailability` (
  `EmployeeAvailabilityID` int(5) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Date1` date NOT NULL,
  `Week1` varchar(100) NOT NULL,
  `Week2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeAvailability`
--

INSERT INTO `EmployeeAvailability` (`EmployeeAvailabilityID`, `EmployeeID`, `Date1`, `Week1`, `Week2`) VALUES
(0, 11111, '2022-05-01', 'Monday', 'Tuesday'),
(0, 11111, '2022-05-13', 'Tuesday', 'Tuesday'),
(0, 22222, '2022-05-16', 'M,W,F', 'T,Th');

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeInformation`
--

CREATE TABLE `EmployeeInformation` (
  `EmployeeID` int(5) NOT NULL,
  `FIrstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeInformation`
--

INSERT INTO `EmployeeInformation` (`EmployeeID`, `FIrstName`, `LastName`) VALUES
(11111, 'Kemal', 'Mussa'),
(22222, 'Michael', 'Appiah');

-- --------------------------------------------------------

--
-- Table structure for table `EmployeeLogIn`
--

CREATE TABLE `EmployeeLogIn` (
  `username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `EmployeeLogIn`
--

INSERT INTO `EmployeeLogIn` (`username`, `Password`) VALUES
('employee', '$2y$10$akpnHThw4hbGXwZ7Zg8Lne5VMOTIDRMTA2rU3O326JoeAD2IOrswW');

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `ItemID` int(5) NOT NULL,
  `ItemName` varchar(25) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`ItemID`, `ItemName`, `Quantity`, `Description`) VALUES
(1, 'Wrench', 12, 'Lefty Loosey Righty Tight'),
(2, 'Wood', 5, 'Soft'),
(3, 'Bolts', 100, 'For screwing'),
(4, 'big nails', 1500, 'big nails');

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE `Invoice` (
  `CustomerID` int(5) NOT NULL,
  `Price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Invoice`
--

INSERT INTO `Invoice` (`CustomerID`, `Price`) VALUES
(84, 22222),
(85, 5666),
(86, 2500),
(87, 90000000);

-- --------------------------------------------------------

--
-- Table structure for table `JobStatus`
--

CREATE TABLE `JobStatus` (
  `ApprovedJobId` int(5) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `JobStatus`
--

INSERT INTO `JobStatus` (`ApprovedJobId`, `Status`) VALUES
(57, 'In Progress'),
(58, 'In Progress'),
(59, 'Complete'),
(60, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `ManagerLogIn`
--

CREATE TABLE `ManagerLogIn` (
  `username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ManagerLogIn`
--

INSERT INTO `ManagerLogIn` (`username`, `Password`) VALUES
('manager', '$2y$10$akpnHThw4hbGXwZ7Zg8Lne5VMOTIDRMTA2rU3O326JoeAD2IOrswW');

-- --------------------------------------------------------

--
-- Table structure for table `RequestQuote`
--

CREATE TABLE `RequestQuote` (
  `CustomerID` int(5) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` int(10) NOT NULL,
  `Address1` varchar(25) NOT NULL,
  `Address2` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` varchar(2) NOT NULL,
  `ZIP` int(5) NOT NULL,
  `JobDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RequestQuote`
--

INSERT INTO `RequestQuote` (`CustomerID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Address1`, `Address2`, `City`, `State`, `ZIP`, `JobDescription`) VALUES
(84, 'chelsea', 'chelsea', 'chelsea@gmail.com', 2147483647, '12128 ARBIE RD', '', 'SILVER SPRING', 'MD', 20904, '  need a new house please'),
(85, 'John', 'Snow', 'John@gmail.com', 2147483647, '3214 Main Street', '3214 Main Street', 'Silver Spring', 'MD', 20905, '  New Roofing and New housing'),
(86, 'John', 'Doe', 'user@gmail.com', 2147483647, '1234 Main St', '', 'College Park', 'MD', 20905, '  fix kitchen'),
(87, 'semir', 'Mussa', 'semir@gmail.com', 2147483647, '12128 ARBIE RD', '', 'SILVER SPRING', 'MD', 20904, '  new kitchen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ApprovedJobs`
--
ALTER TABLE `ApprovedJobs`
  ADD PRIMARY KEY (`ApprovedJobId`),
  ADD KEY `JobID` (`JobID`),
  ADD KEY `CustomerID` (`JobID`);

--
-- Indexes for table `AssignedJobs`
--
ALTER TABLE `AssignedJobs`
  ADD PRIMARY KEY (`AssignJobId`),
  ADD KEY `JobID` (`JobID`),
  ADD KEY `JobID_2` (`JobID`),
  ADD KEY `ApprovedJobId` (`ApprovedJobId`),
  ADD KEY `fk_EmployeeeID` (`EmployeeID`);

--
-- Indexes for table `CustomerLogin`
--
ALTER TABLE `CustomerLogin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `EmployeeAvailability`
--
ALTER TABLE `EmployeeAvailability`
  ADD KEY `fk_EmployeeID` (`EmployeeID`);

--
-- Indexes for table `EmployeeInformation`
--
ALTER TABLE `EmployeeInformation`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `EmployeeLogIn`
--
ALTER TABLE `EmployeeLogIn`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `JobStatus`
--
ALTER TABLE `JobStatus`
  ADD PRIMARY KEY (`ApprovedJobId`),
  ADD KEY `ApprovedJobId` (`ApprovedJobId`);

--
-- Indexes for table `ManagerLogIn`
--
ALTER TABLE `ManagerLogIn`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `RequestQuote`
--
ALTER TABLE `RequestQuote`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `fk_Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ApprovedJobs`
--
ALTER TABLE `ApprovedJobs`
  MODIFY `ApprovedJobId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `AssignedJobs`
--
ALTER TABLE `AssignedJobs`
  MODIFY `AssignJobId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `ItemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `RequestQuote`
--
ALTER TABLE `RequestQuote`
  MODIFY `CustomerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ApprovedJobs`
--
ALTER TABLE `ApprovedJobs`
  ADD CONSTRAINT `fk_CustomerID` FOREIGN KEY (`JobID`) REFERENCES `RequestQuote` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `AssignedJobs`
--
ALTER TABLE `AssignedJobs`
  ADD CONSTRAINT `fk_ApprovedJobId` FOREIGN KEY (`ApprovedJobId`) REFERENCES `ApprovedJobs` (`ApprovedJobId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `EmployeeAvailability`
--
ALTER TABLE `EmployeeAvailability`
  ADD CONSTRAINT `fk_EmployeeID` FOREIGN KEY (`EmployeeID`) REFERENCES `EmployeeInformation` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD CONSTRAINT `fk_CustomerrID` FOREIGN KEY (`CustomerID`) REFERENCES `RequestQuote` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `JobStatus`
--
ALTER TABLE `JobStatus`
  ADD CONSTRAINT `JobStatus_ibfk_1` FOREIGN KEY (`ApprovedJobId`) REFERENCES `ApprovedJobs` (`ApprovedJobId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `RequestQuote`
--
ALTER TABLE `RequestQuote`
  ADD CONSTRAINT `fk_Email` FOREIGN KEY (`Email`) REFERENCES `CustomerLogin` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
