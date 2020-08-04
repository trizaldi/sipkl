-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 05:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_matkul`
--

CREATE TABLE `tm_matkul` (
  `kode_matkul` varchar(7) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `id_prodi` tinyint(3) NOT NULL,
  `stat` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_matkul`
--

INSERT INTO `tm_matkul` (`kode_matkul`, `nama_matkul`, `id_prodi`, `stat`) VALUES
('MIF1601', 'Pendidikan Agama', 15, '2'),
('MIF1602', 'Bahasa Indonesia', 15, '2'),
('MIF1603', 'Basic English', 15, '2'),
('MIF1604', 'Dasar Manajemen', 15, '2'),
('MIF1605', 'Pengantar Teknologi Informasi', 15, '2'),
('MIF1606', 'Matematika Diskrit', 15, '2'),
('MIF1607', 'Algoritma dan Pemrograman', 15, '2'),
('MIF1608', 'Pengantar Basis Data dan Aljab', 15, '2'),
('MIF1609', 'Agroinformatika', 15, '2'),
('MIF2601', 'Pancasila', 15, '2'),
('MIF2602', 'Pendidikan Kewarganegaraan', 15, '2'),
('MIF2603', 'Komputer dasar', 15, '2'),
('MIF2604', 'Pemrograman Berorientasi Objek', 15, '2'),
('MIF2605', 'Basis Data Relasional', 15, '2'),
('MIF2606', 'Analisis dan Desain Sistem Inf', 15, '2'),
('MIF2607', 'Struktur Data', 15, '2'),
('MIF2608', 'Pemrograman Berbasis Desktop', 15, '2'),
('MIF2609', 'Jaringan Komputer', 15, '2'),
('MIF3601', 'Applied English', 15, '2'),
('MIF3602', 'Kewirausahaan', 15, '2'),
('MIF3603', 'Pemrograman Web ', 15, '2'),
('MIF3604', 'Interaksi Manusia dan Komputer', 15, '2'),
('MIF3605', 'Sistem Pendukung Keputusan', 15, '2'),
('MIF3606', 'Sistem Basis Data', 15, '2'),
('MIF3607', 'Rekayasa Perangkat Lunak', 15, '2'),
('MIF3608', 'Sistem Operasi', 15, '2'),
('MIF4601', 'Teknik Penulisan Ilmiah', 15, '2'),
('MIF4602', 'Sistem Informasi Geografis', 15, '2'),
('MIF4603', 'Pemrograman Web Framework', 15, '2'),
('MIF4604', 'Aplikasi Mobile', 15, '2'),
('MIF4605', 'Manajemen Basis Data', 15, '2'),
('MIF4606', 'Kecerdasan Buatan', 15, '2'),
('MIF4607', 'Datawarehouse', 15, '2'),
('TIF1601', 'Pancasila', 17, '2'),
('TIF1602', 'Pendidikan Kewarganegaraan', 17, '2'),
('TIF1603', 'Logika Algoritma', 17, '2'),
('TIF1604', 'Pemrograman Dasar', 17, '2'),
('TIF1605', 'Sistem Operasi', 17, '2'),
('TIF1606', 'Konsep Jaringan Komputer', 17, '2'),
('TIF1607', 'Workshop Dasar Sistem Informasi', 17, '2'),
('TIF1608', 'Workshop Komputer Dasar', 17, '2'),
('TIF2601', 'Pendidikan Agama', 17, '2'),
('TIF2602', 'Bahasa Indonesia', 17, '2'),
('TIF2603', 'Basic English', 17, '2'),
('TIF2604', 'Komputer', 17, '2'),
('TIF2605', 'Matematika Diskrit', 17, '2'),
('TIF2606', 'Sistem Aplikasi Berbasis obyek', 17, '2'),
('TIF2607', 'Struktur Data', 17, '2'),
('TIF2608', 'Konsep Basis Data', 17, '2'),
('TIF2609', 'Workshop Sistem Informasi Berbasis Dekstop', 17, '2'),
('TIF3601', 'Statistika', 17, '2'),
('TIF3602', 'Analisis dan Desain Algoritma', 17, '2'),
('TIF3603', 'Manajemen Basis Data', 17, '2'),
('TIF3604', 'Interaksi Manusia dan Komputer', 17, '2'),
('TIF3605', 'Pemodelan Sistem Informasi', 17, '2'),
('TIF3606', 'Workshop Pengembangan Perangkat Lunak', 17, '2'),
('TIF3607', 'Workshop Sistem Informasi Berbasis Web', 17, '2'),
('TIF4601', 'Applied English', 17, '2'),
('TIF4602', 'Kewirausahaan', 17, '2'),
('TIF4603', 'Administrasi Basis Data', 17, '2'),
('TIF4604', 'Perawatan Perangkat Lunak', 17, '2'),
('TIF4606', 'Sistem Informasi Jasa Berbasis Layanan', 17, '2'),
('TIF4607', 'Workshop Aplikasi Mobile', 17, '2'),
('TIF4608', 'Workshop WEB Frame Work', 17, '2'),
('TIF5601', 'Data warehouse', 17, '2'),
('TIF5602', 'Komputasi Awan', 17, '2'),
('TIF5603', 'Manajemen Kualitas Perangkat Lunak', 17, '2'),
('TIF5604', 'Manajemen Proyek', 17, '2'),
('TIF5605', 'Pengujian Perangkat Lunak', 17, '2'),
('TIF5606', 'Sistem Informasi Geografis', 17, '2'),
('TIF5607', 'Etika Bisnis', 17, '2'),
('TIF5608', 'Keamanan Sistem Komputer', 17, '2'),
('TIF5609', 'Proyek Sistem Informasi', 17, '2'),
('TIF6601', 'Teknik Penulisan Ilmiah', 17, '2'),
('TIF6602', 'Agro Informatika', 17, '2'),
('TIF6603', 'Organisasi dan Arsitektur Komputer', 17, '2'),
('TIF6604', 'Pengolahan Citra dan Vision', 17, '2'),
('TIF6605', 'Sistem Cerdas', 17, '2'),
('TIF6607', 'Workshop Sistem Cerdas', 17, '2'),
('TIF6608', 'Workshop Sistem Tertanam', 17, '2'),
('TKK1601', 'PENDIDIKAN AGAMA', 16, '2'),
('TKK1602', 'BAHASA INDONESIA', 16, '2'),
('TKK1603', 'BASIC ENGLISH', 16, '2'),
('TKK1604', 'KOMPUTER DASAR', 16, '2'),
('TKK1605', 'MATEMATIKA TEKNIK', 16, '2'),
('TKK1606', 'ELEKTRONIKA', 16, '2'),
('TKK1607', 'PEMROGRAMAN DASAR', 16, '2'),
('TKK2601', 'PANCASILA', 16, '2'),
('TKK2602', 'PENDIDIKAN KEWARGANEGARAAN', 16, '2'),
('TKK2603', 'PEMROGRAMAN LANJUT', 16, '2'),
('TKK2604', 'ELEKTRONIKA', 16, '2'),
('TKK2605', 'PERANCANGAN PERANGKAT KERAS', 16, '2'),
('TKK2606', 'JARINGAN KOMPUTER', 16, '2'),
('TKK2607', 'FISIKA TEKNIK', 16, '2'),
('TKK3601', 'APPLIED ENGLISH', 16, '2'),
('TKK3602', 'KEWIRAUSAHAAN', 16, '2'),
('TKK3603', 'SENSOR DAN TRANSDUCER', 16, '2'),
('TKK3604', 'MIKROKOMPUTER', 16, '2'),
('TKK3605', 'JARINGAN KOMPUTER', 16, '2'),
('TKK3606', 'APLIKASI MOBILE', 16, '2'),
('TKK4601', 'ETIKA PROFESI', 16, '2'),
('TKK4602', 'TEKNIK PENULISAN ILMIAH', 16, '2'),
('TKK4603', 'MANAJEMEN JARINGAN KOMPUTER', 16, '2'),
('TKK4604', 'TEKNIK ANTARMUKA', 16, '2'),
('TKK4605', 'ROBOTIKA', 16, '2'),
('TKK4606', 'INTERNET OF THINGS', 16, '2'),
('TKK4607', 'PENGOLAHAN CITRA DIGITAL', 16, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_matkul`
--
ALTER TABLE `tm_matkul`
  ADD PRIMARY KEY (`kode_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
