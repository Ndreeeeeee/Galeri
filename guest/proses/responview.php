<?php 
    session_start(); 
    include '../config/config.php';
    $id_user = $_GET['id_user'];
    $id_foto = $_GET['id_foto'];

    $query = "SELECT *
    FROM user
    JOIN foto ON user.id_user = foto.id_user
    WHERE foto.id_foto = $id_foto";
    $user = mysqli_query($koneksi, $query);
    $use = mysqli_fetch_assoc($user);
?>
<?php

    $query = "SELECT * FROM foto WHERE id_foto = $id_foto";
    $hasilbum = mysqli_query($koneksi, $query);
   
    $query = "SELECT COUNT(id_like) AS tal FROM likee WHERE id_foto = $id_foto";
    $cotfto = mysqli_query($koneksi, $query);
    if($il =  mysqli_fetch_assoc($cotfto)){
        $tur = $il["tal"];
    } else {
        $tur = 0;
    }
    
    foreach($hasilbum as $foto) :
    $id_foto = $_GET["id_foto"];
?>  

<div class="view">
    <div class="popfto">
        <div class="wrp_img">
            <img src="<?php echo $foto["fto"] ?>" alt="">
            <div class="title">
                <div class="jdl"><?php echo $foto["jdlfto"] ?></div>
                <div class="desk"><?php echo $foto["deskfto"] ?></div>
                <div class="loy sup"><i>Posted : <?php echo $foto["tglup"] ?></i></div>
            </div>
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
            <div class="lik"><i class="fa like fa-regular fa-heart" ></i>
            <p class="likes_cont<?php echo $id_foto;?>" data-count = <?php echo $tur; ?>><?php echo $tur; ?></p></div>      
        </div>
        <div class="showkom">
            <?php
            include '../proses/readkomen.php';
            while($shw = mysqli_fetch_assoc($kom)){
                if($det = mysqli_fetch_assoc($wish));
                if($shw["id_foto"] == $_GET["id_foto"]){
                    $id_komen = $shw["id_komen"];
            ?>
            <div class="komen" data-komen-id = "<?php echo $id_komen ?>" >
                <div class="kofto">
                    <img id="fto" src="<?php echo $det["ftopro"] ?>" alt="">
                </div>
                <div class="kom">
                    <p id="username"><?php echo $det["username"] ?></p>
                    <?php 
                    if($shw["id_user"] == $_GET["id_user"]){
                    ?>
                    <span class="sono"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></span>
                    <div class="si" data-komen-id = "<?php echo $id_komen ?>">Hapus Komentar!</div>
                    <?php } ?>
                    <p id="komentar"><?php echo $shw["komentar"] ?></p>
                    <i class="loy">Posted : <?php echo $shw["tgl_komen"] ?></i>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php endforeach ?>

<script>



</script>