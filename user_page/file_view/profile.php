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
    <link rel="stylesheet" href="../style/profile.css?v= <?php echo time(); ?>">
    <link rel="stylesheet" href="../style/check.css?v= <?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Profile</title>
</head>
<body id="ok">
    <div class="box_mrk" id="mrk"></div>

    <div class="pop" id="pop">
        
    </div>

    <div class="edpro" id="pro" style="">
        <div class="wrap_koll">
            <div class="cls" id="clss">
                <span>X</span>
            </div>
            <div class="upper">
                Edit Profile / Akun <span><ion-icon name="create-outline"></ion-icon></span>
            </div>
        </div>
        <div class="box_add" id="ox">
                 <?php 
                    include '../proses/readuser.php';
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                    }
                ?>
            <div class="ol" id="ol" style="">
                <form action="../proses/editpro.php?id_user=<?php echo $row["id_user"]?>" method="POST" enctype="multipart/form-data">
                    <div class="ftopro">
                        <input style="display: none;" class="img-inp" id="img-input" type="file" name="ftopro" onchange="showImage()">
                        <img class="img-com" src="<?php echo $row["ftopro"]?>" alt="">
                    </div>
                    <label for="img-input" class="tu"><ion-icon name="download-outline"></ion-icon></label>
                    <div class="had">
                        <h4>Edit Profil</h4>
                        <div class="cil" id="cil">
                            Edit Akun
                        </div>
                    </div>
                    <div class="inp">
                        <p style="margin-right:195px;">Username :</p>
                        <p>Nama Lengkap :</p>
                    </div>
                    <div class="inpp">
                        <input type="text" class="put" value="<?php echo $_SESSION["username"] ?>" name="username">
                        <input type="text" class="put" value="<?php echo $row["fullname"] ?>" name="fullname">
                    </div>
                    <div class="inppp">
                        <p>Alamat :</p>
                        <textarea name="alamat" class="put"><?php echo $row["alamat"] ?></textarea>
                    </div>
                    <div class="tx">
                        <p>Kamu bisa mengubah bagian-bagian dalam profil maupun akun pribadimu.</p>
                    </div>
                    <input type="submit" name="EDITPRO" value="Simpan" >
                </form>
            </div>

            <div class="il" id="il" style="display:none;">
               <form action="../proses/editaku.php?id_user=<?php echo $row["id_user"]?>" method="POST">
                <div class="had">
                        <h4>Edit Akun</h4>
                        <div class="cil" id="cul">
                            Edit Profil
                        </div>
                    </div>
                    <div class="inp">
                        <p style="margin-right:110px;">Password Sekarang :</p>
                        <p>Password Baru :</p>
                    </div>
                    <div class="inpp">
                        <input type="password" class="put" name="passwordpast">
                        <input type="text" class="put" name="password">
                    </div>
                    <div class="inppp">
                        <p>Email :</p>
                        <input type="email" class="put" value="<?php echo $row["email"] ?>" name="email">
                    </div>
                    <div class="tx">
                        <p>Kamu bisa mengubah bagian-bagian dalam profil maupun akun pribadimu.</p>
                    </div>
                    <input type="submit" name="EDITAKU" value="Simpan" >
               </form>
            </div>
        </div>
    </div>

    <div class="wrapl" id="wrapl">
        <div class="wrap_kol">
            <div class="cls" id="cls">
                <span>X</span>
            </div>
            <div class="upper">
                Tambahkan Koleksi Baru <span><ion-icon name="medkit-outline"></ion-icon></span>
            </div>
        </div>
        <div class="box_add">
            <form action="../proses/addalbum.php" method="POST">
                <p>Judul Koleksi :</p>
                <input type="text" class="los" name="namealbum">
                <p>Deskripsi Koleksi :</p>
                <textarea name="desk" id="" cols="0" rows="0" class="los"></textarea>
                <?php 
                    include '../proses/readuser.php';
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                    }
                ?>
                <input style="display: none;" type="text" name="tgl_albm" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y");?>">
                <input type="text" value="<?php echo $row["id_user"] ?>" name="id_user" style="display:none;">
                <p class="wei">Kamu bisa menyimpan koleksi foto yang kamu suka setelah menambahkan koleksi.</p>
                <input type="submit" value="Creat" class="crt">
            </form>
        </div>
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
        <a href="profile.php" class="prf">
            <img src="<?php echo $row["ftopro"]?>" alt="">
        </a>
        <a href="../proses/logout.php" class="brn nah">
            Log Out <span><ion-icon name="log-out-outline"></ion-icon></span>
        </a>
    </div>

    <div class="box_prof">
        <?php
        include '../proses/readuser.php';
        if ($result) {$rew = mysqli_fetch_assoc($result);}
        if ($total) {$ruw = mysqli_fetch_assoc($total);}
        if ($tutal) {$riw = mysqli_fetch_assoc($tutal);}
        if ($tutul) {$rcw = mysqli_fetch_assoc($tutul);}
        ?>
        <div class="foto">
            <img src="<?php echo $row["ftopro"]?>" alt="">
        </div>
        <div class="txet">
            <p><?php echo $_SESSION["username"] ?></p>
            <p><?php echo $row["email"] ?></p>
            <div class="jml">
                <div class="jl">
                <?php echo $ruw["total_foto"] ?> Postingan 
                </div>
                <div class="jl">
                <?php echo $rcw["total"] ?> Tersimpan
                </div>
                <div class="jl">
                <?php echo $riw["total"] ?> Koleksi
                </div>
                <div class="dit" id="dit">
                    Edit Profile
                </div>
            </div>
            <h4>Alamat :</h4>
            <p class="p"> <?php echo $rew["alamat"] ?></p>
        </div>
    </div>

    <div class="box_img">
    <div class="btn_lod">
        <div class="po" id="btn1"><span><ion-icon name="images-outline"></ion-icon></span> Postingan</div>
        <div class="po" id="btn2"><span><ion-icon name="grid-outline"></ion-icon></span> Koleksi</div>
    </div>
    
    
   <div class="wrap_container" id="frm1">
        <div class="btnwrp">
            <div class="lis op" id="ho">Select</div>
            <div class="tal op" id="oh">Batal</div>
            <div class="lis op" id="pul" >Edit</div>
            <div class="del op" id="sub">Delet</div>
        </div>
        <div class="container">
            
            <?php 
            include '../proses/readfto.php';
            while($row = mysqli_fetch_assoc($hasil)){
                $id_foto = $row["id_foto"]; 
            if ($row["id_user"] == $_SESSION["id_user"]){
                $status = mysqli_query($koneksi, "SELECT status FROM likee WHERE id_foto = $id_foto AND id_user = $id_user");
                if(mysqli_num_rows($status) > 0){
                    $status = mysqli_fetch_assoc($status)['status'];
                }
                else{
                    $status = 0;
                }
            ?>
            
            <div class="box">
                <img src="<?php echo $row["fto"] ?>" alt="">
                <div class="pic" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $_SESSION["id_user"] ?>"></div>
                <div class="ghst">
                <div class="asos">
                    <div class="save" id="sev" data-album-id = "<?php echo $id_album ?>" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $_SESSION["id_user"] ?>"><ion-icon name="bookmark-outline"></ion-icon></div>
                    <i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?>></i>
                </div>
            </div>
                <div class="roy">
                    <input type="checkbox" data-foto-id="<?php echo $id_foto ?>" id="<?php echo $row["id_foto"] ?>" class="checkbox">
                    <label  for="<?php echo $row["id_foto"] ?>" ></label>
                </div>
            </div>
            
            <?php } ?>
            <?php } ?>
        </div>
   </div>

    <div class="containerr" id="frm2">
        <div class="add_mrk" id="op_mrk"><span>+</span> Tambah</div>
        <?php 
            include '../proses/readalbum.php';
            while($cur = mysqli_fetch_assoc($curse)){
                $id_album = $cur["id_album"]
        ?>
        <a href="koleksi.php?id_album=<?php echo $cur["id_album"] ?>">
        <div class="wrap_boxx">
        <div class="boxx">
           <?php 
            $count = 0;
            foreach($scr as $row):
                if($row["id_album"] == $id_album && $count < 3){
           ?>
            <div class="tra"><img src="<?php echo $row["fto"] ?>" alt=""></div>  
            <?php
             $count++; 
                }
            ?>
            <?php 
            endforeach
            ?>
            
        </div>
        <div class="tit"><?php echo $cur["namealbum"] ?></div>
    </div>
        </a>
        <?php } ?>
    </div>
    </div>
</body>

<script>
    $('.like').click(function(){
            var data = {
                id_foto: $(this).data('foto-id'),
                id_user: <?php echo $id_user; ?>,
                status: $(this).hasClass('like') ? 'like' : 'dislike',
            };
            $.ajax({
                url: '../proses/like.php',
                type: 'post',
                data: data,
                success:function(response){
                    var id_foto = data['id_foto'];
                    var likeButton = $(".like[data-foto-id=" + id_foto + "]");
                    if(response == 'newlike'){
                        likeButton.addClass('fu')
                    }
                    else if(response == "changetolike"){
                        likeButton.addClass('selected');
                        likeButton.addClass('fu');
                    }
                    else if(response == 'deletelike'){
                        likeButton.removeClass('selected');
                        likeButton.removeClass('fu');
                    } 
                }
            })
        })
    
        window.addEventListener('scroll', function() {
        var nav = document.getElementById('navbar');
        if (window.scrollY > 0) {
            nav.classList.add('shadow');
        } else {
            nav.classList.remove('shadow');
        }
    });
</script>

<script src="../action/profile.js?v= <?php echo time(); ?>"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php
}
?>