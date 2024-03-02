<?php
     include '../config/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namealbum = $_POST["namealbum"];
        $desk = $_POST["desk"];
        $tgl_albm = $_POST["tgl_albm"];
        $id_user = $_POST["id_user"];

        $id_album = $_GET["id_album"];


        $sql = "UPDATE album SET namealbum = '$namealbum', desk = '$desk', tgl_albm = '$tgl_albm' WHERE id_album = $id_album";

        if ($koneksi->query($sql) === TRUE) {
            header("Location: ../file_view/koleksi.php?id_album= $id_album ");
        } else {
            echo "Error adding room: " . $koneksi->error;
        }
    }

    $koneksi->close();
