<?php
include '../config/config.php';
$id_album = $_GET['id_album'];

// Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel album
$query = "UPDATE album SET hapus = 1 WHERE id_album = $id_album";

// Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel album_foto
$query1 = "UPDATE album_foto SET hapus = 1 WHERE id_album = $id_album";

// Menjalankan query pertama
if (mysqli_query($koneksi, $query)) {
    // Jika query pertama berhasil, jalankan query kedua
    if (mysqli_query($koneksi, $query1)) {
        header("Location: ../file_view/profile.php");
        exit; // Hentikan eksekusi skrip setelah mengarahkan pengguna
    } else {
        echo "Error updating album photos: " . $koneksi->error;
    }
} else {
    echo "Error updating album: " . $koneksi->error;
}

// Tutup koneksi
$conn->close();
?>

