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
    <link rel="stylesheet" href="../style/home.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Home</title>
</head>
<body>
    <div class="box_mrk" id="mrk"></div>
    <div id="sv">
        <div class="wrap_sv">
            <div class="cls" id="clss">
                <span>X</span>
            </div>
            <div class="up_sv">
                Tambahkan Kekoleksi saya <span><ion-icon name="bookmark-outline"></ion-icon></span>
            </div>
        </div>
        <div class="box_sv" id="oto">
        </div>
    </div>

    <div class="pop" id="pop">
        
    </div>


    <div class="nav" id="navbar">
        <div class="logo">
            <ion-icon name="logo-bitbucket"></ion-icon>
        </div>
        <a href="" class="brn">
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
    
    <div class="container">
        <?php 
        require '../config/config.php';

        $fotos = mysqli_query($koneksi, 'SELECT * FROM foto WHERE hapus = 0');
        foreach($fotos as $foto) :
            include '../proses/readuser.php';
            if ($result) {
                $row = mysqli_fetch_assoc($result);
            }
            $id_user = $row["id_user"];
            $id_foto = $foto["id_foto"];

            $query = "SELECT COUNT(id_like) AS tal FROM likee WHERE id_foto = $id_foto";
            $cotfto = mysqli_query($koneksi, $query);
            if($il =  mysqli_fetch_assoc($cotfto)){
                $tur = $il["tal"];
            } else {
                $tur = 0;
            }

            
            $status = mysqli_query($koneksi, "SELECT status FROM likee WHERE id_foto = $id_foto AND id_user = $id_user");
            if(mysqli_num_rows($status) > 0){
                $status = mysqli_fetch_assoc($status)['status'];
            }
            else{
                $status = 0;
            }
        ?>
                <div class="box">
                    <img src="<?php echo $foto["fto"] ?>" alt="">
                    <div class="pic" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $_SESSION["id_user"] ?>"></div>
                    <div class="ghst">
                        <div class="asos">
                            <div class="save" id="sev" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $_SESSION["id_user"] ?>"><ion-icon name="bookmark-outline"></ion-icon></div>
                            <i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?>></i>
                        </div>
                    </div>
                </div>
                
        <?php endforeach ?>
    </div>
</body>
<script src="../action/home.js"></script>
<script>
    $(document).ready(function(){
    $('.save').click(function(){
            var id_foto = $(this).data('foto-id');
            var id_user = $(this).data('user-id');
            var id_album = $(this).data('album-id');
            
            $.ajax({
                type: 'GET',
                url: '../proses/responkol.php',
                data: {
                    id_foto: id_foto,
                    id_user: id_user,
                    id_album: id_album
                },
                success: function(response) {
                    $('#oto').html(response);
                    $('#mrk').fadeIn();
                    $('#sv').css('transform', 'translateY(-75px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    $(document).ready(function(){
    $('#mrk').hide()
    $('.pic').click(function(){
            var id_foto = $(this).data('foto-id');
            var id_user = $(this).data('user-id');
            
            $.ajax({
                type: 'GET',
                url: '../proses/responview.php',
                data: {
                    id_foto: id_foto,
                    id_user: id_user
                },
                success: function(response) {
                    $('#pop').html(response);
                    $('#mrk').fadeIn();
                    $('#pop').css('transform', 'translateY(-75px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    
    $(document).on('click', '.like', function(){
        var data = {
            id_foto: $(this).data('foto-id'),
            id_user: <?php echo $id_user; ?>,
            status: $(this).hasClass('like') ? 'like' : 0,
        };
        $.ajax({
            url: '../proses/like.php',
            type: 'post',
            data: data,
            success:function(response){
                var id_foto = data['id_foto'];
                var likes = $('.likes_cont' + id_foto);
                var likesCount = likes.data('count');
                var likeButton = $(".like[data-foto-id=" + id_foto + "]");
                if(response == 'newlike'){
                    likes.html(parseInt($('.likes_cont' + id_foto).text()) + 1);
                    likeButton.addClass('fu');
                }
                else if(response == 'deletelike'){
                    likes.html(parseInt($('.likes_cont' + id_foto).text()) - 1);
                    likeButton.removeClass('selected');
                    likeButton.removeClass('fu');
                } 
            }
        })
    })

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.view, .repo, #oto').length) {
            $('#mrk').fadeOut();
            $('#sv').css('transform', 'translateY(-755px)');
            $('#pop').css('transform', 'translateY(-755px)');
        }
    });


    $(document).on('click', '.soko', function() {
        $.ajax({
            success: function(response) {
                $('.siu').css('display', 'block');;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php } else {
    echo "<script>alert('Tolong Login terlebih dahulu'); document.location='../../index.php';</script>";
} ?>
