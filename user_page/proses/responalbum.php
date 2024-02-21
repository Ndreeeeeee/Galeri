    <?php 
    include '../config/config.php';
    $id_album = $_GET["id_album"];
    $query = "SELECT * FROM album WHERE id_album = $id_album";
    $curse = mysqli_query($koneksi, $query);
    while($row = mysqli_fetch_assoc($curse)){
    ?>
    <div class="wrap_kol">
        <div class="cls" id="cls">
            <span>X</span>
        </div>
        <div class="upper">
            Edit Koleksi <span><ion-icon name="grid-outline" ></ion-icon></span>
        </div>
    </div>
    <div class="box_add">
        <form action="../proses/editalbum.php?id_album=<?php echo $row["id_album"] ?>" method="POST">
            <p>Judul Koleksi :</p>
            <input type="text" class="los" value="<?php echo $row["namealbum"] ?>" name="namealbum">
            <p>Deskripsi Koleksi :</p>
            <textarea name="desk" id="" cols="0" rows="0" class="los"><?php echo $row["desk"] ?></textarea>
    
            <input style="display: none;" type="text" name="tgl_albm" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("d F Y");?>">
            <input type="text" value="<?php echo $row["id_user"] ?>" name="id_user" style="display:none;">
            <p class="wei">Kamu bisa menyimpan koleksi foto yang kamu suka setelah menambahkan koleksi.</p>
            <input type="submit" value="Edit" class="crt">
        </form>
    </div>
    <?php } ?>

    <script>
        $(document).ready(function(){
        $('.cls').click(function(){
                $.ajax({
                    success: function(response) {
                        $('#mrk').css('transform', 'translateY(-800px)');
                        $('#wrapl').css('transform', 'translateY(-755px)');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>