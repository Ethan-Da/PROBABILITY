<?php include '../includes/header.php';
require_once '../Fonctions/fonctions.php';

//addSubscribedUserCheck();  Vérification des droits d'accès?>

<title>Module3</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container">
    <h1 class="page-title">Module 3</h1>

    <div class="detail-calcul">
        <div class="section-calc">
            <h3>Détails des calculs</h3>
            <div class="section-content">
                <!-- Contenu des détails des calculs -->
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
        <form action="Calcul.php" method="post" class="calculation-form">
            <div class="input-group">
                <div class="form-field">
                    <label for="E">Espérance :</label>
                    <input type="number" name="E" id="E" step="any" required>
                </div>

                <div class="form-field">
                    <label for="F">Forme :</label>
                    <input type="number" name="F" id="F" step="any" required>
                </div>

                <div class="form-field">
                    <label for="T">Valeur t :</label>
                    <input type="number" name="T" id="T" step="any" required>
                </div>

                <div class="form-field">
                    <label for="N">Nbr valeur :</label>
                    <input type="number" name="N" id="N" required>
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
                        <td id="result-form">-</td>
                        <td id="result-x">-</td>
                        <td id="result-sigma">-</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="button-group">
                <button type="reset" class="btn-reset" >Annuler </button>
                <button type="submit" class="btn-calcul">Calculer</button>
                <button type="button" class="btn-save">Sauvegarder</button>
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