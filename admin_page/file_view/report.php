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
    <link rel="stylesheet" href="../style/report.css?v= <?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <title>Profile</title>
</head>
<body id="ok">
    <div class="box_mrk" id="mrk"></div>

    <div class="pop" id="pop">
        
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
        <a href="user.php" class="brn">
            Pengguna
        </a>
        <a href="report.php" class="brn">
            Laporan
        </a>
        <a href="profile.php" class="prf">
            <img src="<?php echo $row["ftopro"]?>" alt="">
        </a>
    </div>

    <div class="wrap">
        <div class="wrp1">
            <div class="sob">
                <span><ion-icon name="alert-circle-outline"></ion-icon></span>
                <p>Data Laporan</p>
            </div>
            <div class="hint">
                <div class="lis">No</div>
                <div class="lis">Laporan</div>
                <div class="lis">Pengunggah</div>
                <div class="lis">Email Pengunggah</div>
                <div class="lis">Lihat</div>
                <div class="lis">Tindak</div>
            </div>
            <div class="dat">
                <?php 
                $no = 1;
                $query = "SELECT * FROM report";
                $rep = mysqli_query($koneksi, $query);
                while($shw = mysqli_fetch_assoc($rep)){
                    $id_foto = $shw["id_foto"];
                ?>
                <div class="con">
                    <div class="cit"><?php echo $no++ ?></div>
                    <div class="cit"><?php echo $shw["laporan"] ?></div>
                    <div class="cit"><?php echo $shw["username"] ?></div>
                    <div class="cit"><?php echo $shw["email"] ?></div>
                    <div class="cit see" data-foto-id = "<?php echo $id_foto ?>"><span><ion-icon name="eye-outline"></ion-icon></span></div>
                    <div class="cit del" onclick="confirmDelete()" data-foto-id = "<?php echo $id_foto ?>"><span><ion-icon name="trash-outline"></ion-icon></span></div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="wrp2">
            <div class="sec">
                <span><ion-icon name="search"></ion-icon></span>
                <input type="text" id="doom" placeholder="Cari Laporan...">
            </div>
            <div class="add">
                <div class="ler">
                    Berikut merupakan deskripsi dari tiap jenis Laporan:
                </div>
                <div class="set">
                    <div class="lap">
                        <p>Spam</p>
                        <p>Postingan yang menyesatkan atau berulang</p>
                    </div>
                    <div class="lap">
                        <p>Konten Seksual</p>
                        <p>Konten seksual eksplisit yang melibatkan orang dewasa atau ketelanjangan, bukan ketelanjangan, atau penyalahgunaan yang disengaja yang melibatkan anak di bawah umur</p>
                    </div>
                    <div class="lap">
                        <p>Informasi yang Keliru</p>
                        <p>Kesehatan, iklim, informasi pemungutan suara yang keliru, atau konspirasi</p>
                    </div>
                    <div class="lap">
                        <p>Pelecehan</p>
                        <p>Penghinaan, ancaman, gambar telanjang tanpa izin pemilik</p>
                    </div>
                    <div class="lap">
                        <p>Pelanggaran privasi</p>
                        <p>Foto pribadi, informasi pribadi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
    $('.see').click(function(){
            var id_foto = $(this).data('foto-id');
            var id_user = $(this).data('user-id');
            
            $.ajax({
                type: 'GET',
                url: '../proses/responhalfview.php',
                data: {
                    id_foto: id_foto
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

    function confirmDelete(userId) {
    var confirmation = confirm("Apakah Anda yakin ingin menghapus postingan ini?");
    if (confirmation) {
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
    } else {
        // Jika pengguna membatalkan penghapusan, tidak ada tindakan yang diambil
        return false;
    }
}

    $(document).on('click', function(event) {
        if (!$(event.target).closest('.view, .repo, .box_add').length) {
            $('#mrk').fadeOut();
            $('#sv').css('transform', 'translateY(-755px)');
            $('#pop').css('transform', 'translateY(-755px)');
        }
    });

    $(document).ready(function() {
        $('#doom').on('input', function() {
            var searchText = $(this).val().toLowerCase();
            $('.dat .con').each(function() {
                var textToSearch = $(this).text().toLowerCase();
                if (textToSearch.indexOf(searchText) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>
<?php } ?>