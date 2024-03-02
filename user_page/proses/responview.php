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
            <div class="title">
                <div class="jdl"><?php echo $foto["jdlfto"] ?></div>
                <div class="desk"><?php echo $foto["deskfto"] ?></div>
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
            <div class="lik"><i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?> ></i><p class="likes_count<?php echo $id_foto;?>" data-count = <?php echo $tur; ?>><?php echo $tur; ?></p></div>      
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
                    <i class="loy"><?php echo $shw["tgl_komen"] ?></i>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="senko">
            <?php
            include '../proses/readuser.php';
            if($last = mysqli_fetch_assoc($lastes)){
                $lasit = $last["id_komen"];
            } else {
                $lasit = 1;
            }
            if ($result) {
                $row = mysqli_fetch_assoc($result);
            }
            ?>
            <input type="text" class="send" name="komentar" data-foto-id = "<?php echo $id_foto ?>"  data-user-id = "<?php echo $id_foto ?>" placeholder="Komentar...">
            <input type="submit" id="go" style="display:none;">
            <label class="btngo" for="go" class="btngo" data-foto = "<?php echo $row["ftopro"] ?>" data-name = "<?php echo $row["username"] ?>"><ion-icon name="paper-plane-outline"></ion-icon></label>
        </div>
    </div>
</div>

<?php endforeach ?>

<script>
    $(document).ready(function(){
    $('.cls').click(function(){
            $.ajax({
                success: function(response) {
                    $('#mrk').fadeOut();
                    $('#sv').css('transform', 'translateY(-755px)');
                    $('#pop').css('transform', 'translateY(-755px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });


    $(document).ready(function() {
        $('.si').hide();
        $(document).on('click', '.sono', function() {
        var komenId = $(this).siblings('.si').data('komen-id');

        $.ajax({
            success: function(response) {
                $('.si[data-komen-id="' + komenId + '"]').fadeIn();
                $('.sono[data-komen-id="' + komenId + '"]').fadeIn();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.si').length) {
            $('.si').fadeOut();
        }
    });
    
    $(document).on('click', '.si', function() {
        var id_komen = $(this).data("komen-id");

        $.ajax({
            type: "POST",
            url: "../proses/deletkomen.php",
            data: { id_komen: id_komen },
            success: function(response) {
                $(".komen[data-komen-id='" + id_komen + "']").hide();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Tindakan untuk menangani kesalahan
            }
        });
    });
});

$(document).ready(function() {
    function formatDate(date) {
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (day < 10) {
        day = '0' + day;
    }
    if (month < 10) {
        month = '0' + month;
    }

    return day + '-' + month + '-' + year;
    }
    var today = new Date();
    $('.btngo').click(function() {
        var komentar = $('input[name="komentar"]').val();
        var foto = $(this).data('foto');
        var username = $(this).data('name');
        var id_foto = $(this).siblings().data('foto-id');
        var id_user = $(this).data('user-id');
        var time = formatDate(today);
        var komenId = <?php echo $lasit; ?>;

        // Membuat struktur HTML untuk komentar
        var html = '<div class="komen" data-komen-id="' + (parseInt(komenId) + 1) + '">';
        html += '<div class="kofto"><img id="fto" src="' + foto + '" alt=""></div>';
        html += '<div class="kom">';
        html += '<p id="username">' + username + '</p>';
        html += '<span class="sono"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></span>';
        html += '<div class="si" data-komen-id="' + (parseInt(komenId) + 1) + '">Hapus Komentar!</div>';
        html += '<p id="komentar">' + komentar + '</p>';
        html += '<i class="loy">' + time + '</i>';
        html += '</div></div>';

        // Menambahkan struktur HTML ke dalam elemen dengan class showkom
        $('.showkom').prepend(html);

        // Kosongkan input komentar setelah dikirim
        $('input[name="komentar"]').val('');

        // Kirim data komentar ke server menggunakan AJAX
        $.ajax({
            type: 'POST',
            url: '../proses/addkomen.php',
            data: {
                komentar: komentar,
                id_foto: id_foto,
                id_user: id_user
            },
            success: function(response) {
                console.log(response);
                // Disini Anda harus menangani respon yang diterima dari server
                // Misalnya, Anda dapat melakukan manipulasi DOM berdasarkan respons tersebut
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan saat memposting komentar:', error);
            }
        });
    });
});


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
                var likes = $('.likes_count' + id_foto);
                var likesCount = likes.data('count');
                var likeButton = $(".like[data-foto-id=" + id_foto + "]");
                if(response == 'newlike'){
                    likes.html(likesCount + 1);
                    likeButton.addClass('fu')
                }
                else if(response == "changetolike"){
                    likeButton.addClass('selected');
                    likeButton.addClass('fu');
                }
                else if(response == 'deletelike'){
                    likes.html(parseInt($('.likes_count' + id_foto).text()) - 1);
                    likeButton.removeClass('selected');
                    likeButton.removeClass('fu');
                } 
            }
        })
    })
</script>