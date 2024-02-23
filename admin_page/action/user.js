

function handleKeyPress(event) {
        
    if (event.keyCode === 13) {
        
        var searchText = document.getElementById('src').value;
       
        window.location.href = 'homesrc.php?search=' + searchText;
    };
};



function confirmDelete(userId) {
    var confirmation = confirm("Apakah Anda yakin ingin menghapus pengguna ini?");
    if (confirmation) {
        // Jika pengguna mengonfirmasi penghapusan, maka arahkan ke file PHP penghapusan pengguna dengan ID yang sesuai
        window.location.href = "../proses/deletuser.php?id_user=" + userId;
    } else {
        // Jika pengguna membatalkan penghapusan, tidak ada tindakan yang diambil
        return false;
    }
}