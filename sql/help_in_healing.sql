-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 11:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_in_healing`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorId`, `name`, `phone`, `address`, `city`, `department`) VALUES
(3, 'Mohamed Ahmed Islam', '01205478965', 'Cairo, Shobra', 'Cairo', 'Gynecology & Obstetric'),
(4, 'Omar Mohamed Amr', '01004653925', 'Cairo, Shobra Al-kima', 'Cairo', 'Neurology'),
(7, 'Ali Ahmed Hussein', '01100935685', 'Dakahlia, Almansora', 'Dakahlia', 'Ophthalmology'),
(10, 'Abdullah Mossed Hassan ', '01100935652', 'Alexandria, sidi-pesh', 'Alexandria', 'Dentistry'),
(11, 'Abdullah Hassan Mossed ', '01193560058', 'Luxor, Esna', 'Luxor', 'Pediatrics'),
(12, 'Ahmed  Ali Hussein', '01205938614', 'Assiut, Abou-Tig', 'Assiut', 'Orthopedics'),
(13, 'Omar Ali Said ', '01034935326', 'Alexandria, Naga-said', 'Qena', 'Neurology'),
(14, 'Mohamed Omar Amr ', '01120538553', 'Qena, Alshoaon', 'Qena', 'Ophthalmology'),
(15, 'Tamer Omar Ali', '01210536650', 'Dakahlia, Talka', 'Dakahlia', 'Pediatrics');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `Departments` varchar(255) NOT NULL,
  `Cities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`Departments`, `Cities`) VALUES
('Dentistry', 'Cairo'),
('Gynecology & Obstetric', 'Qena'),
('Neurology', 'Luxor'),
('Ophthalmology', 'Alexandria'),
('Orthopedics', 'Assiut'),
('Pediatrics', 'Dakahlia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Type` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `first_name`, `last_name`, `email`, `password`, `Type`) VALUES
(1, 'Abdullah', 'Nasr', 'abdullah888nasr@gmail.com', '$2y$10$Ag7BE9EXlyvN5eLqR0qG8OpztSU1a5KvPNWcgqWAEZ7hMy22waXXC', '0'),
(2, 'Abdullah', 'Nasr', 'abdullahnasr@gmail.com', '$2y$10$h1h9iZwOGRf4RkebhY.A1emQRJYASWrIL1b.KilC4viAayD6dPu.e', '1'),
(3, 'Ahmed', 'Tamer', 'ahmed22tamer@gmail.com', '$2y$10$S16xDsU1gKXCjl.5geBhZuVnO11oTJ7rDipqp0CW.fldNweXWCYtG', '1'),
(4, 'Waled', 'Wahed', 'waled333@gmail.com', '$2y$10$DWX4kSieGTokfEjM3VaeOOz3nMaNGqUgRGMCkOQ7DXzpeGoudboaK', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorId`),
  ADD UNIQUE KEY `numberUnique` (`phone`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD UNIQUE KEY `city` (`Departments`,`Cities`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `emailUnique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
