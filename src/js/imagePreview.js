let uploadImageButton = document.getElementById('profile_pic');
uploadImageButton.addEventListener('change', updateImage);

function updateImage(event) {

    var reader = new FileReader();
    reader.onload = function () {
        var image = document.getElementById('page-picture');
        console.log(image);
        image.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);

}
