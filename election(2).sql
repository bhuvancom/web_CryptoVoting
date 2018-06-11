-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 10:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `election`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`) VALUES
('48a4fda5c389a2938c59bf964e5ebab4', '827ccb0eea8a706c4c34a16891f84e7b'),
('50287361195eaa028f9826607948eb87', 'd256c7a5a1044bf6058d22cea2589413');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `aadhar` bigint(15) NOT NULL,
  `fhname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` int(12) NOT NULL,
  `dob` date NOT NULL,
  `votecount` int(10) NOT NULL,
  `canimg` varchar(200) NOT NULL,
  `canhe` varchar(200) NOT NULL,
  `canpv` varchar(200) NOT NULL,
  `elecname` varchar(30) NOT NULL,
  `about` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `name`, `aadhar`, `fhname`, `mname`, `gender`, `email`, `mob`, `dob`, `votecount`, `canimg`, `canhe`, `canpv`, `elecname`, `about`) VALUES
(1, 'Shivam Gupta', 123456789012, 'dot dot gupta', 'dot dot gupta', 'male', 'shivam@gmail.com', 2147483647, '1994-09-27', 1, 'IMG-20171123-WA0001.JPG', 'IMG_4754.JPG', 'IMG_4377.JPG', 'Precident', 'i am Shivam.'),
(2, 'Bhuvaneshvar nath srivastava', 264327596423, 'Satish Chandra Srivastava', 'Alka Devi Srivastava', 'male', 'bhu@gmail.com', 2147483647, '1994-08-07', 2, '20141019_153645.jpg', '20141029_161546.jpg', '20140923_102423.jpg', 'Precident', 'I am AKASH.'),
(6, 'Shashank Mishra', 121212121213, 'Ramji Mishra', 'Suman Mishra', 'male', 'redcat1593@gmail.com', 2147483647, '1993-12-15', 2, 'candidateimg.jpg', 'education.jpg', 'policevery.jpg', 'Precident', 'I am shanky.'),
(7, 'Rishabh Singh', 987654321236, 'Dhirendra Singh', 'Shadhana Singh', 'male', 'rishabha007@gmail.com', 2147483647, '1996-05-06', 1, 'candidateimg.jpg', 'education.jpg', 'policevery.jpeg', 'Precident', 'I am Rishabha.');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `SN` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`SN`, `name`) VALUES
(1, 'Precident');

-- --------------------------------------------------------

--
-- Table structure for table `google`
--

CREATE TABLE `google` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `Precident` varchar(200) NOT NULL,
  `srvyid4` varchar(10) DEFAULT NULL,
  `srvyid1` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google`
--

INSERT INTO `google` (`id`, `name`, `email`, `gender`, `Precident`, `srvyid4`, `srvyid1`) VALUES
(2, 'Bhuvaneshvar', 'bhuvaneshvar8@gmail.com', 'male', '1', 'MAC', 'FACEBOOK'),
(4, 'Sher', 'sheroo7toyou@gmail.com', '', '7', 'LINUX', 'INSTAGRAM'),
(5, 'Shashank', 'redcat1593@gmail.com', 'male', '6', 'LINUX', 'TWITTER');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(20) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `vote1` int(200) NOT NULL,
  `vote2` int(200) NOT NULL,
  `vote3` int(200) NOT NULL,
  `vote4` int(200) NOT NULL,
  `sum` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `vote1` int(200) NOT NULL,
  `vote2` int(200) NOT NULL,
  `vote3` int(200) NOT NULL,
  `vote4` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `vote1`, `vote2`, `vote3`, `vote4`) VALUES
(1, 'What do you like the most ?', 'FACEBOOK', 'INSTAGRAM', 'TWITTER', 'GOOGLE+', 1, 3, 2, 0),
(4, 'Which platform do you like the most ?', 'MAC', 'LINUX', 'WINDOWS', 'ANDROID', 2, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `SN` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `aadhar` bigint(15) NOT NULL,
  `fatherhusbname` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `srvyid4` varchar(10) DEFAULT NULL,
  `srvyid1` varchar(10) DEFAULT NULL,
  `Precident` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`SN`, `name`, `dob`, `password`, `gender`, `aadhar`, `fatherhusbname`, `mothername`, `mobile`, `email`, `srvyid4`, `srvyid1`, `Precident`) VALUES
(2, 'Bhuvaneshvar nath srivastava', '1994-08-07', '827ccb0eea8a706c4c34a16891f84e7b', 'male', 264327596423, 'Satish Chandra Srivastava', 'Alka Devi Srivastava', '9151534306', 'bhu@gmail.com', 'LINUX', 'INSTAGRAM', '6'),
(3, 'Shashank Mishra', '1993-12-15', 'b550adc18e758bd0a0a8cef58a277ade', 'male', 121212121212, 'Ramji Mishra', 'Suman Mishra', '7007070180', 'redcat1593@gmail.com', 'MAC', 'TWITTER', ''),
(4, 'parul pandey', '1996-08-08', '718f574f67fd63696d383a16a01bcd30', 'male', 123456789012, 'pradeep pandey', 'anju pandey', '8765465728', 'parulpandey4@gmail.com', 'LINUX', 'INSTAGRAM', '2'),
(5, 'Rishabh Singh', '1996-05-06', '827ccb0eea8a706c4c34a16891f84e7b', 'male', 499796498979, 'Dhirendra Singh', 'Shadhana Singh', '9504497956', 'rishabha007@gmail.com', NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aadhar` (`aadhar`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`SN`,`name`);

--
-- Indexes for table `google`
--
ALTER TABLE `google`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`email`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`SN`),
  ADD UNIQUE KEY `addhar` (`aadhar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `google`
--
ALTER TABLE `google`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `SN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
