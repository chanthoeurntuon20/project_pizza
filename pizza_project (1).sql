-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 11:22 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `ingredient` varchar(200) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `ingredient`, `price`) VALUES
(17, 'pizza22', 'sugar', '20$'),
(28, 'pizza1', 'sugar', '10$');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `address`, `role`) VALUES
(74, 'tha@gmail.com', '$2y$10$WOVoZlf4Zms1Ov3AU4HIZOHznRJ6opEl4IJqVseRr7r6J1KepEcD6', 'kampongcham', 'manager'),
(75, 'tuon@gmail.com', '$2y$10$e0DG3CQGiJIYJT6UvF6vSOszbnICOanEJA/xU35sfDIx0KiypUkuO', 'takaev', 'normal'),
(76, 'ka@gmail.com', '$2y$10$z6MKA07NlciHvgriyKYkzejdt7kx0JdcKFU5Rp/JGGhm2PgwQ.EV6', 'kampongcham', 'manager'),
(77, 'ya@gmail.com', '$2y$10$7Eoqg9gV7n2hcjZ0C5.kEOdO38rANH/AngWBTPplanb2ak4X0MaPC', 'kampongcham', 'manager'),
(78, 'dara@gmail.com', '$2y$10$3S7OwHpfy/AOtjW4PmAemeUQR1vtKzc8Ok.mfj7uxUGvQzSKnLfq6', 'kampongcham', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
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
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
