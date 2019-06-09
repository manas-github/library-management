-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2017 at 10:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `author` (
  `ISBN` char(14) NOT NULL,
  `Author` varchar(50) NOT NULL,
  PRIMARY KEY (`ISBN`,`Author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ISBN`, `Author`) VALUES
('0123704901', 'David A. Patterson'),
('0123704901', 'John L. Hennessy'),
('0123944244', 'David Harris'),
('0123944244', 'Sarah Harris'),
('0124077269', 'David A. Patterson'),
('0124077269', 'John L. Hennessy'),
('0205973361', 'J. Noland White'),
('0205973361', 'Saundra K. Ciccarelli'),
('0321696867', 'Hugh D. Young'),
('0321696867', 'Roger A. Freedman'),
('0321740904', 'Randall D. Knight'),
('0321884078', 'George B. Thomas Jr'),
('0321884078', 'Joel R. Hass'),
('0321884078', 'Maurice D. Weir'),
('0470879521', 'John D. Cutnell'),
('0470879521', 'Kenneth W. Johnson'),
('0596802358', 'Philipp K. Janert'),
('099040207X', 'Mr. Martin Holzke'),
('099040207X', 'Mr. Tom Stachowitz'),
('1285057090', 'Bruce H. Edwards'),
('1285057090', 'Ron Larson'),
('1429237198', 'Daniel L. Schacter'),
('1429237198', 'Daniel T. Gilbert'),
('1429261781', 'David G. Myers'),
('1449600069', 'Julia Lobur'),
('1449600069', 'Linda Null'),
('1452257876', 'A. Michael Huberman'),
('1452257876', 'Matthew B. Miles'),
('1590597699', 'Clare Churcher');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Cost` decimal(5,2) NOT NULL,
  `IsReserved` tinyint(1) NOT NULL,
  `Edition` int(11) NOT NULL,
  `PubliPlace` varchar(30) DEFAULT NULL,
  `Publisher` varchar(30) NOT NULL,
  `CopyYr` decimal(4,0) NOT NULL,
  `ShelfID` int(11) DEFAULT NULL,
  `SubName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `ShelfID` (`ShelfID`),
  KEY `SubName` (`SubName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Cost`, `IsReserved`, `Edition`, `PubliPlace`, `Publisher`, `CopyYr`, `ShelfID`, `SubName`) VALUES
('0123704901', 'Computer architecture', '24.95', 0, 4, ' ', 'Morgan Kaufmann', '2006', 321, 'Computer Architecture'),
('0123944244', 'Digital Design', '52.57', 0, 2, 'US', 'Morgan Kaufmann', '2012', 311, 'Computer Architecture'),
('0124077269', 'Computer Organization', '75.74', 0, 5, 'US', 'Morgan Kaufmann', '2013', 312, 'Computer Architecture'),
('0205973361', 'Psychology', '158.53', 0, 4, '', 'Pearson', '2014', 232, 'Psychology'),
('0321696867', 'Modern Physics', '225.76', 0, 13, 'UK', 'Addison-Wesley', '2011', 211, 'Physics'),
('0321740904', 'Physics for Engineers: A Strategic Approach with Modern Physics', '228.16', 1, 3, 'US', 'Addison-Wesley', '2012', 212, 'Physics'),
('0321884078', 'S L loney'' Calculus: Early Transcendentals', '198.89', 0, 13, '', 'Pearson', '2013', 111, 'Calculus'),
('0470879521', 'Physics', '209.38', 0, 9, '', 'John Wiley and Sons', '2012', 212, 'Physics'),
('0596802358', 'Data Analysis', '26.69', 0, 1, 'US', 'O''Reilly Media', '2010', 131, 'Data Science'),
('099040207X', 'SQL Database for Beginners', '22.49', 0, 1, '', 'LearnToProgram, Incorporated ', '2014', 121, 'Data Science'),
('1285057090', 'Calculus', '245.84', 1, 10, 'US', 'Cengage Learning', '2013', 112, 'Calculus'),
('1429237198', 'Psychology ', '159.48', 1, 2, '', 'Worth Publishers', '2010', 231, 'Psychology'),
('1429261781', 'Psychology', '152.54', 0, 10, '', 'Worth Publishers', '2011', 222, 'Psychology'),
('1449600069', 'Computer Organization and Architecture', '215.95', 0, 3, '', 'Jones & Bartlett Learning', '2010', 322, 'Computer Architecture'),
('1452257876', 'Qualitative Data Analysis', '72.42', 0, 3, 'US', 'SAGE Publications, Inc', '2013', 132, 'Data Science'),
('1590597699', 'Beginning Database Design', '25.82', 0, 1, 'US', 'Apress', '2007', 122, 'Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `bookcopy`
--

CREATE TABLE IF NOT EXISTS `bookcopy` (
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IsChecked` tinyint(1) NOT NULL DEFAULT '0',
  `IsHold` tinyint(1) NOT NULL DEFAULT '0',
  `IsDamaged` tinyint(1) NOT NULL DEFAULT '0',
  `FuRequester` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ISBN`,`CopyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcopy`
--

INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES
('0123704901', 1, 1, 0, 0, 'subramaniyam'),
('0123704901', 2, 0, 0, 1, NULL),
('0123704901', 3, 0, 1, 0, 'hiten'),
('0123944244', 1, 1, 0, 0, NULL),
('0123944244', 2, 0, 1, 0, NULL),
('0124077269', 1, 1, 0, 0, NULL),
('0124077269', 2, 0, 1, 0, NULL),
('0124077269', 3, 0, 1, 0, NULL),
('0124077269', 4, 0, 0, 1, NULL),
('0124077269', 5, 0, 0, 0, NULL),
('0124077269', 6, 0, 0, 0, NULL),
('0124077269', 7, 0, 0, 1, NULL),
('0205973361', 1, 1, 0, 0, NULL),
('0205973361', 2, 0, 1, 0, NULL),
('0205973361', 3, 0, 0, 0, NULL),
('0321696867', 1, 0, 0, 0, NULL),
('0321696867', 2, 0, 0, 0, NULL),
('0321696867', 3, 0, 0, 0, NULL),
('0321696867', 4, 0, 0, 0, NULL),
('0321740904', 1, 0, 0, 1, NULL),
('0321740904', 2, 0, 0, 0, NULL),
('0321740904', 3, 0, 0, 0, NULL),
('0321740904', 4, 0, 0, 0, NULL),
('0321740904', 5, 0, 0, 1, NULL),
('0321740904', 6, 0, 0, 0, NULL),
('0321740904', 7, 0, 0, 0, NULL),
('0321884078', 1, 1, 0, 0, 'himanshu'),
('0470879521', 1, 0, 0, 1, NULL),
('0470879521', 2, 0, 1, 0, NULL),
('0470879521', 3, 0, 0, 0, NULL),
('0470879521', 4, 0, 0, 0, NULL),
('0470879521', 5, 0, 0, 0, NULL),
('0470879521', 6, 0, 0, 0, NULL),
('0470879521', 7, 0, 0, 0, NULL),
('0596802358', 1, 0, 1, 0, NULL),
('0596802358', 2, 0, 0, 0, NULL),
('099040207X', 1, 1, 0, 0, 'anubhav'),
('099040207X', 2, 0, 1, 0, 'puneesh'),
('099040207X', 3, 0, 0, 1, NULL),
('1285057090', 1, 0, 0, 0, NULL),
('1429237198', 1, 0, 0, 1, NULL),
('1429237198', 2, 0, 0, 0, NULL),
('1429237198', 3, 0, 0, 0, NULL),
('1429261781', 1, 1, 0, 0, NULL),
('1429261781', 2, 0, 0, 0, NULL),
('1449600069', 1, 0, 1, 0, NULL),
('1449600069', 2, 0, 0, 0, NULL),
('1449600069', 3, 0, 0, 1, NULL),
('1452257876', 1, 1, 0, 0, NULL),
('1452257876', 2, 0, 0, 1, NULL),
('1452257876', 3, 0, 0, 0, NULL),
('1452257876', 4, 0, 0, 0, NULL),
('1590597699', 1, 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `FloorID` int(11) NOT NULL,
  `NumAssistant` int(11) NOT NULL,
  `NumCopier` int(11) NOT NULL,
  PRIMARY KEY (`FloorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`FloorID`, `NumAssistant`, `NumCopier`) VALUES
(1, 2, 2),
(2, 3, 3),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
  `Username` varchar(15) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IssueID` int(4) NOT NULL,
  `ExtenDate` date DEFAULT NULL,
  `IssueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `NumExten` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`,`ISBN`,`CopyID`),
  UNIQUE KEY `IssueID` (`IssueID`),
  KEY `ISBN` (`ISBN`),
  KEY `issue_ibfk_2` (`ISBN`,`CopyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`Username`, `ISBN`, `CopyID`, `IssueID`, `ExtenDate`, `IssueDate`, `ReturnDate`, `NumExten`) VALUES
('aditya', '0124077269', 1, 115, '2015-04-13', '2015-03-31', '2015-04-27', 1),
('ankit', '0123704901', 1, 45, '2015-01-03', '2015-01-03', '2015-01-17', 0),
('ankit', '0123704901', 3, 150, NULL, '2015-04-19', '2015-05-03', 0),
('ankit', '0124077269', 7, 82, '2015-02-05', '2015-02-05', '2015-02-19', 0),
('anubhav', '0124077269', 2, 143, NULL, '2015-04-18', '2015-05-02', 0),
('anubhav', '0321696867', 1, 64, '2015-01-12', '2015-01-12', '2015-01-26', 0),
('aditi', '0124077269', 3, 169, NULL, '2015-04-20', '2015-05-04', 0),
('aditi', '0321884078', 1, 119, '2015-04-07', '2015-04-07', '2015-04-21', 0),
('harshit', '1452257876', 1, 116, '2015-04-15', '2015-04-11', '2015-04-29', 1),
('himanshu', '0124077269', 1, 74, '2015-02-10', '2015-02-10', '2015-02-24', 0),
('himanshu', '0321696867', 1, 89, '2015-02-10', '2015-02-10', '2015-02-24', 0),
('himanshu', '099040207X', 2, 148, NULL, '2015-04-16', '2015-04-30', 0),
('ashutosh', '0123704901', 1, 85, '2015-03-03', '2015-03-03', '2015-03-17', 0),
('ashutosh', '0596802358', 1, 177, NULL, '2015-04-20', '2015-05-04', 0),
('deepak', '0124077269', 2, 73, '2015-01-05', '2015-01-05', '2015-01-19', 0),
('akash', '0205973361', 2, 166, NULL, '2015-04-21', '2015-05-05', 0),
('akash', '0470879521', 2, 120, NULL, '2015-04-17', '2015-05-01', 0),
('akash', '099040207X', 3, 52, '2015-01-11', '2015-01-11', '2015-01-25', 0),
('hiten', '0123704901', 3, 47, '2015-01-05', '2015-01-05', '2015-01-19', 0),
('hiten', '1449600069', 1, 157, NULL, '2015-04-20', '2015-05-04', 0),
('hiten', '1590597699', 1, 72, '2015-02-03', '2015-02-03', '2015-02-17', 0),
('vikas', '0123944244', 1, 61, '2015-01-25', '2015-01-25', '2015-02-09', 0),
('vikas', '0321696867', 2, 54, '2015-01-19', '2015-01-16', '2015-02-03', 1),
('vikas', '099040207X', 1, 117, '2015-04-15', '2015-04-15', '2015-04-29', 0),
('vikas', '1429261781', 1, 111, '2015-04-19', '2015-04-14', '2015-05-03', 1),
('vikas', '1429261781', 2, 88, '2015-03-15', '2015-03-15', '2015-03-29', 0),
('priyank', '0123944244', 1, 79, '2015-02-11', '2015-02-04', '2015-02-25', 1),
('priyank', '099040207X', 2, 53, '2015-01-12', '2015-01-12', '2015-01-26', 0),
('priyank', '1429261781', 1, 75, '2015-03-05', '2015-02-05', '2015-02-26', 2),
('love', '0123704901', 2, 44, '2015-01-01', '2015-01-01', '2015-01-05', 0),
('love', '1590597699', 1, 114, '2015-04-21', '2015-04-14', '2015-05-05', 1),
('puneesh', '0123704901', 2, 65, '2015-01-01', '2015-01-01', '2015-01-15', 0),
('puneesh', '0123944244', 2, 94, '2015-03-30', '2015-03-21', '2015-04-14', 1),
('divya', '0124077269', 6, 81, '2015-02-12', '2015-02-12', '2015-02-26', 0),
('divya', '0205973361', 1, 112, '2015-04-13', '2015-04-01', '2015-04-27', 1),
('akansha', '0123944244', 2, 184, NULL, '2015-04-21', '2015-05-05', 0),
('akansha', '099040207X', 2, 83, '2015-02-11', '2015-02-11', '2015-02-25', 0),
('sonu', '0205973361', 2, 90, '2015-03-10', '2015-03-10', '2013-03-24', 0),
('sonu', '0470879521', 4, 78, '2015-02-03', '2015-02-03', '2015-02-17', 0),
('subramaniyam', '0123944244', 1, 118, '2015-04-12', '2015-04-12', '2015-04-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `SName` varchar(30) NOT NULL,
  `Keyword` varchar(25) NOT NULL,
  PRIMARY KEY (`SName`,`Keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`SName`, `Keyword`) VALUES
('Calculus', 'Convergent'),
('Calculus', 'Derivative'),
('Calculus', 'Differential Equation'),
('Calculus', 'Integral'),
('Computer Architecture', 'Assembly'),
('Computer Architecture', 'Cache'),
('Computer Architecture', 'Instruction Set'),
('Computer Architecture', 'Memory'),
('Data Science', 'Cloud Computing'),
('Data Science', 'Computer Vision'),
('Data Science', 'Database'),
('Data Science', 'Statistics'),
('Physics', 'Electron'),
('Physics', 'Photoelectric Effect'),
('Physics', 'Quantum Physics'),
('Physics', 'Relativity'),
('Psychology', 'Cognitive'),
('Psychology', 'Neuropsychology');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE IF NOT EXISTS `shelf` (
  `ShelfID` int(11) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `AisleID` int(11) NOT NULL,
  PRIMARY KEY (`ShelfID`),
  KEY `FloorID` (`FloorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`ShelfID`, `FloorID`, `AisleID`) VALUES
(111, 1, 11),
(112, 1, 11),
(121, 1, 12),
(122, 1, 12),
(131, 1, 13),
(132, 1, 13),
(211, 2, 21),
(212, 2, 21),
(221, 2, 22),
(222, 2, 22),
(231, 2, 23),
(232, 2, 23),
(311, 3, 31),
(312, 3, 31),
(321, 3, 32),
(322, 3, 32),
(331, 3, 33),
(332, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Username` varchar(15) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Username`) VALUES
('amoore'),
('mross');

-- --------------------------------------------------------

--
-- Table structure for table `student_faculty`
--

CREATE TABLE IF NOT EXISTS `student_faculty` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `IsDebarred` tinyint(1) NOT NULL DEFAULT '0',
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `IsFaculty` tinyint(1) NOT NULL,
  `Penalty` decimal(5,2) NOT NULL DEFAULT '0.00',
  `Dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_faculty`
--

INSERT INTO `student_faculty` (`Username`, `Name`, `DOB`, `Email`, `IsDebarred`, `Gender`, `Address`, `IsFaculty`, `Penalty`, `Dept`) VALUES
('aditya', 'Aditya Ashok', '1975-04-19', 'aditya@bmsce.ac.in', 0, 'M', '801 Atlanta', 1, '0.00', 'Mechanical'),
('ankit', 'Ankit sinha', '1987-06-12', 'ankit@bmsce.ac.in', 0, 'M', '209 Oak Street', 0, '5.00', NULL),
('amoore', 'Alice Moore', NULL, 'amoore@bmsce.ac.in', 0, 'F', '435 Williams St', 0, '0.00', NULL),
('anubhav', 'Anubhav chaudhary', '1995-07-09', 'anubhav@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('aditi', 'Aditi kaundilya', '1970-11-12', 'aditi@bmsce.ac.in', 0, 'F', '777 Atlanta', 1, '0.00', 'industrial'),
('harshit', 'Harshit sharma', '1975-03-21', 'harshit@bmsce.ac.in', 0, 'M', '801 Atlantic', 1, '0.00', 'Mechanical'),
('himanshu', 'Himanshu ranjan', NULL, 'himanshu@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('ashutosh', 'ashutosh tiwari', '1987-09-03', 'ashutosh@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('gmat', 'Gene Mat', '1989-03-25', 'gmat@bmsce.ac.in', 1, 'M', '250 Union Street', 0, '110.00', NULL),
('deepak', 'deepak kumar', '1989-03-04', 'deepak@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('akash', 'akash dadlani', '1965-09-08', 'akash@bmsce.ac.in', 0, 'M', '755 Ferst Drive', 1, '12.00', 'civil engineering'),
('hiten', 'Hiten tejwani', NULL, 'hiten@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('vikas', 'vikas gupta', '1984-02-28', 'vikas@bmsce.ac.in', 0, 'M', '15 Water Street', 0, '40.00', NULL),
('kwalls', 'Kathy Walls', '1986-06-12', 'kwalls@bmsce.ac.in', 1, 'M', '48 Bank Street', 0, '140.00', NULL),
('priyank', 'Proiank sharma', '1985-08-15', 'priyank@bmsce.ac.in', 0, 'F', '950 Marietta St', 0, '30.00', NULL),
('love', 'Love gupta', '1988-12-10', 'love@bmsce.ac.in', 0, 'M', NULL, 0, '5.10', NULL),
('mross', 'Michael Ross', '1991-10-01', 'mross@bmsce.ac.in', 0, 'M', '282 Sycamore Drive', 0, '31.20', NULL),
('puneesh', 'puneesh sharma', '1992-02-09', 'puneesh@bmsce.ac.in', 0, 'M', NULL, 0, '0.00', NULL),
('divya', 'Divya khosla', '1969-05-30', 'divya@bmsce.ac.in', 0, 'F', '777 Atlantic Drive', 1, '35.50', 'industrial'),
('akansha', 'Akansha bhinder', '1992-07-05', 'akansha@bmsce.ac.in', 0, 'M', '470 16th St', 0, '0.00', NULL),
('sonu', 'Sonu azaan', '1989-08-01', 'sonu@bmsce.ac.in', 0, 'M', '942 Union Street', 0, '0.00', NULL),
('subramaniyam', 'Subra swamy', '1993-07-01', 'subramaniyam@bmsce.ac.in', 0, 'F', '935 Marietta St', 0, '0.00', NULL),
('zhui', 'Hui Zan', '1995-05-03', 'zhui@bmsce.ac.in', 1, 'M', '350 Ferst Drive', 0, '120.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SubName` varchar(30) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `NumJournal` int(11) NOT NULL,
  PRIMARY KEY (`SubName`),
  KEY `FloorID` (`FloorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubName`, `FloorID`, `NumJournal`) VALUES
('Calculus', 1, 23),
('Computer Architecture', 3, 20),
('Data Science', 1, 32),
('Physics', 2, 14),
('Psychology', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('aditya', 'aditya123'),
('ankit', 'ankit123'),
('amoore', 'amoore123'),
('anubhav', 'anubhav123'),
('aditi', 'aditi123'),
('harshit', 'harshit123'),
('himanshu', 'himanshu123'),
('ashutosh', 'ashutosh123'),
('gmat', 'gmat123'),
('deepak', 'deepak123'),
('akash', 'akash123'),
('hiten', 'hiten123'),
('vikas', 'vikas123'),
('kwalls', 'kwalls123'),
('priyank', 'priyank123'),
('love', 'love123'),
('mross', 'mross123'),
('puneesh', 'puneesh123'),
('divya', 'divya123'),
('akansha', 'akansha123'),
('sonu', 'sonu123'),
('subramaniyam', 'subramaniyam123'),
('zhui', 'zhui123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`ShelfID`) REFERENCES `shelf` (`ShelfID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`SubName`) REFERENCES `subject` (`SubName`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD CONSTRAINT `bookcopy_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `student_faculty` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`ISBN`, `CopyID`) REFERENCES `bookcopy` (`ISBN`, `CopyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`SName`) REFERENCES `subject` (`SubName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`FloorID`) REFERENCES `floor` (`FloorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_faculty`
--
ALTER TABLE `student_faculty`
  ADD CONSTRAINT `student_faculty_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`FloorID`) REFERENCES `floor` (`FloorID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
