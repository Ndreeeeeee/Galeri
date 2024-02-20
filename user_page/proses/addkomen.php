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
    session_start();

    $komentar = $_POST["komentar"];
    $id_foto = $_POST["id_foto"];
    $tgl_komen = date("Y-m-d");
    $id_user = $_SESSION["id_user"];
    
    $sql = "INSERT INTO komentar (komentar, id_foto, tgl_komen, id_user) VALUES ('$komentar', '$id_foto', '$tgl_komen', '$id_user')";

    if ($conn->query($sql) === TRUE) {
        $response = array(
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . $sql . "<br>" . $conn->error
        );
        echo json_encode($response);
    }
    
    $conn->close();
    
