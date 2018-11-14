-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2018 at 10:55 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listrik_prabayar`
--

-- --------------------------------------------------------

--
-- Table structure for table `daya`
--

CREATE TABLE `daya` (
  `id` int(11) NOT NULL,
  `nama_daya` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daya`
--

INSERT INTO `daya` (`id`, `nama_daya`, `ket`) VALUES
(1, 'R1/900 VA', '900 Watt'),
(2, 'R2/1200 VA', '1200 Watt'),
(3, 'R3/1800 VA', '1800 Watt'),
(4, 'R3/2100 VA', '2100 Watt/Volt');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(255) NOT NULL,
  `no_meter` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `daya_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0. nonaktif 1.aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `no_meter`, `nama`, `alamat`, `daya_id`, `status`) VALUES
('2018300062620001', '14373030001', 'M Supardi', 'Jl. Munginsidi No.65 Jakarta Utara', 2, 1),
('2018300062624545', '14373034545', 'Muhammad Indra Lesmana', 'Jl. Ridho Asri No.87 Tuban', 1, 1),
('2018300062627826', '14373037826', 'Andi Lukmana', 'Jl. Pattimura No.86 Bojonegoro', 1, 1),
('2018300062628787', '14373038787', 'Puji Lestari', 'Jl. Kyai Mojo No.87 Bojonegoro', 1, 1),
('2018300062628989', '14373038989', 'Andi Setiawan', 'Jl. Sukasuka Kab. Bojonegoro', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `jumlah_kwh` float NOT NULL,
  `harga` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `jumlah_kwh`, `harga`, `status`) VALUES
(1, 32.1, 20000, 1),
(6, 80.2, 50000, 1),
(9, 190.3, 100000, 1),
(12, 370.4, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_ref` int(11) NOT NULL,
  `pelanggan_id` varchar(255) NOT NULL,
  `token_id` int(11) NOT NULL,
  `kode_token` varchar(255) DEFAULT NULL,
  `admin_bank` int(50) NOT NULL,
  `materai` int(50) DEFAULT NULL,
  `ppn` int(50) NOT NULL,
  `ppj` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `tgl_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_ref`, `pelanggan_id`, `token_id`, `kode_token`, `admin_bank`, `materai`, `ppn`, `ppj`, `total_harga`, `tgl_pembelian`) VALUES
(1, '2018300062620001', 1, '4545 6767 5656 8989', 2000, 0, 0, 500, 22500, '2018-11-06 10:24:30'),
(10, '2018300062620001', 1, '1329 8012 9824 8373', 2000, 0, 0, 500, 22500, '2018-11-07 06:09:30'),
(11, '2018300062624545', 9, '1032 3807 2689 6704', 3500, 6000, 1000, 500, 111000, '2018-11-07 06:13:00'),
(12, '2018300062620001', 9, '1183 7809 6877 2243', 3500, 3000, 1000, 500, 108000, '2018-11-07 06:23:02'),
(13, '2018300062627826', 0, '2926 9414 7588 1414', 0, 3000, 0, 0, 3000, '2018-11-07 10:39:08'),
(14, '2018300062627826', 6, '7117 2936 7780 5979', 3000, 3000, 500, 500, 57000, '2018-11-07 10:42:26'),
(15, '2018300062624545', 6, '1939 8765 6625 1932', 3000, 0, 500, 500, 54000, '2018-11-12 05:54:42'),
(16, '2018300062620001', 0, '3399 7186 4836 7313', 0, 0, 0, 0, 0, '2018-11-14 08:39:14'),
(17, '2018300062620001', 0, '5818 4765 5821 2702', 0, 0, 0, 0, 0, '2018-11-14 08:50:29'),
(18, '2018300062620001', 1, '5902 5957 1376 2247', 2000, 0, 0, 500, 22500, '2018-11-14 08:51:52'),
(19, '2018300062620001', 1, '2481 9236 2508 3580', 2000, 0, 0, 500, 22500, '2018-11-14 09:14:04'),
(20, '2018300062620001', 1, '4089 2120 6852 5268', 2000, 0, 0, 500, 22500, '2018-11-14 09:16:37'),
(21, '2018300062627826', 1, '1128 5455 7807 3812', 2000, 0, 0, 500, 22500, '2018-11-14 09:16:48'),
(22, '2018300062628787', 1, '3908 4521 8395 2790', 2000, 0, 0, 500, 22500, '2018-11-14 09:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL COMMENT '0.user 1.admin',
  `status` tinyint(1) NOT NULL COMMENT '0. nonaktif 1. aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'feri', '4c850dbd4128e75d16f407a9188e2aab', 1, 1),
(4, 'kronos', 'e2a16c6503ba631d753dd0071787ab05', 0, 1),
(5, 'galung', '2a73ac17d4d6653f3edbe8265fbf3a94', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daya`
--
ALTER TABLE `daya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_ref`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daya`
--
ALTER TABLE `daya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
