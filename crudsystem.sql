-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 12:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `crudtable`
--

CREATE TABLE `crudtable` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crudtable`
--

INSERT INTO `crudtable` (`id`, `name`, `lastName`, `email`, `pass`) VALUES
(1, 'Syifa Naura', 'Milla Celesta', 'syifanauramillacelestaaa@gmail.com', '54321'),
(3, 'Syifa Naura Milla Celesta', 'Milla Celesta', 'syifanauramillacelestaaa@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crudtable`
--
ALTER TABLE `crudtable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crudtable`
--
ALTER TABLE `crudtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
