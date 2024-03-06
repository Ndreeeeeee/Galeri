<?php
include '../config/config.php';
// Mengambil data foto_ids dari POST
$foto_ids = $_POST['foto_ids'];

// Melakukan peng-update data berdasarkan foto_ids
foreach ($foto_ids as $foto_id) {
    // Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel foto
    $query = "UPDATE foto SET hapus = 1 WHERE id_foto = $foto_id";
    $result = $koneksi->query($query);
    if (!$result) {
        die("Error updating 'hapus' column in foto table: " . $koneksi->error);
    }

    // Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel komentar
    $query1 = "UPDATE komentar SET hapus = 1 WHERE id_foto = $foto_id";
    $result1 = $koneksi->query($query1);
    if (!$result1) {
        die("Error updating 'hapus' column in komentar table: " . $koneksi->error);
    }

    // Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel album_foto
    $query2 = "UPDATE album_foto SET hapus = 1 WHERE id_foto = $foto_id";
    $result2 = $koneksi->query($query2);
    if (!$result2) {
        die("Error updating 'hapus' column in album_foto table: " . $koneksi->error);
    }

    // Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel likee
    $query3 = "UPDATE likee SET hapus = 1 id_foto = $foto_id";
    $result3 = $koneksi->query($query3);
    if (!$result3) {
        die("Error updating 'hapus' column in likee table: " . $koneksi->error);
    }

    // Mengupdate nilai kolom 'hapus' menjadi 1 pada tabel report
    $query4 = "UPDATE report SET hapus = 1 WHERE id_foto = $foto_id";
    $result4 = $koneksi->query($query4);
    if (!$result3) {
        die("Error updating 'hapus' column in report table: " . $koneksi->error);
    }
}

// Kirimkan respons sukses ke JavaScript
echo json_encode(['status' => 'success']);

// Tutup koneksi database
$koneksi->close();
?>
