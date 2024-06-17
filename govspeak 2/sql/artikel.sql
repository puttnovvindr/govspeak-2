-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 03:07 AM
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
-- Database: `artikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `name`, `content`) VALUES
(1, 'Mengatasi Stres di Tempat Kerja: Teknik Penanganan yang Efektif', 'Stres di tempat kerja bisa menjadi hal yang menantang...'),
(2, 'Menjaga Kesehatan Mental di Era Digital: Tips dan Strategi Praktis', 'Era digital membawa banyak manfaat, tetapi juga menimbulkan tantangan...'),
(3, 'Meditasi untuk Menenangkan Pikiran dan Emosional', 'Meditasi adalah cara yang efektif untuk menenangkan pikiran dan mengurangi stres...'),
(4, 'Langkah-langkah Konkret untuk Mengatasi Rasa Takut', 'Kecemasan adalah pengalaman umum yang bisa mengganggu kesejahteraan mental...'),
(5, 'Meningkatkan Sehari-hari untuk Kesehatan Mental yang Lebih Baik', 'Kesejahteraan pribadi adalah fondasi bagi kesehatan mental yang baik...'),
(6, 'Olahraga dan Kesehatan Mental: Cara Mengoptimalkannya', 'Hubungan antara olahraga dan kesehatan mental telah terbukti secara ilmiah...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
