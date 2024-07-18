-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 05:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbujianonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_user`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `username`, `password`) VALUES
(3, '', 'Suhermin, S.Kom', 'Suhermin, S.Kom', 'ibusuhermin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(5) NOT NULL,
  `id_peserta` int(5) NOT NULL,
  `id_soal_ujian` int(5) NOT NULL,
  `jawaban` varchar(15) NOT NULL,
  `skor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id_jawaban`, `id_peserta`, `id_soal_ujian`, `jawaban`, `skor`) VALUES
(1, 2, 1, 'A', '1'),
(2, 2, 1, 'A', '1'),
(3, 2, 1, 'A', '1'),
(4, 7, 1, 'A', '1'),
(5, 7, 2, 'B', '0'),
(6, 9, 1, 'D', '0'),
(7, 10, 1, 'C', '1'),
(8, 10, 2, 'A', '1'),
(9, 13, 7, 'A', '1'),
(10, 13, 6, 'B', '0'),
(11, 15, 7, 'A', '1'),
(12, 15, 8, 'D', '1'),
(13, 15, 6, 'A', '1'),
(14, 17, 9, 'A', '1'),
(15, 17, 8, 'D', '1'),
(16, 17, 7, 'A', '1'),
(17, 17, 6, 'E', '0'),
(18, 14, 8, 'E', '0'),
(19, 14, 6, 'E', '0'),
(20, 14, 7, 'A', '1'),
(21, 14, 9, 'E', '0'),
(22, 24, 17, 'D', '1'),
(23, 24, 19, 'B', '1'),
(24, 24, 18, 'B', '1'),
(25, 24, 20, 'B', '0'),
(26, 24, 16, 'C', '1'),
(27, 25, 18, 'A', '0'),
(28, 25, 16, 'C', '1'),
(29, 25, 17, 'B', '0'),
(30, 25, 19, 'C', '0'),
(31, 25, 20, 'C', '1'),
(32, 26, 19, 'B', '1'),
(33, 26, 20, 'C', '1'),
(34, 26, 18, 'B', '1'),
(35, 26, 16, 'C', '1'),
(36, 26, 17, 'D', '1'),
(37, 48, 3, 'A', '1'),
(38, 48, 4, 'A', '0'),
(39, 48, 3, 'A', '1'),
(40, 48, 4, 'A', '0'),
(41, 48, 3, 'B', '0'),
(42, 48, 4, 'A', '0'),
(43, 48, 4, 'A', '0'),
(44, 48, 3, 'B', '0'),
(45, 49, 3, 'A', '1'),
(46, 49, 4, 'A', '0'),
(47, 49, 3, 'A', '1'),
(48, 49, 4, 'A', '0'),
(49, 49, 4, 'A', '0'),
(50, 49, 3, 'B', '0'),
(51, 49, 4, 'B', '1'),
(52, 49, 3, 'A', '1'),
(53, 49, 3, 'A', '1'),
(54, 49, 4, 'B', '1'),
(55, 50, 3, 'A', '1'),
(56, 50, 4, 'B', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_ujian`
--

CREATE TABLE `tb_jenis_ujian` (
  `id_jenis_ujian` int(11) NOT NULL,
  `jenis_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_jenis_ujian`
--

INSERT INTO `tb_jenis_ujian` (`id_jenis_ujian`, `jenis_ujian`) VALUES
(3, 'UAS Genap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`) VALUES
(7, 'XI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_matapelajaran` int(11) NOT NULL,
  `matapelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`id_matapelajaran`, `matapelajaran`) VALUES
(17, 'Bahasa Indonesia'),
(18, 'Matematika'),
(19, 'Bahasa Inggris'),
(20, 'Sejarah'),
(21, 'IPA'),
(22, 'IPS'),
(23, 'PPKN'),
(24, 'Bahasa Arab'),
(25, 'Fiqih'),
(26, 'SKI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi_pelajaran`
--

CREATE TABLE `tb_materi_pelajaran` (
  `id_materi_pelajaran` int(11) NOT NULL,
  `materi_pelajaran` varchar(255) NOT NULL,
  `alur_tujuan_pembelajaran` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `matapelajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_materi_pelajaran`
--

INSERT INTO `tb_materi_pelajaran` (`id_materi_pelajaran`, `materi_pelajaran`, `alur_tujuan_pembelajaran`, `deskripsi`, `file`, `matapelajaran`) VALUES
(3, 'Ragam Aplikasi Komunikasi Data', ' M.1 Memahami ragam aplikasi komunikasi data ,M.1 Menyajikan karakteristik ragam aplikasi komunikasi data', '', 'Ragam Aplikasi Komunikasi Data.pdf', 'Teknologi Layanan Jaringan'),
(4, 'Standar Komunikasi Data ', 'M.2 Menganalisis berbagaia standar komunikasi data,M.2 Menyajikan berbagai standar komunikasi data', '', 'Standar Komunikasi Data.pdf', 'Teknologi Layanan Jaringan'),
(5, 'Proses Komunikasi Data ', 'M.3 Menganalisis proses komunikasi data dalam jaringan,M.3 Menyajikan hasil analisis proses komunikasi data ', '', 'Proses Komunikasi Data.pdf', 'Teknologi Layanan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_materi_pelajaran` int(11) NOT NULL,
  `id_matapelajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_jenis_ujian` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `jam_ujian` time NOT NULL,
  `durasi_ujian` int(11) NOT NULL,
  `timer_ujian` int(11) NOT NULL,
  `status_ujian` tinyint(1) NOT NULL,
  `status_ujian_ujian` int(11) NOT NULL,
  `benar` varchar(20) NOT NULL,
  `salah` varchar(20) NOT NULL,
  `nilai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_materi_pelajaran`, `id_matapelajaran`, `id_siswa`, `id_jenis_ujian`, `tanggal_ujian`, `jam_ujian`, `durasi_ujian`, `timer_ujian`, `status_ujian`, `status_ujian_ujian`, `benar`, `salah`, `nilai`) VALUES
(2, 2, 6, 39, 1, '2020-05-02', '09:05:00', 10, 600, 2, 2, '3', '0', '100'),
(4, 2, 6, 40, 1, '2020-05-03', '16:30:00', 5, 300, 1, 0, '', '', ''),
(5, 2, 6, 41, 1, '2020-05-03', '17:45:00', 2, 120, 1, 0, '', '', ''),
(7, 2, 6, 38, 1, '2020-05-05', '06:30:00', 2, 120, 2, 2, '1', '1', '50'),
(8, 2, 6, 2, 1, '2020-06-13', '15:46:00', 5, 300, 2, 2, '0', '0', '0'),
(9, 2, 6, 3, 1, '2020-06-13', '15:49:00', 5, 300, 2, 2, '0', '1', '0'),
(10, 2, 6, 5, 1, '2020-06-17', '21:30:00', 10, 600, 2, 2, '2', '0', '100'),
(11, 2, 6, 6, 1, '2020-06-23', '21:45:00', 3, 180, 1, 0, '', '', ''),
(12, 2, 8, 7, 3, '2020-06-24', '07:15:00', 10, 600, 1, 0, '', '', ''),
(13, 2, 8, 8, 1, '2020-06-27', '15:15:00', 10, 600, 2, 2, '1', '1', '50'),
(14, 2, 8, 5, 1, '2020-06-29', '09:30:00', 10, 600, 2, 2, '1', '3', '25'),
(15, 2, 8, 9, 1, '2020-06-28', '17:30:00', 10, 600, 2, 2, '3', '0', '100'),
(16, 2, 8, 7, 3, '2020-06-28', '20:20:00', 10, 600, 1, 0, '', '', ''),
(17, 2, 8, 10, 3, '2020-06-28', '20:20:00', 10, 600, 2, 2, '3', '1', '75'),
(18, 2, 8, 5, 1, '2020-06-29', '09:30:00', 10, 600, 1, 0, '', '', ''),
(19, 2, 10, 5, 1, '2020-06-30', '23:30:00', 10, 600, 2, 2, '0', '0', '0'),
(20, 2, 10, 4, 1, '2020-07-31', '07:30:00', 2, 120, 1, 0, '', '', ''),
(23, 2, 18, 4, 1, '2022-11-07', '22:00:00', 15, 900, 1, 0, '', '', ''),
(24, 2, 18, 5, 1, '2022-11-07', '22:00:00', 15, 900, 2, 2, '4', '1', '80'),
(25, 2, 18, 11, 1, '2022-11-07', '22:00:00', 10, 600, 2, 2, '2', '3', '40'),
(26, 2, 18, 12, 1, '2022-11-07', '22:00:00', 10, 600, 2, 2, '5', '0', '100'),
(27, 2, 0, 16, 3, '2024-06-22', '23:43:00', 60, 0, 2, 2, '0', '0', '0'),
(28, 3, 0, 19, 3, '2024-06-24', '15:26:00', 60, 0, 2, 2, '0', '0', '0'),
(29, 3, 0, 25, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(30, 3, 0, 26, 3, '2024-06-24', '15:26:00', 60, 0, 1, 1, '', '', ''),
(31, 3, 0, 27, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(32, 3, 0, 28, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(33, 3, 0, 29, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(34, 3, 0, 30, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(35, 3, 0, 31, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(36, 3, 0, 32, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(37, 3, 0, 33, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(38, 3, 0, 34, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(39, 3, 0, 35, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(40, 3, 0, 36, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(41, 3, 0, 37, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(42, 3, 0, 38, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(43, 3, 0, 39, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(44, 3, 0, 40, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(45, 3, 0, 41, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(46, 3, 0, 42, 3, '2024-06-24', '15:26:00', 60, 0, 1, 0, '', '', ''),
(47, 3, 0, 19, 3, '2024-06-24', '21:15:00', 50, 0, 2, 2, '0', '0', '0'),
(48, 3, 0, 19, 3, '2024-06-24', '21:22:00', 50, 0, 2, 2, '2', '6', '25'),
(49, 3, 0, 19, 3, '2024-06-24', '21:47:00', 50, 0, 2, 2, '6', '4', '60'),
(50, 3, 0, 19, 3, '2024-06-24', '22:13:00', 50, 0, 2, 2, '2', '0', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nis` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `nis`, `username`, `password`) VALUES
(19, 7, 'Hilyatul Mashun', NULL, 'Hilyatul Mashun', 'hilyatunmashun'),
(25, 7, 'Mufiadatul Aidah', '', 'Mufiadatul Aidah', 'mufiadatulaidah'),
(26, 7, 'Nurul Farida', '', 'Nurul Farida', 'nurulfarida'),
(27, 7, 'Yuliya Dewi Masitho', '', 'Yuliya Dewi Masitho', 'yuliadewimasitho'),
(28, 7, 'Maulina', '', 'Maulina', 'maulina'),
(29, 7, 'Febriana Isnainiyah', '', 'Febriana Isnainiyah', 'febrianaisnainiyah'),
(30, 7, 'Fahmi Hidayatulloh', '', 'Fahmi Hidayatulloh', 'fahmihidayatulloh'),
(31, 7, 'Lailatul Fitriyah', '', 'Lailatul Fitriyah', 'lailatulfitriyah'),
(32, 7, 'Febri Al Faris', '', 'Febri Al Faris', 'febrialfaris'),
(33, 7, 'Ahmad Zheini Zhen', '', 'Ahmad Zheini Zhen', 'ahmadzheinizhen'),
(34, 7, 'Inayatul Maghfiroh', '', 'Inayatul Maghfiroh', 'inayatulmaghfiroh'),
(35, 7, 'Rara Novianti', '', 'Rara Novianti', 'raranovianti'),
(36, 7, 'Fadillah Aprianti', '', 'Fadillah Aprianti', 'fadillahaprianti'),
(37, 7, 'Maharani Tussahro', '', 'Maharani Tussahro', 'maharanitussahro'),
(38, 7, 'Shela Amalia', '', 'Shela Amalia', 'shelaamalia'),
(39, 7, 'Yasmin Qotrun Nada', '', 'Yasmin Qotrun Nada', 'yasminqotrunnada'),
(40, 7, 'Irma Isnaini', '', 'Irma Isnaini', 'irmaisnaini'),
(41, 7, 'Ayu Dwi Lestari', '', 'Ayu Dwi Lestari', 'ayudesilestari'),
(42, 7, 'Madania Kamila', '', 'Madania Kamila', 'madaniakamila');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal_ujian`
--

CREATE TABLE `tb_soal_ujian` (
  `id_soal_ujian` int(11) NOT NULL,
  `matapelajaran` varchar(255) NOT NULL,
  `alur_tujuan_pembelajaran` varchar(255) NOT NULL,
  `pertanyaan` text NOT NULL,
  `ranah_kognitif` varchar(2) NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `kunci_jawaban` varchar(1) NOT NULL,
  `id_materi_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_soal_ujian`
--

INSERT INTO `tb_soal_ujian` (`id_soal_ujian`, `matapelajaran`, `alur_tujuan_pembelajaran`, `pertanyaan`, `ranah_kognitif`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`, `id_materi_pelajaran`) VALUES
(1, 'T', ' ', 'a', 'C1', 'a', 'a', 'a', 'a', 'a', 'A', 0),
(2, 'T', ' ', 'g', 'C1', 'q', 'q', 'q', 'q', 'q', 'B', 0),
(3, '', ' M.1 Memahami ragam aplikasi komunikasi data ,M.1 Menyajikan karakteristik ragam aplikasi komunikasi data', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'C1', 'aaa', 'bbb', 'ccc', 'ddd', 'eeee', 'A', 3),
(4, '', ' M.1 Memahami ragam aplikasi komunikasi data ,M.1 Menyajikan karakteristik ragam aplikasi komunikasi data', 'bbbbbbbbbbbbbbbbbbbbbbb', 'C1', 'aa', 'bb', 'cc', 'dd', 'ee', 'B', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal_ujian` (`id_soal_ujian`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  ADD PRIMARY KEY (`id_jenis_ujian`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_matapelajaran`);

--
-- Indexes for table `tb_materi_pelajaran`
--
ALTER TABLE `tb_materi_pelajaran`
  ADD PRIMARY KEY (`id_materi_pelajaran`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_matakuliah` (`id_matapelajaran`),
  ADD KEY `id_mahasiswa` (`id_siswa`),
  ADD KEY `id_jenis_ujian` (`id_jenis_ujian`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  ADD PRIMARY KEY (`id_soal_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_jenis_ujian`
--
ALTER TABLE `tb_jenis_ujian`
  MODIFY `id_jenis_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_matapelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_materi_pelajaran`
--
ALTER TABLE `tb_materi_pelajaran`
  MODIFY `id_materi_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_soal_ujian`
--
ALTER TABLE `tb_soal_ujian`
  MODIFY `id_soal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
