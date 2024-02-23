<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "galeri";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_user = $_GET['id_user'];

// Hapus data dari tabel album_foto terlebih dahulu
$query = "SELECT id_foto FROM foto WHERE id_user = $id_user";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_foto = $row['id_foto'];
        $delete_album_foto = "DELETE FROM album_foto WHERE id_foto = $id_foto";
        if (!$conn->query($delete_album_foto)) {
            echo "Error deleting album photos: " . $conn->error;
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
$conn->begin_transaction();

if (
    $conn->query($query_delete_album) === TRUE &&
    $conn->query($query_delete_user) === TRUE &&
    $conn->query($query_delete_like) === TRUE &&
    $conn->query($query_delete_foto) === TRUE &&
    $conn->query($query_delete_komentar) === TRUE
) {
    // Jika semua query berhasil, commit transaksi
    $conn->commit();
    header("Location: ../file_view/user.php");
    exit;
} else {
    // Jika terjadi kesalahan, rollback transaksi
    $conn->rollback();
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
