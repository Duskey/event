-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2020 at 01:46 PM
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
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `mobile` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(9, 'rohit', 'rohit', '1234', '123245552'),
(10, 'root', 'root', 'event', 'event'),
(11, 'root', 'root', 'abcd', '7568754554');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `sno` int(11) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(15) NOT NULL,
  `no` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test1`
--

INSERT INTO `test1` (`sno`, `uid`, `name`, `mobile`, `email`, `type`, `no`, `date`, `file`) VALUES
(99, 'V1590947163', 'Vicky Kumar', '8795468975', 'vicky618@gmail.com', 'Self', 1, '2020-05-31 17:46:03', '15909471389.png'),
(100, 'D1590947222', 'Deepak Balmocha', '7892135644', 'deepak@gmail.com', 'Self', 1, '2020-05-31 17:47:02', '15909472042.png'),
(102, 'A1590947384', 'Achyuat Kumar', '8657426856', 'ahy34@gmail.com', 'Self', 1, '2020-05-31 17:49:44', '159094735310.png'),
(103, 'A1590947424', 'Animesh Kumar', '9752362542', 'animshe5@gmail.com', 'Self', 1, '2020-05-31 17:50:24', '15909474198.png'),
(104, 'V1591117439', 'Vivek Nayak', '4568539484', 'bibke@gamil.com', 'Group', 63, '2020-06-02 17:03:59', '159111740810.png'),
(105, 'S1591117518', 'Sonu kumar', '7985526548', 'sonu@gmail.com', 'Others', 50, '2020-06-02 17:05:18', '15911175149.png'),
(106, 'A1591119566', 'Alisha Sinha', '7874984859', 'alisha@gmail.com', 'Corporate', 82, '2020-06-02 17:39:26', '159111950710.png'),
(107, 'D1591121819', 'Dj sahoo', '8589489665', 'djbot@gmail.com', 'Others', 90, '2020-06-02 18:16:59', '159112127510.png'),
(109, 'A1591192966', 'Ankita Nayak', '7696309064', 'ankita@gmail.com', 'Self', 1, '2020-06-03 14:02:46', '159119294810.png'),
(110, 'A1591216035', 'Aquib Qumar', '8975219834', 'aqilb@gmail.com', 'Self', 1, '2020-06-03 20:27:15', '159121601110.png'),
(111, 'Z1591216251', 'Zahid Ansari', '9682756838', 'zahid@gmail.com', 'Self', 1, '2020-06-03 20:30:51', '159121622010.png'),
(112, 'S1591216550', 'Sandeep Kumar', '8798895421', 'sandeep@gmail.com', 'Self', 1, '2020-06-03 20:35:50', '159121634210.png'),
(129, 'R1591352920', 'Raj ', '9845748954', 'jghfdshy@fah.com', 'Group', 44, '2020-06-05 10:28:40', '159135290810.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
