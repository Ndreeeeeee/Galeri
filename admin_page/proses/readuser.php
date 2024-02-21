<?php
include '../config/config.php';
// Ambil username dari sesi
$id_useer = $_SESSION['id_user'];

// Query untuk mengambil data foto berdasarkan username dari tabel tb_user
$query = "SELECT * FROM user WHERE id_user = '$id_useer'";
$result = mysqli_query($koneksi, $query);

$total  = mysqli_query($koneksi, 
"SELECT u.id_user, u.username, COUNT(f.id_foto) AS total_foto
FROM user u
LEFT JOIN foto f ON u.id_user = f.id_user
WHERE u.id_user = $id_useer
GROUP BY u.id_user 
");

$query = "SELECT COUNT(id_user) as total FROM album WHERE id_user = $id_useer";
$tutal = mysqli_query($koneksi, $query);

$query = 
"SELECT COUNT(f.id_foto) AS total 
FROM album AS a 
JOIN album_foto AS f ON a.id_album = f.id_album 
WHERE a.id_user = $id_useer;
";
$tutul = mysqli_query($koneksi, $query);


$query1 = "SELECT * FROM user";
$result1 = mysqli_query($koneksi, $query1);

/* $total  = mysqli_query($koneksi, "SELECT COUNT(username) AS total FROM user "); */
?>