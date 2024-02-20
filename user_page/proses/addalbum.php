<?php
     $host = "localhost";
     $username = "root";
     $password = "";
     $database = "galeri";
 
     $conn = new mysqli($host, $username, $password, $database);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
    // (Kode koneksi ke database - seperti yang diberikan sebelumnya)

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namealbum = $_POST["namealbum"];
        $desk = $_POST["desk"];
        $tgl_albm = $_POST["tgl_albm"];
        $id_user = $_POST["id_user"];


        $sql = "INSERT INTO album ( namealbum, desk, tgl_albm, id_user) VALUES ( '$namealbum', '$desk', '$tgl_albm', '$id_user')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../file_view/profile.php");
        } else {
            echo "Error adding room: " . $conn->error;
        }
    }

    $conn->close();
