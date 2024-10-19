-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 07:47 PM
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
-- Database: `db_php_0054`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_0054`
--

CREATE TABLE `tb_users_0054` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nohp` char(13) NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users_0054`
--

INSERT INTO `tb_users_0054` (`id`, `nama`, `jns_kelamin`, `alamat`, `nohp`, `gambar`) VALUES
(23, 'Jake', 'Laki-laki', 'Pekalongan', '0853156856453', 0x75706c6f6164732f363731336561323433306465642e6a706567),
(24, 'Jeffrian', 'Laki-laki', 'Jakarta', '0851582801356', 0x75706c6f6164732f363731336530386439343032382e6a706567),
(26, 'Shaka', 'Laki-laki', 'Yogyakarta', '088221080681', 0x75706c6f6164732f363731336563333837343430662e6a706567),
(27, 'Nining', 'Perempuan', 'Bandung', '0859458522645', 0x75706c6f6164732f363731336538666337386534652e6a706567),
(28, 'Giselle', 'Perempuan', 'Jakarta', '088221080649', 0x75706c6f6164732f363731336539316165613832352e6a706567),
(29, 'Riki', 'Laki-laki', 'Surabaya', '0851582808462', 0x75706c6f6164732f363731336539333266326138382e6a706567),
(32, 'Yuni', 'Perempuan', 'Solo', '0851582801356', 0x75706c6f6164732f363731336563326333346438362e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_users_0054`
--
ALTER TABLE `tb_users_0054`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_users_0054`
--
ALTER TABLE `tb_users_0054`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
