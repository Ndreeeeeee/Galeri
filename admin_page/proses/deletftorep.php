<?php
include '../config/config.php';
// Mengambil data id_fotos dari POST
$id_foto = $_POST['id_foto'];

    // Mengupdate data di tabel foto
$query = "UPDATE foto SET hapus = 2 WHERE id_foto = $id_foto";
$result = $koneksi->query($query);
if (!$result) {
    die("Error updating foto table: " . $koneksi->error);
}

// Mengupdate data di tabel komentar
$query1 = "UPDATE komentar SET hapus = 2 WHERE id_foto = $id_foto";
$result1 = $koneksi->query($query1);
if (!$result1) {
    die("Error updating komentar table: " . $koneksi->error);
}

// Mengupdate data di tabel album_foto
$query2 = "UPDATE album_foto SET hapus = 2 WHERE id_foto = $id_foto";
$result2 = $koneksi->query($query2);
if (!$result2) {
    die("Error updating album_foto table: " . $koneksi->error);
}

// Mengupdate data di tabel likee
$query3 = "UPDATE likee SET hapus = 2 WHERE id_foto = $id_foto";
$result3 = $koneksi->query($query3);
if (!$result3) {
    die("Error updating likee table: " . $koneksi->error);
}

// Mengupdate data di tabel report
$query4 = "UPDATE report SET hapus = 2 WHERE id_foto = $id_foto";
$result4 = $koneksi->query($query4);
if (!$result3) {
    die("Error updating report table: " . $koneksi->error);
}


// Kirimkan respons sukses ke JavaScript
echo json_encode(['status' => 'success']);

// Tutup koneksi database
$koneksi->close();
?>
