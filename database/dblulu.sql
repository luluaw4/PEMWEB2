-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblulu`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`) VALUES
(1, 'Kemeja'),
(2, 'Jeans'),
(3, 'Dress');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama_pemesan` varchar(45) DEFAULT NULL,
  `alamat_pemesan` varchar(45) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `jumlah_pesanan` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `nama_pemesan`, `alamat_pemesan`, `no_hp`, `email`, `jumlah_pesanan`, `deskripsi`, `produk_id`) VALUES
(26, '2023-05-06', 'lulu', 'JL. Kalibata 1', '081381620787', 'laprillw16@gmail.com', 2, 'warna coklat', 1),
(27, '2023-05-08', 'lala', 'Jl. mangga 2', '081381620781', 'lklklk@gmail.com', 1, 'ukuran s', 2),
(28, '2023-05-06', 'lili', 'Jl. Mandor Basyir 1 No.14  Kukusan Beji', '081381620789', 'lapr12l@gmail.com', 3, 'warna navy', 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `kategori_produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `harga_jual`, `harga_beli`, `stok`, `min_stok`, `deskripsi`, `kategori_produk_id`) VALUES
(1, '001', 'kemeja ', 192000, 160000, 39, 3, 'bahan katun tebal', 1),
(2, '002', 'kemeja flanel', 264000, 220000, 32, 2, 'bahan adem', 1),
(3, '003', 'kemeja batik', 330000, 275000, 26, 5, 'nyaman dipakai', 1),
(4, '011', 'jeans wanita', 276000, 230000, 90, 7, 'bahannya tebal', 2),
(19, '012', 'jeans pria', 282000, 235000, 23, 3, 'bahannya tebal', 2),
(20, '111', 'dress dewasa', 312000, 260000, 12, 2, 'bahannya halus', 3),
(21, '112', 'dress anak', 252000, 210000, 6, 1, 'bahannya halus dipakai', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_produk_id` (`kategori_produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`kategori_produk_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
