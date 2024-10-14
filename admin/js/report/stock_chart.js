
const ctx = document.getElementById('stockChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [{
            label: 'Sample Data',
            data: [12, 19, 3, 5],
            borderColor: [
                '#EE6055'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
               y: {
                beginAtZero: true
            }
        }
    }
});
