-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2014 at 09:19 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `balasan`
--

INSERT INTO `balasan` (`id_balasan`, `id_diskusi`, `penulis`, `isi`, `tanggal_balasan`) VALUES
(1, 0, 'Udin', 'okeokeoke', '2014-04-26'),
(2, 0, 'Udin', 'aa', '2014-04-26'),
(3, 14, 'Udin', 'bbbb', '2014-04-26'),
(4, 1, 'Udin', 'bbbb', '2014-05-15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id`, `judul`, `penulis`, `isi`, `tanggal`) VALUES
(1, 'HTML adalah', 'Dwi Wicaksono', '<strong style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;">HTML adalah, (HyperText Markup Language)</strong><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;"><span class="Apple-converted-space"> </span>sebuah bahasa standar yang digunakan oleh browser Internet untuk membuat halaman dan dokumen pada sebuah Web yang kemudian dapat diakses dan dibaca layaknya sebuah artikel. HTMLjuga dapat digunakan sebagai link link antara file-file dalam situs atau dalam komputer dengan menggunakan localhost, atau link yang menghubungkan antar situs dalam dunia internet.</span>', '2014-04-20'),
(14, 'Apa itu CSS ???', '2a', '<strong style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;">Cascading Style Sheet (CSS)</strong><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;"><span class="Apple-converted-space"> </span>merupakan salah satu bahasa pemrograman web&nbsp; untuk mengendalikan beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam. Sama halnya styles dalam aplikasi&nbsp; pengolahan kata seperti Microsoft Word yang dapat mengatur beberapa style, misalnya heading, subbab, bodytext, footer, images, dan style lainnya untuk dapat digunakan bersama-sama dalam beberapa file. Pada umumnya CSS dipakai untuk memformat tampilan halaman web yang dibuat dengan bahasa<span class="Apple-converted-space"> </span></span><a style="color: #000080; text-decoration: none; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" href="http://www.orange.web.id/2010/04/html-adalah.html">HTML</a><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;"><span class="Apple-converted-space"> </span>dan XHTML.</span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">CSS dapat mengendalikan ukuran gambar, warna body teks, warna tabel, ukuran border, warna border, warna hyperlink, warna mouse over, spasi antar paragraf, spasi antar teks, margin kiri/kanan/atas/bawah, dan parameter lainnya</span><strong style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;">.CSS adalah</strong><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;"><span class="Apple-converted-space"> </span>bahasa style sheet yang digunakan untuk mengatur tampilan dokument. Dengan adanya CSS memungkinkan kita untuk menampilkan halaman yang sama dengan format yang berbeda.</span>', '2014-04-23'),
(15, 'Tentang Javascript', 'mirip', '<span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript adalah bahasa scripting yang paling populer di internet dan bekerja pada banyak browser seperti Internet Explorer, Mozilla, Firefox, Netscape, Opera. JavaScript digunakan pada Web pages untuk meningkatkan design, validate forms, detect browsers, create cookies, GUI dsb.</span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">Java (dikembangkan oleh Sun Microsystems) adalah sebuah bahasa pemrograman yang powerful &amp; sangat kompleks – sama dengan C &amp; C++.</span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript dapat bereaksi terhadap events - JavaScript dapat di-set untuk menjalankan saat terjadi sesuatu, seperti sebuah page telah selesai dipanggil atau saat seorang user meng-klik pada&nbsp; HTML element<span class="Apple-converted-space"> </span></span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript dapat membaca dan menulis HTML elements - JavaScript dapat membaca dan mengubah isi dari HTML element<span class="Apple-converted-space"> </span></span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript dapat digunakan untuk mem-validasi data - JavaScript dapat digunakan untuk mem-validasi form data sebelum di-submitted ke server, hal ini akan mengamankan server dari pemrosesan extra<span class="Apple-converted-space"> </span></span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript dapat digunakan untuk mendeteksi browser&nbsp; pengunjung - JavaScript dapat digunakan untuk mendeteksi browser pengunjung dan – memanggil page lain yang secara specifik didesain untuk browser tersebut</span><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><br style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff;" /><span style="color: #444444; font-family: verdana,Tahoma,''Trebuchet MS'',sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 16px; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #ffffff; display: inline ! important; float: none;">JavaScript dapat digunakan untuk membuat cookies - JavaScript dapat digunakan untuk menyimpan dan memanggil informasi di komputer pengunjung.</span>', '2014-04-23'),
(16, 'Perbedaan antara Data Type Char dengan VarChar pada SQL', 'Saya sendiri', 'Pada SQL Server dikenal tipe data char dan varchar. Hal ini cukup banyak mengundang pertanyaan bagi para pemula yang sedang mempelajari SQL Server. Apa sih perbedaan diantara keduanya? <p class="MsoNormal" style="color: #660000; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 17.68px; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; text-align: justify; font-family: arial;"><span style="background-color: #ffffff;"><span style="font-size: 11px;"><br /></span></span></p> \n  <p class="MsoNormal" style="color: #660000; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 17.68px; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; text-align: justify; font-family: arial;"><span style="background-color: #ffffff;"><span style="font-size: 11px;">Silakan saja simak terus tulisan ini untuk mengetahui jawabannya.</span></span></p> \n  <p class="MsoNormal" style="color: #660000; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 17.68px; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; text-align: justify; font-family: arial;"><span style="background-color: #ffffff;"><span style="font-size: 11px;">Tipe data char adalah tipe data karakter yang panjangnya tetap (fixed-length). Ini artinya SQL Server akan mengalokasikan memori pada media penyimpanan untuk menyimpan tipe data ini sebesar ukuran maksimum yang kita minta. Contohnya deklarasi char(5) artinya SQL Server akan otomatis melakukan alokasi ukuran sebesar lima character pada media penyimpanan walaupun kita hanya mengisi data sebanyak tiga karakter misalnya.Tipe data varchar adalah tipe data karakter yang panjangnya tidak tetap (variable-length). Ini berarti SQL Server akan mengalokasikan memori pada media penyimpanan hanya sebesar atau sepanjang ukuran data aktual yang diisikan. Contohnya pada saat kita mendeklarasikan varchar(5) dan pada field tersebut kita isi 3 karakter maka pada media penyimpanan hanya akan dialokasikan sebesar 3 karakter saja.</span></span></p> \n  <p class="MsoNormal" style="color: #660000; font-size: 11px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 17.68px; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; text-align: justify; font-family: arial;"><span style="background-color: #ffffff;"><span style="font-size: 11px;">Dari sini kita bisa menentukan kapan harus menggunakan tipe data char atau varchar. Tipe data char digunakan pada field atau data yang sifat panjangnya tetap, misalnya seperti kode barang, kode item, kode customer dan lain lain yang panjangnya tetap. Sebaliknya Anda bisa menggunakan varchar untuk data atau field yang sifat panjangnya tidak tetap misalnya nama, alamat, kota, deskripsi dan lain sebagainya. Jadi pilihlah tipe data yang tepat pada saat Anda membuat field-field pada database Anda.</span></span></p> \n  <p class="MsoNormal" style="font-size: 11px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 17.68px; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; text-align: justify; font-family: arial; font-weight: bold; color: #ff0000;"><span style="background-color: #ffffff;"><span style="font-size: 11px;">Selamat Mencoba</span></span></p>', '2014-04-23'),
(18, 'Organisasi Internasional untuk Standardisasi', 'oke', 'Organisasi Internasional untuk Standardisasi (bahasa Inggris: International Organization for Standardization disingkat ISO atau Iso) adalah badan penetap standar internasional yang terdiri dari wakil-wakil dari badan standardisasi nasional setiap negara. Pada awalnya, singkatan dari nama lembaga tersebut adalah IOS, bukan ISO. Tetapi sekarang lebih sering memakai singkatan ISO, karena dalam bahasa Yunani isos berarti sama (equal). Penggunaan ini dapat dilihat pada kata isometrik atau isonomi.\n\nDidirikan pada 23 Februari 1947, ISO menetapkan standar-standar industrial dan komersial dunia. ISO, yang merupakan lembaga nirlaba internasional, pada awalnya dibentuk untuk membuat dan memperkenalkan standardisasi internasional untuk apa saja. Standar yang sudah kita kenal antara lain standar jenis film fotografi, ukuran kartu telepon, kartu ATM Bank, ukuran dan ketebalan kertas dan lainnya. Dalam menetapkan suatu standar tersebut mereka mengundang wakil anggotanya dari 130 negara untuk duduk dalam Komite Teknis (TC), Sub Komite (SC) dan Kelompok Kerja (WG).\n\nMeski ISO adalah organisasi nonpemerintah, kemampuannya untuk menetapkan standar yang sering menjadi hukum melalui persetujuan atau standar nasional membuatnya lebih berpengaruh daripada kebanyakan organisasi non-pemerintah lainnya, dan dalam prakteknya ISO menjadi konsorsium dengan hubungan yang kuat dengan pihak-pihak pemerintah. Peserta ISO termasuk satu badan standar nasional dari setiap negara dan perusahaan-perusahaan besar.\n\nISO bekerja sama dengan Komisi Elektroteknik Internasional (IEC) yang bertanggung jawab terhadap standardisasi peralatan elektronik.\n', '2014-04-23'),
(21, 'aaaaa', 'Udin', 'aoke', '2014-04-26'),
(22, 'Udin', 'asaaaaaaaaaaa', '0', '2014-04-26'),
(23, 'Udin', 'aaaaa', '0', '2014-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE IF NOT EXISTS `dokumentasi` (
  `id` int(11) NOT NULL,
  `kode_proyek` int(11) NOT NULL,
  `nama_dokumentasi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` int(11) NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `nama_karyawan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `jabatan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `email`, `password`, `nama_karyawan`, `jabatan`, `status`) VALUES
(7, 'dian@cahyo.com', '12345', 'Dian', 'Tim Teknis', 1),
(23, 'web@mail.com', '1234', 'Saya', 'Bussiness Project Manager', 0),
(232, 'fine_day@rocketmail.com', '123', 'aaa', 'Project Manager', 1),
(234, 'admin@test.com', '1231231232', 'Udin', 'BO', 0),
(2333, 'saya@sadsd.cpom', '3424324324', 'sayasusussuus', '', 1),
(3333, 'test@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Saya', 'Project Manager', 1),
(3434, 'calvin.bahal@gmail.com', '123', 'abab', 'Bussiness Development Man', 1),
(4444, 'sds@sdad', '3424324324', 'rrrrr', 'ewfewfew', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(11) NOT NULL,
  `kode_proyek` int(11) NOT NULL,
  `nama_file` varchar(30) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `load_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `load_pekerjaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `progress_per_proyek` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE IF NOT EXISTS `proyek` (
  `kode_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `client` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`kode_proyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proyek_detail`
--

CREATE TABLE IF NOT EXISTS `proyek_detail` (
  `id_pekerjaan` int(11) NOT NULL,
  `kode_proyek` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_pekerjaan` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
