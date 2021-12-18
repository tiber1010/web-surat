-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 17 Des 2021 pada 01.22
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int(11) NOT NULL,
  `no_surat_keluar` varchar(50) NOT NULL,
  `tgl_surat_keluar` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `bidang` enum('data','sekretariat') NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `lampiran` varchar(20) NOT NULL,
  `ringkasan_surat` text NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `no_surat_keluar`, `tgl_surat_keluar`, `tujuan`, `bidang`, `perihal`, `lampiran`, `ringkasan_surat`, `file`) VALUES
(11, 'NO-001/data/12/2021', '2021-12-17', '1', 'data', '1', '1', '-', 'UNDANGAN MAULID.docx'),
(14, 'NO-011/data/12/2021', '2021-12-17', 's', 'sekretariat', 's', 's', '-', 'amin ppg.docx'),
(15, 'NO-014/data/12/2021', '2021-12-17', 'd', 'sekretariat', 'd', 'd', '-', 'SIPP kebijakan.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int(11) NOT NULL,
  `no_surat_masuk` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `no_surat_masuk`, `tanggal_surat`, `perihal`, `tanggal_masuk`, `file`) VALUES
(20, '1', '2021-12-17', '1', '2021-12-17', 'laporan.pdf'),
(21, 'w', '2021-12-17', 'e', '2021-12-17', 'VISI DAN MISI.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kd_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kd_user`, `nama_user`, `jk`, `username`, `password`, `level`) VALUES
(1, 'Halidi Rahman', 'L', 'admin', 'admin', 'admin'),
(3, 'yanti ', 'P', 'yanti', 'yanti', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
