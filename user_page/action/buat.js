window.addEventListener('scroll', function() {
    var nav = document.getElementById('navbar');
    if (window.scrollY > 0) {
        nav.classList.add('shadow');
    } else {
        nav.classList.remove('shadow');
    }
});

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