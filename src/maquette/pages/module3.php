<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';

addSubscribedUserCheck();  //Vérification des droits d'accès?>

<title>>Calcul Proba</title>
<head>
    <title>Calcul Proba</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<?php include '../includes/navbar.php';
include '../includes/profil.php';

$E = "&#x03BC";
$F = "&#x03BB";
$T = "T";

if (isset($_POST['E'])) {
    $E = $_POST['E'];
    $F = $_POST['F'];
    $T = $_POST['T'];
}

?>
<div class="container">
    <div class="titre" id="m3">
        <h2a style="color: #ffcccc;">{</h2a>
        <h2b style="color: #ffcccc;">Calcul Proba</h2b>
        <h2c style="color: #ffcccc;">}</h2c>
    </div>
    <div>
        <span>Loi de probabilité inverse gaussienne</span>
    </div>

    <!--Formulaire pour rentrer les parametres de la fonction, et le méthode de calcul-->
    <div class="content" id="module3-container">
        <form action="actions/calcul.php" method="post" class="calculation-form" id="calculation-form">
            <div class="input-group">
                <div class="form-field">
                    <label for="E">Espérance :</label>
                    <input type="number" name="E" id="E" step="any" min="0.01" max="1000" required id="input-num-m3">
                    <p style="font-size: 0.8rem"> > 0 <br> Représente la moyenne
                    </p>
                </div>

                <div class="form-field">
                    <label for="F">Forme :</label>
                    <input type="number" name="F" id="F" step="any" min="0.01" max="100" required id="input-num-m3">
                    <p style="font-size: 0.8rem"> > 0 <br> Centre la courbe sur la moyenne
                    </p>
                </div>

                <div class="form-field">
                    <label for="T">Valeur t :</label>
                    <input type="number" name="T" id="T" step="any" min="0" max="10000" required id="input-num-m3">
                    <p style="font-size: 0.8rem"> > 0 <br> P(X < T)
                    </p>
                </div>

                <div class="form-field">
                    <label for="N">Nbr valeur :</label>
                    <input type="number" name="N" id="N" min="100" max="10000"required id="input-num-m3">
                    <p style="font-size: 0.8rem"> > 100 <br> Le nombre de valeurs sur l'intervalle
                    </p>
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

            <div class="button-group">
                <button type="reset" class="btn-reset" id="btn-annuler">Annuler</button>
                <button type="submit" class="btn-calcul" name="btn-calcul" id="btn-calcul">Calculer</button>
            </div>
        </form>
    </div>

    <!-- Sections à afficher après le calcul -->
    <div class="detail-calcul" id="detail-calcul" style="display: none;">
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
                            <mi><?php echo "$F"; ?></mi>
                            <mrow>
                                <mn>2</mn>
                                <mi>&#x03C0;</mi>
                                <msup>
                                    <mi>x</mi>
                                    <mn>3</mn>
                                </msup>
                            </mrow>
                        </mfrac>
                    </msqrt>
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
                    <mo>,</mo>
                    <mspace width="0.5em"></mspace>
                    <mi>x</mi>
                    <mo>&gt;</mo>
                    <mn>0</mn>
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

    <!-- Affichage du résultat-->
    <?php if (isset($_POST['proba_val'])):
        $resultat = $_POST['proba_val'];
        $F =  $_POST['F'];
        $E =  $_POST['E'];
        $T =  $_POST['T'];
        $ecartType = $_POST['ET'];
        error_log("Utilisation du module 3, le ".date("d-m-Y H:i:s").", login : ". $_SESSION['login']."\n", 3, './logs/activites.log');?>
        <div class="results-table" id="results-table" style="display: none;">
            <h3>Résultats</h3>
            <table>
                <thead>
                <tr>
                    <th>Valeur</th>
                    <th>Forme</th>
                    <th>Esperance</th>
                    <th>T</th>
                    <th>Ecart Type</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <!-- Affichage des parametres et du resultat envoyés en POST-->
                    <td id="result-value"><?php echo $resultat; ?></td>
                    <td id="result-form"><?php echo $F; ?></td>
                    <td id="result-esp"><?php echo $E; ?></td>
                    <td id="result-T"><?php echo $T; ?></td>
                    <td id="result-ET"><?php echo $ecartType; ?></td>
                </tr>
                </tbody>
            </table>
            <div class="button-group">
                <button type="button" class="btn-retour" id="btn-retour">Retour</button>
                <?php echo "<a class='btn-save' id='btn-sauvegarder' href='./actions/saveFiche.php?resultat=$resultat&F=$F&E=$E&T=$T&ET=$ecartType&module=3'>Sauvegarder</a>" ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    // Création de la fonction pour revenir au formulaire avec btn-retour
    document.addEventListener('DOMContentLoaded', function() {
        // Récupération des données transmises via POST
        const T = '<?php echo $_POST['T'];?>';
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
                        backgroundColor: 'rgba(75, 192, 192, 1)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false,
                        radius: 0
                    }
                    ]
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

            // Afficher les sections après le calcul
            document.getElementById('detail-calcul').style.display = 'block';
            document.getElementById('results-table').style.display = 'block';

            // Masquer le formulaire après le calcul
            document.getElementById('calculation-form').style.display = 'none';
        } else {
            console.error("Aucune donnée reçue pour générer le graphique");
        }

        // Fonction pour revenir au formulaire
        document.getElementById('btn-retour').addEventListener('click', function () {
            document.getElementById('calculation-form').style.display = 'block';
            document.getElementById('detail-calcul').style.display = 'none';
            document.getElementById('results-table').style.display = 'none';
        });
    });


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
