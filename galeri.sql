-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Mar 2024 pada 15.53
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
(83, 'Raiden Ei', 'The one and only supreme god', '05 March 2024', 16, '../../foto/FNlhFe9dL1Dmu3s on twt.jpg'),
(84, 'Raiden', 'Shogun', '05 March 2024', 16, '../../foto/wallpaperflare.com_wallpaper.jpg'),
(85, 'Evengilion 01', 'Zankoku naten si no teeze', '05 March 2024', 16, '../../foto/Evangelion EVA 01.jpg'),
(86, 'Gojo', 'JJK', 'Tuesday, 5 March 2024', 19, '../../foto/♱.jpg'),
(87, 'Ellie and oel', 'The Last Of Them', 'Tuesday, 5 March 2024', 19, '../../foto/download (6).jpg'),
(88, 'Walter', 'Breaking Bad', 'Tuesday, 5 March 2024', 19, '../../foto/Walter.jpg'),
(89, 'Windows', 'The Last Of Us', 'Tuesday, 5 March 2024', 17, '../../foto/My favourite window_.gif'),
(90, 'Sukuna', 'JJK', 'Tuesday, 5 March 2024', 17, '../../foto/Sukuna.gif');

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
(212, 83, 17, 'Okeh', 'Tuesday, 5 March 2024'),
(213, 86, 17, 'Wow', 'Tuesday, 5 March 2024'),
(214, 89, 17, 'aa', 'Tuesday, 5 March 2024');

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
(3591, 86, 19, 'like'),
(3592, 85, 19, 'like'),
(3593, 83, 19, 'like'),
(3594, 84, 19, 'like'),
(3595, 86, 17, 'like'),
(3596, 88, 17, 'like');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id_repo` int NOT NULL,
  `laporan` varchar(255) NOT NULL,
  `id_user` int NOT NULL,
  `id_foto` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id_repo`, `laporan`, `id_user`, `id_foto`, `username`, `email`) VALUES
(23, 'Informasi yang Keliru', 17, 83, 'ainz', 'andre@gmail.com');

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
(16, 'ainz', 'f159e80999100988754bca1312e7a9ff', 'andre@gmail.com', 'Andre ', 'Kota Banjar, Kecamatan Pataruman', 'admin', '../../foto/FNlhFe9dL1Dmu3s on twt.jpg'),
(17, 'rezz', 'bb98b1d0b523d5e783f931550d7702b6', 'satoru@gmail.com', 'M rezza ', 'Kota Ciamis, Kecamatan Pamarican', 'user', '../../foto/𝙔𝙐𝙆𝙄 𝙏𝙎𝙐𝙆𝙐𝙈𝙊.jpg'),
(19, 'Raiden', '1e7d2d24b33bcee03f93ed61de388c38', 'ei@gmail.com', 'Raiden Ei', 'Inazuma city', 'user', '../../foto/raiden_shogun.jpg');

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
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_repo`);

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
  MODIFY `id_album` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `album_foto`
--
ALTER TABLE `album_foto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT untuk tabel `likee`
--
ALTER TABLE `likee`
  MODIFY `id_like` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3597;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id_repo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
