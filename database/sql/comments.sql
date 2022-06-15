-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 15, 2022 at 07:40 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yelm`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `text` text NOT NULL,
  `created_at` datetime NOT NULL,
  `comment` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `parent_id`, `text`, `created_at`, `comment`) VALUES
(1, 'faigalizade', 0, 'Comment', '2022-06-15 06:20:09', NULL),
(2, 'aliyev', 1, 'Test', '2022-06-15 06:20:45', NULL),
(3, 'babayeff', 2, 'Test', '2022-06-15 06:21:04', NULL),
(4, 'faigalizade', 0, 'Teeeee', '2022-06-15 06:34:31', NULL),
(5, '12312', 4, '12312', '2022-06-15 07:28:36', NULL),
(6, '12312', 4, '12312', '2022-06-15 07:29:40', NULL),
(7, 'Testov', 1, 'Testov', '2022-06-15 07:29:55', NULL),
(8, 'Testov', 1, 'Testov', '2022-06-15 07:30:25', NULL),
(9, 'Testov', 4, 'Testov', '2022-06-15 07:31:12', NULL),
(10, 'Testov', 3, 'Testov', '2022-06-15 07:32:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
