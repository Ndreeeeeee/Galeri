<?php
include '../config/config.php';
// Ambil username dari sesi
$email = $_SESSION['username'];

// Query untuk mengambil data foto berdasarkan username dari tabel tb_user
$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

$query1 = "SELECT * FROM user";
$result1 = mysqli_query($koneksi, $query1);

$total  = mysqli_query($koneksi, "SELECT COUNT(username) AS total FROM user ");
?>