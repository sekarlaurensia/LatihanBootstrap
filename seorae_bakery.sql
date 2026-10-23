-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2026 at 03:16 AM
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
-- Database: `seorae_bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `section_name`, `title`, `description`) VALUES
(1, 'journey', 'My Journey', 'Berawal dari kecintaan pada dunia pastry, Seoraé terus berkembang melalui berbagai eksperimen rasa dan kreasi.'),
(2, 'approach', 'My Approach', 'Kami percaya bahwa makanan bukan hanya tentang rasa, tetapi juga tentang pengalaman.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `contact`, `message`, `created_at`) VALUES
(1, 'orlin', '@cleoorlin', 'chocolate cake 1', '2026-10-21 04:37:24'),
(2, 'sea', '08165239568', 'choco cake 1\r\nvanilla cake 1\r\nbomboloni 2', '2026-10-21 06:06:35'),
(3, 'trecul', '2661626266', 'choco cake 1', '2026-10-21 06:11:02'),
(4, 'skar', '08165239568', 'asmamms', '2026-10-21 07:39:33'),
(5, 'dida', '@cleoorlin', 'chococake', '2026-10-21 07:47:14'),
(6, 'Laurensia Sekar Winanti', '08165239568', 'chococake 1', '2026-10-21 07:47:51'),
(7, 'Laurensia Sekar Winanti', '@cleoorlin', 'adsdsd', '2026-10-21 07:55:03'),
(8, 'sekar', '@sekar.lohue', 'vanilla 1', '2026-10-21 07:59:56'),
(9, 'jegel', '081568464', 'bomboloni 1', '2026-10-21 08:00:31'),
(10, 'sea', '@season.blush', 'choco cake 1\r\ndonat cruel 2', '2026-10-22 06:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `total_sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_data`
--

INSERT INTO `sales_data` (`id`, `month`, `total_sales`) VALUES
(1, 'January', 500),
(2, 'February', 2000),
(3, 'March', 1500),
(4, 'April', 2500),
(5, 'May', 4000),
(6, 'June', 5000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_data`
--
ALTER TABLE `sales_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
