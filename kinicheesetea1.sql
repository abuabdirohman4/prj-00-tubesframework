-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 11:00 AM
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
('B001', 'bubuk choco melt cheese', '30', '2500', 0),
('B002', 'bubuk green tea orginal cheese', '30', '2500', 0),
('B003', 'bubuk hoki taro cheese', '30', '2500', 0),
('B004', 'bubuk folksblue cheese', '30', '2500', 0),
('B005', 'coffee highway cheese', '30', '2500', 0),
('B006', 'green pink cheese', '30', '2500', 0),
('B007', 'red velvet cheese', '30', '2500', 0),
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
('M003', 'N009', 20, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_bahan_baku` varchar(30) DEFAULT NULL,
  `id_pembelian` varchar(30) DEFAULT NULL,
  `total_jumlah` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_bahan_baku`, `id_pembelian`, `total_jumlah`) VALUES
('B001', 'X001', '75000'),
('B002', 'X002', '75000'),
('B003', 'X003', '75000'),
('B004', 'X004', '25000'),
('B005', 'X005', '25000'),
('B001', 'X001', '75000'),
('B002', 'X002', '75000'),
('B003', 'X003', '75000'),
('B004', 'X004', '25000'),
('B005', 'X005', '25000');

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
  `tgl_jual` date DEFAULT NULL,
  `total` varchar(30) DEFAULT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_penjualan`
--

INSERT INTO `nota_penjualan` (`no_nota`, `tgl_jual`, `total`, `id_pegawai`) VALUES
('N001', '2019-06-11', '150000', 'P001'),
('N002', '2019-09-11', '100000', 'P005'),
('N003', '2019-10-11', '250000', 'P003'),
('N004', '2019-11-12', '200000', 'P007'),
('N005', '2019-12-12', '100000', 'P002'),
('N006', '2019-12-12', '130000', 'P006'),
('N007', '2019-06-12', '150000', 'P001'),
('N008', '2019-09-12', '100000', 'P005'),
('N009', '2019-10-10', '250000', 'P003');

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
  `id_bahan_baku` varchar(20) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_pegawai` varchar(20) DEFAULT NULL,
  `kd_vendor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_bahan_baku`, `jumlah`, `id_pegawai`, `kd_vendor`) VALUES
('X001', 'B001', 30, 'P001', 'V002'),
('X002', 'B002', 30, 'P003', 'V004'),
('X003', 'B001', 30, 'P005', 'V001'),
('X004', 'B003', 10, 'P004', 'V003'),
('X005', 'B004', 10, 'P007', 'V002'),
('X006', 'B001', 12, 'P001', 'V001'),
('X007', 'B001', 16, 'P001', 'V001');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` char(10) NOT NULL,
  `id_pegawai` int(20) NOT NULL,
  `tgl_jual` date NOT NULL,
  `nama_minum` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `no_nota` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('R006', '2019-08-26', '5', 'X001', 'B001');

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
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `pembelian_ibf_3` (`id_bahan_baku`);

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
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`no_nota`) REFERENCES `nota_penjualan` (`no_nota`),
  ADD CONSTRAINT `fk_idminum` FOREIGN KEY (`id_minum`) REFERENCES `minuman` (`id_minum`);

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_no` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `fk_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);

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

--
-- Constraints for table `nota_penjualan`
--
ALTER TABLE `nota_penjualan`
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibf_3` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kd_vendor`) REFERENCES `vendor` (`kd_vendor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `retur_pembelian`
--
ALTER TABLE `retur_pembelian`
  ADD CONSTRAINT `fkbahan_baku` FOREIGN KEY (`id_bahan_baku`) REFERENCES `bahan_baku` (`id_bahan_baku`),
  ADD CONSTRAINT `fkid_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
