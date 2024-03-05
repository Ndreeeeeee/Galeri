<?php
 include '../config/config.php';
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
    <div class="mark" id="sv">
        <div class="wrap_koll">
            <div class="cls" id="clss">
                <span>X</span>
            </div>
            <div class="upper">
                Tambahkan Kekoleksi saya <span><ion-icon name="bookmark-outline"></ion-icon></span>
            </div>
        </div>
        <div class="box_add" id="ox">
        </div>
    </div>

    <div class="pop" id="pop">
        
    </div>

    <div class="nav" id="navbar">
        <div class="logo">
            <ion-icon name="logo-bitbucket"></ion-icon>
        </div>
        <a href="#" class="brn">
            Beranda
        </a>
        <a href="#" class="brn">
            Buat
        </a>
        <div class="src">
            <label for="src"><ion-icon name="search"></ion-icon></label>
            <input type="text" name="" id="src" placeholder="Cari...." onkeypress="handleKeyPress(event)">
        </div>
        
        <a href="../../signup.php" class="brn">
            Signup<ion-icon name="log-in-outline"></ion-icon>
        </a>
    </div>
    
    <div class="container">
        <?php 
        require '../config/config.php';

        $fotos = mysqli_query($koneksi, 'SELECT * FROM foto');
        foreach($fotos as $foto) :
            $id_user = $foto["id_user"];
            $id_foto = $foto["id_foto"];  
        ?>
                <div class="box">
                    <img src="<?php echo $foto["fto"] ?>" alt="">
                    <div class="pic" data-foto-id = "<?php echo $id_foto ?>" data-user-id = "<?php echo $id_user ?>"></div>
                    <div class="ghst">
                    </div>
                </div>
                
        <?php endforeach ?>
    </div>
</body>
<script src="../action/home.js"></script>
<script>

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

    
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.view').length) {
            $('#mrk').fadeOut();
            $('#pop').css('transform', 'translateY(-755px)');
        }
    });

</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>

