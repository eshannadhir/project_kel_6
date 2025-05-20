-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Bulan Mei 2025 pada 00.06
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$q6AbSbpr5nIyHrV3IS3G0Opf0QtmKBb7ff3VD/Hpl7Xxh9Ii8KOiC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_laporan` varchar(255) NOT NULL,
  `tanggal_pelapor` date NOT NULL,
  `kategori_laporan` varchar(255) NOT NULL,
  `tanggapan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `judul`, `isi_laporan`, `tanggal_pelapor`, `kategori_laporan`, `tanggapan`) VALUES
(12, 'KONSUMSI KORBAN BANJIR', 'Banjir daerah Handil Bakti, Banjir membuat masyarakat tidak bisa beraktivitas !', '2025-05-06', 'bantuan sosisal', 'Terimakasih sudah melapor!'),
(14, 'Bantuan korban kebakaran', 'Telah terjadi kebakaran dikota banjarmasin sekitar pukul 11.43 wita di jalan tembus pramuka komplek dharma budi blok E RT 5 RW 1', '2025-05-21', 'kebakaran', 'Terimakasih sudah melapor!'),
(15, 'test', 'fddthe', '2025-05-02', 'kebakaran', 'oke'),
(18, 'banjir', 'telah terjadi banjir di daerah .........', '2025-05-18', 'bantuan sosisal', 'oke'),
(19, 'tes', 'percobaan terakhir ', '2025-05-20', 'masyarakat', 'terimakasih sudah melapor!'),
(20, 'kebakaran', 'sidiqqqqqqq.....................', '2025-05-19', 'masyarakat', 'oke'),
(21, 'bantuan sosial', 'bantuan sosial untuk korban longsir', '2025-05-19', 'bantuan sosisal', 'terimakasih sudah melapor');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
