<?php
     include '../config/config.php';
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jdlfto = $_POST["jdlfto"];
        $id_user = $_POST["id_user"];
        $tglup = $_POST["tglup"];
        $deskfto = $_POST["deskfto"];

        $targetDir = "../../foto/";
        $targetFile = $targetDir . basename($_FILES["fto"]["name"]);
        move_uploaded_file($_FILES["fto"]["tmp_name"], $targetFile);

        $sql = "INSERT INTO foto (fto, jdlfto, id_user, tglup, deskfto) VALUES ('$targetFile', '$jdlfto', '$id_user', '$tglup', '$deskfto')";

        if ($koneksi->query($sql) === TRUE) {
            header("Location: ../file_view/home.php?success=true");
        } else {
            echo "Error adding room: " . $koneksi->error;
        }
    }

    $koneksi->close();
?>