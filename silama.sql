-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2020 pada 05.08
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_berita` enum('Menunggu Persetujuan','Accept','.') NOT NULL,
  `jenis_berita` enum('Artikel','Informasi','Kegiatan') NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_png` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_rt` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `status` enum('Menunggu Konfirmasi','Sedang di Proses') NOT NULL,
  `tanggungjawab` varchar(25) NOT NULL,
  `tanggal_dibuat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_permohonan_surat`
--

CREATE TABLE `tb_permohonan_surat` (
  `id_permohonan_surat` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `no_regis` varchar(50) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `tempat` varchar(125) NOT NULL,
  `tanggal_lahir` varchar(125) NOT NULL,
  `pekerjaan` varchar(125) NOT NULL,
  `jekel` enum('laki laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_dibuat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nik`, `name`, `email`, `gambar`, `password`, `id_role`, `status`, `tanggal_dibuat`) VALUES
(0, '234', 'Vallen', 'andimgalih@gmail.com', '1593963124842_2256709931.jpg', '$2y$10$upyinDDN8rzinbegQEL5F.oAW46vYoN6g6PizIS5ayM2qMFU0pKMu', 2, 1, 1607133939);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_png`);

--
-- Indeks untuk tabel `tb_permohonan_surat`
--
ALTER TABLE `tb_permohonan_surat`
  ADD PRIMARY KEY (`id_permohonan_surat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
