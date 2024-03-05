
<?php
    session_start(); 
    include '../config/config.php';
    $id_foto = $_GET['id_foto'];

    $query = "SELECT * FROM foto WHERE id_foto = $id_foto";
    $hasilbum = mysqli_query($koneksi, $query);
     
    foreach($hasilbum as $foto) :
    $id_foto = $_GET["id_foto"];
?>  

<div class="view">
    <div class="popfto">
        <div class="wrp_img">
            <img src="<?php echo $foto["fto"] ?>" alt="">
            <div class="title">
                <div class="jdl"><?php echo $foto["jdlfto"] ?></div>
                <span class="soko"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></span>
                <div class="siu del" onclick="confirmDelete()" data-foto-id = "<?php echo $id_foto ?>">Hapus Postingan!</div>
                <div class="desk"><?php echo $foto["deskfto"] ?></div>
                <div class="loy sup"><i>Posted : <?php echo $foto["tglup"] ?></i></div>
            </div>
        </div>
    </div>
    
</div>

<?php endforeach ?>

<script>
    

$(document).on('click', function(event) {
    if (!$(event.target).closest('.siu').length) {
        $('.siu').css('display', 'none');
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

    $(document).ready(function(){
    $('.del').click(function(){
            var id_foto = $(this).data('foto-id');
            
            $.ajax({
                type: 'POST',
                url: '../proses/deletftorep.php',
                data: {
                    id_foto: id_foto
                },
                success: function(response) {
                    location.reload()
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

</script>