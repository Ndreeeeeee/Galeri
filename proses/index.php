<?php
    include '../config/config.php';


    if (isset($_POST['input_submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
      
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $hasil = mysqli_query($koneksi, $query);
        $rowselect = mysqli_fetch_array($hasil);
      
        $row = $rowselect['role'];
        $id_user = $rowselect['id_user'];
        $fullname = $rowselect['fullname'];
        $alamat = $rowselect['alamat'];
        $ftopro = $rowselect['ftopro'];
      
        if ($row == "admin") {  
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['id_user'] = $id_user;
          $_SESSION['role'] = 'admin';
          echo "<script>document.location='../admin_page/file_view/home.php';</script>";
        } elseif ($row == "user") {
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['id_user'] = $id_user;
          $_SESSION['role'] = 'user';
          echo "<script>document.location='../user_page/file_view/home.php';</script>";
        } else {
          echo "<script>alert('Username & Password Salah !'); document.location='../index.php';</script>";
        }
      }
?>