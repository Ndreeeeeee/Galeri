<?php
    include '../config/config.php';
    session_start();
    
    $komentar = $_POST["komentar"];
    $id_foto = $_POST["id_foto"];
    date_default_timezone_set('Asia/Jakarta'); 
    $tgl_komen = date("l, j F Y");
    $id_user = $_SESSION["id_user"];
    
    $sql = "INSERT INTO komentar (komentar, id_foto, tgl_komen, id_user) VALUES ('$komentar', '$id_foto', '$tgl_komen', '$id_user')";
    
    if ($koneksi->query($sql) === TRUE) {
        $response = array(
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Error: ' . $sql . "<br>" . $koneksi->error
        );
        echo json_encode($response);
    }
    
    $koneksi->close();
    
    
