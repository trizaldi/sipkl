-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 07:50 PM
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
-- Table structure for table `tmst_kelompok`
--

CREATE TABLE `tmst_kelompok` (
  `id_kelompok` varchar(7) NOT NULL,
  `id_usulan` varchar(10) NOT NULL,
  `NIM_k` varchar(10) NOT NULL,
  `NIM_a1` varchar(10) DEFAULT NULL,
  `NIM_a2` varchar(10) DEFAULT NULL,
  `NIM_a3` varchar(10) DEFAULT NULL,
  `NIM_a4` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_ttd`
--

CREATE TABLE `tmst_ttd` (
  `id` tinyint(4) NOT NULL,
  `id_prodi` tinyint(3) NOT NULL,
  `ka_jur` varchar(15) NOT NULL,
  `ka_prodi` varchar(15) NOT NULL,
  `korbid_pkl` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmst_usulan`
--

CREATE TABLE `tmst_usulan` (
  `id_usulan` varchar(10) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_tahun` tinyint(4) NOT NULL,
  `stat_usulan` enum('1','2','3','') NOT NULL,
  `stat_verifikasi` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_angkatan`
--

CREATE TABLE `tm_angkatan` (
  `id_angkatan` tinyint(4) NOT NULL,
  `angakatan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_angkatan`
--

INSERT INTO `tm_angkatan` (`id_angkatan`, `angakatan`) VALUES
(1, '2017'),
(2, '2018'),
(3, '2019'),
(4, '2020'),
(5, '2021'),
(6, '2022'),
(7, '2023'),
(8, '2024'),
(9, '2025'),
(10, '2026');

-- --------------------------------------------------------

--
-- Table structure for table `tm_jurusan`
--

CREATE TABLE `tm_jurusan` (
  `id_jurusan` tinyint(2) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_jurusan`
--

INSERT INTO `tm_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Produksi Pertanian'),
(2, 'Teknologi Pertanian'),
(3, 'Peternakan'),
(4, 'Manajemen Agribisnis'),
(5, 'Teknologi Informasi'),
(6, 'Bahasa, Komunikasi dan Pariwisata'),
(7, 'Kesehatan'),
(8, 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `tm_kota`
--

CREATE TABLE `tm_kota` (
  `id_kota` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `id_provinsi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_kota`
--

INSERT INTO `tm_kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'Kabupaten Badung', 1),
(2, 'Kabupaten Bangli', 1),
(3, 'Kabupaten Buleleng', 1),
(4, 'Kabupaten Gianyar', 1),
(5, 'Kabupaten Jembrana', 1),
(6, 'Kabupaten Karangasem', 1),
(7, 'Kabupaten Klungkung', 1),
(8, 'Kabupaten Tabanan', 1),
(9, 'Kota Denpasar', 1),
(10, 'Kabupaten Bangka', 2),
(11, 'Kabupaten Bangka Barat', 2),
(12, 'Kabupaten Bangka Selatan', 2),
(13, 'Kabupaten Bangka Tengah', 2),
(14, 'Kabupaten Belitung', 2),
(15, 'Kabupaten Belitung Timur', 2),
(16, 'Kota Pangkal Pinang', 2),
(17, 'Kabupaten Lebak', 3),
(18, 'Kabupaten Pandeglang', 3),
(19, 'Kabupaten Serang', 3),
(20, 'Kabupaten Tangerang', 3),
(21, 'Kota Cilegon', 3),
(22, 'Kota Serang', 3),
(23, 'Kota Tangerang', 3),
(24, 'Kota Tangerang Selatan', 3),
(25, 'Kabupaten Bengkulu Selatan', 4),
(26, 'Kabupaten Bengkulu Tengah', 4),
(27, 'Kabupaten Bengkulu Utara', 4),
(28, 'Kabupaten Kaur', 4),
(29, 'Kabupaten Kepahiang', 4),
(30, 'Kabupaten Lebong', 4),
(31, 'Kabupaten Muko Muko', 4),
(32, 'Kabupaten Rejang Lebong', 4),
(33, 'Kabupaten Seluma', 4),
(34, 'Kota Bengkulu', 4),
(35, 'Kabupaten Bantul', 5),
(36, 'Kabupaten Gunung Kidul', 5),
(37, 'Kabupaten Kulon Progo', 5),
(38, 'Kabupaten Sleman', 5),
(39, 'Kota Yogyakarta', 5),
(40, 'Kabupaten Kepulauan Seribu', 6),
(41, 'Kota Jakarta Barat', 6),
(42, 'Kota Jakarta Pusat', 6),
(43, 'Kota Jakarta Selatan', 6),
(44, 'Kota Jakarta Timur', 6),
(45, 'Kota Jakarta Utara', 6),
(46, 'Kabupaten Boalemo', 7),
(47, 'Kabupaten Bone Bolango', 7),
(48, 'Kabupaten Gorontalo', 7),
(49, 'Kabupaten Gorontalo Utara', 7),
(50, 'Kabupaten Pohuwato', 7),
(51, 'Kota Gorontalo', 7),
(52, 'Kabupaten Batang Hari', 8),
(53, 'Kabupaten Bungo', 8),
(54, 'Kabupaten Kerinci', 8),
(55, 'Kabupaten Merangin', 8),
(56, 'Kabupaten Muaro Jambi', 8),
(57, 'Kabupaten Sarolangun', 8),
(58, 'Kabupaten Tanjung Jabung Barat', 8),
(59, 'Kabupaten Tanjung Jabung Timur', 8),
(60, 'Kabupaten Tebo', 8),
(61, 'Kota Jambi', 8),
(62, 'Kota Sungaipenuh', 8),
(63, 'Kabupaten Bandung', 9),
(64, 'Kabupaten Bandung Barat', 9),
(65, 'Kabupaten Bekasi', 9),
(66, 'Kabupaten Bogor', 9),
(67, 'Kabupaten Ciamis', 9),
(68, 'Kabupaten Cianjur', 9),
(69, 'Kabupaten Cirebon', 9),
(70, 'Kabupaten Garut', 9),
(71, 'Kabupaten Indramayu', 9),
(72, 'Kabupaten Karawang', 9),
(73, 'Kabupaten Kuningan', 9),
(74, 'Kabupaten Majalengka', 9),
(75, 'Kabupaten Pangandaran', 9),
(76, 'Kabupaten Purwakarta', 9),
(77, 'Kabupaten Subang', 9),
(78, 'Kabupaten Sukabumi', 9),
(79, 'Kabupaten Sumedang', 9),
(80, 'Kabupaten Tasikmalaya', 9),
(81, 'Kota Bandung', 9),
(82, 'Kota Banjar', 9),
(83, 'Kota Bekasi', 9),
(84, 'Kota Bogor', 9),
(85, 'Kota Cimahi', 9),
(86, 'Kota Cirebon', 9),
(87, 'Kota Depok', 9),
(88, 'Kota Sukabumi', 9),
(89, 'Kota Tasikmalaya', 9),
(90, 'Kabupaten Banjarnegara', 10),
(91, 'Kabupaten Banyumas', 10),
(92, 'Kabupaten Batang', 10),
(93, 'Kabupaten Blora', 10),
(94, 'Kabupaten Boyolali', 10),
(95, 'Kabupaten Brebes', 10),
(96, 'Kabupaten Cilacap', 10),
(97, 'Kabupaten Demak', 10),
(98, 'Kabupaten Grobogan', 10),
(99, 'Kabupaten Jepara', 10),
(100, 'Kabupaten Karanganyar', 10),
(101, 'Kabupaten Kebumen', 10),
(102, 'Kabupaten Kendal', 10),
(103, 'Kabupaten Klaten', 10),
(104, 'Kabupaten Kudus', 10),
(105, 'Kabupaten Magelang', 10),
(106, 'Kabupaten Pati', 10),
(107, 'Kabupaten Pekalongan', 10),
(108, 'Kabupaten Pemalang', 10),
(109, 'Kabupaten Purbalingga', 10),
(110, 'Kabupaten Purworejo', 10),
(111, 'Kabupaten Rembang', 10),
(112, 'Kabupaten Semarang', 10),
(113, 'Kabupaten Sragen', 10),
(114, 'Kabupaten Sukoharjo', 10),
(115, 'Kabupaten Tegal', 10),
(116, 'Kabupaten Temanggung', 10),
(117, 'Kabupaten Wonogiri', 10),
(118, 'Kabupaten Wonosobo', 10),
(119, 'Kota Magelang', 10),
(120, 'Kota Pekalongan', 10),
(121, 'Kota Salatiga', 10),
(122, 'Kota Semarang', 10),
(123, 'Kota Surakarta', 10),
(124, 'Kota Tegal', 10),
(125, 'Kabupaten Bangkalan', 11),
(126, 'Kabupaten Banyuwangi', 11),
(127, 'Kabupaten Blitar', 11),
(128, 'Kabupaten Bojonegoro', 11),
(129, 'Kabupaten Bondowoso', 11),
(130, 'Kabupaten Gresik', 11),
(131, 'Kabupaten Jember', 11),
(132, 'Kabupaten Jombang', 11),
(133, 'Kabupaten Kediri', 11),
(134, 'Kabupaten Lamongan', 11),
(135, 'Kabupaten Lumajang', 11),
(136, 'Kabupaten Madiun', 11),
(137, 'Kabupaten Magetan', 11),
(138, 'Kabupaten Malang', 11),
(139, 'Kabupaten Mojokerto', 11),
(140, 'Kabupaten Nganjuk', 11),
(141, 'Kabupaten Ngawi', 11),
(142, 'Kabupaten Pacitan', 11),
(143, 'Kabupaten Pamekasan', 11),
(144, 'Kabupaten Pasuruan', 11),
(145, 'Kabupaten Ponorogo', 11),
(146, 'Kabupaten Probolinggo', 11),
(147, 'Kabupaten Sampang', 11),
(148, 'Kabupaten Sidoarjo', 11),
(149, 'Kabupaten Situbondo', 11),
(150, 'Kabupaten Sumenep', 11),
(151, 'Kabupaten Trenggalek', 11),
(152, 'Kabupaten Tuban', 11),
(153, 'Kabupaten Tulungagung', 11),
(154, 'Kota Batu', 11),
(155, 'Kota Blitar', 11),
(156, 'Kota Kediri', 11),
(157, 'Kota Madiun', 11),
(158, 'Kota Malang', 11),
(159, 'Kota Mojokerto', 11),
(160, 'Kota Pasuruan', 11),
(161, 'Kota Probolinggo', 11),
(162, 'Kota Surabaya', 11),
(163, 'Kabupaten Bengkayang', 12),
(164, 'Kabupaten Kapuas Hulu', 12),
(165, 'Kabupaten Kayong Utara', 12),
(166, 'Kabupaten Ketapang', 12),
(167, 'Kabupaten Kubu Raya', 12),
(168, 'Kabupaten Landak', 12),
(169, 'Kabupaten Melawi', 12),
(170, 'Kabupaten Mempawah', 12),
(171, 'Kabupaten Sambas', 12),
(172, 'Kabupaten Sanggau', 12),
(173, 'Kabupaten Sekadau', 12),
(174, 'Kabupaten Sintang', 12),
(175, 'Kota Pontianak', 12),
(176, 'Kota Singkawang', 12),
(177, 'Kabupaten Balangan', 13),
(178, 'Kabupaten Banjar', 13),
(179, 'Kabupaten Barito Kuala', 13),
(180, 'Kabupaten Hulu Sungai Selatan', 13),
(181, 'Kabupaten Hulu Sungai Tengah', 13),
(182, 'Kabupaten Hulu Sungai Utara', 13),
(183, 'Kabupaten Kotabaru', 13),
(184, 'Kabupaten Tabalong', 13),
(185, 'Kabupaten Tanah Bumbu', 13),
(186, 'Kabupaten Tanah Laut', 13),
(187, 'Kabupaten Tapin', 13),
(188, 'Kota Banjarbaru', 13),
(189, 'Kota Banjarmasin', 13),
(190, 'Kabupaten Barito Selatan', 14),
(191, 'Kabupaten Barito Timur', 14),
(192, 'Kabupaten Barito Utara', 14),
(193, 'Kabupaten Gunung Mas', 14),
(194, 'Kabupaten Kapuas', 14),
(195, 'Kabupaten Katingan', 14),
(196, 'Kabupaten Kotawaringin Barat', 14),
(197, 'Kabupaten Kotawaringin Timur', 14),
(198, 'Kabupaten Lamandau', 14),
(199, 'Kabupaten Murung Raya', 14),
(200, 'Kabupaten Pulang Pisau', 14),
(201, 'Kabupaten Seruyan', 14),
(202, 'Kabupaten Sukamara', 14),
(203, 'Kota Palangka Raya', 14),
(204, 'Kabupaten Berau', 15),
(205, 'Kabupaten Kutai Barat', 15),
(206, 'Kabupaten Kutai Kartanegara', 15),
(207, 'Kabupaten Kutai Timur', 15),
(208, 'Kabupaten Mahakam Ulu', 15),
(209, 'Kabupaten Paser', 15),
(210, 'Kabupaten Penajam Paser Utara', 15),
(211, 'Kota Balikpapan', 15),
(212, 'Kota Bontang', 15),
(213, 'Kota Samarinda', 15),
(214, 'Kabupaten Bulungan', 16),
(215, 'Kabupaten Malinau', 16),
(216, 'Kabupaten Nunukan', 16),
(217, 'Kabupaten Tana Tidung', 16),
(218, 'Kota Tarakan', 16),
(219, 'Kabupaten Bintan', 17),
(220, 'Kabupaten Karimun', 17),
(221, 'Kabupaten Kepulauan Anambas', 17),
(222, 'Kabupaten Lingga', 17),
(223, 'Kabupaten Natuna', 17),
(224, 'Kota Batam', 17),
(225, 'Kota Tanjung Pinang', 17),
(226, 'Kabupaten Lampung Barat', 18),
(227, 'Kabupaten Lampung Selatan', 18),
(228, 'Kabupaten Lampung Tengah', 18),
(229, 'Kabupaten Lampung Timur', 18),
(230, 'Kabupaten Lampung Utara', 18),
(231, 'Kabupaten Mesuji', 18),
(232, 'Kabupaten Pesawaran', 18),
(233, 'Kabupaten Pesisir Barat', 18),
(234, 'Kabupaten Pringsewu', 18),
(235, 'Kabupaten Tanggamus', 18),
(236, 'Kabupaten Tulang Bawang', 18),
(237, 'Kabupaten Tulang Bawang Barat', 18),
(238, 'Kabupaten Way Kanan', 18),
(239, 'Kota Bandar Lampung', 18),
(240, 'Kota Metro', 18),
(241, 'Kabupaten Buru', 19),
(242, 'Kabupaten Buru Selatan', 19),
(243, 'Kabupaten Kepulauan Aru', 19),
(244, 'Kabupaten Maluku Barat Daya', 19),
(245, 'Kabupaten Maluku Tengah', 19),
(246, 'Kabupaten Maluku Tenggara', 19),
(247, 'Kabupaten Maluku Tenggara Barat', 19),
(248, 'Kabupaten Seram Bagian Barat', 19),
(249, 'Kabupaten Seram Bagian Timur', 19),
(250, 'Kota Ambon', 19),
(251, 'Kota Tual', 19),
(252, 'Kabupaten Halmahera Barat', 20),
(253, 'Kabupaten Halmahera Selatan', 20),
(254, 'Kabupaten Halmahera Tengah', 20),
(255, 'Kabupaten Halmahera Timur', 20),
(256, 'Kabupaten Halmahera Utara', 20),
(257, 'Kabupaten Kepulauan Sula', 20),
(258, 'Kabupaten Pulau Morotai', 20),
(259, 'Kabupaten Pulau Taliabu', 20),
(260, 'Kota Ternate', 20),
(261, 'Kota Tidore Kepulauan', 20),
(262, 'Kabupaten Aceh Barat', 21),
(263, 'Kabupaten Aceh Barat Daya', 21),
(264, 'Kabupaten Aceh Besar', 21),
(265, 'Kabupaten Aceh Jaya', 21),
(266, 'Kabupaten Aceh Selatan', 21),
(267, 'Kabupaten Aceh Singkil', 21),
(268, 'Kabupaten Aceh Tamiang', 21),
(269, 'Kabupaten Aceh Tengah', 21),
(270, 'Kabupaten Aceh Tenggara', 21),
(271, 'Kabupaten Aceh Timur', 21),
(272, 'Kabupaten Aceh Utara', 21),
(273, 'Kabupaten Bener Meriah', 21),
(274, 'Kabupaten Bireuen', 21),
(275, 'Kabupaten Gayo Lues', 21),
(276, 'Kabupaten Nagan Raya', 21),
(277, 'Kabupaten Pidie', 21),
(278, 'Kabupaten Pidie Jaya', 21),
(279, 'Kabupaten Simeulue', 21),
(280, 'Kota Banda Aceh', 21),
(281, 'Kota Lhokseumawe', 21),
(282, 'Kota Sabang', 21),
(283, 'Kota Subulussalam', 21),
(284, 'Kabupaten Bima', 22),
(285, 'Kabupaten Dompu', 22),
(286, 'Kabupaten Lombok Barat', 22),
(287, 'Kabupaten Lombok Tengah', 22),
(288, 'Kabupaten Lombok Timur', 22),
(289, 'Kabupaten Lombok Utara', 22),
(290, 'Kabupaten Sumbawa', 22),
(291, 'Kabupaten Sumbawa Barat', 22),
(292, 'Kota Bima', 22),
(293, 'Kota Mataram', 22),
(294, 'Kabupaten  Ende', 23),
(295, 'Kabupaten  Flores Timur', 23),
(296, 'Kabupaten Alor', 23),
(297, 'Kabupaten Belu', 23),
(298, 'Kabupaten Ende', 23),
(299, 'Kabupaten Flores Timur', 23),
(300, 'Kabupaten Kupang', 23),
(301, 'Kabupaten Lembata', 23),
(302, 'Kabupaten Malaka', 23),
(303, 'Kabupaten Manggarai', 23),
(304, 'Kabupaten Manggarai Barat', 23),
(305, 'Kabupaten Manggarai Timur', 23),
(306, 'Kabupaten Nagekeo', 23),
(307, 'Kabupaten Ngada', 23),
(308, 'Kabupaten Rote Ndao', 23),
(309, 'Kabupaten Sabu Raijua', 23),
(310, 'Kabupaten Sikka', 23),
(311, 'Kabupaten Sumba Barat', 23),
(312, 'Kabupaten Sumba Barat Daya', 23),
(313, 'Kabupaten Sumba Tengah', 23),
(314, 'Kabupaten Sumba Timur', 23),
(315, 'Kabupaten Timor Tengah Selatan', 23),
(316, 'Kabupaten Timor Tengah Utara', 23),
(317, 'Kota Kupang', 23),
(318, 'Kabupaten Asmat', 24),
(319, 'Kabupaten Biak Numfor', 24),
(320, 'Kabupaten Boven Digoel', 24),
(321, 'Kabupaten Deiyai', 24),
(322, 'Kabupaten Dogiyai', 24),
(323, 'Kabupaten Intan Jaya', 24),
(324, 'Kabupaten Jayapura', 24),
(325, 'Kabupaten Jayawijaya', 24),
(326, 'Kabupaten Keerom', 24),
(327, 'Kabupaten Kepulauan Yapen', 24),
(328, 'Kabupaten Lanny Jaya', 24),
(329, 'Kabupaten Mamberamo Raya', 24),
(330, 'Kabupaten Mamberamo Tengah', 24),
(331, 'Kabupaten Mappi', 24),
(332, 'Kabupaten Merauke', 24),
(333, 'Kabupaten Mimika', 24),
(334, 'Kabupaten Nabire', 24),
(335, 'Kabupaten Nduga', 24),
(336, 'Kabupaten Paniai', 24),
(337, 'Kabupaten Pegunungan Bintang', 24),
(338, 'Kabupaten Puncak', 24),
(339, 'Kabupaten Puncak Jaya', 24),
(340, 'Kabupaten Sarmi', 24),
(341, 'Kabupaten Supiori', 24),
(342, 'Kabupaten Tolikara', 24),
(343, 'Kabupaten Waropen', 24),
(344, 'Kabupaten Yahukimo', 24),
(345, 'Kabupaten Yalimo', 24),
(346, 'Kota Jayapura', 24),
(347, 'Kabupaten Fakfak', 25),
(348, 'Kabupaten Kaimana', 25),
(349, 'Kabupaten Manokwari', 25),
(350, 'Kabupaten Manokwari Selatan', 25),
(351, 'Kabupaten Maybrat', 25),
(352, 'Kabupaten Pegunungan Arfak', 25),
(353, 'Kabupaten Raja Ampat', 25),
(354, 'Kabupaten Sorong', 25),
(355, 'Kabupaten Sorong Selatan', 25),
(356, 'Kabupaten Tambrauw', 25),
(357, 'Kabupaten Teluk Bintuni', 25),
(358, 'Kabupaten Teluk Wondama', 25),
(359, 'Kota Sorong', 25),
(360, 'Kabupaten Bengkalis', 26),
(361, 'Kabupaten Indragiri Hilir', 26),
(362, 'Kabupaten Indragiri Hulu', 26),
(363, 'Kabupaten Kampar', 26),
(364, 'Kabupaten Kepulauan Meranti', 26),
(365, 'Kabupaten Kuantan Singingi', 26),
(366, 'Kabupaten Pelalawan', 26),
(367, 'Kabupaten Rokan Hilir', 26),
(368, 'Kabupaten Rokan Hulu', 26),
(369, 'Kabupaten Siak', 26),
(370, 'Kota Dumai', 26),
(371, 'Kota Pekanbaru', 26),
(372, 'Kabupaten Majene', 27),
(373, 'Kabupaten Mamasa', 27),
(374, 'Kabupaten Mamuju', 27),
(375, 'Kabupaten Mamuju Tengah', 27),
(376, 'Kabupaten Mamuju Utara', 27),
(377, 'Kabupaten Polewali Mandar', 27),
(378, 'Kabupaten Bantaeng', 28),
(379, 'Kabupaten Barru', 28),
(380, 'Kabupaten Bone', 28),
(381, 'Kabupaten Bulukumba', 28),
(382, 'Kabupaten Enrekang', 28),
(383, 'Kabupaten Gowa', 28),
(384, 'Kabupaten Jeneponto', 28),
(385, 'Kabupaten Kepulauan Selayar', 28),
(386, 'Kabupaten Luwu', 28),
(387, 'Kabupaten Luwu Timur', 28),
(388, 'Kabupaten Luwu Utara', 28),
(389, 'Kabupaten Maros', 28),
(390, 'Kabupaten Pangkajene Kepulauan', 28),
(391, 'Kabupaten Pinrang', 28),
(392, 'Kabupaten Sidenreng Rappang', 28),
(393, 'Kabupaten Sinjai', 28),
(394, 'Kabupaten Soppeng', 28),
(395, 'Kabupaten Takalar', 28),
(396, 'Kabupaten Tana Toraja', 28),
(397, 'Kabupaten Toraja Utara', 28),
(398, 'Kabupaten Wajo', 28),
(399, 'Kota Makassar', 28),
(400, 'Kota Palopo', 28),
(401, 'Kota Parepare', 28),
(402, 'Kabupaten Banggai', 29),
(403, 'Kabupaten Banggai Kepulauan', 29),
(404, 'Kabupaten Banggai Laut', 29),
(405, 'Kabupaten Buol', 29),
(406, 'Kabupaten Donggala', 29),
(407, 'Kabupaten Morowali', 29),
(408, 'Kabupaten Morowali Utara', 29),
(409, 'Kabupaten Parigi Moutong', 29),
(410, 'Kabupaten Poso', 29),
(411, 'Kabupaten Sigi', 29),
(412, 'Kabupaten Tojo Una-Una', 29),
(413, 'Kabupaten Toli-Toli', 29),
(414, 'Kota Palu', 29),
(415, 'Kabupaten Bombana', 30),
(416, 'Kabupaten Buton', 30),
(417, 'Kabupaten Buton Selatan', 30),
(418, 'Kabupaten Buton Tengah', 30),
(419, 'Kabupaten Buton Utara', 30),
(420, 'Kabupaten Kolaka', 30),
(421, 'Kabupaten Kolaka Timur', 30),
(422, 'Kabupaten Kolaka Utara', 30),
(423, 'Kabupaten Konawe', 30),
(424, 'Kabupaten Konawe Kepulauan', 30),
(425, 'Kabupaten Konawe Selatan', 30),
(426, 'Kabupaten Konawe Utara', 30),
(427, 'Kabupaten Muna', 30),
(428, 'Kabupaten Muna Barat', 30),
(429, 'Kabupaten Wakatobi', 30),
(430, 'Kota Bau-Bau', 30),
(431, 'Kota Kendari', 30),
(432, 'Kabupaten Bolaang Mongondow', 31),
(433, 'Kabupaten Bolaang Mongondow Selatan', 31),
(434, 'Kabupaten Bolaang Mongondow Timur', 31),
(435, 'Kabupaten Bolaang Mongondow Utara', 31),
(436, 'Kabupaten Kepulauan Sangihe', 31),
(437, 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)', 31),
(438, 'Kabupaten Kepulauan Talaud', 31),
(439, 'Kabupaten Minahasa', 31),
(440, 'Kabupaten Minahasa Selatan', 31),
(441, 'Kabupaten Minahasa Tenggara', 31),
(442, 'Kabupaten Minahasa Utara', 31),
(443, 'Kota Bitung', 31),
(444, 'Kota Kotamobagu', 31),
(445, 'Kota Manado', 31),
(446, 'Kota Tomohon', 31),
(447, 'Kabupaten Agam', 32),
(448, 'Kabupaten Dharmasraya', 32),
(449, 'Kabupaten Kepulauan Mentawai', 32),
(450, 'Kabupaten Lima Puluh ', 32),
(451, 'Kabupaten Padang Pariaman', 32),
(452, 'Kabupaten Pasaman', 32),
(453, 'Kabupaten Pasaman Barat', 32),
(454, 'Kabupaten Pesisir Selatan', 32),
(455, 'Kabupaten Sijunjung', 32),
(456, 'Kabupaten Solok', 32),
(457, 'Kabupaten Solok Selatan', 32),
(458, 'Kabupaten Tanah Datar', 32),
(459, 'Kota Bukittinggi', 32),
(460, 'Kota Padang', 32),
(461, 'Kota Padang Panjang', 32),
(462, 'Kota Pariaman', 32),
(463, 'Kota Payakumbuh', 32),
(464, 'Kota Sawah Lunto', 32),
(465, 'Kota Solok', 32),
(466, 'Kabupaten Banyuasin', 33),
(467, 'Kabupaten Empat Lawang', 33),
(468, 'Kabupaten Lahat', 33),
(469, 'Kabupaten Muara Enim', 33),
(470, 'Kabupaten Musi Banyuasin', 33),
(471, 'Kabupaten Musi Rawas', 33),
(472, 'Kabupaten Musi Rawas Utara', 33),
(473, 'Kabupaten Ogan Ilir', 33),
(474, 'Kabupaten Ogan Komering Ilir', 33),
(475, 'Kabupaten Ogan Komering Ulu', 33),
(476, 'Kabupaten Ogan Komering Ulu Selatan', 33),
(477, 'Kabupaten Ogan Komering Ulu Timur', 33),
(478, 'Kabupaten Penukal Abab Lematang Ilir', 33),
(479, 'Kota Lubuk Linggau', 33),
(480, 'Kota Pagar Alam', 33),
(481, 'Kota Palembang', 33),
(482, 'Kota Prabumulih', 33),
(483, 'Kabupaten Asahan', 34),
(484, 'Kabupaten Batu Bara', 34),
(485, 'Kabupaten Dairi', 34),
(486, 'Kabupaten Deli Serdang', 34),
(487, 'Kabupaten Humbang Hasundutan', 34),
(488, 'Kabupaten Karo', 34),
(489, 'Kabupaten Labuhanbatu', 34),
(490, 'Kabupaten Labuhanbatu Selatan', 34),
(491, 'Kabupaten Labuhanbatu Utara', 34),
(492, 'Kabupaten Langkat', 34),
(493, 'Kabupaten Mandailing Natal', 34),
(494, 'Kabupaten Nias', 34),
(495, 'Kabupaten Nias Barat', 34),
(496, 'Kabupaten Nias Selatan', 34),
(497, 'Kabupaten Nias Utara', 34),
(498, 'Kabupaten Padang Lawas', 34),
(499, 'Kabupaten Padang Lawas Utara', 34),
(500, 'Kabupaten Pakpak Bharat', 34),
(501, 'Kabupaten Samosir', 34),
(502, 'Kabupaten Serdang Bedagai', 34),
(503, 'Kabupaten Simalungun', 34),
(504, 'Kabupaten Tapanuli Selatan', 34),
(505, 'Kabupaten Tapanuli Tengah', 34),
(506, 'Kabupaten Tapanuli Utara', 34),
(507, 'Kabupaten Toba Samosir', 34),
(508, 'Kota Binjai', 34),
(509, 'Kota Gunungsitoli', 34),
(510, 'Kota Medan', 34),
(511, 'Kota Padang Sidempuan', 34),
(512, 'Kota Pematang Siantar', 34),
(513, 'Kota Sibolga', 34),
(514, 'Kota Tanjung Balai', 34),
(515, 'Kota Tebing Tinggi', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tm_level`
--

CREATE TABLE `tm_level` (
  `id_level` tinyint(4) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_level`
--

INSERT INTO `tm_level` (`id_level`, `level`) VALUES
(1, 'Mahasiswa'),
(2, 'Korbid PKL'),
(3, 'Admin Prodi'),
(4, 'Manajemen'),
(5, 'Root');

-- --------------------------------------------------------

--
-- Table structure for table `tm_lokasi`
--

CREATE TABLE `tm_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `longitude` text,
  `latitude` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_mahasiswa`
--

CREATE TABLE `tm_mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_prodi` tinyint(4) NOT NULL,
  `id_angkatan` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_pegawai`
--

CREATE TABLE `tm_pegawai` (
  `NIP` varchar(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar` varchar(15) NOT NULL,
  `id_level` tinyint(4) NOT NULL,
  `id_prodi` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_prodi`
--

CREATE TABLE `tm_prodi` (
  `id_prodi` tinyint(3) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang` varchar(6) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_prodi`
--

INSERT INTO `tm_prodi` (`id_prodi`, `nama_prodi`, `jenjang`, `id_jurusan`) VALUES
(1, 'Produksi Tanaman Perkebunan', 'D-III', 1),
(2, 'Produksi Tanaman Holtikultura', 'D-III', 1),
(3, 'Teknik Produksi Benih', 'D-IV', 1),
(4, 'Teknik Produksi Tanaman Pangan', 'D-IV', 1),
(5, 'Budidaya Tanaman Perkebunan', 'D-IV', 1),
(6, 'Pengelola Perkebunan Kopi', 'D-IV', 1),
(7, 'Keteknikan Pertanian', 'D-III', 2),
(8, 'Teknologi Industri Pangan', 'D-III', 2),
(9, 'Teknologi Rekayasa Pangan', 'D-IV', 2),
(10, 'Produksi Ternak', 'D-III', 3),
(11, 'Manajemen Bisnis Unggas', 'D-IV', 3),
(12, 'Manajemen Agribisnis', 'D-III', 4),
(13, 'Manajemen Agroindustri', 'D-IV', 4),
(14, 'Akutansi Sektor Publik', 'D-IV', 4),
(15, 'Manajemen Informatika', 'D-III', 5),
(16, 'Teknik Komputer', 'D-III', 5),
(17, 'Teknik Informatika', 'D-IV', 5),
(18, 'Bahasa Inggris', 'D-III', 6),
(19, 'Rekam Medik', 'D-IV', 7),
(20, 'Gizi Klinik', 'D-IV', 7),
(21, 'Teknik Energi Terbarukan', 'D-IV', 8),
(22, 'Mesin Otomotif', 'D-IV', 8),
(23, 'Teknologi Rekayasa Mekatronika', 'D-IV', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tm_provinsi`
--

CREATE TABLE `tm_provinsi` (
  `id_provinsi` tinyint(4) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_provinsi`
--

INSERT INTO `tm_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam'),
(22, 'Nusa Tenggara Barat'),
(23, 'Nusa Tenggara Timur'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tm_tahun`
--

CREATE TABLE `tm_tahun` (
  `id_tahun` tinyint(4) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_tahun`
--

INSERT INTO `tm_tahun` (`id_tahun`, `tahun`) VALUES
(1, '2020'),
(2, '2021'),
(3, '2022'),
(4, '2023'),
(5, '2024'),
(6, '2025'),
(7, '2026'),
(8, '2027'),
(9, '2028'),
(10, '2029'),
(11, '2030');

-- --------------------------------------------------------

--
-- Table structure for table `ts_lokasi`
--

CREATE TABLE `ts_lokasi` (
  `id_lok_usul` int(11) NOT NULL,
  `nama_lok` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `longitude` text NOT NULL,
  `latitude` text NOT NULL,
  `status` enum('1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmst_kelompok`
--
ALTER TABLE `tmst_kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `NIM_k` (`NIM_k`),
  ADD KEY `NIM_a1` (`NIM_a1`),
  ADD KEY `NIM_a2` (`NIM_a2`),
  ADD KEY `NIM_a3` (`NIM_a3`),
  ADD KEY `NIM_a4` (`NIM_a4`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `tmst_ttd`
--
ALTER TABLE `tmst_ttd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `ka_jur` (`ka_jur`),
  ADD KEY `ka_prodi` (`ka_prodi`),
  ADD KEY `korbid_pkl` (`korbid_pkl`);

--
-- Indexes for table `tmst_usulan`
--
ALTER TABLE `tmst_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `tm_angkatan`
--
ALTER TABLE `tm_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `tm_jurusan`
--
ALTER TABLE `tm_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tm_kota`
--
ALTER TABLE `tm_kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tm_level`
--
ALTER TABLE `tm_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tm_lokasi`
--
ALTER TABLE `tm_lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `tm_mahasiswa`
--
ALTER TABLE `tm_mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `id_angkatan` (`id_angkatan`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tm_prodi`
--
ALTER TABLE `tm_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `tm_provinsi`
--
ALTER TABLE `tm_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tm_tahun`
--
ALTER TABLE `tm_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `ts_lokasi`
--
ALTER TABLE `ts_lokasi`
  ADD PRIMARY KEY (`id_lok_usul`),
  ADD KEY `id_kota` (`id_kota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmst_ttd`
--
ALTER TABLE `tmst_ttd`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_angkatan`
--
ALTER TABLE `tm_angkatan`
  MODIFY `id_angkatan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tm_jurusan`
--
ALTER TABLE `tm_jurusan`
  MODIFY `id_jurusan` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tm_kota`
--
ALTER TABLE `tm_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `tm_level`
--
ALTER TABLE `tm_level`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_lokasi`
--
ALTER TABLE `tm_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_prodi`
--
ALTER TABLE `tm_prodi`
  MODIFY `id_prodi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tm_provinsi`
--
ALTER TABLE `tm_provinsi`
  MODIFY `id_provinsi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tm_tahun`
--
ALTER TABLE `tm_tahun`
  MODIFY `id_tahun` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ts_lokasi`
--
ALTER TABLE `ts_lokasi`
  MODIFY `id_lok_usul` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tmst_kelompok`
--
ALTER TABLE `tmst_kelompok`
  ADD CONSTRAINT `tmst_kelompok_ibfk_1` FOREIGN KEY (`NIM_k`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_2` FOREIGN KEY (`NIM_a1`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_3` FOREIGN KEY (`NIM_a2`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_4` FOREIGN KEY (`NIM_a3`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_5` FOREIGN KEY (`NIM_a4`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_6` FOREIGN KEY (`id_usulan`) REFERENCES `tmst_usulan` (`id_usulan`);

--
-- Constraints for table `tmst_ttd`
--
ALTER TABLE `tmst_ttd`
  ADD CONSTRAINT `tmst_ttd_ibfk_2` FOREIGN KEY (`ka_jur`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_3` FOREIGN KEY (`ka_prodi`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_4` FOREIGN KEY (`korbid_pkl`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Constraints for table `tmst_usulan`
--
ALTER TABLE `tmst_usulan`
  ADD CONSTRAINT `tmst_usulan_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tm_tahun` (`id_tahun`),
  ADD CONSTRAINT `tmst_usulan_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tm_lokasi` (`id_lokasi`);

--
-- Constraints for table `tm_kota`
--
ALTER TABLE `tm_kota`
  ADD CONSTRAINT `tm_kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tm_provinsi` (`id_provinsi`);

--
-- Constraints for table `tm_lokasi`
--
ALTER TABLE `tm_lokasi`
  ADD CONSTRAINT `tm_lokasi_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `tm_kota` (`id_kota`);

--
-- Constraints for table `tm_mahasiswa`
--
ALTER TABLE `tm_mahasiswa`
  ADD CONSTRAINT `tm_mahasiswa_ibfk_1` FOREIGN KEY (`id_angkatan`) REFERENCES `tm_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tm_mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Constraints for table `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD CONSTRAINT `tm_pegawai_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tm_level` (`id_level`),
  ADD CONSTRAINT `tm_pegawai_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Constraints for table `tm_prodi`
--
ALTER TABLE `tm_prodi`
  ADD CONSTRAINT `tm_prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tm_jurusan` (`id_jurusan`);

--
-- Constraints for table `ts_lokasi`
--
ALTER TABLE `ts_lokasi`
  ADD CONSTRAINT `ts_lokasi_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `tm_kota` (`id_kota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
