-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 06:12 AM
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
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `sl` int(10) NOT NULL,
  `deptnm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`sl`, `deptnm`) VALUES
(2, 'accounts'),
(4, 'administration'),
(5, 'IT'),
(6, 'Health'),
(7, 'hospitality');

-- --------------------------------------------------------

--
-- Table structure for table `dept_post`
--

CREATE TABLE `dept_post` (
  `sl` int(10) NOT NULL,
  `deptid` int(5) NOT NULL,
  `post` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_post`
--

INSERT INTO `dept_post` (`sl`, `deptid`, `post`, `salary`) VALUES
(1, 2, 'accountant', 30000),
(2, 4, 'CEO', 27000),
(4, 6, 'super', 30000),
(5, 6, 'doctor', 50000),
(6, 6, 'nurse', 40000),
(7, 7, 'manager', 20000),
(8, 7, 'stuff', 10000),
(9, 5, 'engineer', 80000),
(10, 4, 'GM', 56000),
(11, 2, 'cashier', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

CREATE TABLE `edit_log` (
  `sl` int(10) NOT NULL,
  `tblnm` varchar(300) NOT NULL,
  `fldnm` varchar(300) NOT NULL,
  `oldvl` varchar(300) NOT NULL,
  `newvl` varchar(300) NOT NULL,
  `tblsl` int(10) NOT NULL,
  `reftbl` varchar(50) NOT NULL,
  `frffld` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edit_log`
--

INSERT INTO `edit_log` (`sl`, `tblnm`, `fldnm`, `oldvl`, `newvl`, `tblsl`, `reftbl`, `frffld`) VALUES
(1, 'emp_det', 'Salary', '90', '9077', 10, '', ''),
(2, 'emp_det', 'Name', 'fgfj788', 'jjjj', 10, '', ''),
(3, 'emp_det', 'Address', 'hhfkghk', 'oooooo', 10, '', ''),
(4, 'emp_det', 'Mobile', '47474', '4747455', 10, '', ''),
(5, 'emp_det', 'Department Name', '5', '7', 10, 'dept', 'deptnm'),
(6, 'emp_det', 'Post', '9', '8', 10, 'dept_post', 'post'),
(7, 'dept', 'Department Name', 'admin', 'administration', 4, '', ''),
(8, 'dept_post', 'Post', 'Asst. accountant', 'CEO', 2, '', ''),
(9, 'dept_post', 'Post', 'Chief', 'GM', 10, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emp_det`
--

CREATE TABLE `emp_det` (
  `sl` int(5) NOT NULL,
  `deptid` int(2) NOT NULL,
  `postid` int(2) NOT NULL,
  `sal` int(10) NOT NULL,
  `nm` varchar(100) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `cont` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `dept_post`
--
ALTER TABLE `dept_post`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `edit_log`
--
ALTER TABLE `edit_log`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `emp_det`
--
ALTER TABLE `emp_det`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dept_post`
--
ALTER TABLE `dept_post`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `edit_log`
--
ALTER TABLE `edit_log`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `emp_det`
--
ALTER TABLE `emp_det`
  MODIFY `sl` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
