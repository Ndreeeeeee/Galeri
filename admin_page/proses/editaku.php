<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "galeri";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $id_user = $_GET["id_user"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $passwordpast = $_POST["passwordpast"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        $query = "SELECT password FROM user WHERE id_user = $id_user";
        $hasil = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($hasil);

        $passwordasli = $row["password"];

        if ($passwordpast === $passwordasli) {
        
            $query = "UPDATE user SET password = '$password' WHERE id_user = $id_user";
            if ($conn->query($query) === TRUE) {
                header("Location: ../file_view/profile.php");
            } else {
                echo "Error updating user: " . $conn->error;
            }
        
        } else {
            $query = "UPDATE user SET email = '$email' WHERE id_user = $id_user";
            if ($conn->query($query) === TRUE) {
                header("Location: ../file_view/profile.php");
            } else {
                echo "Error updating user: " . $conn->error;
            }
        }
    } else {
        echo "Invalid request.";
    }

            

    $conn->close();


?>