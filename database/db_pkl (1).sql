-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jul 2020 pada 09.03
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
-- Struktur dari tabel `tmst_kelompok`
--

CREATE TABLE `tmst_kelompok` (
  `id_kelompok` varchar(7) NOT NULL,
  `NIM_k` varchar(10) NOT NULL,
  `NIM_a1` varchar(10) DEFAULT NULL,
  `NIM_a2` varchar(10) DEFAULT NULL,
  `NIM_a3` varchar(10) DEFAULT NULL,
  `NIM_a4` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_kelompok`
--

INSERT INTO `tmst_kelompok` (`id_kelompok`, `NIM_k`, `NIM_a1`, `NIM_a2`, `NIM_a3`, `NIM_a4`) VALUES
('', 'E3111111', 'E3114242', 'E31151328', 'E31151415', 'E3115242');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmst_ttd`
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
-- Struktur dari tabel `tmst_usulan`
--

CREATE TABLE `tmst_usulan` (
  `id_usulan` varchar(7) NOT NULL,
  `id_kelompok` varchar(7) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_tahun` tinyint(4) NOT NULL,
  `stat_usulan` enum('1','2','3','') NOT NULL,
  `stat_verifikasi` enum('1','2','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmst_usulan`
--

INSERT INTO `tmst_usulan` (`id_usulan`, `id_kelompok`, `id_lokasi`, `id_tahun`, `stat_usulan`, `stat_verifikasi`) VALUES
('1', '', 3, 1, '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_angkatan`
--

CREATE TABLE `tm_angkatan` (
  `id_angkatan` tinyint(4) NOT NULL,
  `angkatan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_angkatan`
--

INSERT INTO `tm_angkatan` (`id_angkatan`, `angkatan`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_jurusan`
--

CREATE TABLE `tm_jurusan` (
  `id_jurusan` tinyint(2) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_jurusan`
--

INSERT INTO `tm_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'teknologi Informasi'),
(3, 'Teknologi Pertanian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_kota`
--

CREATE TABLE `tm_kota` (
  `id_kota` tinyint(4) NOT NULL,
  `kota` varchar(11) NOT NULL,
  `id_provinsi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_kota`
--

INSERT INTO `tm_kota` (`id_kota`, `kota`, `id_provinsi`) VALUES
(1, 'situbondo', 1),
(2, 'jember', 1),
(4, 'Sidoarjo', 1),
(5, 'besuki', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_level`
--

CREATE TABLE `tm_level` (
  `id_level` tinyint(4) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_level`
--

INSERT INTO `tm_level` (`id_level`, `level`) VALUES
(1, 'mahasiswa'),
(2, 'korbid pkl'),
(3, 'admin prodi'),
(4, 'admin'),
(5, 'jurusan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_lokasi`
--

CREATE TABLE `tm_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_kota` tinyint(4) NOT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `longitude` text,
  `latitude` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_lokasi`
--

INSERT INTO `tm_lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`, `telp`, `id_kota`, `kode_pos`, `longitude`, `latitude`) VALUES
(1, 'PLN Situbondo', 'Jl. Krajan Timur, Sumber Kolak, Panarukan', '0813364257834', 1, '1234', 'perlu verifikasi pak taufiq', 'perlu verifikasi pak taufiq'),
(3, 'PT POS', 'Jl. ArjasaSukosari, Sukowono', '09876543', 2, '68191', 'perlu verifikasi pak taufiq', 'perlu verifikasi pak taufiq'),
(4, 'POLIJE', 'Jl. MastripKabupaten Jember, Jawa Timur', '09876543', 2, '68121', 'perlu verifikasi pak taufiq', 'perlu verifikasi pak taufiq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_mahasiswa`
--

CREATE TABLE `tm_mahasiswa` (
  `NIM` varchar(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `id_prodi` tinyint(4) NOT NULL,
  `id_angkatan` tinyint(4) NOT NULL,
  `id_level` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_mahasiswa`
--

INSERT INTO `tm_mahasiswa` (`NIM`, `nama_mhs`, `telp`, `id_prodi`, `id_angkatan`, `id_level`, `password`) VALUES
('E3111111', 'Otaku Dio', '0876542424', 1, 1, 1, '6677f9393fb97ef713ca699e3421d743'),
('E3114242', 'Arif rahman', '0888887676', 1, 1, 1, 'a6f7575daec0a033cfeee52893fa9ab5'),
('E31151328', 'Wahyu Faith', '08133642578', 1, 1, 1, '62d8dc2a7f79c0129c4cc2ac5fa0a854'),
('E31151415', 'Deny pradana', '08989898989', 1, 1, 1, '48a4ce9e6e929d59f1ca70a0755ae8b6'),
('E3115242', 'Dona nirwana', '0812234563', 1, 1, 1, '583024ef87917f49779deac12b4901c8'),
('E41190059', 'Wahyu Pebrianto', '089524426802', 1, 5, 1, 'e55dd9bb1581c7d6c9ad8d83649efa49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_pegawai`
--

CREATE TABLE `tm_pegawai` (
  `NIP` varchar(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `gelar` varchar(15) NOT NULL,
  `id_level` tinyint(4) NOT NULL,
  `id_prodi` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_pegawai`
--

INSERT INTO `tm_pegawai` (`NIP`, `nama_pegawai`, `gelar`, `id_level`, `id_prodi`, `password`) VALUES
('001', 'Taufiq Rizaldi', 'S2', 2, 1, 'dc5c7986daef50c1e02ab09b442ee34f'),
('002', 'Indri', 'S1', 3, 3, '93dd4de5cddba2c733c65f233097f05a'),
('003', 'Hermawan Arif Putranto', 'S1', 4, 1, 'e88a49bccde359f0cabb40db83ba6080'),
('004', 'Hendra Yufit Riskiawan, S.Kom, M.Cs', 'S2', 5, 3, 'd690210ac1460c6024c01e6c34ea2618');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_prodi`
--

CREATE TABLE `tm_prodi` (
  `id_prodi` tinyint(3) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `id_jurusan` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_prodi`
--

INSERT INTO `tm_prodi` (`id_prodi`, `nama_prodi`, `id_jurusan`) VALUES
(1, 'MIF', 1),
(2, 'TKK', 1),
(3, 'TIF', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_provinsi`
--

CREATE TABLE `tm_provinsi` (
  `id_provinsi` tinyint(4) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_provinsi`
--

INSERT INTO `tm_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'jawa timur'),
(2, 'jawa tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_tahun`
--

CREATE TABLE `tm_tahun` (
  `id_tahun` tinyint(4) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_tahun`
--

INSERT INTO `tm_tahun` (`id_tahun`, `tahun`) VALUES
(1, '2015'),
(2, '2016'),
(3, '2017'),
(4, '2018'),
(5, '2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ts_lokasi`
--

CREATE TABLE `ts_lokasi` (
  `id_lok_usul` int(11) NOT NULL,
  `nama_lok` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_kota` tinyint(4) NOT NULL,
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
  ADD KEY `NIM_a4` (`NIM_a4`);

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
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_kelompok` (`id_kelompok`);

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
  MODIFY `id_angkatan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_jurusan`
--
ALTER TABLE `tm_jurusan`
  MODIFY `id_jurusan` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_kota`
--
ALTER TABLE `tm_kota`
  MODIFY `id_kota` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_level`
--
ALTER TABLE `tm_level`
  MODIFY `id_level` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_lokasi`
--
ALTER TABLE `tm_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_prodi`
--
ALTER TABLE `tm_prodi`
  MODIFY `id_prodi` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_provinsi`
--
ALTER TABLE `tm_provinsi`
  MODIFY `id_provinsi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_tahun`
--
ALTER TABLE `tm_tahun`
  MODIFY `id_tahun` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ts_lokasi`
--
ALTER TABLE `ts_lokasi`
  MODIFY `id_lok_usul` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tmst_kelompok`
--
ALTER TABLE `tmst_kelompok`
  ADD CONSTRAINT `tmst_kelompok_ibfk_1` FOREIGN KEY (`NIM_k`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_2` FOREIGN KEY (`NIM_a1`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_3` FOREIGN KEY (`NIM_a2`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_4` FOREIGN KEY (`NIM_a3`) REFERENCES `tm_mahasiswa` (`NIM`),
  ADD CONSTRAINT `tmst_kelompok_ibfk_5` FOREIGN KEY (`NIM_a4`) REFERENCES `tm_mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `tmst_ttd`
--
ALTER TABLE `tmst_ttd`
  ADD CONSTRAINT `tmst_ttd_ibfk_2` FOREIGN KEY (`ka_jur`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_3` FOREIGN KEY (`ka_prodi`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_4` FOREIGN KEY (`korbid_pkl`) REFERENCES `tm_pegawai` (`NIP`),
  ADD CONSTRAINT `tmst_ttd_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tmst_usulan`
--
ALTER TABLE `tmst_usulan`
  ADD CONSTRAINT `tmst_usulan_ibfk_1` FOREIGN KEY (`id_tahun`) REFERENCES `tm_tahun` (`id_tahun`),
  ADD CONSTRAINT `tmst_usulan_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `tm_lokasi` (`id_lokasi`),
  ADD CONSTRAINT `tmst_usulan_ibfk_3` FOREIGN KEY (`id_kelompok`) REFERENCES `tmst_kelompok` (`id_kelompok`);

--
-- Ketidakleluasaan untuk tabel `tm_kota`
--
ALTER TABLE `tm_kota`
  ADD CONSTRAINT `tm_kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `tm_provinsi` (`id_provinsi`);

--
-- Ketidakleluasaan untuk tabel `tm_lokasi`
--
ALTER TABLE `tm_lokasi`
  ADD CONSTRAINT `tm_lokasi_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `tm_kota` (`id_kota`);

--
-- Ketidakleluasaan untuk tabel `tm_mahasiswa`
--
ALTER TABLE `tm_mahasiswa`
  ADD CONSTRAINT `tm_mahasiswa_ibfk_1` FOREIGN KEY (`id_angkatan`) REFERENCES `tm_angkatan` (`id_angkatan`),
  ADD CONSTRAINT `tm_mahasiswa_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tm_pegawai`
--
ALTER TABLE `tm_pegawai`
  ADD CONSTRAINT `tm_pegawai_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tm_level` (`id_level`),
  ADD CONSTRAINT `tm_pegawai_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tm_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tm_prodi`
--
ALTER TABLE `tm_prodi`
  ADD CONSTRAINT `tm_prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `tm_jurusan` (`id_jurusan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
