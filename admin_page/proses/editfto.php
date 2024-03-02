<?php
include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_foto = $_POST["id_foto"];
    $jdlfto = $_POST["jdlfto"];
    $tglup = $_POST["tglup"];
    $deskfto = $_POST["deskfto"];
    $likefto = $_POST["likefto"];

    $id_foto = $_GET["id_foto"];

    // Periksa apakah ada file yang diunggah
    if (!empty($_FILES["fto"]["name"])) {
        // Mengunggah foto baru
        $targetDir = "../../foto/";
        $targetFile = $targetDir . basename($_FILES["fto"]["name"]);
        move_uploaded_file($_FILES["fto"]["tmp_name"], $targetFile);

        $sql = "UPDATE foto SET fto = '$targetFile', jdlfto = '$jdlfto', tglup = '$tglup', deskfto = '$deskfto', likefto = '$likefto' WHERE id_foto = $id_foto";
    } else {
        // Jika tidak ada file yang diunggah, hanya update data lainnya
        $sql = "UPDATE foto SET jdlfto = '$jdlfto', tglup = '$tglup', deskfto = '$deskfto', likefto = '$likefto' WHERE id_foto = $id_foto";
    }

    if ($koneksi->query($sql) === TRUE) {
        header("Location: ../file_view/home.php?success=true");
    } else {
        echo "Error updating photo: " . $koneksi->error;
    }
}

$koneksi->close();
?>
