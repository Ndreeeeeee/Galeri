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
            <div class="lik"><i class="fa like fa-regular fa-heart <?php if($status == 'like') echo "fu" ; ?>" data-foto-id = <?php echo $id_foto ?> ></i><p></p></div>      
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
            <?php
            include '../proses/readuser.php';
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


    $(document).ready(function() {
    $('.btngo').click(function() {
        var komentar = $('input[name="komentar"]').val();
        var foto = $(this).data('foto');
        var username = $(this).data('name');
        var id_foto = $('input[name="komentar"]').data('foto-id');
        var id_user = $('input[name="komentar"]').data('user-id');

        // Membuat struktur HTML untuk komentar
        var html = '<div class="komen">';
        html += '<div class="kofto"><img id="fto" src="' + foto + '" alt=""></div>';
        html += '<div class="kom">';
        html += '<p id="username">' + username + '</p>';
        html += '<p id="komentar">' + komentar + '</p>';
        html += '</div></div>';

        // Menambahkan struktur HTML ke dalam elemen dengan class showkom
        $('.showkom').append(html);

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
                if (response.status === 'error') {
                    console.error(response.message);
                } else {
                    console.log(response.message);
                }
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
</script>