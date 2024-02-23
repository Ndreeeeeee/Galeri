<?php
    include '../config/config.php';
    $id_user = $_GET['id_user'];
    $id_foto = $_GET['id_foto'];

    $query = "SELECT *
    FROM user
    JOIN foto ON user.id_user = foto.id_user
    WHERE foto.id_foto = $id_foto";
    $user = mysqli_query($koneksi, $query);
    $use = mysqli_fetch_assoc($user);
    
    $query = "SELECT * FROM foto WHERE id_foto = $id_foto";
    $hasilbum = mysqli_query($koneksi, $query);

    foreach($hasilbum as $foto) :
    $id_foto = $_GET["id_foto"];

    $status = mysqli_query($koneksi, "SELECT status FROM likee WHERE id_foto = $id_foto AND id_user = $id_user");
    if(mysqli_num_rows($status) > 0){
        $status = mysqli_fetch_assoc($status)['status'];
    }
    else{
        $status = 0;
    }
?>  

<div class="cls" id="clss">
    <span>X</span>
</div>
<div class="view">
    <div class="popfto">
        <div class="wrp_img">
            <img src="<?php echo $foto["fto"] ?>" alt="">
        </div>
    </div>
    <div class="poptx">
        <div class="act">
            <div class="bypos">
                <div class="ftopos">
                    <img src="<?php echo $use["ftopro"] ?>" alt="">
                </div>
                <div class="nmepos">
                    <p><?php echo $use["username"] ?></p>
                    <p><?php echo $use["fullname"] ?></p>
                </div>
            </div>
            <div class="lik"><i class="fa like fa-regular fa-heart"></i><p></p></div>      
        </div>
        <div class="showkom">
            <?php
            include '../proses/readkomen.php';
            while($shw = mysqli_fetch_assoc($kom)){
                if($det = mysqli_fetch_assoc($wish));
                if($shw["id_foto"] == $_GET["id_foto"]){
            ?>
            <div class="komen">
                <div class="kofto">
                    <img id="fto" src="<?php echo $det["ftopro"] ?>" alt="">
                </div>
                <div class="kom">
                    <p id="username"><?php echo $det["username"] ?></p>
                    <p id="komentar"><?php echo $shw["komentar"] ?></p>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="senko">
            <input type="text" class="send" name="komentar" placeholder="Komentar...">
            <input type="submit" id="go" style="display:none;">
            <label class="btngo" for="go" class="btngo"><ion-icon name="paper-plane-outline"></ion-icon></label>
        </div>
    </div>
</div>
 <!-- <div class="komen">
        <div class="kofto">
            <img id="fto" src="" alt="">
        </div>
        <div class="kom">
            <p id="username"></p>
            <p id="komentar"></p>
        </div>
    </div> -->
<?php endforeach ?>

<script>
    $(document).ready(function(){
    $('.cls').click(function(){
            $.ajax({
                success: function(response) {
                    $('#mrk').css('transform', 'translateY(-800px)');
                    $('#sv').css('transform', 'translateY(-755px)');
                    $('#pop').css('transform', 'translateY(-755px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });




</script>