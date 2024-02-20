-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Feb 2024 pada 00.34
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
  `tgl_albm` date NOT NULL,
  `id_user` int NOT NULL
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
  `likefto` int NOT NULL,
  `id_album` int NOT NULL,
  `id_user` int NOT NULL,
  `fto` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `jdlfto`, `deskfto`, `tglup`, `likefto`, `id_album`, `id_user`, `fto`) VALUES
(5, 'Makima', 's', '31 January 2024', 0, 0, 3, '../foto/makiam.jpg'),
(6, 'Raiden Ei', 'istriku', '31 January 2024', 0, 0, 3, '../foto/WhatsApp Image 2022-08-25 at 07.55.03.jpeg'),
(7, 'Sukuna', 'Stand Proud', '31 January 2024', 0, 0, 3, '../foto/stand proud.jpg'),
(9, 'As A mantis', 'kake', '31 January 2024', 0, 0, 3, '../foto/genshin-impact-anime-boys-zhongli-genshin-impact-hd-wallpaper-preview.jpg'),
(10, 'MOnarch', 'aa', '31 January 2024', 0, 0, 3, '../foto/WhatsApp Image 2022-08-25 at 07.54.49.jpeg'),
(11, 'Reze', 'Bum', '31 January 2024', 0, 0, 3, '../foto/reze_digital_art_x4.jpg'),
(12, 'wp', 'ecchi', '31 January 2024', 0, 0, 4, '../foto/wlp shogun.png'),
(13, 'mama', 'aku takut', '31 January 2024', 0, 0, 3, '../foto/huaa.jfif'),
(14, 'ora ora', 'stra platinum', '31 January 2024', 0, 0, 3, '../foto/obkZH00_gif (450×253).gif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `komentar` text NOT NULL,
  `tgl_komen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `likee`
--

CREATE TABLE `likee` (
  `id_like` int NOT NULL,
  `id_foto` int NOT NULL,
  `id_user` int NOT NULL,
  `tgl_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `fullname`, `alamat`, `role`) VALUES
(3, 'ainz', 'zenzen', 'andreilhamnugraha@gmail.com', 'Andre Ilham Nugraha', 'Dobo', 'user'),
(4, 'hitam', 'gilang', 'satoru@gmail.com', 'gilang', 'cisaga', 'user'),
(5, 'SkyL', 'darkside', 'gojo@gmail.com', 'zahwan', 'woeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

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
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likee`
--
ALTER TABLE `likee`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
