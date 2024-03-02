<?php
    include '../config/config.php';
    
    $id_user = $_GET["id_user"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passwordpast = $_POST["passwordpast"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $role = $_POST["role"];

        $query = "SELECT password FROM user WHERE id_user = $id_user";
        $hasil = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_array($hasil);

        $passwordasli = $row["password"];

        if ($passwordpast === $passwordasli) {
        
            $query = "UPDATE user SET password = '$password', email = '$email', role = 'role' WHERE id_user = $id_user";
            if ($koneksi->query($query) === TRUE) {
                header("Location: ../file_view/user.php");
            } else {
                echo "Error updating user: " . $koneksi->error;
            }
        
        } else {
            $query = "UPDATE user SET email = '$email', role = '$role' WHERE id_user = $id_user";
            if ($koneksi->query($query) === TRUE) {
                header("Location: ../file_view/user.php");
            } else {
                echo "Error updating user: " . $koneksi->error;
            }
        }
    } else {
        echo "Invalid request.";
    }

            

    $koneksi->close();


?>