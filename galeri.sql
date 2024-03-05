-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Mar 2024 pada 01.27
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
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int NOT NULL,
  `namealbum` varchar(255) NOT NULL,
  `desk` varchar(255) NOT NULL,
  `tgl_albm` varchar(255) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `album_foto`
--

CREATE TABLE `album_foto` (
  `id` int NOT NULL,
  `id_album` int NOT NULL,
  `id_foto` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int NOT NULL,
  `jdlfto` varchar(255) NOT NULL,
  `deskfto` text NOT NULL,
  `tglup` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  `fto` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `jdlfto`, `deskfto`, `tglup`, `id_user`, `fto`) VALUES
(71, 'Kafka', 'Honkai Star Rail', '01 March 2024', 19, '../../foto/Kafka Wallpaper.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `tgl_komen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_foto`, `id_user`, `komentar`, `tgl_komen`) VALUES
(181, 71, 19, 'ko', '01-03-2024'),
(184, 71, 19, 'aa', '01-03-2024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likee`
--

CREATE TABLE `likee` (
  `id_like` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `likee`
--

INSERT INTO `likee` (`id_like`, `id_foto`, `id_user`, `status`) VALUES
(3054, 71, 16, 'like'),
(3077, 71, 17, 'like'),
(3078, 71, 17, 'like');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ftopro` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `fullname`, `alamat`, `role`, `ftopro`) VALUES
(16, 'ainz', 'confrim', 'andre@gmail.com', 'Andre ', 'Kota Banjar, Kecamatan Pataruman', 'admin', '../../foto/FNlhFe9dL1Dmu3s on twt.jpg'),
(17, 'rezz', 'murasaki', 'satoru@gmail.com', 'M rezza ', 'Kota Ciamis, Kecamatan Pamarican', 'user', '../../foto/♱.jpg'),
(18, 'Rwhycee', 'reza1234', 'muhammadreza@gmail.com', 'muhammad rezza', 'Pamarican', 'user', '../../foto/Evangelion EVA 01.jpg'),
(19, 'Raiden', 'kaminari', 'ei@gmail.com', 'Raiden Ei', 'Inazuma city', 'user', '../../foto/raiden_shogun.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `album_foto`
--
ALTER TABLE `album_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `likee`
--
ALTER TABLE `likee`
  ADD PRIMARY KEY (`id_like`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT untuk tabel `likee`
--
ALTER TABLE `likee`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3079;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
