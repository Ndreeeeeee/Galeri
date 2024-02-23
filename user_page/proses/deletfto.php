<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "galeri";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data foto_ids dari POST
$foto_ids = $_POST['foto_ids'];

// Melakukan penghapusan data berdasarkan foto_ids
foreach ($foto_ids as $foto_id) {
    // Menghapus data dari tabel foto
    $query = "DELETE FROM foto WHERE id_foto = $foto_id";
    $result = $conn->query($query);
    if (!$result) {
        die("Error deleting from foto table: " . $conn->error);
    }

    // Menghapus data dari tabel komentar
    $query1 = "DELETE FROM komentar WHERE id_foto = $foto_id";
    $result1 = $conn->query($query1);
    if (!$result1) {
        die("Error deleting from komentar table: " . $conn->error);
    }

    // Menghapus data dari tabel album_foto
    $query2 = "DELETE FROM album_foto WHERE id_foto = $foto_id";
    $result2 = $conn->query($query2);
    if (!$result2) {
        die("Error deleting from album_foto table: " . $conn->error);
    }

    // Menghapus data dari tabel likee
    $query3 = "DELETE FROM likee WHERE id_foto = $foto_id";
    $result3 = $conn->query($query3);
    if (!$result3) {
        die("Error deleting from likee table: " . $conn->error);
    }
}

// Kirimkan respons sukses ke JavaScript
echo json_encode(['status' => 'success']);

// Tutup koneksi database
$conn->close();
?>
