        
    <?php
        include '../config/config.php';
        $id_user = $_GET['id_user'];
        $id_foto = $_GET['id_foto'];
        $id_album = $_GET['id_album'];
        
        $query = "SELECT * FROM album WHERE id_user = $id_user";
        $hasilbum = mysqli_query($koneksi, $query); 

        $query = "SELECT *
        FROM album_foto
        INNER JOIN foto ON album_foto.id_foto = foto.id_foto
        ORDER BY album_foto.id DESC";
        $mut = mysqli_query($koneksi, $query);

        foreach($hasilbum as $album) :
        $id_album = $album["id_album"];
    ?>   
        <div class="kol">
        <div class="ftokol">
            <?php 
            foreach($mut as $row):
                if($row["id_album"] == $id_album){
            ?>
            <img src="<?php echo $row["fto"] ?>" alt="">
            <?php } ?>
            <?php endforeach ?>
        </div>
        <div class="jus">
            <p><?php echo $album["namealbum"] ?></p>
            <p><?php echo $album["desk"] ?></p>
        </div>
            <div class="set">
                <div class="dor" data-album-id="<?php echo $id_album ?>" data-foto-id="<?php echo $id_foto ?>">Simpan</div>
                <div class="dar" data-album-id="<?php echo $id_album ?>" data-foto-id="<?php echo $id_foto ?>">Disimpan</div>
            </div>
        </div>
    <?php endforeach ?>    
</div>
<script>
   // Saat halaman dimuat kembali
// Baca cookies dan atur tampilan elemen dor dan dar sesuai dengan status yang tersimpan
$(document).ready(function(){
    var cookies = document.cookie.split(';');
    cookies.forEach(function(cookie) {
        var parts = cookie.split('=');
        var name = parts[0].trim();
        if (name.indexOf("dar_") === 0 && parts[1].trim() === "clicked") {
            var ids = name.split('_');
            var id_foto = ids[1];
            var id_album = ids[2];
            $('.dor[data-foto-id="' + id_foto + '"][data-album-id="' + id_album + '"]').css('display', 'none');
            $('.dar[data-foto-id="' + id_foto + '"][data-album-id="' + id_album + '"]').css('display', 'block');
        }
    });
});

// Ketika elemen dor diklik
$('.dor').click(function(){
    var id_foto = $(this).data('foto-id');
    var id_album = $(this).data('album-id');
    var clickedDor = $(this);
    $.ajax({
        type: 'POST',
        url: '../proses/addkoleksi.php',
        data: {
            id_foto: id_foto,
            id_album: id_album
        },
        success: function(response) {
            clickedDor.css('display', 'none');
            // Simpan status perubahan dengan menggunakan cookies
            var now = new Date();
            var expires = new Date(now.getTime() + 365 * 24 * 60 * 60 * 1000); // Satu tahun dari sekarang
            document.cookie = "dar_" + id_foto + "_" + id_album + "=clicked; expires=" + expires.toUTCString() + "; path=/";
            
            // Atur tampilan elemen dor dan dar
            $('.dar[data-album-id="' + id_album + '"][data-foto-id="' + id_foto + '"]').css('display', 'block');
        },
        
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// Gunakan event delegation untuk menangani klik pada elemen dar
$(document).on('click', '.dar', function(){
    var id_foto = $(this).data('foto-id');
    var id_album = $(this).data('album-id');
    var clickedDar = $(this); // Mengambil elemen dar yang diklik
    
    $.ajax({
        type: 'POST',
        url: '../proses/removekoleksi.php',
        data: {
            id_foto: id_foto,
            id_album: id_album
        },
        success: function(response) {
            clickedDar.css('display', 'none');
            // Hapus status perubahan dengan menggunakan cookies
            document.cookie = "dar_" + id_foto + "_" + id_album + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            
            // Atur tampilan elemen dor dan dar
            $('.dor[data-album-id="' + id_album + '"][data-foto-id="' + id_foto + '"]').css('display', 'block');
        },
        
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});


</script>