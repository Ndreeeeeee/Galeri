<?php
    include '../config/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namealbum = $_POST["namealbum"];
        $desk = $_POST["desk"];
        $tgl_albm = $_POST["tgl_albm"];
        $id_user = $_POST["id_user"];


        $sql = "INSERT INTO album ( namealbum, desk, tgl_albm, id_user) VALUES ( '$namealbum', '$desk', '$tgl_albm', '$id_user')";

        if ($koneksi->query($sql) === TRUE) {
            header("Location: ../file_view/profile.php");
        } else {
            echo "Error adding room: " . $koneksi->error;
        }
    }

    $koneksi->close();
