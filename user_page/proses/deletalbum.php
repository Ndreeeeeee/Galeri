<?php
include '../config/config.php';
$id_album = $_GET['id_album'];

$query = "DELETE FROM album WHERE id_album = $id_album";
$query1 = "DELETE FROM album_foto WHERE id_album = $id_album";

// Menjalankan query pertama
if (mysqli_query($koneksi, $query)) {
    // Jika query pertama berhasil, jalankan query kedua
    if (mysqli_query($koneksi, $query1)) {
        header("Location: ../file_view/profile.php");
        exit; // Hentikan eksekusi skrip setelah mengarahkan pengguna
    } else {
        echo "Error deleting album photos: " . $koneksi->error;
    }
} else {
    echo "Error deleting album: " . $koneksi->error;
}

// Tutup koneksi
$conn->close();
?>
