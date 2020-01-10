-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 09:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendaraan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `diskon_pembayaran` ()  SELECT*,
IF(jml_penjualan*harga_jual>=200000,10,0) 
AS diskon FROM penjualan_kendaraan
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `total_pembayaran` ()  SELECT*,
(harga_jual*jml_penjualan)AS total_bayar FROM penjualan_kendaraan
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `transaksi_pembelian` ()  select date_format(tanggal_beli, '%y-%m-%d') tanggal_pembelian,
  sum(jml_pembelian) total_pembelian
from pembelian_kendaraan
group by date_format(tanggal_beli, '%y-%m-%d')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `transaksi_penjualan` ()  select date_format(tanggal_jual, '%y-%m-%d') tanggal_penjualan,
  sum(jml_penjualan) total_penjualan
from penjualan_kendaraan
group by date_format(tanggal_jual, '%y-%m-%d')$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_kendaraan`
--

CREATE TABLE `pembelian_kendaraan` (
  `id` int(5) NOT NULL,
  `kd_kendaraan` char(5) DEFAULT NULL,
  `jml_pembelian` int(5) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_kendaraan`
--

INSERT INTO `pembelian_kendaraan` (`id`, `kd_kendaraan`, `jml_pembelian`, `tanggal_beli`) VALUES
(16, 'HD001', 1, '2019-01-09'),
(17, 'HD003', 2, '2019-01-10');

--
-- Triggers `pembelian_kendaraan`
--
DELIMITER $$
CREATE TRIGGER `pembelian` AFTER INSERT ON `pembelian_kendaraan` FOR EACH ROW BEGIN UPDATE stok_kendaraan
    set stok = stok+NEW.jml_pembelian,tanggal_beli=new.tanggal_beli
	WHERE kd_kendaraan=new.kd_kendaraan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_kendaraan`
--

CREATE TABLE `penjualan_kendaraan` (
  `id` int(5) NOT NULL,
  `kd_kendaraan` char(5) DEFAULT NULL,
  `jml_penjualan` int(5) DEFAULT NULL,
  `harga_jual` int(15) NOT NULL,
  `tanggal_jual` date DEFAULT NULL,
  `nama_pembeli` varchar(125) DEFAULT NULL,
  `alamat` varchar(125) DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `pekerjaan` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_kendaraan`
--

INSERT INTO `penjualan_kendaraan` (`id`, `kd_kendaraan`, `jml_penjualan`, `harga_jual`, `tanggal_jual`, `nama_pembeli`, `alamat`, `no_ktp`, `pekerjaan`, `status`) VALUES
(18, 'HD001', 1, 18500000, '2019-01-09', 'Samsul Ma\'arif', 'Ds.pringtulis rt02/03', '3320120904199500', 'Karyawan Swasta', 'Lajang'),
(19, 'HD011', 1, 15450000, '2019-01-28', 'Ahmad', 'Ds. Mayong lor', '3320120904199500', 'Wiraswasta', 'Sudah menikah'),
(20, 'HD005', 1, 199000, '2019-01-23', 'Bejo sutikno', 'Ds. Gemiring', '3320120904199500', 'Pelajar', 'Lajang');

--
-- Triggers `penjualan_kendaraan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `penjualan_kendaraan` FOR EACH ROW BEGIN UPDATE stok_kendaraan
    set stok = stok-NEW.jml_penjualan,tanggal_jual=new.tanggal_jual
	WHERE kd_kendaraan=new.kd_kendaraan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_kendaraan`
--

CREATE TABLE `stok_kendaraan` (
  `kd_kendaraan` char(5) NOT NULL,
  `nama_kendaraan` char(50) DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `satuan` char(5) DEFAULT NULL,
  `harga` int(13) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL,
  `tanggal_jual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_kendaraan`
--

INSERT INTO `stok_kendaraan` (`kd_kendaraan`, `nama_kendaraan`, `stok`, `satuan`, `harga`, `tanggal_beli`, `tanggal_jual`) VALUES
('HD001', 'Supra X FI SP', 2, 'Unit', 17050000, '2019-01-09', '2019-01-09'),
('HD002', 'Supra X Helm In', 1, 'Unit', 18125000, '2019-01-08', '2019-01-10'),
('HD003', 'Supra X FI CW Luxury', 4, 'Unit', 18100000, '2019-01-10', '0000-00-00'),
('HD004', 'Supra GTR SPORTY', 2, 'Unit', 22050000, '2019-01-08', '0000-00-00'),
('HD005', 'Supra GTR EXCLUSIVE', 1, 'Unit', 22300000, '2019-01-08', '2019-01-23'),
('HD006', 'Blade R', 2, 'Unit', 16675000, '2019-01-08', '0000-00-00'),
('HD007', 'Blade Repsol', 2, 'Unit', 17075000, '2019-01-08', '0000-00-00'),
('HD008', 'Revo Fit FI', 2, 'Unit', 13850000, '2019-01-08', '0000-00-00'),
('HD009', 'Revo CW FI', 2, 'Unit', 15550000, '2019-01-08', '0000-00-00'),
('HD010', 'Revo X LP', 2, 'Unit', 15550000, '2019-01-08', '0000-00-00'),
('HD011', 'All New Beat Sporty CW', 1, 'Unit', 15450000, '2019-01-08', '2019-01-28'),
('HD012', 'All New Beat Sporty CBS', 2, 'Unit', 15650000, '2019-01-08', '0000-00-00'),
('HD013', 'All New Beat Sporty CBS ISS', 2, 'Unit', 16150000, '2019-01-08', '0000-00-00'),
('HD014', 'Beat Street CBS', 2, 'Unit', 16125000, '2019-01-08', '0000-00-00'),
('HD015', 'New Beat Pop Esp CW Pixel/Comic', 2, 'Unit', 15000000, '2019-01-08', '0000-00-00'),
('HD016', 'New Beat Pop Esp CBS Pixel/Comic', 2, 'Unit', 15700000, '2019-01-08', '0000-00-00'),
('HD017', 'New Beat Pop Esp CBS ISS Pixel/Comic', 2, 'Unit', 16125000, '2019-01-08', '0000-00-00'),
('HD018', 'Vario 110 Esp CBS', 2, 'Unit', 16925000, '2019-01-08', '0000-00-00'),
('HD019', 'Vario 110 Esp CBS (variasi warna doff)', 2, 'Unit', 17025000, '2019-01-08', '0000-00-00'),
('HD020', 'Vario 110 Esp CBS ISS', 2, 'Unit', 17725000, '2019-01-08', '0000-00-00'),
('HD021', 'Vario 110 Esp CBS ISS (variasi warna doff)', 2, 'Unit', 17825000, '2019-01-08', '0000-00-00'),
('HD022', 'New Vario 125 FI CBS', 2, 'Unit', 19200000, '2019-01-08', '0000-00-00'),
('HD023', 'New Vario 125 FI CBS ISS', 2, 'Unit', 20000000, '2019-01-08', '0000-00-00'),
('HD024', 'Vario 150', 2, 'Unit', 22600000, '2019-01-08', '0000-00-00'),
('HD025', 'PCX Hybrid', 2, 'Unit', 40000000, '2019-01-08', '0000-00-00'),
('HD026', 'All New PCX CBS (Non ABS)', 2, 'Unit', 27800000, '2019-01-08', '0000-00-00'),
('HD027', 'All New PCX ABS', 2, 'Unit', 30800000, '2019-01-08', '0000-00-00'),
('HD028', 'All New Scoopy Stylish LP', 2, 'Unit', 18200000, '2019-01-08', '0000-00-00'),
('HD029', 'All New Scoopy Sporty LP', 2, 'Unit', 18200000, '2019-01-08', '0000-00-00'),
('HD030', 'All New Scoopy Playfull LP', 2, 'Unit', 18200000, '2019-01-08', '0000-00-00'),
('HD031', 'SH150', 2, 'Unit', 39900000, '2019-01-08', '0000-00-00'),
('HD032', 'Sonic LP', 2, 'Unit', 22250000, '2019-01-08', '0000-00-00'),
('HD033', 'Sonic (Racing Red) LP', 2, 'Unit', 22650000, '2019-01-08', '0000-00-00'),
('HD034', 'PRO FI LP', 2, 'Unit', 22075000, '2019-01-08', '0000-00-00'),
('HD035', 'Verza 150 SP LP', 2, 'Unit', 19300000, '2019-01-08', '0000-00-00'),
('HD036', 'Verza 150 CW LP', 2, 'Unit', 19950000, '2019-01-08', '0000-00-00'),
('HD037', 'New CB150R (Hitam Merah) LP', 2, 'Unit', 27475000, '2019-01-08', '0000-00-00'),
('HD038', 'New CB150R Special Edition (Merah)  LP', 2, 'Unit', 27475000, '2019-01-08', '0000-00-00'),
('HD039', 'New CB150R STD', 2, 'Unit', 26375000, '2019-01-08', '0000-00-00'),
('HD040', 'CBR 250 RR STD (merah) LP', 2, 'Unit', 65325000, '2019-01-08', '0000-00-00'),
('HD041', 'CBR 250 RR ABS (grey&black) LP', 2, 'Unit', 70725000, '2019-01-08', '0000-00-00'),
('HD042', 'CBR 250 RR ABS (merah) LP', 2, 'Unit', 71325000, '2019-01-08', '0000-00-00'),
('HD043', 'CBR 150 LP', 2, 'Unit', 33600000, '2019-01-08', '0000-00-00'),
('HD044', 'CBR 150 (red) LP', 2, 'Unit', 34300000, '2019-01-08', '0000-00-00'),
('HD045', 'CBR 150 (repsol) LP', 2, 'Unit', 34500000, '2019-01-08', '0000-00-00'),
('HD046', 'CBR 250RR ABS Repsol Acc LP', 2, 'Unit', 71375000, '2019-01-08', '0000-00-00'),
('HD047', 'CBR250 Kabuki (Acc)', 2, 'Unit', 70125000, '2019-01-08', '0000-00-00'),
('HD048', 'CRF150', 2, 'Unit', 32050000, '2019-01-08', '0000-00-00'),
('HD049', 'CRF250', 2, 'Unit', 64900000, '2019-01-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `user` varchar(25) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian_kendaraan`
--
ALTER TABLE `pembelian_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_kendaraan`
--
ALTER TABLE `penjualan_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_kendaraan`
--
ALTER TABLE `stok_kendaraan`
  ADD PRIMARY KEY (`kd_kendaraan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian_kendaraan`
--
ALTER TABLE `pembelian_kendaraan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penjualan_kendaraan`
--
ALTER TABLE `penjualan_kendaraan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
