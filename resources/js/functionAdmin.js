function previewImage(input) {
    const preview = document.getElementById('previewImage');
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

 // Add logic to show/hide side navigation when clicking menu icon
 const menuBtn = document.getElementById('menuBtn');
 const sideNav = document.getElementById('sideNav');

 menuBtn.addEventListener('click', () => {
     sideNav.classList.toggle(
         'hidden'); //Add or remove 'hidden' class to show or hide side navigation
 });