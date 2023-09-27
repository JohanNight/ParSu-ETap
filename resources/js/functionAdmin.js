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

 
    ServiceBarChart();

    function ServiceBarChart() {
        const labels = ['Service1', 'Service2', 'Service3', 'Service4']; // Updated labels
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Survey Answered per Service',
                data: [65, 59, 80, 81], // Update this data with your specific values
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                borderWidth: 1,
            }],
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true, // Allow the chart to be responsive
                maintainAspectRatio: false, // Prevent maintaining aspect ratio
            },
        };
        const ctx = document.getElementById('usersChart[1]').getContext('2d');
        new Chart(ctx, config);
    }

// Gráfica de Comercios
    var commercesChart = new Chart(document.getElementById('commercesChart[2]'), {
        type: 'doughnut',
        data: {
            labels: ['Happy', 'Not Happy'],
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