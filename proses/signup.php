<?php
include 'config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $alamat = $_POST["alamat"];
    $fullname = $_POST["fullname"];
    $role = $_POST["role"];

    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($koneksi, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email yang diinputkan sudah ada');</script>";
    } else {
        $sql = "INSERT INTO user ( username, email, password, alamat, fullname, role) VALUES ('$username', '$email', '$password', '$alamat', '$fullname', '$role')";
        if ($koneksi->query($sql) === TRUE) {
            // Redirect to index.php with a success message
            echo "<script>alert('Sign Up Berhasil'); document.location='index.php';</script>";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}

$koneksi->close();
?>