<?php
include '../config/config.php';

$id_user = $_SESSION['id_user'];
// Query untuk mengambil data foto berdasarkan email dari tabel tb_user
$query = "SELECT * FROM komentar WHERE hapus = 0 ORDER BY id_komen DESC ";
$kom = mysqli_query($koneksi, $query);

$query = "SELECT id_komen FROM komentar WHERE hapus = 0 ORDER BY id_komen DESC LIMIT 1;";
$lastes = mysqli_query($koneksi, $query);

$query = "SELECT komentar.*, user.*
FROM komentar
INNER JOIN user ON komentar.id_user = user.id_user 
WHERE komentar.hapus = 0
ORDER BY komentar.id_komen DESC";

$wish = mysqli_query($koneksi, $query);



?>