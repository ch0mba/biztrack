const ctx = document.getElementById('weekChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: json_encode(array_column($weekData, 'day')),
        datasets: [
            {
                label: 'Sales',
                data: json_encode(array_column($weekData, 'sales')),
                backgroundColor: 'green'
            },
            {
                label: 'Expenses',
                data: json_encode(array_column($weekData, 'expenses')),
                backgroundColor: 'red'
            }
        ]
    }
});