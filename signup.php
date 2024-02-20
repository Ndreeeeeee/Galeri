<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/signup.css?v= <?php echo time(); ?>">
    <title>Signup</title>
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
            <p>Jika kamu sudah memiliki akun silahkan login, dengan click tombol dibawah ini.</p>
            <a href="index.php">Login</a>
            </div>
        </div>
        <div class="wrap2">
                <div class="in">
                    <h1>Signup</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
               

            <form action="proses/signup.php" method="POST"  class="frm">


                <div class="frm1">
                    <div class="int">
                    <input type="text" class="input" id="inp" name="fullname" placeholder=" ">
                    <label for="">Nama :</label>
                    </div>
                    
                    <div class="int">
                    <input type="text" id="inp" name="username" placeholder=" ">
                    <label for="">Username :</label>
                    </div>

                    <div class="int">
                    <input type="text" id="inp" name="alamat" row="90" placeholder=" ">
                    <label for="">Alamat :</label>
                    </div>
                
                    <div class="btn" id="btn1">
                        Next
                    </div>
                </div>

                <div class="frm2">
                    <div class="int">
                    <input type="email" class="input" id="inp" name="email" placeholder=" ">
                    <label for="">Email :</label>
                    </div>
                    
                    <div class="int">
                    <input type="text" id="inp" name="pas" placeholder=" ">
                    <label for="">Password :</label>
                    </div>

                    <div class="int">
                    <input type="password" id="inp" name="password" placeholder=" ">
                    <label for="">Confirmed Password :</label>
                    </div>

                    <input type="text" name="role" value="user" style="display:none;">

                    <div class="btn_wrp">
                    <div class="btn" id="btn2">
                        Back
                    </div>

                    <input value="Sign Up" type="submit" name="input_submit"  class="btn">
                    </div>
                </div>
                

            </form>
        </div>
    </div>
    <script src="action/signup.js"></script>
</body>
</html>