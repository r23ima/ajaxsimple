-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 31, 2020 at 08:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecq_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(50) DEFAULT NULL,
  `emp_number` varchar(15) DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `emp_datecreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_name`, `emp_number`, `emp_email`, `emp_address`, `emp_datecreated`) VALUES
(7, 'Willis Black', '4253453', 'Kilometer@gmail.com', 'ermita', '2020-06-10'),
(8, 'Willis Black', '4253453', 'Kilometer@gmail.com', 'poto', '2020-06-10'),
(19, 'Willis white', '4253453', 'Kilometer@gmail.com', 'nothing', '2020-07-04'),
(20, 'Jose Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(21, 'Helen Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(22, 'George Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(23, 'Katleen Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(24, 'Romeo Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(25, 'Sita Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(26, 'Romel Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(27, 'Ronie Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(28, 'Bonje Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(29, 'Amdz Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(30, 'Banna Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(31, 'Dpah Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(32, 'Lily Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(33, 'Corazon Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(34, 'Wim Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(35, 'Pop Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10'),
(36, 'Celine Gerbanzo', '123', 'jg@email.com', NULL, '2020-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
