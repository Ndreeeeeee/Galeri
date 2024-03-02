

function handleKeyPress(event) {
        
    if (event.keyCode === 13) {
        
        var searchText = document.getElementById('src').value;
       
        window.location.href = 'homesrc.php?search=' + searchText;
    }
}

window.addEventListener('scroll', function() {
    var nav = document.getElementById('navbar');
    if (window.scrollY > 0) {
        nav.classList.add('shadow');
    } else {
        nav.classList.remove('shadow');
    }
});







