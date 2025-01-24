-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 10:39 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mahasiswa`
--

CREATE TABLE `nilai_mahasiswa` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `diskusi` int(11) DEFAULT NULL,
  `praktikum` int(11) DEFAULT NULL,
  `responsi` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_mahasiswa`
--

INSERT INTO `nilai_mahasiswa` (`id`, `mahasiswa_id`, `diskusi`, `praktikum`, `responsi`, `uts`, `uas`, `nilai`) VALUES
(18, 14, 12, 12, 12, 12, 12, 'A'),
(22, 18, 12, 12, 12, 12, 12, 'a'),
(24, 20, 89, 89, 89, 89, 89, 'A'),
(26, NULL, 12, 12, 12, 12, 12, 'A'),
(27, NULL, 12, 12, 12, 12, 12, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `mahasiswa_id`, `nim`, `kelas`) VALUES
(14, 21, '', ''),
(18, 25, '', ''),
(20, 27, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(20, 'dosen', '$2y$10$Vcv35U0FmNy2reQGDQ6WVu22dSD.rkvMQ7W0jXCMtCCZLUFIMpqFm', 'dosen'),
(21, '23.01.5071', '$2y$10$EjfTmF2yBnzFIa48TEunjuEH5yPxIBRRyWMcsq0lsTeCBPpdaaFqq', 'mahasiswa'),
(25, 'arul', '$2y$10$UfDVumvuElRnl73RTw6KD.gMTx2nJRPZy1QUcjVQKad2Rfvv9lHpu', 'mahasiswa'),
(27, '23.01.XXXX', '$2y$10$WVPsnVcPl.e7IiQSQ5B1eeVcLUy7Q93KJYS5OUvuGXajpZohTfb0e', 'mahasiswa'),
(28, 'admin', '$2y$10$NrXLwDkI/reEBkag.ZVnjOR8ZF.gg5JefEznKbwkVoeyGIh3dhiKy', 'admin'),
(29, 'd', '$2y$10$1uwluN8AyJiTFn6/61qTrud1xGp28LqnRcktXKRBk83C5SVH7dD0W', 'dosen'),
(30, 'test', '$2y$10$hcuTVstx6PW4FAHzCTyububwdY2g7OwSR4nMWaKtHRjctAXq7wzK6', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_mahasiswa`
--
ALTER TABLE `nilai_mahasiswa`
  ADD CONSTRAINT `nilai_mahasiswa_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
