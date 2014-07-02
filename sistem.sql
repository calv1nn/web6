-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2014 at 11:11 PM
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

--
-- Dumping data for table `balasan`
--

INSERT INTO `balasan` (`id_balasan`, `id_diskusi`, `penulis`, `isi`, `tanggal_balasan`) VALUES
(1, 1, 'Dwi Ari', 'oke. testing halaman diskusi.', '2014-06-27'),
(2, 1, 'Dwi Ari', 'ini di balas', '2014-06-28'),
(3, 1, 'Admin', 'ok', '2014-06-29');

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

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id`, `judul`, `penulis`, `isi`, `tanggal`) VALUES
(1, 'Testing Halaman Diskusi', 'Admin', 'Hai teman-teman mohon responnya ya.. :D', '2014-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(11) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nama_karyawan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `jabatan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `jumlah_pekerjaan` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `email`, `password`, `nama_karyawan`, `jabatan`, `jumlah_pekerjaan`, `status`) VALUES
('0001', 'admin@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', 'Admin', 0, 1),
('0057', 'calvin.bahal@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Calvin Bahal', 'Tim Teknis', 4, 1),
('0059', 'sunardo@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Sunardo Panjaitan', 'Tim Teknis', 0, 1),
('0098', 'dwi.ari@myindo.co.id', 'e10adc3949ba59abbe56e057f20f883e', 'Dwi Ari', 'Project Manager', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pekerjaan`, `nama_file`, `tanggal_upload`, `status_laporan`) VALUES
(1, 1, 'class.png', '2014-06-27', 1),
(2, 2, 'class1.png', '2014-06-28', 0);

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
(1, 57),
(2, 57),
(3, 57),
(4, 57);

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
  PRIMARY KEY (`kode_proyek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`kode_proyek`, `nama_proyek`, `start_date`, `end_date`, `client`, `progress`) VALUES
(1, 'Infrastruktur Kementrian ', '2014-06-23', '2014-08-30', 'KEMHAN', 13),
(2, 'Garuda Indonesia', '2014-06-30', '2014-08-21', 'Garuda', 100),
(3, 'Infra Baru', '2014-06-27', '2014-08-17', 'ABC', 0),
(4, 'Infra Test', '2014-06-05', '2014-07-01', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proyek_detail`
--

CREATE TABLE IF NOT EXISTS `proyek_detail` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_pekerjaan` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(20) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `proyek_detail`
--

INSERT INTO `proyek_detail` (`id_pekerjaan`, `kode_proyek`, `nik`, `nama_pekerjaan`, `start_date`, `end_date`, `progress`, `kategori`) VALUES
(1, 1, 57, 'Perakitan Server', '2014-06-27', '2014-06-30', 25, 'Perakitan'),
(2, 1, 98, 'Install Centos 6.4', '2014-06-30', '2014-07-03', 0, 'Instalasi'),
(3, 1, 57, 'OC', '2014-06-19', '2014-06-30', 0, 'Perakitan'),
(4, 2, 57, 'Install', '2014-06-26', '2014-07-09', 0, 'Install');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
