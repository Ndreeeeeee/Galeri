<?php
 include '../config/config.php';
?>

<?php session_start(); 

if ($_SESSION['username']) {
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/edit.css?v= <?php echo time(); ?>">
    <title>Edit Foto</title>
</head>
<body>
    <div class="nav" id="navbar">
        <div class="logo">
            <ion-icon name="logo-bitbucket"></ion-icon>
        </div>
        <a href="home.php" class="brn">
            Beranda
        </a>
        <a href="buat.php" class="brn">
            Buat
        </a>
        <div class="src">
            <label for="src"><ion-icon name="search"></ion-icon></label>
            <input type="text" name="" id="src" placeholder="Cari....">
        </div>
        <a href="profile.php" class="prf">
            <ion-icon name="person"></ion-icon>
        </a>
        <a href="" class="brn nah">
            Log Out <span><ion-icon name="log-out-outline"></ion-icon></span>
        </a>
    </div>
    <div class="tit">
        <p>Edit Postingan Mu</p><span><ion-icon name="create-outline"></ion-icon></span>
    </div>
    <?php 
    $id_foto = $_GET["id_foto"];
    $query = "SELECT * FROM foto WHERE id_foto = $id_foto";
    $edit = mysqli_query($koneksi, $query);
    while($row = mysqli_fetch_assoc($edit)){
    ?>
    <form action="../proses/editfto.php?id_foto=<?php echo $id_foto ?>" method="POST" enctype="multipart/form-data">
        <div class="wrap">
        <label for="img-input"><ion-icon name="download-outline"></label>
            <div class="box_fto">
                <input style="display: none;" class="img-inp" id="img-input" type="file" name="fto" onchange="showImage()">
                <img class="img-com" src="<?php echo $row["fto"] ?>" alt="">
            </div>
            
            <div class="box_txt">
                <div class="int">
                    <p>Judul :</p>
                    <div class="tf"><input class="inp" value="<?php echo $row["jdlfto"] ?>" type="text" name="jdlfto" placeholder="Judul..."></div>
                </div>
                <div class="int">
                    <p>Deskripsi :</p>
                    <div class="tf"><textarea class="inp" name="deskfto" id="" cols="0" rows="0" placeholder="Deskripsi Gambar..."><?php echo $row["deskfto"] ?></textarea></div>
                </div>
                <input style="display: none;" type="text" name="tglup" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("l, j F Y");?>">
                <input type="text" style="display: none;" name="id_user" value="<?php echo $row["id_user"] ?>">
        
                <div class="bun">
                <a href="profile.php" class="tal">Batal</a>
                <input type="submit" class="kirim" value="Edit">
                </div>
            </div>
        </div>
    </form>
    <?php 
    }
    ?>
</body>
<script src="../action/buat.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>

<?php } else {
    echo "<script>alert('Tolong Login terlebih dahulu'); document.location='../../index.php';</script>";
} ?>