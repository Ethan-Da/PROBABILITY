<!DOCTYPE html>

<head>
    <title>Example 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: green;
            text-align: center;
        }

        h3 {
            margin-top: 0;
            text-align: center;
        }

        .chart-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: auto;
        }
    </style>
</head>

<body>
<h1>GeeksforGeeks</h1>
<h3>Approach 2: Using Custom Annotations</h3>
<div class="chart-container">
    <canvas id="chart1"></canvas>
</div>
<script src=
        "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js">
</script>
<script>

    const ctx1 = document.getElementById('chart1').getContext('2d');
    const chart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May'],
            datasets: [{
                label: 'GeeksforGeeks Views',
                data: [65, 59, 80, 81, 56],
                borderColor: 'blue',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            animation: {
                onComplete: function () {
                    const chartInstance = chart1;
                    const yScale = chartInstance.scales.y;
                    const ctx = chartInstance.ctx;
                    ctx.save();
                    ctx.strokeStyle = 'red';
                    ctx.lineWidth = 2;
                    ctx.setLineDash([2, 2]);
                    ctx.beginPath();
                    ctx.moveTo(chartInstance.chartArea.left, yScale.getPixelForValue(45));
                    ctx.lineTo(chartInstance.chartArea.right, yScale.getPixelForValue(45));
                    ctx.stroke();
                    ctx.restore();
                }
            }
        }
    });
</script>
</body>

</html>
