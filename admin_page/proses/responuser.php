
    
    
    <div class="wrap_koll">
        <div class="cls" id="cls">
            <span>X</span>
        </div>
        <div class="upper">
            Edit Profile / Akun <span><ion-icon name="create-outline"></ion-icon></span>
        </div>
    </div>
    <div class="box_add" id="ox">
        <?php 
        include '../config/config.php';
        $id_user = $_GET["id_user"];
        $sql = "SELECT * FROM user WHERE id_user = $id_user";
        $result = mysqli_query($koneksi, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="ol" id="ol" style="">
            <form action="../proses/editpro_min.php?id_user=<?php echo $row["id_user"]?>" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="put" value="<?php echo $row["username"] ?>" name="username">
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
            <form action="../proses/editaku_min.php?id_user=<?php echo $row["id_user"]?>" method="POST">
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
                <div class="inppp">
                    <p>Role :</p>
                    <select name="role" class="put" id="">
                        <option value="<?php echo $row["role"]  ?>" selected disabled><?php echo $row["role"]  ?></option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="tx">
                    <p>Kamu bisa mengubah bagian-bagian dalam profil maupun akun pribadimu.</p>
                </div>
                <input type="submit" name="EDITAKU" value="Simpan" >
            </form>
        </div>
    </div>
<script>
var cil = document.getElementById("cil");
var cul = document.getElementById("cul");
var ol = document.getElementById("ol");
var il = document.getElementById("il");
var ox = document.getElementById("ox");


cil.addEventListener("click", function(){
    ol.style.display="none";
    il.style.display="block";
    ox.style.height="500px";
});
cul.addEventListener("click", function(){
    ol.style.display="block";
    il.style.display="none";
    ox.style.height="600px";
});

$(document).ready(function(){
    $('.cls').click(function(){
        $.ajax({
            success: function(response) {
                $('#mrk').fadeOut();
                $('#pro').css('transform', 'translateY(-800px)');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

var imageUploader = document.querySelector(".img-inp");
var imagePreview = document.querySelector(".img-com");

function showImage() {
let reader = new FileReader();
reader.readAsDataURL(imageUploader.files[0]);
reader.onload = function(e) {
    imagePreview.classList.add("show");
    imagePreview.src = e.target.result;
};
}

</script>