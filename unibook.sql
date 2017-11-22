-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 10:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unibook`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_questions`
--

CREATE TABLE `all_questions` (
  `ques_no` int(5) NOT NULL,
  `QUESTION` varchar(1000) NOT NULL,
  `ques_img` varchar(1000) DEFAULT NULL,
  `A` varchar(1000) NOT NULL,
  `img_a` varchar(1000) DEFAULT NULL,
  `B` varchar(1000) NOT NULL,
  `img_b` varchar(1000) DEFAULT NULL,
  `C` varchar(1000) NOT NULL,
  `img_c` varchar(1000) DEFAULT NULL,
  `D` varchar(1000) NOT NULL,
  `img_d` varchar(1000) DEFAULT NULL,
  `CORRECT_ANSWER` varchar(1) NOT NULL,
  `sn` int(100) DEFAULT '0',
  `title` varchar(40) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_questions`
--

INSERT INTO `all_questions` (`ques_no`, `QUESTION`, `ques_img`, `A`, `img_a`, `B`, `img_b`, `C`, `img_c`, `D`, `img_d`, `CORRECT_ANSWER`, `sn`, `title`, `unique_id`, `TIME`) VALUES
(4, 'Java is a ........... language. ', 'mock/questions/1489073578147834495314766259243.jpg', 'weakly typed\r\n', 'mock/options/1489073578147834538214766259243.jpg', 'strongly typed', 'mock/options/1489073578147834538214766259243.jpg', 'moderate typed', 'mock/options/1489073578147834538214766259243.jpg', 'None of these', 'mock/options/1489073578147834538214766259243.jpg', 'B', 1, 'java', 'amitdjuayj', '2017-02-25 06:32:17'),
(5, 'How many primitive data types are there in Java? ', '', '6', '', '7', '', '8', '', '9', '', 'C', 2, 'java', 'amityrekzc', '2017-02-25 06:35:01'),
(6, 'In Java byte, short, int and long all of these are ', '', 'signed', '', 'unsigned', '', 'Both of the above', '', 'None of these', '', 'A', 3, 'java', 'amithejrwg', '2017-02-25 06:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_set`
--

CREATE TABLE `assigned_set` (
  `sno` int(11) NOT NULL,
  `email` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(8) NOT NULL,
  `assigned_set` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_set`
--

INSERT INTO `assigned_set` (`sno`, `email`, `date`, `time`, `assigned_set`) VALUES
(3, 'arajanrai@gmail.com,anupam@gmail.com', '2017-05-21', '10:00:00', 'set_1');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `sno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`sno`, `name`, `email`, `mobile`, `password`) VALUES
(3, 'Vibha', 'vibha@gmail.com', 9450061290, '11111');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(5) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `FEEDBACK` text NOT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `USER_ID`, `NAME`, `FEEDBACK`, `TIMESTAMP`) VALUES
(1, 53, 'Amit Rai', 'Nice Work', '2017-03-09 12:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `sno` int(11) NOT NULL,
  `H_ID` int(5) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `COLLEGE_NAME` text NOT NULL,
  `TEST_TAKEN` varchar(50) NOT NULL,
  `LAST_LOGIN_TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`sno`, `H_ID`, `USER_ID`, `NAME`, `EMAIL`, `COLLEGE_NAME`, `TEST_TAKEN`, `LAST_LOGIN_TIME`) VALUES
(9, 0, 53, 'Amit Rai', 'arajanrai@gmail.com', '', '', '2017-04-09 18:58:55'),
(10, 0, 1, 'Amit rai', 'arajanrai@gmail.com', '', '', '2017-04-09 20:06:04'),
(9, 0, 53, 'Amit Rai', 'arajanrai@gmail.com', '', '', '2017-04-09 18:58:55'),
(10, 0, 1, 'Amit rai', 'arajanrai@gmail.com', '', '', '2017-04-09 20:06:04'),
(0, 0, 54, 'Anupam Srivastava', 'anupam@gmail.com', '', '', '2017-04-09 20:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `USER_ID` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `UNIQUE_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_attributes`
--

CREATE TABLE `question_attributes` (
  `s` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_attributes`
--

INSERT INTO `question_attributes` (`s`, `name`, `description`, `faculty`, `time_stamp`) VALUES
(2, 'Java', 'Simple Java Test', 'Amit Rai', '2017-02-24 22:32:53'),
(3, 'anupam', 'hell yea', 'Amit', '2017-03-09 10:02:11'),
(4, 'AA', 'AA', 'AA', '2017-04-08 03:50:47'),
(5, 'QQ', 'QQ', 'QQ', '2017-04-08 03:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE `question_set` (
  `sno` int(11) NOT NULL,
  `subject_title` varchar(30) NOT NULL,
  `set_name` varchar(10) NOT NULL,
  `right_ans_marks` int(10) NOT NULL,
  `wrong_ans_marks` int(10) NOT NULL,
  `time` int(11) NOT NULL,
  `unique_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_set`
--

INSERT INTO `question_set` (`sno`, `subject_title`, `set_name`, `right_ans_marks`, `wrong_ans_marks`, `time`, `unique_id`) VALUES
(2, 'GATE', 'set_1', 2, 1, 5, 'amitdjuayj,amityrekzc,amithejrwg'),
(3, 'GATE', 'set_2', 0, 0, 5, 'amityrekzc,amithejrwg'),
(5, 'GATE', 'set_4', 0, 0, 5, 'amitqmeieo'),
(6, 'HTM', 'set_5', 0, 0, 5, 'amitdjuayj,amityrekzc,amithejrwg'),
(7, ' cv', 'set_2', 0, 0, 9, 'amitdjuayj,amityrekzc');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sno` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `un_answer` int(11) NOT NULL,
  `choosen_option` varchar(1) NOT NULL,
  `unique_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sno`, `email`, `right_answer`, `wrong_answer`, `un_answer`, `choosen_option`, `unique_id`) VALUES
(7, 'arajanrai@gmail.com', 0, 1, 0, 'A', 'amitdjuayj'),
(8, 'arajanrai@gmail.com', 0, 1, 0, 'A', 'amityrekzc'),
(9, 'arajanrai@gmail.com', 2, 0, 0, 'A', 'amithejrwg'),
(10, 'anupam@gmail.com', 2, 0, 0, 'B', 'amitdjuayj'),
(11, 'anupam@gmail.com', 0, 1, 0, 'A', 'amityrekzc'),
(12, 'anupam@gmail.com', 0, 1, 0, 'B', 'amithejrwg');

-- --------------------------------------------------------

--
-- Table structure for table `uadmin`
--

CREATE TABLE `uadmin` (
  `ID` int(5) NOT NULL,
  `NAME` varchar(22) NOT NULL,
  `EMAIL` varchar(22) NOT NULL,
  `PASSWORD` varchar(22) NOT NULL,
  `MOBILE` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uadmin`
--

INSERT INTO `uadmin` (`ID`, `NAME`, `EMAIL`, `PASSWORD`, `MOBILE`) VALUES
(1, 'Amit rai', 'arajanrai@gmail.com', '11111', 95493409384);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(5) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `MOBILE` bigint(11) NOT NULL,
  `COLLEGE_NAME` varchar(254) NOT NULL,
  `DEGREE` varchar(100) NOT NULL,
  `BRANCH` varchar(50) NOT NULL,
  `CITY` varchar(50) NOT NULL,
  `GENDER` varchar(1) NOT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `NAME`, `EMAIL`, `PASSWORD`, `MOBILE`, `COLLEGE_NAME`, `DEGREE`, `BRANCH`, `CITY`, `GENDER`, `CREATED_ON`) VALUES
(53, 'Amit Rai', 'arajanrai@gmail.com', '11111', 8765839968, 'UCEM', 'BTECH', 'CSE', 'Allahabad', 'M', '2017-02-21 18:10:03'),
(54, 'Anupam Srivastava', 'anupam@gmail.com', '11111', 9450080846, 'UCEM', 'BTECH', 'CSE', 'ALLAHABAD', 'M', '2017-03-09 11:12:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_questions`
--
ALTER TABLE `all_questions`
  ADD PRIMARY KEY (`ques_no`);

--
-- Indexes for table `assigned_set`
--
ALTER TABLE `assigned_set`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `question_attributes`
--
ALTER TABLE `question_attributes`
  ADD PRIMARY KEY (`s`);

--
-- Indexes for table `question_set`
--
ALTER TABLE `question_set`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `uadmin`
--
ALTER TABLE `uadmin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_questions`
--
ALTER TABLE `all_questions`
  MODIFY `ques_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assigned_set`
--
ALTER TABLE `assigned_set`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question_attributes`
--
ALTER TABLE `question_attributes`
  MODIFY `s` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question_set`
--
ALTER TABLE `question_set`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `uadmin`
--
ALTER TABLE `uadmin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
