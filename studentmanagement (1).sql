-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 05:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admissionid` int(5) NOT NULL,
  `admissiondate` date NOT NULL,
  `grno` int(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `courseid` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `division` varchar(5) NOT NULL,
  `department` varchar(10) NOT NULL,
  `deletestatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`admissionid`, `admissiondate`, `grno`, `firstname`, `middlename`, `lastname`, `courseid`, `sem`, `division`, `department`, `deletestatus`) VALUES
(1, '2023-04-14', 1, 'kushwaha', 'jignesh', 'A', 1, 1, 'A', 'Science', 'no'),
(2, '2023-04-14', 2, 'Gupta', 'Nitin', 'S', 1, 1, 'B', 'Science', 'no'),
(3, '2023-04-14', 3, 'Gupta', 'Bunny', 'S', 1, 1, 'A', 'Science', 'no'),
(4, '2023-04-14', 7, 'kumavat', 'jaychan', 'B', 1, 1, 'B', 'Science', 'no'),
(5, '2023-04-14', 8, 'Patel', 'Sunny', 'A', 1, 1, 'A', 'Science', 'no'),
(6, '2023-04-14', 9, 'Makwana', 'Urja', 'P', 1, 1, 'B', 'Science', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentid` int(5) NOT NULL,
  `courseid` int(5) NOT NULL,
  `assignmentdate` date NOT NULL,
  `sem` int(2) NOT NULL,
  `subid` int(5) NOT NULL,
  `submitdate` date NOT NULL,
  `image` varchar(50) NOT NULL,
  `assignmentby` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentid`, `courseid`, `assignmentdate`, `sem`, `subid`, `submitdate`, `image`, `assignmentby`) VALUES
(1, 1, '2023-04-14', 1, 1, '2023-04-29', 'student attendance.pdf', 4),
(2, 1, '2023-04-26', 1, 1, '2023-04-26', 'sem4_marksheet.pdf', 4),
(3, 1, '2023-04-26', 1, 1, '1970-01-01', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attid` int(5) NOT NULL,
  `attdate` date NOT NULL,
  `atttime` varchar(12) NOT NULL,
  `grno` int(5) NOT NULL,
  `teachid` int(5) NOT NULL,
  `subid` int(5) NOT NULL,
  `courseid` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `division` varchar(5) NOT NULL,
  `attstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attid`, `attdate`, `atttime`, `grno`, `teachid`, `subid`, `courseid`, `sem`, `division`, `attstatus`) VALUES
(1, '2023-04-14', '11:32:49pm', 1, 4, 1, 1, 1, 'A', 'Present'),
(2, '2023-04-14', '11:32:49pm', 3, 4, 1, 1, 1, 'A', 'Absent'),
(3, '2023-04-14', '11:32:49pm', 8, 4, 1, 1, 1, 'A', 'Present'),
(4, '2023-04-14', '11:33:49pm', 2, 4, 1, 1, 1, 'B', 'Present'),
(5, '2023-04-14', '11:33:49pm', 7, 4, 1, 1, 1, 'B', 'Present'),
(6, '2023-04-14', '11:33:49pm', 9, 4, 1, 1, 1, 'B', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(5) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `stateid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `cityname`, `shortname`, `pincode`, `stateid`) VALUES
(1, 'navsari', 'nvs', '396445', 1),
(2, 'valsad', 'vld', '396449', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(5) NOT NULL,
  `contactdate` date NOT NULL,
  `personname` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `reply` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactid`, `contactdate`, `personname`, `contactno`, `emailid`, `detail`, `reply`) VALUES
(1, '2023-03-28', 'om jadhav', '9510051489', 'om@gmail.com', 'hi', 'yes'),
(2, '2023-03-28', 'komal', '9510025478', 'komal@gmail.com', 'Hello.', 'yes'),
(3, '2023-04-14', 'om birla ', '9512545102', 'birla@gmail.com', 'Admission related inquery.', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseid` int(5) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `fees` int(7) NOT NULL,
  `medium` varchar(10) NOT NULL,
  `totalsem` int(2) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `deletestatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `coursename`, `shortname`, `duration`, `fees`, `medium`, `totalsem`, `image`, `deletestatus`) VALUES
(1, 'bachelor of computer application', 'bca', '3', 30000, 'English', 6, 'bcalogo.jpg', 'no'),
(2, 'bachelor of business administration', 'bba', '3', 30000, 'english', 6, 'bbalogo.png', 'no'),
(3, 'bachelor of commerce', 'bcom', '3', 15000, 'gujarati', 6, 'bcomlogo.jpg', 'no'),
(5, 'bachelor of science', 'b.sc', '3', 25000, 'English', 6, 'bsclogo.jpg', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `emailid` int(5) NOT NULL,
  `emaildate` date NOT NULL,
  `emailto` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `regid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`emailid`, `emaildate`, `emailto`, `subject`, `description`, `regid`) VALUES
(1, '2023-03-31', 'jigneshkushwaha63@gmail.com', 'behaviour', 'Not Regular In college', 1),
(2, '2023-03-31', 'jigneshkushwaha63@gmail.com', 'behaviour', 'good', 1),
(3, '2023-03-31', 'jyoti@gmail.com', 'metting', '6 pm tomorrow meeting. ', 6),
(4, '2023-04-22', 'rockybalboa8866@gmail.com', 'good', 'sucessfully.....', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leaveapp`
--

CREATE TABLE `leaveapp` (
  `leaveid` int(5) NOT NULL,
  `leavedt` date NOT NULL,
  `grno` int(5) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `startdt` date NOT NULL,
  `enddt` date NOT NULL,
  `status` varchar(8) DEFAULT NULL,
  `teachid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`leaveid`, `leavedt`, `grno`, `reason`, `startdt`, `enddt`, `status`, `teachid`) VALUES
(1, '2023-04-14', 1, 'need leave for cmat exam preparation', '2023-04-17', '2023-04-29', 'pending', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notesid` int(5) NOT NULL,
  `courseid` int(5) NOT NULL,
  `subid` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `image` varchar(50) NOT NULL,
  `notesby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notesid`, `courseid`, `subid`, `sem`, `image`, `notesby`) VALUES
(1, 1, 1, 1, 'Car_Rental_Proj Doc.pdf', '5'),
(2, 1, 1, 1, 'project documentation pdf.pdf', '5'),
(3, 1, 1, 1, 'Seminar Report_merged (1).pdf', '5'),
(4, 1, 1, 1, 'sem4_marksheet.pdf', '4');

-- --------------------------------------------------------

--
-- Table structure for table `progressreport`
--

CREATE TABLE `progressreport` (
  `reportid` int(5) NOT NULL,
  `reportdate` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL,
  `teachid` int(5) NOT NULL,
  `grno` int(5) NOT NULL,
  `courseid` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `division` varchar(3) NOT NULL,
  `totpresent` int(5) NOT NULL,
  `assignment` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progressreport`
--

INSERT INTO `progressreport` (`reportid`, `reportdate`, `month`, `year`, `teachid`, `grno`, `courseid`, `sem`, `division`, `totpresent`, `assignment`) VALUES
(1, '2023-04-14', 'April', '2023', 4, 1, 1, 1, 'A', 1, 'yes'),
(2, '2023-04-14', 'April', '2023', 4, 3, 1, 1, 'A', 0, 'yes'),
(3, '2023-04-14', 'April', '2023', 4, 3, 1, 1, 'A', 0, 'yes'),
(4, '2023-04-14', 'April', '2023', 4, 2, 1, 1, 'B', 1, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `queryid` int(5) NOT NULL,
  `querydate` date NOT NULL,
  `problem` varchar(80) NOT NULL,
  `solution` varchar(80) DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  `grno` int(5) NOT NULL,
  `teachid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`queryid`, `querydate`, `problem`, `solution`, `status`, `grno`, `teachid`) VALUES
(1, '2023-04-14', 'topic related query', NULL, 'pending', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `regid` int(5) NOT NULL,
  `regdate` date NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`regid`, `regdate`, `firstname`, `middlename`, `lastname`, `username`, `password`, `usertype`, `email`, `contactno`, `status`) VALUES
(1, '2023-04-14', 'kushwaha', 'jignesh', 'A', 'jignesh', '123', 'student', 'jigneshkushwaha63@gmail.com', '9510051483', 'y'),
(2, '2023-04-14', 'Gupta', 'Nitin', 'S', 'Nitin', '123', 'student', 'rockybalboa8866@gmail.com', '7600753193', 'y'),
(3, '2023-04-14', 'Gupta', 'Bunny', 'S', 'Bunny', '123', 'student', 'ng08184@gmail.com', '8128961492', 'y'),
(4, '2023-04-14', 'Desai', 'Hardik', 'V', 'Hardik', '123', 'faculty', 'hardikdesai123@gmail.com', '8128961463', 'y'),
(5, '2023-04-14', 'Patel', 'Ashish', 'B', 'ashish', '123', 'faculty', 'ashishbpatel@gmail.com', '8866539631', 'y'),
(6, '2023-04-14', 'Rana ', 'Jyoti', 'R', 'jyoti', '123', 'faculty', 'jyotirrana@gmail.com', '8000392123', 'y'),
(7, '2023-04-14', 'kumavat', 'jaychan', 'B', 'jaychan', '123', 'student', 'jaychan@gmail.com', '8000396124', 'y'),
(8, '2023-04-14', 'Patel', 'Sunny', 'A', 'Sunny', '123', 'student', 'sunnypatel@gmail.com', '7600752123', 'y'),
(9, '2023-04-14', 'Makwana', 'Urja', 'P', 'Urja', '123', 'student', 'urjamakwana@gmail.com', '8000391256', 'y'),
(10, '2023-04-14', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com', '9512230124', ''),
(11, '2023-04-18', 'Patel', 'Komal', 'P', 'komal', '123', 'student', 'komal@gmail.com', '8795462131', 'n'),
(12, '2023-04-18', 'Chaudhray', 'Raghu', 'V', 'Raghu', '123', 'faculty', 'raghu@gmail.com', '7895462130', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(5) NOT NULL,
  `statename` varchar(30) NOT NULL,
  `shortname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `statename`, `shortname`) VALUES
(1, 'gujarat', 'guj'),
(2, 'maharashtra', 'mah'),
(3, 'bihar', 'bh');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `grno` int(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `bloodgroup` varchar(6) NOT NULL,
  `image` varchar(50) NOT NULL,
  `deletestatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`grno`, `firstname`, `middlename`, `lastname`, `address`, `cityname`, `dob`, `gender`, `bloodgroup`, `image`, `deletestatus`) VALUES
(1, 'kushwaha', 'jignesh', 'A', 'gujarat housing', 'Navsari', '2003-05-23', '', 'A+ve', 'jignesh-photo.jpeg', 'no'),
(2, 'Gupta', 'Nitin', 'S', '', '', NULL, '', '', '', 'no'),
(3, 'Gupta', 'Bunny', 'S', '', '', NULL, '', '', '', 'no'),
(7, 'kumavat', 'jaychan', 'B', '', '', NULL, '', '', '', 'no'),
(8, 'Patel', 'Sunny', 'A', '', '', NULL, '', '', '', 'no'),
(9, 'Makwana', 'Urja', 'P', '', '', NULL, '', '', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subid` int(5) NOT NULL,
  `subname` varchar(50) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `courseid` int(5) NOT NULL,
  `sem` int(2) NOT NULL,
  `subtype` varchar(15) NOT NULL,
  `deletestatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subid`, `subname`, `shortname`, `courseid`, `sem`, `subtype`, `deletestatus`) VALUES
(1, 'Introduction to computer', 'IC', 1, 1, 'theory', 'no'),
(2, 'C Programming', 'CPPM', 1, 1, 'practical', 'no'),
(3, 'Data Manipulation and Analysis', 'DBMS', 1, 1, 'practical', 'no'),
(4, 'Communication Skill', 'CS', 1, 1, 'theory', 'no'),
(5, 'Mathematics', 'Maths', 1, 1, 'theory', 'no'),
(6, 'Programming Skills', 'PS', 1, 2, 'practical', 'no'),
(7, 'Web Designing 1', 'WD', 1, 3, 'practical', 'no'),
(8, 'Internet of Things', 'IOT', 1, 4, 'theory', 'no'),
(9, 'UNIX and Shell Programming', 'unix', 1, 5, 'practical', 'no'),
(10, 'Computer Graphics', 'CG', 1, 6, 'theory', 'no'),
(11, 'ECommerce and Cyber Security', 'ECCS', 1, 6, 'theory', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachid` int(5) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  `joindate` date NOT NULL,
  `department` varchar(10) NOT NULL,
  `courseid` int(5) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `deletestatus` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachid`, `firstname`, `middlename`, `lastname`, `address`, `cityname`, `joindate`, `department`, `courseid`, `desig`, `qualification`, `image`, `deletestatus`) VALUES
(4, 'Desai', 'Hardik', 'V', 'vanganga society', 'Navsari', '2023-01-13', 'Science', 1, 'Assistant Proffessor', 'PhD,MCA,BCA', 'hardiksir.png', 'no'),
(5, 'Patel', 'Ashish', 'B', '', '', '2023-04-01', 'Science', 1, 'HOD', '', NULL, 'no'),
(6, 'Rana ', 'Jyoti', 'R', '', '', '2023-02-10', 'Science', 1, 'Assistant Proffessor', '', NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `teachleave`
--

CREATE TABLE `teachleave` (
  `leaveid` int(5) NOT NULL,
  `leavedt` date NOT NULL,
  `teachid` int(5) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `startdt` date NOT NULL,
  `enddt` date NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachleave`
--

INSERT INTO `teachleave` (`leaveid`, `leavedt`, `teachid`, `reason`, `startdt`, `enddt`, `status`) VALUES
(1, '2023-04-14', 4, 'leave for going picnic with family', '2023-04-17', '2023-04-29', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admissionid`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`leaveid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notesid`);

--
-- Indexes for table `progressreport`
--
ALTER TABLE `progressreport`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`queryid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`regid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`grno`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teachid`);

--
-- Indexes for table `teachleave`
--
ALTER TABLE `teachleave`
  ADD PRIMARY KEY (`leaveid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admissionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `emailid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `leaveid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notesid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `progressreport`
--
ALTER TABLE `progressreport`
  MODIFY `reportid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `queryid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachleave`
--
ALTER TABLE `teachleave`
  MODIFY `leaveid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
