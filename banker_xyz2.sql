-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Apr 2016 pada 00.44
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banker_xyz2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nama_usr` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nama_usr`, `pass`) VALUES
(1, 'fadqur', 'fad', '901695fb1e54f4a451ba70a6e45d9d8d');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `NIK` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `NmUser` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(11) NOT NULL,
  PRIMARY KEY (`NIK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `nama`, `NmUser`, `pass`, `alamat`, `telepon`) VALUES
(1, 'fadqurro', 'fad', '901695fb1e54f4a451ba70a6e45d9d8d', 'rumah allah', 12345),
(2, 'assaniatul fitriah', 'pipit', '5c40ee0ae05c339a9f8502d29a49541d', 'gatak', 9876);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) NOT NULL,
  `IdType` varchar(10) NOT NULL,
  `IdPemilik` int(11) NOT NULL,
  `StatusRental` enum('Kosong','dipesan','Jalan') NOT NULL,
  `HargaSewa` int(11) NOT NULL,
  `FotoMobil` varchar(100) NOT NULL,
  `JmlSewa` int(11) NOT NULL,
  PRIMARY KEY (`NoPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`NoPlat`, `KdMerk`, `IdType`, `IdPemilik`, `StatusRental`, `HargaSewa`, `FotoMobil`, `JmlSewa`) VALUES
('AB 0909 AG', 'tyt', 'EV_GMT', 1, 'dipesan', 24000, 'Etios Valco G MT.jpg', 1),
('AB 0987 SS', 'hnd', 'BS_EAT', 2, 'Kosong', 50000, 'Brio Sports E AT.jpg', 1),
('AB 1235 AF', 'hnd', 'V_GAT', 1, 'Kosong', 40000, 'Vios 1.5 G AT white.jpg', 0),
('AB 2424 UU', 'dht', 'B_EAT', 1, 'Kosong', 25000, 'Brio 1.3 E AT.jpg', 3),
('AB 4545 CI', 'hnd', 'CMRY', 2, 'Kosong', 26000, 'Camry 2.5 Hybrid.jpg', 1),
('AB 9696 CS', 'dht', 'ODY', 1, 'Kosong', 28000, 'Brio 1.3 E AT.jpg', 0),
('AB1234KK', 'dht', 'T_TXAT', 1, 'dipesan', 2000000, 'Terios TX AT.jpg', 2),
('AB3232FF', 'tyt', 'C_RS', 2, 'dipesan', 2200000, 'Crown 3.0 Royal Saloon.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) NOT NULL,
  PRIMARY KEY (`KdMerk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`KdMerk`, `NmMerk`) VALUES
('dht', 'Daihatsu'),
('hnd', 'Honda'),
('tyt', 'Toyota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `IdPelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `NmPelanggan` varchar(50) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`IdPelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NmPelanggan`, `nama_user`, `pass`, `alamat`, `telepon`) VALUES
(2, 'fadqur', 'fitri', '534a0b7aa872ad1340d0071cbfa38697', 'Payaman utara', '123456'),
(3, 'Natika', 'Natika20092013', 'bb8bb312b4767602c95cbfdb688d2bdb', 'Hati kita berdua', '09868976767'),
(5, 'komit', 'ommy', '579f0413883dd33c13d0c65c0b7def06', 'karang tengah', '12345'),
(6, 'febri B', 'feb', 'd7b85f12bdf36266db695411a654f73f', 'karang', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE IF NOT EXISTS `pemilik` (
  `IdPemilik` int(11) NOT NULL AUTO_INCREMENT,
  `NmPemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(20) NOT NULL,
  PRIMARY KEY (`IdPemilik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`IdPemilik`, `NmPemilik`, `alamat`, `telpon`) VALUES
(1, 'Fadqur', 'rumah allah', '123456'),
(2, 'fitri', 'gatak', '098765');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE IF NOT EXISTS `sopir` (
  `IdSopir` int(11) NOT NULL AUTO_INCREMENT,
  `NmSopir` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `NoSim` int(20) NOT NULL,
  `TarifPerhari` int(11) NOT NULL,
  PRIMARY KEY (`IdSopir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`IdSopir`, `NmSopir`, `alamat`, `telepon`, `NoSim`, `TarifPerhari`) VALUES
(1, 'febri', 'karang tengah', '123456', 9876, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `NoTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` int(11) NOT NULL,
  `IdPelanggan` int(11) NOT NULL,
  `NoPlat` varchar(10) NOT NULL,
  `TglPesan` date NOT NULL,
  `TglPinjam` date NOT NULL,
  `JamPinjam` time NOT NULL,
  `TglKembaliRencana` date NOT NULL,
  `JamKembaliRencana` time NOT NULL,
  `TglKembaliReal` date NOT NULL,
  `JamKembaliReal` time NOT NULL,
  `Kerusakan` text NOT NULL,
  `Denda` int(11) NOT NULL,
  `BiayaKerusakan` int(11) NOT NULL,
  `BiayaBBM` int(11) NOT NULL,
  `IdSopir` int(11) NOT NULL,
  `BiayaSopir` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `status` enum('pending','real') NOT NULL,
  `new` int(11) NOT NULL,
  PRIMARY KEY (`NoTransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`NoTransaksi`, `NIK`, `IdPelanggan`, `NoPlat`, `TglPesan`, `TglPinjam`, `JamPinjam`, `TglKembaliRencana`, `JamKembaliRencana`, `TglKembaliReal`, `JamKembaliReal`, `Kerusakan`, `Denda`, `BiayaKerusakan`, `BiayaBBM`, `IdSopir`, `BiayaSopir`, `Total`, `status`, `new`) VALUES
(1, 1, 2, 'AB1234KK', '2016-02-15', '2016-02-16', '14:33:00', '2016-02-29', '00:00:00', '2016-03-02', '14:35:00', '', 20000, 0, 3000, 1, 20000, 283000, 'real', 1),
(2, 2, 3, 'AB3232FF', '2016-05-02', '2016-05-02', '08:00:00', '2016-05-05', '08:00:00', '2016-05-04', '00:00:00', '', 10000, 0, 5000, 1, 20000, 75000, 'pending', 0),
(3, 1, 5, 'AB 0909 AG', '2016-02-28', '2016-02-29', '08:00:00', '2016-03-03', '08:00:00', '0000-00-00', '00:00:00', '', 0, 0, 0, 1, 20000, 132000, 'pending', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) NOT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`IdType`, `NmType`) VALUES
('BS_EAT', 'Brio Sports E AT'),
('B_EAT', 'Brio 1.3 E AT'),
('CMRY', 'Camry 2.5 Hybrid'),
('C_RS', 'Crown 3.0 Royal Saloon'),
('EV_GMT', 'Etios Valco G MT'),
('ODY', 'Odyssey 2.4L'),
('PH_AT', 'Prius Hybrid 1.8 AT'),
('SMND', 'Sirion Minor Change D DRIFT AT'),
('T_TXAT', 'Terios TX AT'),
('V_GAT', 'Vios 1.5 G AT white');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
