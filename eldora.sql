-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 09:36 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eldora`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `alamat`, `notelp`, `email`) VALUES
(1, 'Jl. Gunung Krakatau No.261, Pulo Brayan Darat I, Kec. Medan Tim., Kota Medan, Sumatera Utara 20236', '+628126494668', 'example@abc.com');

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `profesi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `nama_dokter`, `profesi`) VALUES
(1, 'Drh. Ari Ramadhan Siregar', 'Dokter Hewan'),
(2, 'Drh. Maikhar Gita Eldora', 'Dokter Hewan');

-- --------------------------------------------------------

--
-- Table structure for table `peliharaan`
--

CREATE TABLE `peliharaan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_pet` varchar(128) NOT NULL,
  `ras_pet` varchar(128) NOT NULL,
  `jenis_pet` int(1) NOT NULL,
  `jk` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peliharaan`
--

INSERT INTO `peliharaan` (`id`, `user_id`, `nama_pet`, `ras_pet`, `jenis_pet`, `jk`, `date_created`, `date_modified`) VALUES
(1, 1, 'Miko', 'Anggora', 1, 1, '2020-08-09', '0000-00-00'),
(2, 1, 'Akamaru', 'Samoyed', 0, 1, '2020-08-11', '2020-08-11'),
(3, 4, 'Bull', 'Buldog', 0, 0, '2020-08-11', '0000-00-00'),
(4, 4, 'Shiba', 'Shiba', 0, 1, '2020-08-11', '0000-00-00'),
(5, 6, 'Sapi', 'Domestic', 1, 3, '2020-08-11', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `nama_klinik` varchar(128) NOT NULL,
  `isi_tentang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `nama_klinik`, `isi_tentang`) VALUES
(1, 'Eldora Vet Clinic', 'Klinik Hewan ini berdiri sejak...');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jenis_kelamin` int(3) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `tgl_lahir`, `no_telp`, `jenis_kelamin`, `alamat`, `kota`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Aldi Yulio', 'aldi@member.com', 'aldi.jpg', '$2y$10$kqwrBN2Mf8MhvURpzzGP/eVSIs838fXj3HY0m6J0ffmndztWcZkX.', '1993-07-30', '081260425831', 1, 'Jl. Gunung Krakatau No.261, Pulo Brayan Darat I, Kec. Medan Timur', 'Medan, Sumatera Utara', 2, 1, '2020-08-05'),
(2, 'Admin Clinic', 'admin@admin.com', 'admin.png', '$2y$10$s0MlNfEK/aVGPV8szaKRfeYPSCdSBmhEuL9C6.W0PXbVhgP5.jj8G', '1993-07-30', '', 0, '', '', 1, 1, '2020-08-05'),
(3, 'Dokter Clinic', 'eldora@dokter.com', 'doctor.png', '$2y$10$J5xy/v0LO8iBc3jMCcU7K.ATgnewq6BHscZ6ux.sK.HL7t2cm6ed2', '1993-07-30', '', 0, '', '', 3, 1, '2020-08-05'),
(4, 'Member Kedua', 'member2@member.com', 'aldi.jpg', '$2y$10$9n7XpF3UDtBXiIOtCD0.deKT7IF6.w70zZ4fvIonHvuwGG7KSxzaq', '1993-07-30', '081260425831', 1, 'Jl a', 'Medan, Sumatera Utara', 2, 1, '2020-08-05'),
(5, 'Aldi Y', 'member@member.com', 'member.png', '$2y$10$uDozIlg8AQyxZmUm/LOvZ.ct0TTnAoHIGUXTo8gYhspCbNlOkcDHC', '1993-07-30', '08123456789', 1, 'Jl Sana', 'Medan, Sumatera Utara', 2, 1, '2020-08-05'),
(6, 'Agung', 'agunghandoko112@gmail.com', '4631d9f26a6ea6fa75d0ec6745218178.jpg', '$2y$10$8EEWn0EsN0AtFPnJFRcvgOd9MKPrNQxlttWuOBqqxbMOIiTMza5Ea', '1997-07-14', '0895611507489', 1, 'Jl Tuasan', 'Medan, Sumatera Utara', 2, 1, '2020-08-09'),
(7, 'Keanu Alif', 'keanu@member.com', 'member.png', '$2y$10$pDcOnGgxo/Y4VCHmgMAwp.CPvHiEVkRR/wZNAV0jMvqONBulXCwR6', '2020-08-09', '', 0, '', '', 2, 1, '2020-08-09'),
(8, 'Eldora Dokter', 'eldora2@dokter.com', 'doctor.png', '$2y$10$loFSxV9KvUWEI10XO9StVOVZw0oMW5qNccGWk8FakPRSovpUe5T4m', '2020-08-10', '', 1, '', '', 3, 1, '2020-08-10'),
(9, 'eldora tiga', 'eldora3@dokter.com', 'doctor.png', '$2y$10$CfdQQs7NS8Y9b4kNpQ6Jw.2jYqTke.wAP4SG2DY.84jG3p7WhxcTi', '2020-08-10', '', 1, '', '', 3, 1, '2020-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `peliharaan`
--
ALTER TABLE `peliharaan`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `FK_Peliharaan` (`user_id`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peliharaan`
--
ALTER TABLE `peliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peliharaan`
--
ALTER TABLE `peliharaan`
  ADD CONSTRAINT `FK_Peliharaan` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
