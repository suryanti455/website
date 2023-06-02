-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 02:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spp`
--

CREATE TABLE `tbl_spp` (
  `id_spp` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `nominal` int(11) NOT NULL,
  `perogram_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spp`
--

INSERT INTO `tbl_spp` (`id_spp`, `nis`, `nama_siswa`, `kelas`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `nominal`, `perogram_keahlian`) VALUES
(2, 28289, 'Tamia', 12, 'Kuningan', '2023-05-18', 'P', 1000000, 'rpl'),
(3, 5666, 'Suryanti', 11, 'Kuningan', '2023-05-24', 'P', 1000000, 'tjkt'),
(343, 44444, 'desi', 11, 'kuningan', '2023-06-28', 'P', 5000000, 'pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_spp`
--
ALTER TABLE `tbl_spp`
  ADD PRIMARY KEY (`id_spp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
