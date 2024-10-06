-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 03:04 PM
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
-- Database: `user_profiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) DEFAULT NULL,
  `birthday` text DEFAULT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `favorite_color` varchar(30) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `birthday`, `address`, `city`, `favorite_color`, `bio`) VALUES
(1, 'Erysa Marie Buenconsejo', 21, NULL, 'Muntinlupa', 'Muntinlupa', 'pink', ''),
(2, 'Hazel Bucasas', 20, NULL, 'Muntinlupa City', 'Muntinlupa CIty', 'violet', ''),
(3, 'Hilary Joyce Biasura', 20, NULL, 'Muntinlupa City', 'Muntinlupa City', 'yellow', ''),
(4, 'Khristian Rei Rosel', 20, NULL, 'sucat', 'muntinlupa', 'red', ''),
(5, 'Marvin Bestar', 21, NULL, 'camella st', 'muntin', 'green', ''),
(6, 'Ivan L Pirante', 23, NULL, 'BF HOMES', 'Paranaque', 'black', ''),
(7, 'Raven Prevendido', 21, NULL, 'Admiral Village', 'las pinas', 'white', 'I graduated in National-Senior high-school dona-josefa campus and five years from now i think i\'am the owner of a big company here in the philippines i conluded myself at one of the bilioner who negotiate also the powerful company like elon musk, bilgates etc. my expectation is to learn more about technologies like API web technologies something like that i want also to improve my programming languages throughout this subject.'),
(8, 'Marven Jude Tanjusay', 20, NULL, 'BF HOMES', 'Paranaque', 'orange', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
