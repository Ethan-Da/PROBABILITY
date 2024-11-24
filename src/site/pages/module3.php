<?php include '../includes/header.php'; ?>
<title>Module3</title>
</head>
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
    <h1 class="page-title">Module 3</h1>

    <div class="detail-calcul">
        <div class="section-calc">
            <h3>Détails des calculs</h3>
            <div class="section-content">
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
                    <mfrac>
                        <msqrt>
                            <mi></mi>
                        </msqrt>
                        <msqrt>
                            <mrow>
                                <mi>2</mi>
                                <mi>&#x03C0;</mi>
                                <mi>x</mi>
                                <msup>
                                    <mn>3</mn>
                                </msup>
                            </mrow>
                        </msqrt>
                    </mfrac>
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

        <div class="section-calc">
            <h3>Visualisation des courbes</h3>
            <div class="section-content">
                <!-- Contenu de la visualisation des courbes -->
            </div>
        </div>
    </div>

    <div class="content">
        <form action="calcul.php" method="post" class="calculation-form">
            <div class="input-group">
                <div class="form-field">
                    <label for="E">Espérance :</label>
                    <input type="number" name="E" id="E" step="any" min="0" required>
                </div>

                <div class="form-field">
                    <label for="F">Forme :</label>
                    <input type="number" name="F" id="F" step="any" min="0" required >
                </div>

                <div class="form-field">
                    <label for="T">Valeur t :</label>
                    <input type="number" name="T" id="T" step="any" min="0" required>
                </div>

                <div class="form-field">
                    <label for="N">Nbr valeur :</label>
                    <input type="number" name="N" id="N" min="0" required>
                </div>
            </div>

            <div class="method-selection">
                <h3>Méthode de calcul</h3>
                <select name="methode" id="methode-selection">
                    <option value="trapeze">Méthode trapèzes</option>
                    <option value="rectangle_median">Méthode rectangle médian</option>
                    <option value="rectangle_gauche">Méthode rectangle gauche</option>
                </select>
            </div>

            <div class="results-table">
                <h3>Résultats</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Valeur</th>
                        <th>Forme</th>
                        <th>X̄</th>
                        <th>σ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="result-value">-</td>
                        <td id="result-form"><?php echo"$F"; ?></td>
                        <td id="result-esp"><?php echo"$E"; ?></td>
                        <td id="result-sigma">-</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="button-group">
                <input type="reset" class="btn-reset" name="resetCalcul" value = "Annuler" >
                <input type="submit" class="btn-calcul" name="submitCalcul" value="Calculer">
                <input type="button" class="btn-save" name="saveCalcul" value = "Sauvegarder">
            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php';

/**
if (!isset($_SESSION["login"])) {
header("location:index.php");
}
 */
?>
</body>
</html>