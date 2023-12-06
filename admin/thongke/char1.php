<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

        <div class="mb10">
            <canvas id="revenueChart" width="400" height="400"></canvas>
        </div>
    <!-- ///////////////////////////// -->
    <script>
        var revenueData = <?php echo json_encode(thongke()); ?>;

        var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: revenueData.map(item => formatLabel(item.thangvanam)).reverse(),
                datasets: [{
                    label: 'Tổng doanh thu',
                    data: revenueData.map(item => item.doanhthu).reverse(),
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                title: {
                    display: true,
                    text: 'Total Revenue Trend (Line Chart)'
                }
            }
        });


        function formatLabel(thangvanam) {
            var date = new Date(thangvanam + '-01');
            var day = date.getDate();
            var month = date.toLocaleDateString('en-US', {
                month: 'numeric'
            });
            var year = date.getFullYear();
            return month + '/' + year;
        }
    </script>




</body>

</html>