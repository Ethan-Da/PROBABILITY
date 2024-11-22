<?php require_once "fonction_loi_proba.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/13.2.2/math.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["calcul-button"])) {
            $E = $_POST["E"];
            $F = $_POST["F"];
            $T = $_POST["T"];
            $N = $_POST["N"];?>

<script>
            const xValues = [];
            const yValues = [];
            const h = <?php echo $T / $N; ?>;


            for (let i = 0; i <= 100; i++) {
                const x = a + i * h;
                xValues.push(x);
            }
            yValues.push(rectangles_gauche(<?php echo $E ?>,<?php echo $F ?>,<?php echo $N ?>,<?php echo $T ?>));

            }

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
                    }
                }
        });

 <?php if ($E >=0  && $F >=0 && $T >=0 && $N >=1) {
                header('Location: module3.php?E=' . $E . '&F=' . $F . '&T=' . $T . '&N=' . $N);
            }
 ?>



</script>
}
