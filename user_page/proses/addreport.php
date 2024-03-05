<?php
include '../config/config.php';

$id_foto = $_POST["id_foto"];
$id_user = $_POST["id_user"];
$username = $_POST["username"];
$email = $_POST["email"];
$laporan = $_POST["laporan"];


$sql = "INSERT INTO report (id_foto, id_user, username, email, laporan) VALUES (?, ?, ?, ?, ?)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("iisss", $id_foto, $id_user, $username, $email, $laporan);
$stmt->execute();
$stmt->close();


exit();
?>
