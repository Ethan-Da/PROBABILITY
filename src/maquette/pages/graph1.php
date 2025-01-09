<< !DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méthode des rectangles gauches</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/13.2.2/math.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="myChart" width="400" height="200"></canvas>
<script src=
        "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js">
</script>
<script type="text/javascript">
    function rectangleGauche(f, a, b, n) {
        const h = (b - a) / n;
        let somme = 0;


        for (let i = 0; i < n; i++) {
            const x = a + i * h;
            somme += f(x) * h;
        }
        return somme;
    }


    function invGauss(esp, lambda, x) {
        if (x <= 0) {
            return 0;
        }
        return Math.sqrt(lambda / (2 * Math.PI * Math.pow(x, 3))) * Math.exp(-lambda * Math.pow(x - esp, 2) / (2 * Math.pow(esp, 2) * x));
    }


    const a = 0;
    const b = 20;
    const n = 1000;
    const esp = 3;
    const lambda = 1;


    const result = rectangleGauche(x => invGauss(esp, lambda, x), a, b, n);
    alert(`Le résultat avec la méthode des rectangles gauches est : ${result}`);




    // Calculer les points de la courbe
    const xValues = [];
    const yValues = [];
    const h = (b - a) / n;




    for (let i = 0; i <= 100; i++) {
        const x = a + i * h;
        xValues.push(x);
        yValues.push(invGauss(esp, lambda, x));
    }




    // Afficher la courbe avec Chart.js
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: xValues,
            datasets: [{
                label: 'Courbe de la fonction invGauss',
                data: yValues,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'x'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'f(x)'
                    }
                }
            },/**
            animation: {
                onComplete: function () {
                    const chartInstance = chart1;
                    const yScale = chartInstance.scales.y;
                    const ctx = chartInstance.ctx;
                    ctx.save();
                    ctx.strokeStyle = 'red';
                    ctx.lineWidth = 0.01;
                    ctx.setLineDash([0.1, 0.1]);
                    ctx.beginPath();
                    ctx.moveTo(chartInstance.chartArea.left, yScale.getPixelForValue(1);
                    ctx.lineTo(chartInstance.chartArea.right, yScale.getPixelForValue(1));
                    ctx.stroke();
                    ctx.restore();
                }
            }*/

        }
    });
</script>
</body>
</html>

