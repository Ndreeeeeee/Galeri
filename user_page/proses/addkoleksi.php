<?php
include '../config/config.php';

// Ambil data yang diterima dari permintaan AJAX
$id_foto = $_POST['id_foto'];
$id_album = $_POST['id_album'];
$status = "tersimpan";

// Periksa apakah data sudah ada dalam tabel album_foto
$sql_check = "SELECT id_foto FROM album_foto WHERE id_foto = '$id_foto' AND id_album = '$id_album'";
$result_check = $koneksi->query($sql_check);

if ($result_check->num_rows > 0) {
    // Jika data sudah ada, ubah nilai kolom "hapus" menjadi 1
    $sql_update = "UPDATE album_foto SET hapus = 0 WHERE id_foto = '$id_foto' AND id_album = '$id_album'";
    if ($koneksi->query($sql_update) === TRUE) {
        echo "Data sudah ada dalam tabel album_foto. Nilai kolom hapus diubah menjadi 1.";
    } else {
        echo "Error: " . $sql_update . "<br>" . $koneksi->error;
    }
} else {
    // Jika data belum ada, lakukan penyimpanan
    $sql_insert = "INSERT INTO album_foto (id_foto, id_album, status) VALUES ('$id_foto', '$id_album', '$status')";
    if ($koneksi->query($sql_insert) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>



