-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 10:42 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `roll` varchar(250) NOT NULL,
  `stream` varchar(250) NOT NULL,
  `sem` varchar(250) NOT NULL,
  `section` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL DEFAULT current_timestamp(),
  `time` varchar(250) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `sem` varchar(50) NOT NULL,
  `streams_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `sem`, `streams_id`) VALUES
(1, 'Firth Semester', 1),
(2, 'Second Semester', 1),
(3, 'Third Semester', 1),
(4, 'Fourth Semester', 1),
(5, 'Fifth Semester', 1),
(6, 'Sixth Semester', 1),
(7, 'Firth Semester', 2),
(8, 'Second Semester', 2),
(9, 'Third Semester', 2),
(10, 'Fourth Semester', 2),
(11, 'Fifth Semester', 2),
(12, 'Sixth Semester', 2),
(13, 'Firth Semester', 3),
(14, 'Second Semester', 3),
(15, 'Third Semester', 3),
(16, 'Fourth Semester', 3),
(17, 'Firth Semester', 4),
(18, 'Second Semester', 4),
(19, 'Third Semester', 4),
(20, 'Fourth Semester', 4);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `stream` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream`) VALUES
(1, 'BCA'),
(2, 'BBA'),
(3, 'MCA'),
(4, 'MSC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `roll` varchar(250) NOT NULL,
  `stream` varchar(250) NOT NULL,
  `sem` varchar(250) NOT NULL,
  `section` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
