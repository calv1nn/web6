-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2014 at 01:07 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistem`
--

-- --------------------------------------------------------

--
-- Table structure for table `balasan`
--

CREATE TABLE IF NOT EXISTS `balasan` (
  `id_balasan` int(11) NOT NULL AUTO_INCREMENT,
  `id_diskusi` int(11) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_balasan` date NOT NULL,
  PRIMARY KEY (`id_balasan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE IF NOT EXISTS `diskusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tanggal` (`tanggal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `jenis_pekerjaan` (
  `id` int(11) NOT NULL,
  `desc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id`, `desc`) VALUES
(1, 'Perakitan'),
(2, 'Instalasi'),
(3, 'Konfigurasi'),
(4, 'Quality Control');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(11) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nama_karyawan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `peran` varchar(25) CHARACTER SET utf8 NOT NULL,
  `jumlah_pekerjaan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `email`, `password`, `nama_karyawan`, `peran`, `jumlah_pekerjaan`, `status`) VALUES
('0001', 'admin@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Admin', 0, 1),
('0010', 'dema.wiguna@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Dema Wiguna', 'Tim Teknis', 1, 1),
('0012', 'bambang@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Bambang Wicaksono', 'Project Manager', 0, 1),
('0014', 'deni@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Deni Permana', 'Tim Teknis', 0, 0),
('0019', 'yongky@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Yongky Harimurti', 'Tim Teknis', 2, 1),
('0033', 'bayu.nugraha@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Bayu Nugraha', 'Tim Teknis', 0, 0),
('0034', 'gilang@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Taufan Gilang', 'Project Manager', 0, 1),
('0051', 'rezza@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Rezza Ramadhan', 'Tim Teknis', 2, 1),
('0057', 'calvin.bahal@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Calvin Bahal', 'Tim Teknis', 1, 1),
('0059', 'sunardo@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Sunardo Panjaitan', 'Tim Teknis', 1, 1),
('0060', 'doddy.sinaga@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Doddy Sumando', 'Tim Teknis', 1, 1),
('0098', 'dwi.ari@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Dwi Ari', 'Project Manager', 0, 1),
('0101', 'zenzen@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Zenzen Jatnika', 'Tim Teknis', 1, 1),
('1111', 'dwi.ari2@myindo.co.id', '4297f44b13955235245b2497399d7a93', 'a', 'Bussiness Project Manager', 0, 1),
('123456789', 'superman@superman.com', '55a764b0c89d72de5c5d02bd58b11723', 'superman', 'Project Manager', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pekerjaan` int(11) NOT NULL,
  `nama_file` varchar(30) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `status_laporan` int(1) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pekerjaan`, `nama_file`, `tanggal_upload`, `status_laporan`) VALUES
(4, 43, 'format_laporan2.xlsx', '2014-08-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `load_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `load_pekerjaan` (
  `kode_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  PRIMARY KEY (`kode_proyek`,`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_pekerjaan`
--

INSERT INTO `load_pekerjaan` (`kode_proyek`, `nik`) VALUES
(7, 10),
(7, 19),
(7, 51),
(9, 19),
(9, 51),
(9, 57),
(9, 59),
(9, 60),
(9, 101);

-- --------------------------------------------------------

--
-- Table structure for table `load_pekerjaan_detail`
--

CREATE TABLE IF NOT EXISTS `load_pekerjaan_detail` (
  `id_pekerjaan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `jam` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_pekerjaan_detail`
--

INSERT INTO `load_pekerjaan_detail` (`id_pekerjaan`, `nik`, `jam`) VALUES
(42, 10, 2),
(42, 19, 0),
(42, 51, 2),
(44, 19, 0),
(44, 51, 4),
(44, 57, 4),
(44, 59, 4),
(44, 60, 0),
(44, 101, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE IF NOT EXISTS `proyek` (
  `kode_proyek` int(11) NOT NULL AUTO_INCREMENT,
  `nama_proyek` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client` varchar(25) NOT NULL,
  `progress` int(11) NOT NULL,
  `nik_proyek_manager` varchar(11) NOT NULL,
  PRIMARY KEY (`kode_proyek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`kode_proyek`, `nama_proyek`, `start_date`, `end_date`, `client`, `progress`, `nik_proyek_manager`) VALUES
(7, 'test', '2014-08-11', '2014-08-17', 'pt.test', 0, '123456789'),
(8, 'test2', '2014-08-26', '2014-09-04', 'test 2', 0, '123456789'),
(9, 'Proyek ABCD', '2014-08-11', '2014-08-31', 'PT AAA', 20, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_detail`
--

CREATE TABLE IF NOT EXISTS `proyek_detail` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_pekerjaan` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(20) NOT NULL,
  `jam` int(11) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `proyek_detail`
--

INSERT INTO `proyek_detail` (`id_pekerjaan`, `kode_proyek`, `nik`, `nama_pekerjaan`, `start_date`, `end_date`, `progress`, `jam`, `keterangan`) VALUES
(42, 7, 10, 'test', '2014-08-10', '2014-08-13', 0, 2, 'test'),
(43, 9, 59, 'Perakitan', '2014-08-11', '2014-08-15', 100, 4, 'instal apa kek'),
(44, 9, 60, 'Instalasi', '2014-08-17', '2014-08-20', 0, 4, 'aaa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
