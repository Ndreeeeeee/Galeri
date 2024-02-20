<?php
include '../config/config.php';

$id_user = $_SESSION["id_user"];

$query = "SELECT * FROM album WHERE id_user = $id_user";
$curse = mysqli_query($koneksi, $query);

$query = "SELECT foto.*, album_foto.*
FROM foto
INNER JOIN album_foto ON foto.id_foto = album_foto.id_foto LIMIT 2";
$mut = mysqli_query($koneksi, $query);

?>