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
    <link rel="stylesheet" href="../style/koleksi.css?v= <?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Document</title>
</head>
<body>
<div class="box_mrk" id="mrk"></div>
    <div class="mark" id="sv">
        <div class="wrap_koll">
            <div class="" id="clss">
                <span>X</span>
            </div>
            <div class="upper">
                Tambahkan Kekoleksi saya <span><ion-icon name="bookmark-outline"></ion-icon></span>
            </div>
        </div>
        <div class="box_ada" id="ox">
        </div>
    </div>

    <div class="pop" id="pop">
        
    </div>

    <div class="wrapl" id="wrapl">


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

    <div class="open">
        <div class="cont">
            <span><ion-icon name="grid-outline" ></ion-icon></span>
            <?php 
            include '../proses/readalbum.php';
            $id_album = $_GET["id_album"];
            foreach($curse as $pul) :
                if($pul["id_album"] == $id_album){
            ?>
            <h2><?php echo $pul["namealbum"] ?></h2>
            <p><?php echo $pul["desk"] ?></p>
            <div class="coi">
                <div class="sky" data-album-id = "<?php echo $id_album ?>"><ion-icon name="create-outline"></ion-icon></div>
                <a href="../proses/deletalbum.php?id_album=<?php echo $id_album ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </div>
            <?php
            }
            endforeach
            ?>
        </div>
    </div>
    <div class="container">
        <?php
        include '../proses/readalbum.php';
        foreach($mut as $foto):
            $id_foto = $foto["id_foto"];
            $id_user = $_SESSION["id_user"];
            if($foto["id_album"] == $id_album){
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
                    <div class="save" id="sev" data-album-id = "<?php echo $id_album ?>" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $_SESSION["id_user"] ?>"><ion-icon name="bookmark-outline"></ion-icon></div>
                    <i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?>></i>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php endforeach ?>
    </div>
   
</body>
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
                    $('#ox').html(response);
                    $('#mrk').fadeIn();
                    $('#sv').css('transform', 'translateY(-60px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    $(document).ready(function(){
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

    $(document).ready(function(){
    $('.sky').click(function(){
            var id_album = $(this).data('album-id');

            $.ajax({
                type: 'GET',
                url: '../proses/responalbum.php',
                data: {
                    id_album: id_album
                },
                success: function(response) {
                    $('#wrapl').html(response);
                    $('#mrk').fadeIn();
                    $('#wrapl').css('transform', 'translateY(-75px)');
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
        if (!$(event.target).closest('.view, .repo, #oto, #ox, .box_add').length) {
            $('#mrk').fadeOut();
            $('#sv').css('transform', 'translateY(-755px)');
            $('#pop').css('transform', 'translateY(-755px)');
            $('#pro').css('transform', 'translateY(-755px)');
            $('#wrapl').css('transform', 'translateY(-755px)');
        }
    });

    window.addEventListener('scroll', function() {
    var nav = document.getElementById('navbar');
    if (window.scrollY > 0) {
        nav.classList.add('shadow');
    } else {
        nav.classList.remove('shadow');
    }
});
function handleKeyPress(event) {
    
    if (event.keyCode === 13) {
        
        var searchText = document.getElementById('src').value;
        
        
        window.location.href = 'homesrc.php?search=' + searchText;
    }
}
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php } ?>