<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "galeri";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah id_foto dan id_album telah diposting
    if (isset($_POST['id_foto']) && isset($_POST['id_album'])) {
        // Escape input untuk mencegah SQL Injection
        $id_foto = mysqli_real_escape_string($conn, $_POST['id_foto']);
        $id_album = mysqli_real_escape_string($conn, $_POST['id_album']);

        // Query untuk menghapus data dari tabel album_foto
        $query = "DELETE FROM album_foto WHERE id_foto = '$id_foto' AND id_album = '$id_album'";
        
        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dihapus dari tabel album_foto";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "ID foto dan ID album harus diposting";
    }
} else {
    echo "Metode request yang diperbolehkan hanya POST";
}
?>


<!-- // Tentukan nilai default untuk id_album jika tidak disediakan
$id_album = isset($_POST['id_album']) ? $_POST['id_album'] : 0; */ -->

