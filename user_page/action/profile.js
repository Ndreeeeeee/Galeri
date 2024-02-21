const addmem = document.getElementById("btn1");
const showmem = document.getElementById("frm1");
const showmemm = document.getElementById("frm2");
const exitmem = document.getElementById("btn2");
const opmrk = document.getElementById("op_mrk");
const boxmrk = document.getElementById("mrk");
const mom = document.getElementById("ok");
const boxcls = document.getElementById("cls");
const boxclss = document.getElementById("clss");
const wrp = document.getElementById("wrapl");
const dit = document.getElementById("dit");
const pro = document.getElementById("pro");
const cil = document.getElementById("cil");
const cul = document.getElementById("cul");
const ol = document.getElementById("ol");
const il = document.getElementById("il");
const ox = document.getElementById("ox");


addmem.addEventListener("click", function(){
    showmem.style.display="block";
    showmemm.style.display="none";
    addmem.style.color="#5a29e0";
    exitmem.style.color="#000000";
});

exitmem.addEventListener("click", function(){
    showmem.style.display="none";
    showmemm.style.display="block";
    exitmem.style.color="#5a29e0";
    addmem.style.color="#000000";
});


opmrk.addEventListener("click", function(){
    boxmrk.style.transform="translateY(-75px)";
    wrp.style.transform="translateY(-75px)";
    
});
boxcls.addEventListener("click", function(){
    boxmrk.style.transform="translateY(-800px)";
    wrp.style.transform="translateY(-800px)";
    mom.style.overflow="visible";
});


dit.addEventListener("click", function(){
    pro.style.transform="translateY(-75px)";
    boxmrk.style.transform="translateY(-75px)";
});
boxclss.addEventListener("click", function(){
    pro.style.transform="translateY(-800px)";
    boxmrk.style.transform="translateY(-800px)";
});
cil.addEventListener("click", function(){
    ol.style.display="none";
    il.style.display="block";
    ox.style.height="420px";
});
cul.addEventListener("click", function(){
    ol.style.display="block";
    il.style.display="none";
    ox.style.height="600px";
});

const ho = document.getElementById("ho");
const oh = document.getElementById("oh");
const sub = document.getElementById("sub");
const pul = document.getElementById("pul");
const cek = document.querySelector(".roy");

ho.addEventListener("click", function(){
    oh.style.display="block";
    sub.style.display="block";
    pul.style.display="block";
    ho.style.display="none";
});

oh.addEventListener("click", function(){
    oh.style.display="none";
    sub.style.display="none";
    pul.style.display="none";
    ho.style.display="block";
    ox.style.height="600px";
});



window.addEventListener('scroll', function() {
    var nav = document.getElementById('navbar');
    if (window.scrollY > 0) {
        nav.classList.add('shadow');
    } else {
        nav.classList.remove('shadow');
    }
});
 


document.addEventListener("DOMContentLoaded", function() {
    var op_mrk = document.getElementById("op_mrk");
    var mrk = document.getElementById("mrk");

    op_mrk.addEventListener("click", function() {
        fadeIn(mrk);
    });

    function fadeIn(element) {
        var opacity = 0;
        element.style.display = "block";

        var fadeEffect = setInterval(function () {
            if (opacity < 1) {
                opacity += 0.1;
                element.style.opacity = opacity;
            } else {
                clearInterval(fadeEffect);
            }
        }, 100);
    }
});



function handleKeyPress(event) {
        
    if (event.keyCode === 13) {
        
        var searchText = document.getElementById('src').value;
       
        window.location.href = 'homesrc.php?search=' + searchText;
    }
}


const imageUploader = document.querySelector(".img-inp");
const imagePreview = document.querySelector(".img-com");

function showImage() {
let reader = new FileReader();
reader.readAsDataURL(imageUploader.files[0]);
reader.onload = function(e) {
    imagePreview.classList.add("show");
    imagePreview.src = e.target.result;
};
}

$(document).ready(function() {
    $('#sub').on('click', function(e) {
        e.preventDefault(); // Menghentikan aksi bawaan submit form
        
        // Array untuk menyimpan data foto yang akan dihapus
        var foto_ids = [];

        // Mendapatkan foto_ids dari checkbox yang diceklis
        $('.checkbox:checked').each(function() {
            var foto_id = $(this).data('foto-id');
                foto_ids.push(foto_id);
        });

        // Kirim AJAX request ke server untuk menghapus data foto
        $.ajax({
            type: 'POST',
            url: '../proses/deletfto.php', // Ganti dengan URL yang sesuai dengan file PHP Anda
            data: { foto_ids: foto_ids },
            success: function(response) {
                // Handle sukses, misalnya refresh halaman atau tampilkan pesan sukses
                alert('Foto berhasil dihapus');
                // Lakukan sesuai kebutuhan, seperti refresh halaman
                window.location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error, misalnya tampilkan pesan error
                alert('Terjadi kesalahan saat menghapus foto');
                console.error(error);
            }
        });
    });
});

$(document).ready(function() {
    $('#pul').on('click', function(e) {
        e.preventDefault(); // Menghentikan aksi bawaan submit form
        
        // Array untuk menyimpan data foto yang akan dihapus
        var foto_ids = [];

        // Mendapatkan foto_ids dari checkbox yang diceklis
        $('.checkbox:checked').each(function() {
            var foto_id = $(this).data('foto-id');
            foto_ids.push(foto_id);
        });

        console.log("fotoIds:", foto_ids); // Tambahkan ini untuk memeriksa apakah nilai foto_ids sudah benar
        
        // Jika lebih dari satu checkbox terceklis, sembunyikan elemen dengan id 'pul'
        if (foto_ids.length > 1) {
            $('#pul').hide();
        } else {
            // Jika hanya satu atau tidak ada checkbox terceklis, tampilkan kembali elemen dengan id 'pul'
            $('#pul').show();
            
            // Lakukan navigasi ke edit.php jika foto_ids sudah ditentukan
            if (foto_ids.length === 1) {
                window.location.href = "edit.php?foto_id=" + foto_ids[0];
            }
        }
    });
});

$(document).ready(function(){
    // Ketika elemen dengan ID "ho" diklik
    $('#oh').click(function(){
        // Loop melalui semua elemen dengan kelas "roy"
        $('.roy').each(function(){
            // Mengubah properti tampilan menjadi block
            $(this).css('display', 'none');
        });
    });
});

$(document).ready(function(){
    // Ketika elemen dengan ID "ho" diklik
    $('#ho').click(function(){
        // Loop melalui semua elemen dengan kelas "roy"
        $('.roy').each(function(){
            // Mengubah properti tampilan menjadi block
            $(this).css('display', 'block');
        });
    });
});



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
                    $('#mrk').css('transform', 'translateY(-70px)');
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
                    $('#mrk').css('transform', 'translateY(-70px)');
                    $('#pop').css('transform', 'translateY(-75px)');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

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
        
    
    
        
