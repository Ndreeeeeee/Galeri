<?php
include '../config/config.php';

$id_user = $_GET['id_user'];

// Update data di tabel yang terkait
$query_update_album = "UPDATE album SET hapus = 2 WHERE id_user = $id_user";
$query_update_user = "UPDATE user SET hapus = 2 WHERE id_user = $id_user";
$query_update_like = "UPDATE likee SET hapus = 2 WHERE id_user = $id_user";
$query_update_foto = "UPDATE foto SET hapus = 2 WHERE id_user = $id_user";
$query_update_komentar = "UPDATE komentar SET hapus = 2 WHERE id_user = $id_user";
$query_update_report = "UPDATE report SET hapus = 2 WHERE id_user = $id_user";

// Mulai transaksi
$koneksi->begin_transaction();

if (
    $koneksi->query($query_update_album) === TRUE &&
    $koneksi->query($query_update_user) === TRUE &&
    $koneksi->query($query_update_like) === TRUE &&
    $koneksi->query($query_update_foto) === TRUE &&
    $koneksi->query($query_update_komentar) === TRUE &&
    $koneksi->query($query_update_report) === TRUE 
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
