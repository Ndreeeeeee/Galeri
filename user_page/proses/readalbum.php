<?php
include '../config/config.php';

$id_user = $_SESSION["id_user"];

$query = "SELECT * FROM album WHERE id_user = $id_user AND hapus = 0";
$curse = mysqli_query($koneksi, $query);

$query = "SELECT *
FROM album_foto
INNER JOIN foto ON album_foto.id_foto = foto.id_foto WHERE foto.hapus = 0";
$mut = mysqli_query($koneksi, $query);

$query = "SELECT *
FROM album_foto
INNER JOIN foto ON album_foto.id_foto = foto.id_foto
WHERE foto.hapus = 0
ORDER BY album_foto.id DESC";
$scr = mysqli_query($koneksi, $query);
?>