<?php
include '../includes/header.php';
require_once '../fonctions/fonctions_polynome.php';
include '../includes/profil.php';
//addUserCheck();  // Vérification des droits d'accès
?>
<head>
    <title>Module Polynôme</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>

<div>
    <h2>Module Polynôme</h2>
    <p>Résolution d'une équation du second degré : ax² + bx + c = 0</p>

    <?php
    // Affichage des résultats si présents dans l'URL
    if (isset($_GET['error'])) {
        echo "<p class='error-message'>{$_GET['error']}</p>";
    }
    elseif (isset($_GET['delta'])) {
        $delta = $_GET['delta'];
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];
        if ($delta > 0) {
            $x1 = $_GET['x1'];
            $x2 = $_GET['x2'];
            $resultat = [$x1, $x2];
            echo "<p>Le discriminant (Δ) est positif : Δ = $delta</p>";
            echo "<p>Les racines réelles de l'équation sont : x1 = $x1 et x2 = $x2</p>";
        }
        elseif ($delta == 0) {
            $x = $_GET['x'];
            $resultat = [$x];
            echo "<p>Le discriminant (Δ) est nul : Δ = $delta</p>";
            echo "<p>Il y a une racine réelle unique : x = $x</p>";
        }
        else {
            $z1 = $_GET['z1'];
            $z2 = $_GET['z2'];
            $resultat = [$z1, $z2];
            echo "<p>Le discriminant (Δ) est négatif : Δ = $delta</p>";
            echo "<p>Les racines complexes sont : z1 = $z1 et z2 = $z2</p>";
        }

        $resultat_str = implode(', ', $resultat);
        ?>

        <div class="button-group">
            <button type="button" class="btn-retour" id="btn-retour">Retour</button>
            <?php echo "<a class='btn-save' id='btn-sauvegarder' href='./actions/saveFichePoly.php?&a=$a&b=$b&c=$c&resultat=$resultat_str&module=4'>Sauvegarder</a>" ?>
        </div>
        <?php
    }
    else {
        ?>
        <div class="form-container">
            <form action="actions/calcul_polynome.php" method="post">
                <div class="form-group">
                    <label for="coef_a">Coefficient a :</label>
                    <input type="number" step="any" id="coef_a" name="coef_a" required>
                </div>

                <div class="form-group">
                    <label for="coef_b">Coefficient b :</label>
                    <input type="number" step="any" id="coef_b" name="coef_b" required>
                </div>

                <div class="form-group">
                    <label for="coef_c">Coefficient c :</label>
                    <input type="number" step="any" id="coef_c" name="coef_c" required>
                </div>

                <div class="form-group">
                    <button type="submit">Résoudre</button>
                </div>
            </form>
        </div>
        <?php
    }
    ?>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html>
