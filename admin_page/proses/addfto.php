<?php
     $host = "localhost";
     $username = "root";
     $password = "";
     $database = "galeri";
 
     $conn = new mysqli($host, $username, $password, $database);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jdlfto = $_POST["jdlfto"];
        $id_user = $_POST["id_user"];
        $tglup = $_POST["tglup"];
        $deskfto = $_POST["deskfto"];
        $likefto = $_POST["likefto"];

        // Mengunggah foto
        $targetDir = "../foto/";
        $targetFile = $targetDir . basename($_FILES["fto"]["name"]);
        move_uploaded_file($_FILES["fto"]["tmp_name"], $targetFile);

        $sql = "INSERT INTO foto (fto, jdlfto, id_user, tglup, deskfto, likefto ) VALUES ('$targetFile', '$jdlfto', '$id_user', '$tglup', '$deskfto', '$likefto')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../file_view/home.php?success=true");
        } else {
            echo "Error adding room: " . $conn->error;
        }
    }

    $conn->close();
?>