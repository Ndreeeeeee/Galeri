<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "galeri";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_album = $_GET['id_album'];

$query = "DELETE FROM album WHERE id_album = $id_album";
$query1 = "DELETE FROM album_foto WHERE id_album = $id_album";

// Menjalankan query pertama
if (mysqli_query($conn, $query)) {
    // Jika query pertama berhasil, jalankan query kedua
    if (mysqli_query($conn, $query1)) {
        header("Location: ../file_view/profile.php");
        exit; // Hentikan eksekusi skrip setelah mengarahkan pengguna
    } else {
        echo "Error deleting album photos: " . $conn->error;
    }
} else {
    echo "Error deleting album: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
