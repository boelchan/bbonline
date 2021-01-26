-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2015 pada 18.00
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bbonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
`ID_D` int(11) NOT NULL,
  `ID_T` int(11) DEFAULT NULL,
  `ID_P` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `TOTAL_D` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`ID_D`, `ID_T`, `ID_P`, `JUMLAH`, `TOTAL_D`) VALUES
(75, 32, 3, 4, 8000),
(76, 32, 9, 4, 17372),
(79, 33, 5, 6, 120000),
(80, 33, 9, 5, 75000),
(82, 33, 3, 6, 12000),
(83, 34, 5, 3, 60000),
(84, 34, 9, 4, 60000),
(85, 35, 6, 3, 180000),
(86, 35, 1, 4, 4000),
(87, 35, 9, 7, 105000),
(88, 35, 9, 3, 45000),
(89, 35, 9, 5, 75000),
(90, 35, 3, 4, 8000),
(91, 36, 5, 4, 80000),
(92, 37, 5, 7, 140000),
(93, 37, 6, 5, 300000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_info`
--

CREATE TABLE IF NOT EXISTS `tb_info` (
`ID_INFO` int(11) NOT NULL,
  `JUDUL` varchar(50) DEFAULT NULL,
  `ISI` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tb_info`
--

INSERT INTO `tb_info` (`ID_INFO`, `JUDUL`, `ISI`) VALUES
(6, 'rotifdf', 'fksjdkfjsdbfjbsjnslkdvkldfdfd'),
(7, 'kayu', 'kayuu keren'),
(8, 'hsakh', 'jhjkhfjkahdklhlkasdhgkhd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
`ID_J` int(11) NOT NULL,
  `NAMA_J` varchar(40) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`ID_J`, `NAMA_J`) VALUES
(1, 'bangunan'),
(2, 'Kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
`ID_P` int(11) NOT NULL,
  `ID_J` int(11) DEFAULT NULL,
  `NAMA_P` varchar(50) DEFAULT NULL,
  `KETERANGAN_P` text,
  `GAMBAR_P` varchar(50) DEFAULT NULL,
  `HARGA_P` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`ID_P`, `ID_J`, `NAMA_P`, `KETERANGAN_P`, `GAMBAR_P`, `HARGA_P`) VALUES
(1, 1, 'Roti Pisang Keju', 'pisang molen', '20150826082053nice.jpg', 1000),
(3, 1, 'Donat', 'bundar enak rasanya', '20150826082105nice.jpg', 2000),
(5, 2, 'Kayu Jati Balok', '@10m 20x15', '20150309032805images(20).jpg', 20000),
(6, 1, 'keramik Cina', 'keramik', '20150309032517keramik.jpg', 60000),
(9, 1, 'Pasir Hitam', 'kldj', '20150309032355pasirhitam.jpg', 15000),
(11, 1, 'Semen Tiga Roda', 'Semen Tiga Roda', '20150309032206semen.jpg', 65000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
`ID_T` int(11) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `TGL_T` datetime DEFAULT NULL,
  `TOTAL_T` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL,
  `an` varchar(50) DEFAULT NULL,
  `bayar` varchar(50) DEFAULT NULL,
  `status_pengiriman` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`ID_T`, `USERNAME`, `TGL_T`, `TOTAL_T`, `STATUS`, `lokasi`, `norek`, `an`, `bayar`, `status_pengiriman`) VALUES
(32, 'c', '2015-06-05 05:44:36', 25372, 1, 'Pamekasan', '874827348728479', 'yuliana', 'Lunas', 'Dikirim'),
(33, 'c', '2015-06-05 05:56:31', 207000, 1, 'Balik Papan', '4783274873472', 'Yulianti', 'Lunas', 'Dikirim'),
(34, 'c', '2015-06-09 04:05:04', 120000, 1, 'Jakarta Selatan Jl Imambonjol No 90', '7678676788', 'aziz boy', '', 'Belum Dikirim'),
(35, 'c', '2015-06-09 09:51:57', 417000, 1, 'Jakarta Selatan Jl Imambonjol No 90 RT/RW=002/002', '787878797897', 'Yulianti', '', 'Belum Dikirim'),
(36, 'c', '2015-06-09 10:05:50', 80000, 1, 'Jakarta Selatan Jl Imambonjol No 90 RT/RW=002/002', '4783274873472', 'Yulianti', '', 'Belum Dikirim'),
(37, 'c', '2015-06-09 14:51:06', 440000, 1, 'rfr', '6565656', 'hjhhj', 'Lunas', 'Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `NAMA` varchar(30) DEFAULT NULL,
  `TMP_LAHIR` varchar(30) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `JK` char(1) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `KOTA` varchar(20) DEFAULT NULL,
  `LEVEL` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`USERNAME`, `PASSWORD`, `NAMA`, `TMP_LAHIR`, `TGL_LAHIR`, `JK`, `ALAMAT`, `KOTA`, `LEVEL`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'pamekasan', '1993-07-16', '1', 'sersan mesrul', 'pamekasan', 'karyawan'),
('c', '4a8a08f09d37b73795649038408b5f33', 'yuli', 'Pamekasan', '2013-12-27', '2', 'c', 'c', 'member'),
('jhjh', '453046a5e7e9cae0ab1cd1a82789548d', 'jhjh', 'hjhj', '0000-00-00', '1', 'ghgh', 'ghh', 'member'),
('jsdkfhjkfh', '7c6b9260c9ff44cbca7634657fc9aae4', 'jhsjfkh', 'jshdjfh', '1900-01-01', '2', 'ddsjhjkfh', 'sddhfkjh', 'member'),
('kjkj', 'a67ef84afbf01ea3d84adda4fabc4adc', 'kjkjk', 'kjkj', '1900-01-01', '2', 'jhjkhk', 'jhk', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
 ADD PRIMARY KEY (`ID_D`), ADD KEY `FK_REFERENCE_2` (`ID_T`), ADD KEY `FK_REFERENCE_3` (`ID_P`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
 ADD PRIMARY KEY (`ID_INFO`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
 ADD PRIMARY KEY (`ID_J`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
 ADD PRIMARY KEY (`ID_P`), ADD KEY `FK_REFERENCE_1` (`ID_J`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
 ADD PRIMARY KEY (`ID_T`), ADD KEY `FK_REFERENCE_4` (`USERNAME`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
MODIFY `ID_D` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
MODIFY `ID_INFO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
MODIFY `ID_J` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
MODIFY `ID_P` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
MODIFY `ID_T` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_T`) REFERENCES `tb_transaksi` (`ID_T`),
ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_P`) REFERENCES `tb_produk` (`ID_P`);

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_J`) REFERENCES `tb_jenis` (`ID_J`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`USERNAME`) REFERENCES `tb_user` (`USERNAME`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
