
var ctx = document.getElementById('enrolleesChart').getContext('2d');
    var enrolleesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['2021-2022', '2022-2023', '2023-2024', '2024-2025'],
            datasets: [{
                label: 'Numbers of Enrolees',
                data: [1200, 1100, 2000, 0],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.5
            }]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'School Year',
                        font: {
                            size: 16
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Enrollees',
                        font: {
                            size: 16
                        }
                    }
                }
            }
        }
    });