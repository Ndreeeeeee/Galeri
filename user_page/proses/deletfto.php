
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "galeri";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$foto_ids = $_POST['foto_ids'];


foreach ($foto_ids as $foto_id) {
   
    $query = "DELETE FROM foto WHERE id_foto = $foto_id";
    mysqli_query($conn, $query);
}

// Kirimkan respons sukses ke JavaScript
echo json_encode(['status' => 'success']);
?>

