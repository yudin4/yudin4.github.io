-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2021 pada 10.33
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--
CREATE DATABASE IF NOT EXISTS `akademik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `akademik`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `kode_kelas` varchar(10) NOT NULL,
  `kode_matkul` varchar(10) DEFAULT NULL,
  `ruangan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `kode_matkul`, `ruangan`) VALUES
('TSI103/02', 'TSI 103', 'H1.1'),
('TSI106/02', 'TSI 106', 'H2.4'),
('TSI108/02', 'TSI 108', 'LD. JSI'),
('TSI207/01', 'TSI 207', 'H2.1'),
('TSI303/02', 'TSI 303', 'H5.2'),
('TSI415/01', 'TSI 415', 'H6.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mahasiswa`
--

DROP TABLE IF EXISTS `kelas_mahasiswa`;
CREATE TABLE `kelas_mahasiswa` (
  `kode_kelas` varchar(10) NOT NULL,
  `nim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`kode_kelas`, `nim`) VALUES
('TSI103/02', 2011521020),
('TSI103/02', 2011527002),
('TSI106/02', 1911522002),
('TSI106/02', 2011521006),
('TSI106/02', 2011522017),
('TSI108/02', 1911521002),
('TSI108/02', 2011521009),
('TSI108/02', 2011522012),
('TSI207/01', 1911521023),
('TSI207/01', 1911523011),
('TSI207/01', 2011521009),
('TSI303/02', 1911521002),
('TSI303/02', 1911522002),
('TSI303/02', 2011521006),
('TSI303/02', 2011522012),
('TSI415/01', 1911521001),
('TSI415/01', 1911521023),
('TSI415/01', 1911523011);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`) VALUES
(1911521001, 'Nadya Gusdita', 'Desa Balai Naras, Pariaman, Sumatera Barat', 'Pariaman', '2001-08-15'),
(1911521002, 'Ginda Teguh Imani', 'Jl. Baru Simpang 8, Padang Panjang, Sumatera Barat', 'Padang Panjang', '2000-11-10'),
(1911521023, 'Tasya Ade Karmila', 'Jl. Lintas Riau-Sumut, Bagan Batu, Riau', 'Padang Sidempuan', '2001-05-13'),
(1911522002, 'Untung Jamari', 'Padang Sikabu, Payakumbuh, Sumatera Barat', '50 Kota', '2000-01-29'),
(1911523011, 'Fadillah Syafitri NST', 'Ds. Padang Bulan, Mandailing Natal, Sumatera Utara', 'Padang Bulan', '2001-07-27'),
(2011521006, 'Reysha Irsyalina', 'Kubang Raya Perumahan Astam House, Pekanbaru, Riau', 'Pekanbaru', '2002-01-28'),
(2011521009, 'Riska Shifa Salsabila', 'Jl. Mandiangin, Bukittinggi, Sumatera Barat', 'Payakumbuh', '2001-07-23'),
(2011521020, 'Pawal Atakosi', 'Jl. Kebun Jati, Sawahlunto, Sumatera Barat', 'Sawahlunto', '2002-03-12'),
(2011522012, 'Rahmadina', 'Jl. Siteba, Padang, Sumatera Barat', 'Padang', '2002-05-01'),
(2011522017, 'Vallen Adithya Rekhsana', 'Padang', 'Padang', '2002-01-01'),
(2011527002, 'Riski Juni Darmawan', 'Jl. Syiah Kuala, Aceh Barat, Aceh', 'Bukittinggi', '2002-06-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul` (
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(30) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('TSI 103', 'Dasar-Dasar Pemograman', 3),
('TSI 106', 'Sistem Informasi Manajemen', 4),
('TSI 108', 'Praktikum SDA', 1),
('TSI 207', 'AOK', 3),
('TSI 303', 'Data Mining', 2),
('TSI 415', 'Pemograman Database', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indeks untuk tabel `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD PRIMARY KEY (`kode_kelas`,`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matkul` (`kode_matkul`);

--
-- Ketidakleluasaan untuk tabel `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
