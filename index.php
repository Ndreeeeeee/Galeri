<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css?v= <?php echo time(); ?>">
    <title>Login</title>
</head>
<body>
    <div class="wrap">
        <div class="wrap1">
            <img src="source/img/mountain.jpg" alt="">
        </div>
        <div class="box">
            <div class="inbox">
            <p>Selamat datang</p>
            <h2>IMGSOURCE</h2>
            <p>Jika kamu belum memiliki akun silahkan daftar, dengan click tombol dibawah ini.</p>
            <a href="signup.php">Sign Up</a>
            </div>
        </div>
        <div class="wrap2">
                <div class="in">
                    <h1>Login</h1>
                    <p>Jika kamu sudah memiliki akun silahkan login, dengan isi form dibawah ini.</p>
               

            <form action="proses/index.php" method="POST">

                <div class="int">
                <input type="text" class="input" id="inp" name="username" placeholder=" ">
                <label for="">Username :</label>
                </div>
                
                <div class="int">
                <input type="password" id="inp" name="password" placeholder=" ">
                <label for="">Password :</label>
                </div>
            
                <input value="Login" type="submit" name="input_submit"  id="btn">

                <div class="atau">
                    <div class="line"></div>
                    <p>Atau</p>
                    <div class="line"></div>
                </div>

                <a href="guest/file_view/home.php" id="btnn">Skip</a>
            </form>
        </div>
    </div>
</body>
</html>