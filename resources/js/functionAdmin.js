document.addEventListener("DOMContentLoaded", function() {

    //over all service
    new Chart(document.getElementById('usersChart1'), {
            type: 'bar',
            data: {
                labels: ['Service1', 'Service2', 'Service3', 'Service4'],
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
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        });

    //overall Feedback
        new Chart(document.getElementById('totalFeedBackChart[2]'), {
            type: 'doughnut',
            data: {
                labels: ['Very Satisfied', 'Satisfied','Neutral','Dissatisfied','Very Dissastisfied','Not Applicable'],
                datasets: [{
                    data: [60, 40,25,15,5,0 ],
                    backgroundColor: ['#FEC500', '#F2A359','#8B8B8D','#FC2F00','#ED1C24','#020100'],
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
    
//  // Add logic to show/hide side navigation when clicking menu icon
//  const menuBtn = document.getElementById('menuBtn');
//  const sideNav = document.getElementById('sideNav');

//  menuBtn.addEventListener('click', () => {
//      sideNav.classList.toggle(
//          'hidden'); //Add or remove 'hidden' class to show or hide side navigation
//     });
});