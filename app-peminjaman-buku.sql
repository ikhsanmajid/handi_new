-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2021 pada 23.17
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app-peminjaman-buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tahun` int(50) NOT NULL,
  `kategori_buku` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `penerbit`, `penulis`, `tahun`, `kategori_buku`, `jumlah`, `cover`) VALUES
(1, 12, 'Meme', 'erlangga', 'dwi', 2001, 'ilmiah', 90, 'buku.png'),
(2, 13, 'Bahasa Indonesia', 'graha', 'Jiraiya', 2018, 'Belajar', 70, 'buku2.png'),
(3, 14, 'Matematika', 'graha', 'Kinan', 2016, 'Belajar', 80, 'buku3.png'),
(4, 15, 'IPA', 'first media', 'mediatama', 2014, 'Belajar', 60, 'buku3.png'),
(5, 17, 'IPS', 'firstMedia', 'mediatama', 2015, 'belajar', 80, 'buku3.png'),
(6, 18, 'Jaringan Komputer', 'techindo', 'wahyu', 2019, 'teknologi', 90, 'buku1.png'),
(7, 19, 'Sistem Informasi', 'techindo', 'indo', 2020, 'teknologi', 90, 'buku4.png'),
(10, 20, 'Percabangan', 'erlangga', 'yoga', 0, 'pelajaran', 4263, '60f6fd9a94a74.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `jenisKelamin` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `noTelp` varchar(20) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namaLengkap`, `jenisKelamin`, `alamat`, `noTelp`, `level`) VALUES
(2, 'admin', 'admin', 'farhan', 'Laki-Laki', 'solo', '0812345612', 'admin'),
(3, 'tata', '123', 'tata salsa', 'perempuan', 'karanganyar', '08124125123', 'anggota'),
(4, 'rara', '123', 'raaaaaaaaaa', 'Perempuan', 'gaga', '215123421', 'anggota'),
(5, 'reza', '123', 'reza tul', 'Laki-Laki', 'polo', '0812341231', 'anggota'),
(6, 'farhan', '123', 'handika', 'Laki-Laki', 'selokaton', '08123456789', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
