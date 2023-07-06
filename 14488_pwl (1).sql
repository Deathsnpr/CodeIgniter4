-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 06:39 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `14488_pwl`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_diskon` double NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `jenis`, `harga`, `diskon`, `harga_diskon`, `keterangan`, `foto`, `jumlah`) VALUES
(1, 'Minuman Si dalang Jaka', 'minuman', 10000, 50, 5000, 'Philips Blender 3000 Series - HR2042/50 Kapasitas 1L (Putih)Hasil blender halus tanpa gumpalan dalam 45 detik*Dirancang untuk meningkatkan hasil blender sehari-hari serta didukung dengan daya ', 'minuman1.jpg', 20),
(2, 'Jahe - Mbah Kinem -', 'microwave', 10000, 0, 0, 'PENGIRIMAN PAKAI CARGO KELUAR KOTA WAJIBBBB DENGAN BUBBLE !!\r\nUNTUK PENGIRIMAN DENGAM INSTANT KURIR, KITA PLASTIK WRAPPING\r\n\r\n\r\nQuick Defrost Ceramic Inside™\r\nECO Mode Deodorization\r\n- Dimensi dalam :', 'minuman2.jpeg', 15),
(3, 'Temulawak - Mbah Kinem -', 'kompor', 10000, 0, 0, 'SELAMAT DATANG\r\nREADY STOCK\r\n\r\nGARANSI RESMI DENPOO 1 TAHUN\r\n\r\nBAHAN YANG COCOK, BERBAHAN DASAR STAINLESS/MAGNET\r\n\r\nSPESIFIKASI:\r\n~ push button\r\n~ overheating protection\r\n~auto shut-out without pot\r\n~', 'minuman3.jpeg', 34),
(4, 'minuman enak', '', 10000, 0, 0, 'mahal bos impor og', '1686802467_18414554e65fe1f1e812.jpeg', 34),
(5, 'Minuman Si dalang Jaka', '', 5000, 0, 0, 'Philips Blender 3000 Series - HR2042/50 Kapasitas 1L (Putih)Hasil blender halus tanpa gumpalan dalam 45 detik*Dirancang untuk meningkatkan hasil blender sehari-hari serta didukung dengan daya ', '', 20),
(6, 'Minuman Si dalang Jaka', '', 10000, 0, 0, 'Philips Blender 3000 Series - HR2042/50 Kapasitas 1L (Putih)Hasil blender halus tanpa gumpalan dalam 45 detik*Dirancang untuk meningkatkan hasil blender sehari-hari serta didukung dengan daya ', '', 20),
(7, 'Minuman Si dalang Jaka', '', 10000, 50, 5000, 'Philips Blender 3000 Series - HR2042/50 Kapasitas 1L (Putih)Hasil blender halus tanpa gumpalan dalam 45 detik*Dirancang untuk meningkatkan hasil blender sehari-hari serta didukung dengan daya ', '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(155) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `total_harga` double DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `username`, `total_harga`, `alamat`, `ongkir`, `status`, `created_by`, `created_date`) VALUES
(1, 'bilun', 29000, 'bakalrejo', 9000, 2, 'bilun', '2023-06-22 04:41:32'),
(2, 'lunz', 29000, 'Themark', 9000, 2, 'lunz', '2023-07-05 04:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `subtotal_harga` double DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_barang`, `jumlah`, `diskon`, `subtotal_harga`, `created_by`, `created_date`) VALUES
(1, 1, 1, 1, 0, 10000, 'bilun', '2023-06-22 04:41:32'),
(2, 1, 2, 1, 0, 10000, 'bilun', '2023-06-22 04:41:32'),
(3, 2, 1, 1, 0, 10000, 'lunz', '2023-07-05 04:45:06'),
(4, 2, 2, 1, 0, 10000, 'lunz', '2023-07-05 04:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `email`, `is_active`) VALUES
(1, 'bilun', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '', 1),
(2, 'lunz', '827ccb0eea8a706c4c34a16891f84e7b', 'user', '', 1),
(3, 'jonn', '202cb962ac59075b964b07152d234b70', 'admin', 'nabilul316@gmail.com', 1),
(5, 'farikha', '202cb962ac59075b964b07152d234b70', 'user', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
