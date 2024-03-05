<?php
 include '../config/config.php';
?>

<?php session_start(); 

if ($_SESSION['username']) {
$username = $_SESSION['username'];
include '../proses/readuser.php';
if ($result) {
    $row = mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/user.css?v= <?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Profile</title>
</head>
<body id="ok">
    <div class="box_mrk" id="mrk"></div>

    <div class="edpro" id="pro" style="">
        
    </div>

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
            <input type="text" name="" id="src" placeholder="Cari...." onkeypress="handleKeyPress(event)">
        </div>
        <a href="user.php" class="brn">
            Pengguna
        </a>
        <a href="report.php" class="brn">
            Laporan
        </a>
        <a href="profile.php" class="prf">
            <img src="<?php echo $row["ftopro"]?>" alt="">
        </a>
    </div>

    <div class="wrap">
        <div class="item">
            <p class="tel"><ion-icon name="people-outline"></ion-icon>Akun Terdaftar</p>
            <div class="conten">
                <?php 
                include '../config/config.php';
                $query = "SELECT * FROM user";
                $result = mysqli_query($koneksi, $query);
                $query = "SELECT COUNT(*) as total FROM user";
                $hasil = mysqli_query($koneksi, $query);
                if($ruw = mysqli_fetch_assoc($hasil));
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="bar">
                    <div class="fotopro">
                        <div class="wrpfto">
                            <img src="<?php echo $row["ftopro"] ?>" alt="">
                        </div>
                    </div>
                    <div class="emu">
                        <p><?php echo $row["username"] ?></p>
                        <div class="lock">
                        <p><?php echo $row["fullname"] ?></p>
                        <p><?php echo $row["email"] ?></p>
                        </div>
                        <div <?php if($row["role"] == "admin") echo "style='background:#ff00002a; color:red;'" ?> class="lvl"><?php echo $row["role"] ?></div>
                        <div class="but">
                            <div class="fus as" data-user-id="<?php echo $row["id_user"] ?>"><ion-icon name="create-outline"></ion-icon></div>
                            <a class="fas as" href="#" onclick="confirmDelete(<?php echo $row['id_user'] ?>)"><ion-icon name="trash-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        
        <div class="weh">
            <div class="sec">
                <span><ion-icon name="search"></ion-icon></span>
                <input type="text" id="doom" placeholder="Cari Akun...">
            </div>
            <div class="add">
                <div class="ico">
                    <img src="../../source/svg/icongweh.png" alt="">
                </div>
                <div class="txt">
                    <p>Disini kamu bisa melihat Akun-akun yang sudah terdaftar diwebsite IMGSource terdapat :</p>
                    <h2><?php echo $ruw["total"] ?></h2>
                    <h3>Akun Terdaftar</h3>
                </div>
            </div>
        </div>
    </div>
</body>
<script>




</script>
<script src="../action/user.js?v= <?php echo time(); ?>"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php } ?>