<?php
include '../config/config.php';
// Mengambil data id_fotos dari POST
$id_foto = $_POST['id_foto'];

    // Menghapus data dari tabel foto
    $query = "DELETE FROM foto WHERE id_foto = $id_foto";
    $result = $koneksi->query($query);
    if (!$result) {
        die("Error deleting from foto table: " . $koneksi->error);
    }

    // Menghapus data dari tabel komentar
    $query1 = "DELETE FROM komentar WHERE id_foto = $id_foto";
    $result1 = $koneksi->query($query1);
    if (!$result1) {
        die("Error deleting from komentar table: " . $koneksi->error);
    }

    // Menghapus data dari tabel album_foto
    $query2 = "DELETE FROM album_foto WHERE id_foto = $id_foto";
    $result2 = $koneksi->query($query2);
    if (!$result2) {
        die("Error deleting from album_foto table: " . $koneksi->error);
    }

    // Menghapus data dari tabel likee
    $query3 = "DELETE FROM likee WHERE id_foto = $id_foto";
    $result3 = $koneksi->query($query3);
    if (!$result3) {
        die("Error deleting from likee table: " . $koneksi->error);
    }

    // Menghapus data dari tabel report
    $query4 = "DELETE FROM report WHERE id_foto = $id_foto";
    $result4 = $koneksi->query($query4);
    if (!$result3) {
        die("Error deleting from report table: " . $koneksi->error);
    }

// Kirimkan respons sukses ke JavaScript
echo json_encode(['status' => 'success']);

// Tutup koneksi database
$koneksi->close();
?>
