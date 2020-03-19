-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 10:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinicheesetea1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan_baku` varchar(20) NOT NULL,
  `nama_bahan_baku` varchar(30) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga_satuan` varchar(30) NOT NULL,
  `jumlah_stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan_baku`, `nama_bahan_baku`, `satuan`, `harga_satuan`, `jumlah_stok`) VALUES
('B001', 'bubuk choco melt cheese', '30', '2500', -49),
('B002', 'bubuk green tea orginal cheese', '30', '2500', -12),
('B003', 'bubuk hoki taro cheese', '30', '2500', 0),
('B004', 'bubuk folksblue cheese', '30', '2500', 27),
('B005', 'coffee highway cheese', '30', '2500', -4),
('B006', 'green pink cheese', '30', '2500', 0),
('B007', 'red velvet cheese', '30', '2500', 5),
('B008', 'original thaitea', '30', '2500', 0),
('B009', 'cream cheese', '10', '2500', 0),
('B010', 'sweet bubble', '', '2500', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE `coa` (
  `no_akun` char(20) NOT NULL,
  `nama_akun` varchar(20) DEFAULT NULL,
  `header_akun` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`no_akun`, `nama_akun`, `header_akun`) VALUES
('1', 'Harta', '1'),
('11', 'Harta Lancar', '1'),
('111', 'Kas', '11'),
('2', 'Kewajiban', '2'),
('3', 'Modal', '3'),
('4', 'Pendapatan', '4'),
('41', 'Pendapatan Usaha', '4'),
('411', 'Penjualan', '41'),
('412', 'Retur Penjualan', '41'),
('413', 'Potongan Penjualan', '41'),
('5', 'Beban', '5'),
('99', 'Kas kecil', '6');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `id_minum` varchar(6) DEFAULT NULL,
  `no_nota` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`id_minum`, `no_nota`, `jumlah`, `subtotal`) VALUES
('M005', 'N001', 10, 150000),
('M003', 'N002', 5, 100000),
('M002', 'N003', 20, 250000),
('M007', 'N004', 20, 200000),
('M008', 'N005', 10, 100000),
('M002', 'N006', 10, 130000),
('M001', 'N007', 10, 150000),
('M005', 'N008', 5, 100000),
('M003', 'N009', 20, 250000),
('M005', 'N001', 10, 150000),
('M003', 'N002', 5, 100000),
('M002', 'N003', 20, 250000),
('M007', 'N004', 20, 200000),
('M008', 'N005', 10, 100000),
('M002', 'N006', 10, 130000),
('M001', 'N007', 10, 150000),
('M005', 'N008', 5, 100000),
('M003', 'N009', 20, 250000),
('M005', 'N001', 10, 150000),
('M003', 'N002', 5, 100000),
('M002', 'N003', 20, 250000),
('M007', 'N004', 20, 200000),
('M008', 'N005', 10, 100000),
('M002', 'N006', 10, 130000),
('M001', 'N007', 10, 150000),
('M005', 'N008', 5, 100000),
('M003', 'N009', 20, 250000),
('M005', 'N001', 10, 150000),
('M003', 'N002', 5, 100000),
('M002', 'N003', 20, 250000),
('M007', 'N004', 20, 200000),
('M008', 'N005', 10, 100000),
('M002', 'N006', 10, 130000),
('M001', 'N007', 10, 150000),
('M005', 'N008', 5, 100000),
('M003', 'N009', 20, 250000),
('M001', 'N009', 4, 40000),
('M001', 'N009', 10, 100000),
('M001', 'N009', 1, 10000),
('M001', 'N010', 5, 50000),
('M001', 'N011', 2, 20000),
('M001', 'N012', 4, 40000),
('M001', 'N013', 5, 50000),
('M004', 'N019', 1, 50000),
('M006', 'N019', 5, 20000),
('M001', 'N020', 5, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_bahan_baku` varchar(30) DEFAULT NULL,
  `id_pembelian` varchar(30) DEFAULT NULL,
  `total_jumlah` varchar(30) DEFAULT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_bahan_baku`, `id_pembelian`, `total_jumlah`, `jumlah`) VALUES
('B001', 'X001', '75000', 0),
('B002', 'X002', '75000', 0),
('B003', 'X003', '75000', 0),
('B004', 'X004', '25000', 0),
('B005', 'X005', '25000', 0),
('B001', 'X001', '75000', 0),
('B002', 'X002', '75000', 0),
('B003', 'X003', '75000', 0),
('B004', 'X004', '25000', 0),
('B005', 'X005', '25000', 0),
('B004', '0', '5000', 2),
('B001', '0', '5000', 2),
('B004', 'X020', '7500', 3),
('B001', 'X020', '7500', 37),
('B001', 'X021', '125000', 50),
('B001', 'X001', '75000', 0),
('B002', 'X002', '75000', 0),
('B003', 'X003', '75000', 0),
('B004', 'X004', '25000', 0),
('B005', 'X005', '25000', 0),
('B001', 'X001', '75000', 0),
('B002', 'X002', '75000', 0),
('B003', 'X003', '75000', 0),
('B004', 'X004', '25000', 0),
('B005', 'X005', '25000', 0),
('B004', '0', '5000', 2),
('B001', '0', '5000', 2),
('B004', 'X020', '7500', 3),
('B001', 'X020', '7500', 37),
('B001', 'X021', '125000', 50),
('B007', 'X022', '12500', 5),
('B004', 'X023', '62500', 25);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `no_nota` varchar(20) DEFAULT NULL,
  `no_akun` char(20) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`no_nota`, `no_akun`, `nominal`) VALUES
('N001', '41', 150000),
('N002', '41', 100000),
('N003', '41', 250000),
('N004', '41', 200000),
('N005', '41', 100000),
('N007', '41', 150000),
('N008', '41', 100000),
('N009', '41', 250000),
('N001', '41', 150000),
('N002', '41', 100000),
('N003', '41', 250000),
('N004', '41', 200000),
('N005', '41', 100000),
('N007', '41', 150000),
('N008', '41', 100000),
('N009', '41', 250000),
('N001', '41', 150000),
('N002', '41', 100000),
('N003', '41', 250000),
('N004', '41', 200000),
('N005', '41', 100000),
('N007', '41', 150000),
('N008', '41', 100000),
('N009', '41', 250000),
('N001', '41', 150000),
('N002', '41', 100000),
('N003', '41', 250000),
('N004', '41', 200000),
('N005', '41', 100000),
('N007', '41', 150000),
('N008', '41', 100000),
('N009', '41', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(11) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('001', 'Minuman'),
('002', 'topping'),
('005', 'cemilan'),
('008', 'makanan'),
('009', 'makanan');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minum` varchar(6) NOT NULL,
  `nama_minum` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_kategori` char(11) DEFAULT NULL,
  `id_bahan_baku` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minum`, `nama_minum`, `harga`, `id_kategori`, `id_bahan_baku`) VALUES
('M001', 'choco melt cheese', 10000, '001', 'B001'),
('M002', 'green tea orginal ch', 10000, '001', 'B002'),
('M003', 'hoki taro cheese', 10000, '001', 'B003'),
('M004', 'folksblue cheese', 10000, '001', 'B004'),
('M005', 'coffee highway chees', 10000, '001', 'B005'),
('M006', 'green pink cheese', 10000, '001', 'B006');

-- --------------------------------------------------------

--
-- Table structure for table `nota_penjualan`
--

CREATE TABLE `nota_penjualan` (
  `no_nota` varchar(20) NOT NULL,
  `id_jual` char(10) NOT NULL,
  `tgl_jual` timestamp NULL DEFAULT current_timestamp(),
  `jumlah` int(10) NOT NULL,
  `total` varchar(30) DEFAULT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_penjualan`
--

INSERT INTO `nota_penjualan` (`no_nota`, `id_jual`, `tgl_jual`, `jumlah`, `total`, `id_pegawai`) VALUES
('N001', '', '2019-06-10 17:00:00', 0, '0', 'P001'),
('N002', '', '2019-09-10 17:00:00', 0, '100000', 'P005'),
('N003', '', '2019-10-10 17:00:00', 0, '250000', 'P003'),
('N004', '', '2019-11-11 17:00:00', 0, '200000', 'P007'),
('N005', '', '2019-12-11 17:00:00', 0, '100000', 'P002'),
('N006', '', '2019-12-11 17:00:00', 0, '130000', 'P006'),
('N007', '', '2019-06-11 17:00:00', 0, '150000', 'P001'),
('N008', '', '2019-09-11 17:00:00', 0, '100000', 'P005'),
('N009', '', '2019-10-09 17:00:00', 0, '250000', 'P003'),
('N010', 'PX008', '2020-03-17 00:47:25', 5, '50000', NULL),
('N011', 'PX009', '2020-03-17 00:48:13', 2, '20000', NULL),
('N012', 'PX010', '2020-03-17 00:49:03', 4, '40000', NULL),
('N013', 'PX011', '2020-03-17 00:51:20', 52, '520000', NULL),
('N014', 'PX012', '2020-03-17 08:23:50', 0, '0', NULL),
('N015', 'PX013', '2020-03-17 08:24:40', 0, '0', NULL),
('N016', 'PX014', '2020-03-17 08:33:38', 0, '0', NULL),
('N017', 'PX015', '2020-03-17 08:46:53', 0, '0', NULL),
('N019', 'PX017', '2020-03-17 08:53:00', 6, '60000', 'P001'),
('N020', 'PX016', '2020-03-17 09:15:06', 5, '50000', 'P001');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(20) NOT NULL,
  `nama_pegawai` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat`, `no_telp`) VALUES
('P001', 'nana', 'sukapura', '81234567'),
('P002', 'anisa', 'palem', '89876554'),
('P003', 'dewi', 'sukabirus', '863645698'),
('P004', 'nadiah', 'sukapura', '853285437'),
('P005', 'jihan', 'sukapura', '891234965'),
('P006', 'isal', 'sukabirus', '854965385');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(30) NOT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL,
  `kd_vendor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pegawai`, `kd_vendor`) VALUES
('X001', 'P001', 'V002'),
('X002', 'P003', 'V004'),
('X003', 'P005', 'V001'),
('X004', 'P004', 'V003'),
('X005', 'P007', 'V002'),
('X006', 'P001', 'V001'),
('X007', 'P001', 'V001'),
('X008', 'P001', 'V001'),
('X009', 'P001', 'V001'),
('X010', 'P001', 'V001'),
('X011', 'P001', 'V001'),
('X012', 'P001', 'V001'),
('X013', 'P001', 'V001'),
('X014', 'P001', 'V001'),
('X015', 'P001', 'V001'),
('X016', 'P001', 'V001'),
('X017', 'P001', 'V001'),
('X018', 'P001', 'V001'),
('X019', 'P001', 'V001'),
('X020', 'P001', 'V001'),
('X021', 'P001', 'V001'),
('X022', 'P001', 'V001'),
('X023', 'P001', 'V001');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` char(10) NOT NULL,
  `id_pegawai` char(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `id_pegawai`, `status`) VALUES
('PX001', 'P001', '1'),
('PX002', 'P001', '1'),
('PX003', 'P001', '1'),
('PX004', 'P001', '1'),
('PX005', 'P001', '1'),
('PX006', 'P001', '1'),
('PX007', 'P001', '1'),
('PX008', 'P001', '1'),
('PX009', 'P001', '1'),
('PX010', 'P001', '1'),
('PX011', 'P001', '1'),
('PX012', 'P001', '1'),
('PX013', 'P001', '1'),
('PX014', 'P001', '1'),
('PX015', 'P004', '1'),
('PX016', 'P001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `retur_pembelian`
--

CREATE TABLE `retur_pembelian` (
  `id_retur` varchar(20) NOT NULL,
  `tgl_retur` date DEFAULT NULL,
  `jumlah_retur` varchar(20) DEFAULT NULL,
  `id_pembelian` varchar(30) DEFAULT NULL,
  `id_bahan_baku` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur_pembelian`
--

INSERT INTO `retur_pembelian` (`id_retur`, `tgl_retur`, `jumlah_retur`, `id_pembelian`, `id_bahan_baku`) VALUES
('R001', '2019-11-11', '10', 'X001', 'B001'),
('R002', '2019-10-10', '20', 'X002', 'B002'),
('R003', '2019-10-09', '5', 'X003', 'B003'),
('R004', '2019-07-29', '10', 'X004', 'B004'),
('R005', '2019-04-14', '20', 'X005', 'B005'),
('R006', '2019-08-26', '5', 'X001', 'B001'),
('R007', '2020-03-17', '10', 'X001', 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `kd_vendor` varchar(20) NOT NULL,
  `nama_vendor` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`kd_vendor`, `nama_vendor`, `alamat`) VALUES
('V001', 'wina', 'palem'),
('V002', 'tasya', 'pbb'),
('V003', 'fatur', 'sukapura'),
('V004', 'ibnuuu', 'sukabirus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD KEY `fk_idminum` (`id_minum`),
  ADD KEY `no_nota` (`no_nota`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD KEY `fk_no` (`id_bahan_baku`),
  ADD KEY `fk_pembelian` (`id_pembelian`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD KEY `fk_nota` (`no_nota`),
  ADD KEY `fk_akun` (`no_akun`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minum`),
  ADD KEY `fk_kategori` (`id_kategori`),
  ADD KEY `fk_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD PRIMARY KEY (`no_nota`),
  ADD KEY `fk_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `kd_vendo` (`kd_vendor`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `fkid_pembelian` (`id_pembelian`),
  ADD KEY `fkbahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`kd_vendor`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `fk_akun` FOREIGN KEY (`no_akun`) REFERENCES `coa` (`no_akun`),
  ADD CONSTRAINT `fk_nota` FOREIGN KEY (`no_nota`) REFERENCES `nota_penjualan` (`no_nota`);

--
-- Constraints for table `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `fk_bahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
