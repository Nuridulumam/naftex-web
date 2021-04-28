-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 04:19 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wa` varchar(20) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `email`, `wa`, `level`, `foto`) VALUES
(1, 'naufal', 'a7ef174d3ed272acd2b72913a7ef9d40', 'Naufal Ulinnuha', 'naufalulinnuha40@gmail.com', '085234006051', 'admin', ''),
(2, 'umam', '343ef316652197d14cdccc98c7a44cb1', 'Nuridul Umam', 'umam@gmail.com', '081217514643', 'superadmin', 'umam_foto.jpg');

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
  `username` varchar(50) NOT NULL,
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

INSERT INTO `data_peserta` (`username`, `nama1`, `wa1`, `univ1`, `ttl1`, `alamat1`, `nama2`, `wa2`, `univ2`, `ttl2`, `alamat2`, `nama3`, `wa3`, `univ3`, `ttl3`, `alamat3`) VALUES
('admin', 'Admin 1', '081111101', 'UB', '11/11/9999', 'Rumah admin 1', 'Admin 2', '081111102', 'Umum', '33/13/2077', 'Monas', 'Admin 3', '081111103', 'UB', '33/33/3333', 'Jalan 3'),
('percobaan6', 'Anggota 61', '08100061', 'UB', '11/11/9999', 'Monas No. 1', 'Anggota 62', '08100062', 'UB', '33/13/2077', 'Monas No. 2', 'Anggota 63', '08100063', 'UB', '26/09/2000', 'Monas No. 3'),
('peserta', '', '088867678989', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('roket', 'Player 1', '080000003333', 'UB', '11/11/9999', 'Jalan1 Coba', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_peserta`
--

CREATE TABLE `dokumen_peserta` (
  `username` varchar(50) NOT NULL,
  `proposal` varchar(100) NOT NULL,
  `sk` varchar(100) NOT NULL,
  `ktm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_peserta`
--

CREATE TABLE `pembayaran_peserta` (
  `username` varchar(50) NOT NULL,
  `status_bayar` varchar(50) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `deskripsi2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_peserta`
--

INSERT INTO `pembayaran_peserta` (`username`, `status_bayar`, `bukti_transfer`, `deskripsi2`) VALUES
('admin', 'pending', 'admin_bukti.jpg', ''),
('percobaan6', 'pending', 'percobaan6_bukti.jpg', '');

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
  `level` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_lomba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`, `foto`, `id_lomba`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Tim Admin', 'percobaan1@gmail.com', 'peserta', 'admin_foto.jpg', 2),
(2, 'peserta', '129451d83a60351a82516cb836842c68', 'Suicide Squad 9', 'peserta3@email.com', 'peserta', '', 4),
(3, 'roket', '25d55ad283aa400af464c76d713c07ad', 'Tim Roket', 'roket@gmail.com', '', '', 5),
(6, 'percobaan6', '8eaadf1e6edc7f52719050b83fa9c5e9', 'Percobaan 6', 'percobaan6@gmail.com', '', 'percobaan6_foto.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `data_lomba`
--
ALTER TABLE `data_lomba`
  ADD PRIMARY KEY (`id_lomba`);

--
-- Indexes for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `dokumen_peserta`
--
ALTER TABLE `dokumen_peserta`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pembayaran_peserta`
--
ALTER TABLE `pembayaran_peserta`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_lomba`
--
ALTER TABLE `data_lomba`
  MODIFY `id_lomba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD CONSTRAINT `data_peserta_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen_peserta`
--
ALTER TABLE `dokumen_peserta`
  ADD CONSTRAINT `dokumen_peserta_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_peserta`
--
ALTER TABLE `pembayaran_peserta`
  ADD CONSTRAINT `pembayaran_peserta_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
