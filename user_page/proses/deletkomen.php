<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_komen"])) {
        $id_komen = $_POST["id_komen"];

        $query = "DELETE FROM komentar WHERE id_komen = $id_komen";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "Komentar berhasil dihapus";
        } else {
            http_response_code(500); // Internal Server Error
            echo "Gagal menghapus komentar: " . mysqli_error($koneksi);
        }

        mysqli_close($koneksi);
    } else {
        http_response_code(400); // Bad Request
        echo "Parameter id_komen tidak ditemukan";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Metode HTTP tidak diizinkan";
}
?>

