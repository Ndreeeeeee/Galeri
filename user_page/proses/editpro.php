<?php
    include '../config/config.php';
    
    $id_user = $_GET["id_user"];
    
    // (Kode koneksi ke database - seperti yang diberikan sebelumnya)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $alamat = $_POST["alamat"];

        // Define the target directory for uploaded files
        $targetDir = "../../foto/";
        
        // Check if a file was uploaded
        if (isset($_FILES["ftopro"]) && $_FILES["ftopro"]["error"] === 0) {
            // Construct the target file path
            $targetFile = $targetDir . basename($_FILES["ftopro"]["name"]);
            
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["ftopro"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, proceed with updating the database
                
                $sql = "UPDATE user SET username = '$username', fullname = '$fullname', alamat = '$alamat', ftopro = '$targetFile' WHERE id_user = $id_user";
                
                if ($koneksi->query($sql) === TRUE) {
                    header("Location: ../file_view/profile.php");
                } else {
                    echo "Error updating user: " . $koneksi->error;
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            // Proceed with updating the database without uploading a new file
            $sql = "UPDATE user SET username = '$username', fullname = '$fullname', alamat = '$alamat' WHERE id_user = $id_user";
                
            if ($koneksi->query($sql) === TRUE) {
                header("Location: ../file_view/profile.php");
            } else {
                echo "Error updating user: " . $koneksi->error;
            }
        }
    } else {
        echo "Invalid request.";
    }

            

    $koneksi->close();
    

?>