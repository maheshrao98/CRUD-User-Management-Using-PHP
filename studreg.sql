-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 03:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_file`
--

CREATE TABLE `student_file` (
  `id` INT(11) NOT NULL,
  `name` VARCHAR(12) NOT NULL,
  `icnum` INT NOT NULL,
  `telno` VARCHAR(15) NOT NULL,
  `gender` VARCHAR(8) NOT NULL,
  `class` VARCHAR(5) NOT NULL,
  `image` varchar(250) NOT NULL,
  `fname` VARCHAR(100) NOT NULL,
  `ficnum` INT NOT NULL,
  `mname` VARCHAR(100) NOT NULL,
  `micnum` INT NOT NULL,
  `ename` VARCHAR(100) NOT NULL,
  `erel` VARCHAR(45) NOT NULL,
  `etelno` VARCHAR(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_file`
--

INSERT INTO `student_file` (`id`, `name`, `icnum`, `telno`, `gender`, `class`, `image`, `fname`, `ficnum`, `mname`, `micnum`, `ename`, `erel`, `etelno`) VALUES
(1, 'Mahesh', '980918075839', '0184074387', 'Male', '01A', 'macro.png', 'Bejo', '670915079845', 'Denve', '6806068795', 'Bejo', 'Dad', '0176588558');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_file`
--
ALTER TABLE `student_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_file`
--
ALTER TABLE `student_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
