-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2020 pada 13.46
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftar_nilai_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_nilai_siswa`
--

CREATE TABLE `t_nilai_siswa` (
  `id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nilai_pabp` int(11) NOT NULL DEFAULT 0,
  `nilai_b_indo` int(11) NOT NULL DEFAULT 0,
  `nilai_ppkn` int(11) NOT NULL DEFAULT 0,
  `nilai_b_ing` int(11) NOT NULL DEFAULT 0,
  `nilai_mtk` int(11) NOT NULL DEFAULT 0,
  `nilai_b_sund` int(11) NOT NULL DEFAULT 0,
  `nilai_pkk` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `t_nilai_siswa`
--

INSERT INTO `t_nilai_siswa` (`id`, `nis`, `nama`, `jenis_kelamin`, `nilai_pabp`, `nilai_b_indo`, `nilai_ppkn`, `nilai_b_ing`, `nilai_mtk`, `nilai_b_sund`, `nilai_pkk`) VALUES
(5, 181910014, 'Fauzan Rizkyana Gunawan', 'Laki-laki', 90, 85, 89, 80, 95, 77, 88),
(6, 181910001, 'Adam Azizurrohman', 'Laki-laki', 90, 85, 80, 80, 80, 82, 91),
(7, 181910002, 'Afif. M. A', 'Laki-laki', 100, 88, 78, 89, 90, 83, 82),
(8, 181910003, 'Alfito. A. D', 'Laki-laki', 88, 80, 80, 80, 87, 85, 85),
(9, 181910004, 'Alifa. L. B', 'Laki-laki', 90, 90, 90, 90, 90, 90, 90),
(11, 181910006, 'Anggita. A. P', 'Perempuan', 100, 90, 90, 90, 90, 90, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_nilai_siswa`
--
ALTER TABLE `t_nilai_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_nilai_siswa`
--
ALTER TABLE `t_nilai_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
