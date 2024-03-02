<?php
include '../config/config.php';

$id_user = $_GET['id_user'];

// Hapus data dari tabel album_foto terlebih dahulu
$query = "SELECT id_foto FROM foto WHERE id_user = $id_user";
$result = $koneksi->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_foto = $row['id_foto'];
        $delete_album_foto = "DELETE FROM album_foto WHERE id_foto = $id_foto";
        if (!$koneksi->query($delete_album_foto)) {
            echo "Error deleting album photos: " . $koneksi->error;
            exit;
        }
    }
}

// Hapus data dari tabel yang terkait
$query_delete_album = "DELETE FROM album WHERE id_user = $id_user";
$query_delete_user = "DELETE FROM user WHERE id_user = $id_user";
$query_delete_like = "DELETE FROM likee WHERE id_user = $id_user";
$query_delete_foto = "DELETE FROM foto WHERE id_user = $id_user";
$query_delete_komentar = "DELETE FROM komentar WHERE id_user = $id_user";

// Mulai transaksi
$koneksi->begin_transaction();

if (
    $koneksi->query($query_delete_album) === TRUE &&
    $koneksi->query($query_delete_user) === TRUE &&
    $koneksi->query($query_delete_like) === TRUE &&
    $koneksi->query($query_delete_foto) === TRUE &&
    $koneksi->query($query_delete_komentar) === TRUE
) {
    // Jika semua query berhasil, commit transaksi
    $koneksi->commit();
    header("Location: ../file_view/user.php");
    exit;
} else {
    // Jika terjadi kesalahan, rollback transaksi
    $koneksi->rollback();
    echo "Error: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
?>
