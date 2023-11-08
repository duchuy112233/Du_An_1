<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>
<body>
    <div class="boxcenter">
        <h1>BIỂU ĐỒ THỐNG KÊ</h1>
        <form action="" method="post">
        </form>
        <div id="piechart"></div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);
            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                    $tongdm = count($listtk);
                    $i = 1;
                    foreach ($listtk as $tk) {
                        extract($tk);
                        if ($i == $tongdm) $dauphay = "";
                        else $dauphay = ",";
                        echo "['" . $tk['tendm'] . "', " . $tk['soluong'] . "]" . $dauphay;
                        $i += 1;
                    }
                    ?>
                ]);
                // Optional; add a title and set the width and height of the chart
                var options = {
                    'title': '',
                    'width': 650,
                    'height': 500
                };
                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
    </div>
</body>

</html>