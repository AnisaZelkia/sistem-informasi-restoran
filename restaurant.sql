-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 07:48 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_penjualan`
--

CREATE TABLE `item_penjualan` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` decimal(22,2) DEFAULT NULL,
  `kuantitas` decimal(22,2) DEFAULT NULL,
  `jumlah_harga` decimal(22,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `gambar` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(60) DEFAULT NULL,
  `stok` double DEFAULT NULL,
  `harga` decimal(22,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`gambar`, `id`, `nama`, `jenis`, `stok`, `harga`) VALUES
('b7.jpg', 1, 'Ayam Panggang', 'Makanan', 30, '32000.00'),
('b9.jpg', 2, 'Soto Ayam', 'Makanan', 3, '28000.00'),
('b13.jpg', 5, 'NAsi Goreng Jakarta', 'Makanan', 23, '30000.00'),
('b12.jpg', 6, 'Sate Ayam', 'Makanan', 20, '24000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `total` decimal(22,2) DEFAULT NULL,
  `biaya_pengiriman` decimal(22,2) DEFAULT NULL,
  `jumlah_total` decimal(22,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_penjualan`
--
ALTER TABLE `item_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_pembelian_barang1_idx` (`barang_id`),
  ADD KEY `fk_item_penjualan_penjualan1_idx` (`penjualan_id`),
  ADD KEY `kuantitas` (`kuantitas`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stok` (`stok`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penjualan_pelanggan1_idx` (`pelanggan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_penjualan`
--
ALTER TABLE `item_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_penjualan`
--
ALTER TABLE `item_penjualan`
  ADD CONSTRAINT `fk_item_pembelian_barang10` FOREIGN KEY (`barang_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_penjualan_penjualan1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_pelanggan1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
