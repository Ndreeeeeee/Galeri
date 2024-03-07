<?php
require '../config/config.php';

$id_foto = $_POST["id_foto"];
$id_user = $_POST["id_user"];
$status = $_POST["status"];

$likees = mysqli_query($koneksi, "SELECT * FROM likee WHERE id_foto = $id_foto AND id_user = $id_user");
if(mysqli_num_rows($likees) > 0){
    $likee = mysqli_fetch_assoc($likees);
    if($likee['hapus'] == 0){
        mysqli_query($koneksi, "UPDATE likee SET hapus = 1 WHERE id_foto = $id_foto AND id_user = $id_user");
        echo "delete" . $status;
    } else {
        mysqli_query($koneksi, "UPDATE likee SET hapus = 0 WHERE id_foto = $id_foto AND id_user = $id_user");
        echo "new" . $status;
    }
}
else{
    mysqli_query($koneksi, "INSERT INTO likee (id_foto, id_user, status) VALUES ('$id_foto', '$id_user', '$status')");
    echo "new" . $status;
}
?>
