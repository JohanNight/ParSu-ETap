<script>
    // Add logic to show/hide side navigation when clicking menu icon
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle(
            'hidden'); //Add or remove 'hidden' class to show or hide side navigation
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{-- <script src="{{ mix('resources/js/functionAdmin.js') }}"></script> --}}
</body>

</html>
