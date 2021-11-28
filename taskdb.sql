-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 01:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  `Mon` varchar(50) NOT NULL,
  `warehouse` varchar(50) NOT NULL,
  `Number of item` int(100) NOT NULL,
  `actual` int(100) NOT NULL,
  `diffrent` int(100) NOT NULL,
  `rate` int(100) NOT NULL,
  `%` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `year`, `Mon`, `warehouse`, `Number of item`, `actual`, `diffrent`, `rate`, `%`) VALUES
(1, '2019', 'december', 'Production requirements', 8, 8, 2, 0, 0),
(2, '2010', 'october', 'Production requirements', 6, 88, 5, 0, 50),
(3, '2005', 'october', 'phone', 70, 5, 23, 60, 70),
(4, '2010', 'october', 'Production requirements', 6, 88, 23, 60, 50),
(5, '2010', 'february', 'phone', 6, 8, 23, 60, 50),
(6, '2010', 'october', 'Production requirements', 70, 88, 18, 60, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
