-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 11:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naftex`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_lomba`
--

CREATE TABLE `data_lomba` (
  `id_lomba` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi1` varchar(50) NOT NULL,
  `deskripsi2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_lomba`
--

INSERT INTO `data_lomba` (`id_lomba`, `nama`, `deskripsi1`, `deskripsi2`) VALUES
(1, 'Lomba Mewarnai', '', ''),
(2, 'Lomba Menggambar', '', ''),
(3, 'Lomba Menyanyi', '', ''),
(4, 'Lomba Puisi', '', ''),
(5, 'Mboh lah', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id_user` int(11) NOT NULL,
  `id_lomba` int(11) NOT NULL,
  `nama1` varchar(50) NOT NULL,
  `wa1` varchar(15) NOT NULL,
  `univ1` varchar(50) NOT NULL,
  `ttl1` varchar(15) NOT NULL,
  `alamat1` varchar(100) NOT NULL,
  `nama2` varchar(50) NOT NULL,
  `wa2` varchar(15) NOT NULL,
  `univ2` varchar(50) NOT NULL,
  `ttl2` varchar(15) NOT NULL,
  `alamat2` varchar(100) NOT NULL,
  `nama3` varchar(50) NOT NULL,
  `wa3` varchar(15) NOT NULL,
  `univ3` varchar(50) NOT NULL,
  `ttl3` varchar(15) NOT NULL,
  `alamat3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_peserta`
--

INSERT INTO `data_peserta` (`id_user`, `id_lomba`, `nama1`, `wa1`, `univ1`, `ttl1`, `alamat1`, `nama2`, `wa2`, `univ2`, `ttl2`, `alamat2`, `nama3`, `wa3`, `univ3`, `ttl3`, `alamat3`) VALUES
(2, 1, 'Muhammad', '08521111 999', 'UB Coba', '11/11/9999', 'Jalan1 Coba', 'Sumanto', '085212345678999', 'Umum', '33/13/2077', 'Monas', 'Naufal', '08523333', 'UB', '33/33/3333', 'Jalan 3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Naufal Ulinnuha', 'email@email.com', 'admin'),
(2, 'peserta', '129451d83a60351a82516cb836842c68', 'Suicide Squad 9', 'peserta3@email.com', 'peserta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lomba`
--
ALTER TABLE `data_lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indexes for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lomba` (`id_lomba`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lomba`
--
ALTER TABLE `data_lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD CONSTRAINT `data_peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
