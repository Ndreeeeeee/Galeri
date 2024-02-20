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
    <link rel="stylesheet" href="../style/home.css?v= <?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Home</title>
</head>
<style media="screen">
 
</style>
<body>
    <div class="nav">
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
            <!-- <ion-icon name="person"></ion-icon> -->
        </a>
        <a href="../proses/logout.php" class="brn nah">
            Log Out <span><ion-icon name="log-out-outline"></ion-icon></span>
        </a>
    </div>
    
    <div class="container">
    <?php 
    require '../config/config.php';
    $searchText = $_GET['search'];
    $fotos = mysqli_query($koneksi, "SELECT * FROM foto WHERE jdlfto LIKE '%$searchText%' OR deskfto LIKE '%$searchText%'");
    foreach($fotos as $foto) :
        $id_foto = $foto["id_foto"];
        include '../proses/readuser.php';
        if ($result) {
            $row = mysqli_fetch_assoc($result);
        }
        $id_user = $row["id_user"];

        $likesCount = mysqli_fetch_assoc(mysqli_query($koneksi,
        "SELECT COUNT(*) AS likes FROM likee WHERE id_foto = $id_foto AND status = 'like'"))['likes'];
        $dislikesCount = mysqli_fetch_assoc(mysqli_query($koneksi,
        "SELECT COUNT(*) AS dislikes FROM likee WHERE id_foto = $id_foto AND status = 'dislike'"))['dislikes'];

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
                <div class="ghst">
                    <div class="asos">
                        <div class="save"><ion-icon name="bookmark-outline"></ion-icon></div>
                        <i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?>></i>
                    </div>
                </div>
            </div>
            
    <?php endforeach ?>
    </div>
</body>
<script type="text/javascript">
    $('.like, .dislike').click(function(){
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
                var likes = $('.likes_count' + id_foto);
                var likesCount = likes.data('count');
                var dislikes = $('.dislikes_count' + id_foto);
                var dislikesCount = dislikes.data('count');

                var likeButton = $(".like[data-foto-id=" + id_foto + "]");
                var dislikeButton = $(".dislike[data-foto-id=" + id_foto + "]");
                if(response == 'newlike'){
                    likes.html(likesCount + 1);
                    likeButton.addClass('fu')
                }
                else if(response == "newdislike"){
                    dislikes.html(dislikesCount + 1);
        
                    dislikeButton.addClass('fu')
                }
                else if(response == "changetolike"){
                    likes.html(parseInt($('.likes_count' + id_foto).text()) + 1);
                    dislikes.html(parseInt($('.dislikes_count' + id_foto).text()) - 1);
                    likeButton.addClass('selected');
                    likeButton.addClass('fu');
                    dislikeButton.removeClass('selected');
                    dislikeButton.removeClass('fu');
                }
                else if(response == "changetodislike"){
                    likes.html(parseInt($('.likes_count' + id_foto).text()) - 1);
                    dislikes.html(parseInt($('.dislikes_count' + id_foto).text()) + 1);
                    likeButton.removeClass('selected');
                    likeButton.removeClass('fu');
                    dislikeButton.addClass('selected');
                    dislikeButton.addClass('fu');
                }
                else if(response == 'deletelike'){
                    likes.html(parseInt($('.likes_count' + id_foto).text()) - 1);
                    likeButton.removeClass('selected');
                    likeButton.removeClass('fu');
                } 
                else if(response == 'deletedislike'){
                    dislikes.html(parseInt($('.dislikes_count' + id_foto).text()) - 1);
                    dislikeButton.removeClass('selected');
                    dislikeButton.removeClass('fu');
                } 
            }
        })
    })
</script>
<script>
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
