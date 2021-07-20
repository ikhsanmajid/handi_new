-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 01:29 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
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
-- Dumping data for table `buku`
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
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(254) NOT NULL,
  `kd_buku` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `waktu_peminjaman` datetime NOT NULL,
  `waktu_pengembalian` datetime NOT NULL,
  `denda` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kd_buku`, `username`, `status`, `waktu_peminjaman`, `waktu_pengembalian`, `denda`) VALUES
(7, 12, 'tata', 'OnGoing', '2021-07-21 01:02:32', '2021-07-21 01:02:32', 0),
(8, 12, 'tata', 'OnGoing', '2021-07-21 01:02:32', '2021-07-21 01:02:32', 0),
(9, 17, 'rara', 'Kembali', '2021-07-21 01:02:47', '2021-07-21 01:02:47', 0),
(10, 17, 'rara', 'Kembali', '2021-07-21 01:02:47', '2021-07-21 01:02:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `namaLengkap`, `jenisKelamin`, `alamat`, `noTelp`, `level`) VALUES
(2, 'admin', 'admin', 'farhan', 'Laki-Laki', 'solo', '0812345612', 'admin'),
(3, 'tata', '123', 'tata salsa', 'perempuan', 'karanganyar', '08124125123', 'anggota'),
(4, 'rara', '123', 'raaaaaaaaaa', 'Perempuan', 'gaga', '215123421', 'anggota'),
(5, 'reza', '123', 'reza tul', 'Laki-Laki', 'polo', '0812341231', 'anggota'),
(6, 'farhan', '123', 'handika', 'Laki-Laki', 'selokaton', '08123456789', 'anggota'),
(7, 'ikhsan', 'majid', 'ikhsanmajid', 'Laki-Laki', 'asd', '123123', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
