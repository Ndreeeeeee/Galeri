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
    // Jika data sudah ada, beri respons bahwa data sudah ada
    echo "Data dengan id_foto=$id_foto dan id_user=$id_user sudah ada dalam tabel album_foto.";
} else {
    // Jika data belum ada, lakukan penyimpanan

    $sql = "INSERT INTO album_foto (id_foto, id_album, status) VALUES ('$id_foto', '$id_album', '$status')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>


<!-- // Tentukan nilai default untuk id_album jika tidak disediakan
$id_album = isset($_POST['id_album']) ? $_POST['id_album'] : 0; */ -->

