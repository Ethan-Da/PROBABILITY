<?php include '../includes/header.php';
require_once '../Fonctions/fonctions.php';

//addSubscribedUserCheck();  Vérification des droits d'accès?>

<title>Module3</title>
<?php include '../includes/header.php'; ?>
<head>
    <title>Module3</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<body>
<?php include '../includes/navbar.php';

$E = "&#x03BC";
$F = "&#x03BB";
$T = "T";

if (isset($_GET['E'])) {
    $E = $_GET['E'];
    $F = $_GET['F'];
    $T = $_GET['T'];
}


?>
<div class="container">
    <div class="titre" id="m3">
        <h2a>{</h2a>
        <h2b style="color: #ffdddd;">Module 3</h2b>
        <h2c>}</h2c>
    </div>

    <div class="detail-calcul">
        <div class="section-calc">
            <h3>Détails des calculs</h3>
            <div class="section-content">

                <!--Affichage la formule de la fonction avec MathML-->
                <math xmlns="http://www.w3.org/1998/Math/MathML" style="font-size: 1.25rem; padding-top: 30px">
                    <mi>f</mi>
                    <mo>(</mo>
                    <mi>x</mi>
                    <mo>;</mo>
                    <mi><?php echo"$E"; ?></mi>
                    <mo>,</mo>
                    <mi><?php echo"$F"; ?></mi>
                    <mo>)</mo>
                    <mo>=</mo>

                        <msqrt>
                            <mfrac>
                            <mi><?php echo"$F"; ?></mi>
                            <mrow>
                                <mi>2</mi>
                                <mi>&#x03C0;</mi>
                                <mi>x</mi>
                                <msup>
                                    <mn>3</mn>
                                </msup>
                            </mrow>
                            </mfrac>
                        </msqrt>

                    <mi>exp</mi>
                    <mo>(</mo>
                    <msup>

                        <mrow>

                            <mi>-</mi>
                            <mfrac>
                                <mrow>
                                    <mi><?php echo"$F"; ?></mi>
                                    <mo>(</mo>
                                    <mi>x</mi>
                                    <mo>-</mo>
                                    <mi><?php echo"$E"; ?></mi>
                                    <mo>)</mo>
                                </mrow>
                                <mrow>
                                    <mn>2</mn>
                                    <msup>
                                        <mi><?php if ($E != "&#x03BC"){echo"&times;$E";}else{echo"$E";} ?></mi>
                                        <mn>2</mn>
                                    </msup>
                                    <mi>x</mi>
                                </mrow>
                            </mfrac>
                        </mrow>
                        <mn>2</mn>

                    </msup>
                    <mo>)</mo>

                </math>
                <div style=" padding-top: 50px">
                <mi>P</mi>
                <mo>(</mo>
                <mi>X</mi>
                <mo>&#x2264;</mo>
                <mi><?php echo"$T"; ?></mi>
                <mo>)</mo>
                </div>
            </div>
        </div>

        <!--Visualisation dynamique de la fonction de densité dans un canvas-->
        <div class="section-calc">
            <h3>Visualisation des courbes</h3>
            <div class="section-content">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <!--Formulaire pour rentrer les parametres de la fonction, et le méthode de calcul-->
    <div class="content" id="module3-container">
        <form action="calcul.php" method="post" class="calculation-form">
            <div class="input-group">
                <div class="form-field">
                    <label for="E">Espérance :</label>
                    <input type="number" name="E" id="E" step="any" min="0" required id="input-num-m3">
                </div>

                <div class="form-field">
                    <label for="F">Forme :</label>
                    <input type="number" name="F" id="F" step="any" min="0" required id="input-num-m3">
                </div>

                <div class="form-field">
                    <label for="T">Valeur t :</label>
                    <input type="number" name="T" id="T" step="any" min="0" required id="input-num-m3">
                </div>

                <div class="form-field">
                    <label for="N">Nbr valeur :</label>
                    <input type="number" name="N" id="N" min="0" required id="input-num-m3">
                </div>
            </div>

            <!-- Selection de la méthode de calcul-->
            <div class="method-selection">
                <h3>Méthode de calcul</h3>
                <select name="methode" id="methode-selection">
                    <option value="trapeze" >Méthode trapèzes</option>
                    <option value="rectangle_median" >Méthode rectangle médian</option>
                    <option value="rectangle_gauche" >Méthode rectangle gauche</option>
                </select>
            </div>

            <!-- Affichage du résultat-->
            <div class="results-table">
                <h3>Résultats</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Valeur</th>
                        <th>Forme</th>
                        <th>Esperance</th>
                        <th>T</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!-- Affichage des parametres et du resultat envoyés en POST-->
                        <td id="result-value"><?php echo isset($_POST['proba_val']) ? $_POST['proba_val'] : '-'; ?></td>
                        <td id="result-form"><?php echo isset($_POST['F']) ? $_POST['F'] : '-'; ?></td>
                        <td id="result-esp"><?php echo isset($_POST['E']) ? $_POST['E'] : '-'; ?></td>
                        <td id="result-sigma"><?php echo isset($_POST['T']) ? $_POST['T'] : '-'; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="button-group">
                <button type="reset" class="btn-reset" id="btn-annuler">Annuler</button>
                <button type="submit" class="btn-calcul" name="btn-calcul" id="btn-calcul">Calculer</button>
                <button type="button" class="btn-save" id="btn-sauvegarder">Sauvegarder</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Récupération des données transmises via POST
    // puis explode pour récuperer le tableau PHP et json_encode pour pouvoir les utiliser en Javascript
    const xValues = <?php echo isset($_POST['xValues']) ? json_encode(explode(',', $_POST['xValues'])) : '[]'; ?>;
    const yValues = <?php echo isset($_POST['yValues']) ? json_encode(explode(',', $_POST['yValues'])) : '[]'; ?>;

    if (xValues.length > 0 && yValues.length > 0) {
        // Création du graphique avec Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Courbe de la fonction',
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
                }
            }
        });
    } else {
        console.error("Aucune donnée reçue pour générer le graphique");
    }
</script>

<?php include '../includes/footer.php';

/**
if (!isset($_SESSION["login"])) {
header("location:index.php");
}
 */
?>
</body>
</html>