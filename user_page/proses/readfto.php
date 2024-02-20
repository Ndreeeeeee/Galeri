<?php
include '../config/config.php';

$id_user = $_SESSION['id_user'];
// Query untuk mengambil data foto berdasarkan email dari tabel tb_user
$query = "SELECT * FROM foto WHERE id_user = $id_user";
$hasil = mysqli_query($koneksi, $query);



?>