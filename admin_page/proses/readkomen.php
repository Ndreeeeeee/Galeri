<?php
include '../config/config.php';

$id_user = $_SESSION['id_user'];
// Query untuk mengambil data foto berdasarkan email dari tabel tb_user
$query = "SELECT * FROM komentar";
$kom = mysqli_query($koneksi, $query);


$query = "SELECT komentar.*, user.*
FROM komentar
INNER JOIN user ON komentar.id_user = user.id_user";

$wish = mysqli_query($koneksi, $query);



?>