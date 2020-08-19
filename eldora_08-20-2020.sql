-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 10:00 PM
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
-- Table structure for table `algoritma`
--

CREATE TABLE `algoritma` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hasil` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` text NOT NULL,
  `file_ext` text NOT NULL,
  `mime_type` text NOT NULL,
  `message_date` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `attachment_name`, `file_ext`, `mime_type`, `message_date`, `ip_address`) VALUES
(10, 1, 8, 'masuk', '', '', '', '2020-08-12 11:42:57', '::1'),
(23, 1, 3, 'sore', '', '', '', '2020-08-13 18:56:37', '192.168.100.4'),
(24, 3, 1, 'sore juga', '', '', '', '2020-08-13 18:56:43', '192.168.100.4'),
(25, 3, 1, 'Selamat Pagi', '', '', '', '2020-08-14 04:30:50', '192.168.100.4'),
(26, 12, 3, 'dcf rw', '', '', '', '2020-08-14 21:33:23', '140.213.156.239'),
(27, 3, 12, 'tes lagi', '', '', '', '2020-08-14 21:46:31', '::1'),
(28, 1, 3, 'malam', '', '', '', '2020-08-15 19:56:39', '::1'),
(29, 1, 3, 'tes', '', '', '', '2020-08-20 00:23:24', '::1');

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
(1, 'Jl. Gunung Krakatau No.261, Pulo Brayan Darat I, Kec. Medan Tim., Kota Medan, Sumatera Utara 20236', '+628126494668', 'eldora@eldora.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(11) NOT NULL,
  `dokterId` int(11) NOT NULL,
  `durasi` int(11) NOT NULL COMMENT 'satuan menit',
  `isBooked` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `startAt` time NOT NULL,
  `endAt` time NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `dokterId`, `durasi`, `isBooked`, `date`, `startAt`, `endAt`, `createdAt`) VALUES
(34, 3, 29, 0, '2020-08-12', '09:00:00', '09:29:00', '2020-08-12 15:06:33'),
(35, 3, 29, 0, '2020-08-12', '09:29:00', '09:58:00', '2020-08-12 15:06:33'),
(36, 3, 29, 0, '2020-08-12', '09:58:00', '10:27:00', '2020-08-12 15:06:33'),
(37, 3, 29, 0, '2020-08-12', '10:27:00', '10:56:00', '2020-08-12 15:06:33'),
(38, 3, 29, 0, '2020-08-12', '10:56:00', '11:25:00', '2020-08-12 15:06:33'),
(39, 3, 29, 0, '2020-08-12', '11:25:00', '11:54:00', '2020-08-12 15:06:33'),
(40, 3, 29, 0, '2020-08-12', '11:54:00', '12:23:00', '2020-08-12 15:06:33'),
(41, 3, 29, 0, '2020-08-12', '12:23:00', '12:52:00', '2020-08-12 15:06:33'),
(42, 3, 29, 0, '2020-08-12', '12:52:00', '13:21:00', '2020-08-12 15:06:33'),
(43, 3, 29, 0, '2020-08-12', '13:21:00', '13:50:00', '2020-08-12 15:06:33'),
(44, 3, 29, 0, '2020-08-12', '13:50:00', '14:19:00', '2020-08-12 15:06:33'),
(45, 3, 29, 0, '2020-08-12', '14:19:00', '14:48:00', '2020-08-12 15:06:33'),
(46, 3, 29, 0, '2020-08-12', '14:48:00', '15:17:00', '2020-08-12 15:06:33'),
(47, 3, 29, 0, '2020-08-12', '15:17:00', '15:46:00', '2020-08-12 15:06:33'),
(48, 3, 29, 0, '2020-08-12', '15:46:00', '16:15:00', '2020-08-12 15:06:33'),
(49, 3, 29, 0, '2020-08-12', '16:15:00', '16:44:00', '2020-08-12 15:06:33'),
(50, 8, 29, 0, '2020-08-12', '09:00:00', '09:29:00', '2020-08-12 15:06:33'),
(51, 8, 29, 0, '2020-08-12', '09:29:00', '09:58:00', '2020-08-12 15:06:33'),
(52, 8, 29, 0, '2020-08-12', '09:58:00', '10:27:00', '2020-08-12 15:06:33'),
(53, 8, 29, 0, '2020-08-12', '10:27:00', '10:56:00', '2020-08-12 15:06:33'),
(54, 8, 29, 0, '2020-08-12', '10:56:00', '11:25:00', '2020-08-12 15:06:33'),
(55, 8, 29, 0, '2020-08-12', '11:25:00', '11:54:00', '2020-08-12 15:06:33'),
(56, 8, 29, 0, '2020-08-12', '11:54:00', '12:23:00', '2020-08-12 15:06:33'),
(57, 8, 29, 0, '2020-08-12', '12:23:00', '12:52:00', '2020-08-12 15:06:33'),
(58, 8, 29, 0, '2020-08-12', '12:52:00', '13:21:00', '2020-08-12 15:06:33'),
(59, 8, 29, 0, '2020-08-12', '13:21:00', '13:50:00', '2020-08-12 15:06:33'),
(60, 8, 29, 0, '2020-08-12', '13:50:00', '14:19:00', '2020-08-12 15:06:33'),
(61, 8, 29, 0, '2020-08-12', '14:19:00', '14:48:00', '2020-08-12 15:06:33'),
(62, 8, 29, 0, '2020-08-12', '14:48:00', '15:17:00', '2020-08-12 15:06:33'),
(63, 8, 29, 0, '2020-08-12', '15:17:00', '15:46:00', '2020-08-12 15:06:33'),
(64, 8, 29, 0, '2020-08-12', '15:46:00', '16:15:00', '2020-08-12 15:06:33'),
(65, 8, 29, 0, '2020-08-12', '16:15:00', '16:44:00', '2020-08-12 15:06:33'),
(66, 11, 29, 0, '2020-08-12', '09:00:00', '09:29:00', '2020-08-12 15:06:33'),
(67, 11, 29, 0, '2020-08-12', '09:29:00', '09:58:00', '2020-08-12 15:06:33'),
(68, 11, 29, 0, '2020-08-12', '09:58:00', '10:27:00', '2020-08-12 15:06:33'),
(69, 11, 29, 0, '2020-08-12', '10:27:00', '10:56:00', '2020-08-12 15:06:33'),
(70, 11, 29, 0, '2020-08-12', '10:56:00', '11:25:00', '2020-08-12 15:06:33'),
(71, 11, 29, 0, '2020-08-12', '11:25:00', '11:54:00', '2020-08-12 15:06:33'),
(72, 11, 29, 0, '2020-08-12', '11:54:00', '12:23:00', '2020-08-12 15:06:33'),
(73, 11, 29, 0, '2020-08-12', '12:23:00', '12:52:00', '2020-08-12 15:06:33'),
(74, 11, 29, 0, '2020-08-12', '12:52:00', '13:21:00', '2020-08-12 15:06:33'),
(75, 11, 29, 0, '2020-08-12', '13:21:00', '13:50:00', '2020-08-12 15:06:33'),
(76, 11, 29, 0, '2020-08-12', '13:50:00', '14:19:00', '2020-08-12 15:06:33'),
(77, 11, 29, 0, '2020-08-12', '14:19:00', '14:48:00', '2020-08-12 15:06:33'),
(78, 11, 29, 0, '2020-08-12', '14:48:00', '15:17:00', '2020-08-12 15:06:33'),
(79, 11, 29, 0, '2020-08-12', '15:17:00', '15:46:00', '2020-08-12 15:06:33'),
(80, 11, 29, 0, '2020-08-12', '15:46:00', '16:15:00', '2020-08-12 15:06:33'),
(81, 11, 29, 0, '2020-08-12', '16:15:00', '16:44:00', '2020-08-12 15:06:33'),
(82, 3, 31, 0, '2020-08-14', '09:00:00', '09:31:00', '2020-08-12 15:07:23'),
(83, 3, 31, 0, '2020-08-14', '09:31:00', '10:02:00', '2020-08-12 15:07:23'),
(84, 3, 31, 0, '2020-08-14', '10:02:00', '10:33:00', '2020-08-12 15:07:23'),
(85, 3, 31, 0, '2020-08-14', '10:33:00', '11:04:00', '2020-08-12 15:07:23'),
(86, 3, 31, 0, '2020-08-14', '11:04:00', '11:35:00', '2020-08-12 15:07:23'),
(87, 3, 31, 0, '2020-08-14', '11:35:00', '12:06:00', '2020-08-12 15:07:23'),
(88, 3, 31, 0, '2020-08-14', '12:06:00', '12:37:00', '2020-08-12 15:07:23'),
(89, 3, 31, 0, '2020-08-14', '12:37:00', '13:08:00', '2020-08-12 15:07:23'),
(90, 3, 31, 0, '2020-08-14', '13:08:00', '13:39:00', '2020-08-12 15:07:23'),
(91, 3, 31, 0, '2020-08-14', '13:39:00', '14:10:00', '2020-08-12 15:07:23'),
(92, 3, 31, 0, '2020-08-14', '14:10:00', '14:41:00', '2020-08-12 15:07:23'),
(93, 3, 31, 0, '2020-08-14', '14:41:00', '15:12:00', '2020-08-12 15:07:23'),
(94, 3, 31, 0, '2020-08-14', '15:12:00', '15:43:00', '2020-08-12 15:07:23'),
(95, 3, 31, 0, '2020-08-14', '15:43:00', '16:14:00', '2020-08-12 15:07:23'),
(96, 3, 31, 0, '2020-08-14', '16:14:00', '16:45:00', '2020-08-12 15:07:23'),
(97, 8, 31, 0, '2020-08-14', '09:00:00', '09:31:00', '2020-08-12 15:07:23'),
(98, 8, 31, 0, '2020-08-14', '09:31:00', '10:02:00', '2020-08-12 15:07:23'),
(99, 8, 31, 0, '2020-08-14', '10:02:00', '10:33:00', '2020-08-12 15:07:23'),
(100, 8, 31, 0, '2020-08-14', '10:33:00', '11:04:00', '2020-08-12 15:07:23'),
(101, 8, 31, 0, '2020-08-14', '11:04:00', '11:35:00', '2020-08-12 15:07:23'),
(102, 8, 31, 0, '2020-08-14', '11:35:00', '12:06:00', '2020-08-12 15:07:23'),
(103, 8, 31, 0, '2020-08-14', '12:06:00', '12:37:00', '2020-08-12 15:07:23'),
(104, 8, 31, 0, '2020-08-14', '12:37:00', '13:08:00', '2020-08-12 15:07:23'),
(105, 8, 31, 0, '2020-08-14', '13:08:00', '13:39:00', '2020-08-12 15:07:23'),
(106, 8, 31, 0, '2020-08-14', '13:39:00', '14:10:00', '2020-08-12 15:07:23'),
(107, 8, 31, 0, '2020-08-14', '14:10:00', '14:41:00', '2020-08-12 15:07:23'),
(108, 8, 31, 0, '2020-08-14', '14:41:00', '15:12:00', '2020-08-12 15:07:23'),
(109, 8, 31, 0, '2020-08-14', '15:12:00', '15:43:00', '2020-08-12 15:07:23'),
(110, 8, 31, 0, '2020-08-14', '15:43:00', '16:14:00', '2020-08-12 15:07:23'),
(111, 8, 31, 0, '2020-08-14', '16:14:00', '16:45:00', '2020-08-12 15:07:23'),
(112, 11, 31, 0, '2020-08-14', '09:00:00', '09:31:00', '2020-08-12 15:07:23'),
(113, 11, 31, 0, '2020-08-14', '09:31:00', '10:02:00', '2020-08-12 15:07:23'),
(114, 11, 31, 0, '2020-08-14', '10:02:00', '10:33:00', '2020-08-12 15:07:23'),
(115, 11, 31, 0, '2020-08-14', '10:33:00', '11:04:00', '2020-08-12 15:07:23'),
(116, 11, 31, 0, '2020-08-14', '11:04:00', '11:35:00', '2020-08-12 15:07:23'),
(117, 11, 31, 0, '2020-08-14', '11:35:00', '12:06:00', '2020-08-12 15:07:23'),
(118, 11, 31, 0, '2020-08-14', '12:06:00', '12:37:00', '2020-08-12 15:07:23'),
(119, 11, 31, 0, '2020-08-14', '12:37:00', '13:08:00', '2020-08-12 15:07:23'),
(120, 11, 31, 0, '2020-08-14', '13:08:00', '13:39:00', '2020-08-12 15:07:23'),
(121, 11, 31, 0, '2020-08-14', '13:39:00', '14:10:00', '2020-08-12 15:07:23'),
(122, 11, 31, 0, '2020-08-14', '14:10:00', '14:41:00', '2020-08-12 15:07:23'),
(123, 11, 31, 0, '2020-08-14', '14:41:00', '15:12:00', '2020-08-12 15:07:23'),
(124, 11, 31, 0, '2020-08-14', '15:12:00', '15:43:00', '2020-08-12 15:07:23'),
(125, 11, 31, 0, '2020-08-14', '15:43:00', '16:14:00', '2020-08-12 15:07:23'),
(126, 11, 31, 0, '2020-08-14', '16:14:00', '16:45:00', '2020-08-12 15:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `janji_temu`
--

CREATE TABLE `janji_temu` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `dokterId` int(11) NOT NULL,
  `jadwalId` int(11) NOT NULL,
  `durasi` int(11) NOT NULL COMMENT 'satuan menit',
  `konfirmasi` tinyint(1) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `subject` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `ip_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `subject`, `message`, `ip_address`) VALUES
(1, 'Aldi', 'aldi@member.com', 'Coba ajalah', 'masuk apa ga', '192.168.100.4');

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
(1, 1, 'Nikken', 'Anggora', 1, 0, '2020-08-09', '2020-08-14'),
(2, 1, 'Akamaru', 'Samoyed', 0, 1, '2020-08-11', '2020-08-11'),
(3, 4, 'Bull', 'Buldog', 0, 0, '2020-08-11', '0000-00-00'),
(4, 4, 'Shiba', 'Shiba', 0, 1, '2020-08-11', '0000-00-00'),
(5, 6, 'Sapi', 'Domestic', 1, 3, '2020-08-11', '0000-00-00'),
(6, 10, 'Otun', 'Campuran', 0, 1, '2020-08-12', '0000-00-00'),
(7, 10, 'Servi', 'Campuran', 0, 0, '2020-08-12', '0000-00-00'),
(8, 12, 'Harvin', 'dog aja', 1, 0, '2020-08-14', '2020-08-14');

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
(1, 'Eldora Vet Clinic', 'Klinik Hewan');

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
  `status` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `password`, `tgl_lahir`, `no_telp`, `jenis_kelamin`, `alamat`, `kota`, `role_id`, `status`, `is_active`, `date_created`) VALUES
(1, 'Aldi Yulio', 'aldi@member.com', 'favicon-kemana-lagi-logo-0002.png', '$2y$10$kqwrBN2Mf8MhvURpzzGP/eVSIs838fXj3HY0m6J0ffmndztWcZkX.', '1993-07-30', '081260425831', 1, 'Jl. Gunung Krakatau No.261, Pulo Brayan Darat I, Kec. Medan Timur', 'Medan, Sumatera Utara', 2, 1, 1, '2020-08-05'),
(2, 'Admin Clinic', 'admin@admin.com', 'admin.png', '$2y$10$s0MlNfEK/aVGPV8szaKRfeYPSCdSBmhEuL9C6.W0PXbVhgP5.jj8G', '1993-07-30', '', 1, '', '', 1, 1, 1, '2020-08-05'),
(3, 'Dokter Clinic', 'eldora@dokter.com', 'doctor.png', '$2y$10$J5xy/v0LO8iBc3jMCcU7K.ATgnewq6BHscZ6ux.sK.HL7t2cm6ed2', '1993-07-30', '', 1, '', '', 3, 1, 1, '2020-08-05'),
(4, 'Member Kedua', 'member2@member.com', 'favicon-kemana-lagi-logo-0002.png', '$2y$10$9n7XpF3UDtBXiIOtCD0.deKT7IF6.w70zZ4fvIonHvuwGG7KSxzaq', '1993-07-30', '081260425831', 2, 'Jl a', 'Medan, Sumatera Utara', 2, 1, 1, '2020-08-05'),
(5, 'Aldi Y', 'member@member.com', 'member.png', '$2y$10$uDozIlg8AQyxZmUm/LOvZ.ct0TTnAoHIGUXTo8gYhspCbNlOkcDHC', '1993-07-30', '08123456789', 1, 'Jl Sana', 'Medan, Sumatera Utara', 2, 1, 1, '2020-08-05'),
(6, 'Agung', 'agunghandoko112@gmail.com', 'favicon-kemana-lagi-logo-0002.png', '$2y$10$8EEWn0EsN0AtFPnJFRcvgOd9MKPrNQxlttWuOBqqxbMOIiTMza5Ea', '1997-07-14', '0895611507489', 1, 'Jl Tuasan', 'Medan, Sumatera Utara', 2, 1, 1, '2020-08-09'),
(8, 'Eldora Dokter', 'eldora2@dokter.com', 'doctor.png', '$2y$10$loFSxV9KvUWEI10XO9StVOVZw0oMW5qNccGWk8FakPRSovpUe5T4m', '2020-08-10', '', 1, '', '', 3, 1, 1, '2020-08-10'),
(10, 'Monica Magdalena', 'mmhutapea50@gmail.com', 'member.png', '$2y$10$/NSjlak0XDtRaV51BivzseMJunePUp86v4XOIVPk/7r/OjWq0oM4S', '1998-02-06', '082161983906', 2, 'JL. KERUNTUNG NO.34 A', 'Medan, Sumatera Utara', 2, 1, 1, '2020-08-12'),
(11, 'dr. Ari Ramadhan Siregar', 'ariramadhansiregar@dokter.com', 'doctor.png', '$2y$10$Jzua2jGV085K/HrFissdveMzSgMYsjAIJBYm11R8GtFCpweqMM7UO', '2020-08-12', '', 1, '', '', 3, 1, 1, '2020-08-12'),
(12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy te', 'lorem@mail.com', 'member.png', '$2y$10$h9D6UcYCB6EBd5yoBSlTvOKG7HGJLlx4Y2IKZBSbTKVKAH8tu04KW', '2020-08-14', '', 0, '', '', 2, 1, 1, '2020-08-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `algoritma`
--
ALTER TABLE `algoritma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`,`sender_id`,`receiver_id`),
  ADD KEY `FK_Chat_Sender` (`sender_id`),
  ADD KEY `FK_Chat_Receiver` (`receiver_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `janji_temu`
--
ALTER TABLE `janji_temu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `algoritma`
--
ALTER TABLE `algoritma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `janji_temu`
--
ALTER TABLE `janji_temu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peliharaan`
--
ALTER TABLE `peliharaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_Chat_Receiver` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Chat_Sender` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peliharaan`
--
ALTER TABLE `peliharaan`
  ADD CONSTRAINT `FK_Peliharaan` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
