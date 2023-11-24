<?php
// Assuming $listtk is the result from loadall_thongke

// Extract data from $listtk for chart rendering
$categories = [];
$quantities = [];
$averagePrices = [];

foreach ($listtk as $row) {
    $categories[] = $row['name'];
    $quantities[] = $row['soluong'];
    $averagePrices[] = $row['gia_avg'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combined Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 80%; margin: 10px auto;">
        <canvas id="combinedChart"></canvas>
    </div>

    <script>
        // Use Chart.js to render a combined bar and line chart
        var ctx = document.getElementById('combinedChart').getContext('2d');
        var combinedChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($categories); ?>,
                datasets: [{
                        label: 'Số lượng',
                        data: <?php echo json_encode($quantities); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Bar chart color
                        borderColor: '#009B48',
                        borderWidth: 1,
                        yAxisID: 'quantity'
                    },
                    {
                        label: 'Giá trung bình',
                        data: <?php echo json_encode($averagePrices); ?>,
                        fill: false,
                        borderColor: '#FF6384', // Line chart color
                        borderWidth: 1,
                        yAxisID: 'price'
                    }
                ]
            },
            options: {
                scales: {
                    quantity: {
                        type: 'linear',
                        position: 'left',
                        beginAtZero: true
                    },
                    price: {
                        type: 'linear',
                        position: 'right',
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>