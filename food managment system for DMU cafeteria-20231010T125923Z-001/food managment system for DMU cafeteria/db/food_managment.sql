-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 12:00 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `no` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`no`, `username`, `password`, `status`) VALUES
(8, 'admin', '1234', '1'),
(9, 'headcafe0023', '1234', '1'),
(10, 'union001', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(12, 'registrar', '1234', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ailingstudents`
--

CREATE TABLE `ailingstudents` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `cyear` varchar(100) NOT NULL,
  `acyear` varchar(100) NOT NULL,
  `sicklevel` varchar(100) NOT NULL,
  `diagonisis` varchar(100) NOT NULL,
  `recommendation` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ailingstudents`
--

INSERT INTO `ailingstudents` (`id`, `fname`, `lname`, `age`, `sex`, `department`, `cyear`, `acyear`, `sicklevel`, `diagonisis`, `recommendation`, `user_id`) VALUES
(1, 'habtamu', 'kebede', '24', 'm', 'narm', '4th', '2014', 'MEDIUM', 'ulcer', 'hihihi', '');

-- --------------------------------------------------------

--
-- Table structure for table `assignmenu`
--

CREATE TABLE `assignmenu` (
  `id` int(11) NOT NULL,
  `day` varchar(100) NOT NULL,
  `breakfast` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmenu`
--

INSERT INTO `assignmenu` (`id`, `day`, `breakfast`, `lunch`, `dinner`) VALUES
(2, 'monday', 'rice with bread', 'misr and injera', 'enjera with kik'),
(9, 'tuesday', 'rice with bread', 'misr and injera', 'enjera with kik');

-- --------------------------------------------------------

--
-- Table structure for table `cafeusers`
--

CREATE TABLE `cafeusers` (
  `dormno` varchar(100) NOT NULL,
  `blockno` varchar(100) NOT NULL,
  `meal` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafeusers`
--

INSERT INTO `cafeusers` (`dormno`, `blockno`, `meal`, `path`, `id`) VALUES
('09', '618', '1', 'images/facebook.jpg', '1201'),
('34', '02', '2', 'images/youtube.png', '1204'),
('09', '613', '2344', 'images/home1.jpg', '1201'),
('65', '10', '3', 'images/h.jpg', '1201'),
('63', '10', '4', 'images/WIN_20191208_23_21_20_Pro.jpg', '1202'),
('63', '10', '6344', 'images/WIN_20200728_06_49_37_Pro.jpg', '1204');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `meal` bigint(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `t` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`meal`, `name`, `id`, `sex`, `dept`, `year`, `status`, `t`) VALUES
(1, 'Abebe Mekonen', 'ter/0811/10', '   m', 'electerical', '4th', 'active', 'take'),
(2, 'Abinet mekunint', 'ter/0812/10', '   m', 'electerical', '4th', 'active', 'take'),
(3, 'Alemneh  daniel', 'ter/0833/10', '   m', 'electerical', '4th', 'active', 'take'),
(4, 'Asrat wogene', 'ter/0911/10', '   m', 'electerical', '4th', 'active', 'take'),
(5, 'Berihun  solomon', 'ter/1100/10', '   m', 'electerical', '4th', 'active', 'take'),
(6, 'Bereket sisay', 'ter/1101/10', '   m', 'electerical', '4th', 'active', 'take'),
(7, 'cherinet demsis', 'ter/1102/10', '   m', 'electerical', '4th', 'active', 'take'),
(8, 'chalachew daniel', 'ter/1103/10', '   m', 'electerical', '4th', 'active', 'take'),
(9, 'Hagernesh worku', 'ter/1104/10', '    F', 'electerical', '4th', 'active', ''),
(10, 'Hayal daniel', 'ter/1105/10', '    F', 'electerical', '4th', 'active', ''),
(11, 'Hagere abayneh', 'ter/1106/10', '    F', 'electerical', '4th', 'active', ''),
(12, 'hasen mohhamed', 'ter/1107/10', '    m', 'electerical', '4th', 'active', ''),
(13, 'Geremew desalegn', 'ter/1108/10', '   m', 'electerical', '4th', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `Age` int(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `sname`, `position`, `Age`, `sex`, `phone`, `photo`, `role`, `date`) VALUES
('abebe', 'samuel', 'kefle', 'master', 34, 'male', '09876543', 'home1.jpg', 'vicepresident', '2022-05-16'),
('admin', 'abebe', 'daniel', 'degree', 37, 'male', '09776655', '', 'admin', '0000-00-00'),
('ayelestud', 'ayele', 'samuel', 'degree', 27, 'male', '0930113344', 'telegramjpg.jpg', 'studentunion', '2022-05-16'),
('emp1977', 'habtamu', 'tilahun', 'master', 18, 'male', '0988776622', 'h.jpg', 'procter', '2022-05-16'),
('foodstore14', 'solomon', 'abebe', 'master', 37, 'male', '0977553323', 'logo.jpg', 'foodstore', '2022-05-16'),
('goldenhab', 'habtamu', 'seifu', 'master', 27, 'male', '0901786655', 'h.jpg', 'studentdirectorate', '2016-05-22'),
('habtamu', 'habtamu', 'kebede', 'degree', 24, 'male', '0989015067', '', 'headcafe', '2015-05-22'),
('headcafe0023', 'selam', 'asnake', 'master', 34, 'female', '0976112355', 'h.jpg', 'headcafe', '2022-05-17'),
('headcafeee4', 'asrat', 'alemu', 'master', 33, 'female', '0988776655', 'h.jpg', 'headcafe', '2022-05-17'),
('headcafeg', 'habtamu', 'kebede', 'master', 27, 'male', '0988773311', 'h.jpg', 'headcafe', '2022-05-16'),
('headcafesamuel', 'samuel', 'abate', 'master', 53, 'male', '09677890', 'youtube.png', 'headcafe', '2022-05-16'),
('post009', 'birtukan', 'kebede', 'student', 24, 'female', '09334455', 'h.jpg', 'chef', '2016-05-22'),
('postoffice', 'nebiyou', 'habtamu', 'master', 36, 'male', '0922335577', '', 'finance', '2015-05-22'),
('proctor', 'abebech', 'mekonnen', 'degree', 37, 'female', '0977112200', 'telegramjpg.jpg', 'procter', '2022-05-16'),
('registrar', 'adamu', 'solomon', 'degree', 33, 'male', '0934555688', 'h.jpg', 'registrar', '2022-05-17'),
('ssjsj', 'e3hrbjhr', '43hrb3jh', 'master', 22, 'male', '09876543', 'h.jpg', 'admin', '2022-05-16'),
('stor01', 'abebe', 'samuel', 'degree', 44, 'male', '0940675544', '', 'foodstore', '2015-05-22'),
('union22', 'semere', 'seifu', 'student', 27, 'male', '0956993344', 'WIN_20191208_23_15_50_Pro.jpg', 'studentunion', '2016-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `userview`
--

CREATE TABLE `userview` (
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `no` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`no`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `ailingstudents`
--
ALTER TABLE `ailingstudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignmenu`
--
ALTER TABLE `assignmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafeusers`
--
ALTER TABLE `cafeusers`
  ADD PRIMARY KEY (`meal`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`meal`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userview`
--
ALTER TABLE `userview`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ailingstudents`
--
ALTER TABLE `ailingstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignmenu`
--
ALTER TABLE `assignmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `meal` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userview`
--
ALTER TABLE `userview`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
