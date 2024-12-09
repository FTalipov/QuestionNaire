<?php
include('db.php');
$query = "SELECT gender, COUNT(*) as count FROM responses GROUP BY gender";
$stmt = $pdo->query($query);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$labels = [];
$values = [];
foreach ($data as $row) {
    $labels[] = $row['gender'];
    $values[] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты анкетирования</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        canvas {
            max-width: 600px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Результаты анкетирования</h1>
    <canvas id="genderChart" width="400" height="400"></canvas>
    <script>
        var labels = <?php echo json_encode($labels); ?>;
        var values = <?php echo json_encode($values); ?>;
        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['#FF5733', '#33FF57'],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</body>
</html>