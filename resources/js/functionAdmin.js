document.addEventListener("DOMContentLoaded", function() {

    // function previewImage(input) {
    //     const preview = document.getElementById('previewImage');
    //     if (input.files && input.files[0]) {
    //         const reader = new FileReader();

    //         reader.onload = function(e) {
    //             preview.src = e.target.result;
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

  // Gráfica de Usuarios
    var usersChart = new Chart(document.getElementById('usersChart'), {
        type: 'pie',
        data: {
            labels: ['New', 'Registered'],
            datasets: [{
                data: [30, 65],
                backgroundColor: ['#00F0FF', '#8B8B8D'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom' // Ubicar la leyenda debajo del círculo
            }
        }
    });

// Gráfica de Comercios
    var commercesChart = new Chart(document.getElementById('commercesChart'), {
        type: 'doughnut',
        data: {
            labels: ['Nuevos', 'Registrados'],
            datasets: [{
                data: [60, 40],
                backgroundColor: ['#FEC500', '#8B8B8D'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom' // Ubicar la leyenda debajo del círculo
            }
        }
        });

 // Add logic to show/hide side navigation when clicking menu icon
 const menuBtn = document.getElementById('menuBtn');
 const sideNav = document.getElementById('sideNav');

 menuBtn.addEventListener('click', () => {
     sideNav.classList.toggle(
         'hidden'); //Add or remove 'hidden' class to show or hide side navigation
 });
});