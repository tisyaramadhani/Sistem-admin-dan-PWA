-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2022 pada 19.31
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_coursecategory`
--

CREATE TABLE `tb_coursecategory` (
  `id_coursecategory` int(11) NOT NULL,
  `nama_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_coursecategory`
--

INSERT INTO `tb_coursecategory` (`id_coursecategory`, `nama_course`) VALUES
(1, 'KeperawatanX'),
(2, 'KeperawatanXI'),
(3, 'KeperawatanXII'),
(15, 'Farmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keperawatanx`
--

CREATE TABLE `tb_keperawatanx` (
  `id_course` int(11) NOT NULL,
  `nama_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keperawatanx`
--

INSERT INTO `tb_keperawatanx` (`id_course`, `nama_course`) VALUES
(1, 'Keperawatan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keperawatanxi`
--

CREATE TABLE `tb_keperawatanxi` (
  `id_course` int(11) NOT NULL,
  `nama_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keperawatanxi`
--

INSERT INTO `tb_keperawatanxi` (`id_course`, `nama_course`) VALUES
(1, 'Keperawatan menengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keperawatanxii`
--

CREATE TABLE `tb_keperawatanxii` (
  `id_course` int(11) NOT NULL,
  `nama_course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keperawatanxii`
--

INSERT INTO `tb_keperawatanxii` (`id_course`, `nama_course`) VALUES
(1, 'Keperawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_jabatan`) VALUES
(312101026, 'rihan.3312101022', '123456', 'Admin'),
(433221036, 'khairul.433221036', '567123', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_coursecategory`
--
ALTER TABLE `tb_coursecategory`
  ADD PRIMARY KEY (`id_coursecategory`);

--
-- Indeks untuk tabel `tb_keperawatanx`
--
ALTER TABLE `tb_keperawatanx`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `tb_keperawatanxi`
--
ALTER TABLE `tb_keperawatanxi`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `tb_keperawatanxii`
--
ALTER TABLE `tb_keperawatanxii`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_coursecategory`
--
ALTER TABLE `tb_coursecategory`
  MODIFY `id_coursecategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_keperawatanx`
--
ALTER TABLE `tb_keperawatanx`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_keperawatanxi`
--
ALTER TABLE `tb_keperawatanxi`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_keperawatanxii`
--
ALTER TABLE `tb_keperawatanxii`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_keperawatanxi`
--
ALTER TABLE `tb_keperawatanxi`
  ADD CONSTRAINT `tb_keperawatanxi_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_keperawatanx` (`id_course`);

--
-- Ketidakleluasaan untuk tabel `tb_keperawatanxii`
--
ALTER TABLE `tb_keperawatanxii`
  ADD CONSTRAINT `tb_keperawatanxii_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_keperawatanx` (`id_course`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
