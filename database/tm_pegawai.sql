-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 10:39 AM
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
-- Table structure for table `tm_pegawai`
--

INSERT INTO `tm_level` (`id_level`, `level`) VALUES ('6', 'dosen');

ALTER TABLE `tm_pegawai` DROP `gelar`;
ALTER TABLE `tm_pegawai` ADD `gelar_depan` VARCHAR(5) NULL AFTER `nama_pegawai`, ADD `gelar_belakang` VARCHAR(20) NULL AFTER `gelar_depan`;

--CREATE TABLE `tm_pegawai` (
--`NIP` varchar(15) NOT NULL,
--`nama_pegawai` varchar(50) NOT NULL,
--`gelar_depan` varchar(5) DEFAULT NULL,
--`gelar_belakang` varchar(20) DEFAULT NULL,
--`id_level` tinyint(4) NOT NULL,
--`id_prodi` tinyint(4) NOT NULL,
--`password` varchar(255) NOT NULL
--) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_pegawai`
--

INSERT INTO `tm_pegawai` (`NIP`, `nama_pegawai`, `gelar_depan`, `gelar_belakang`, `id_level`, `id_prodi`, `password`) VALUES
('196702201994032', 'Endang Wahyu Wahyani', '', '', 3, 16, '5707'),
('197008311998031', 'Moh.Munih Dian W', '', '', 6, 17, '3836'),
('197009292003121', 'Yogiswara', '', '', 4, 16, '4748'),
('197011282003121', 'Hariyono Rakhmad', '', '', 6, 16, '4750'),
('197104082001121', 'Wahyu Kurnia Dewanto', '', '', 4, 15, '6080'),
('197110092003121', 'Denny Trias Utomo', '', '', 6, 17, '4751'),
('197111151998021', 'Adi Heru Utomo', '', '', 6, 17, '6143'),
('197306172018051', 'Ely Mulyadi', '', '', 6, 15, '1419'),
('197308312008011', 'Agus Purwadi', '', '', 6, 16, '1324'),
('197405192003121', 'Nugroho Setyo Wibowo', '', '', 6, 17, '5909'),
('197709292005011', 'Didit Rahmat Hartadi', '', '', 6, 15, '7754'),
('197808162005011', 'Beni Widiawan', '', '', 6, 16, '7867'),
('197808172003121', 'Agus Hariyanto', '', '', 6, 16, '7052'),
('197808192005022', 'Ika Widiastuti', '', '', 4, 15, '7866'),
('197809082005011', 'Denny Wijanarko', '', '', 6, 16, '7753'),
('197810112005012', 'Elly Antika', '', '', 6, 17, '7755'),
('197907032003121', 'Surateno', '', '', 4, 16, '4745'),
('197909212005011', 'I Putu Dody Lesmana', '', '', 6, 17, '7752'),
('197911072002122', 'Novi Tri Kurniawati', '', '', 3, 15, '1461'),
('198005172008121', 'Dwi Putro Sarwo S', '', '', 6, 15, '1219'),
('198007172014092', 'Indriana Rahmawati', '', '', 3, 17, '2004'),
('198012122005011', 'Prawidya Destarianto', '', '', 6, 17, '7756'),
('198101152005011', 'Nurul Zainal Fanani', '', '', 6, 16, '7868'),
('198106152006041', 'Syamsul Arifin', '', '', 4, 15, '3716'),
('198301092018031', 'Hermawan Arief Putranto', '', '', 6, 15, '1084'),
('198302032006041', 'Hendra Yufit Riskiawan', '', '', 4, 15, '9427'),
('198406252015041', 'Bekti Maryuni Susanto', '', '', 6, 16, '1185'),
('198510312018031', 'Victor Phoa', '', '', 6, 16, '1387'),
('198511282008121', 'Aji Seto Arifianto', '', '', 6, 16, '1213'),
('198603192019031', 'Fendik Eko Purnomo', '', '', 6, 16, '1142'),
('198606092008122', 'Nanik Anita Mukhlisoh', '', '', 6, 15, '1218'),
('198608022015042', 'Ratih Ayuninghemi', '', '', 6, 17, '1154'),
('198801172019031', 'I Gede Wiryawan', '', '', 6, 17, '1480'),
('198807022019031', 'Husin', '', '', 6, 15, '1276'),
('198903292019031', 'Taufiq Rizaldi', '', '', 2, 15, '1198'),
('198907102019031', 'Ery Setiyawan Jullev Atmadji', '', '', 4, 17, '1224'),
('199002272018032', 'Trismayanti Dwi P', '', '', 6, 17, '1197'),
('199103152019031', 'Syamsiar Kautsar', '', '', 2, 16, '1302'),
('199104292019031', 'Faisal Lutfi Afriansyah', '', '', 6, 15, '1350'),
('199112112018031', 'Khafidurrohman Agustiano', '', '', 6, 17, '1274'),
('199203022018032', 'Zilvanhisna Emka Fitri', '', '', 2, 17, '1363'),
('199205282018032', 'Bety Etikasar', '', '', 6, 17, '1275'),
('199408122019031', 'Mukhamad Angga Gumilang', '', '', 6, 17, '1481');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_level` (`id_level`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD CONSTRAINT `tm_pegawai_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tm_level` (`id_level`),
  ADD CONSTRAINT `tm_pegawai_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
