<?php
include '../includes/header.php';
require_once '../fonctions/fonctions_polynome.php';
require_once "../fonctions/fonctionsDroits.php";
include '../includes/profil.php';

addUserCheck();  // Vérification des droits d'accès
?>
<head>
    <title>Module Polynôme</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>
<?php include '../includes/navbar.php'; ?>

<div>
    <h2 class="titre" id="m4">
        <h2b id="m4">{ &nbsp Module Polynôme &nbsp }</h2b>
    </h2>
    <p id="welcome-message-m4" class="welcome-message eb-garamond-text">Résolution d'une équation du second degré : ax² + bx + c = 0</p>

    <?php
    // Affichage des résultats si présents dans l'URL

    if (isset($_GET['delta'])) {
        $delta = $_GET['delta'];
        $a = 2*$_GET['a'];
        $b = -$_GET['b'];

        if ($delta > 0) {
            $x1 = $_GET['x1'];
            $x2 = $_GET['x2'];
            $resultat = [$x1, $x2];
            echo "<div class='container'>
                  <p>Le discriminant (Δ) est positif : Δ = $delta</p>
                  <p>Les racines réelles sont : </p>
                  <div>\\[ x_{1} = \\frac{ $b-"."\\sqrt{$delta}}{{$a}} " . " \\] ou \\[ x_{2} = \\frac{ $b+"."\\sqrt{$delta}}{{$a}} " . " \\]</div>
                  <p>Les racines réelles calculées de l'équation sont : x1 = $x1 et x2 = $x2</p>
                  </div>";
        }

        elseif ($delta == 0) {
            $x = $_GET['x'];
            $resultat = [$x];
            echo "<div class='container'>
                  <p >Le discriminant (Δ) est nul : Δ = $delta</p>
                  <p>La racine réelle est : </p>
                  <div>\\[ x_{1} = \\frac{ $b}{{$a}}</div>
                  <p>Il y a une racine réelle unique : x = $x</p>
                  </div>";
        }

        else {
            $z1 = $_GET['z1'];
            $z2 = $_GET['z2'];

            // S'assurer que les nombres complexes ont un signe visible
            // entre la partie réelle et imaginaire
            if (strpos($z1, "+") === false && strpos($z1, "-", 1) === false) {
                // Si pas de + ou - après le premier caractère, ajouter un +
                $z1 = preg_replace('/(\-?\d+\.?\d*)(\s*)(\d+\.?\d*i)/', '$1 + $3', $z1);
            }

            $resultat = [$z1, $z2];
            echo "<div class='container'>";
            echo "<p>Le discriminant (Δ) est négatif : Δ = $delta</p>";
            $delta = -$delta;
            echo "<p>Les racines complexes sont : </p>
          <div>\\[ x_{1} = \\frac{ $b-"."\\sqrt{$delta}}{{$a}} " . " \\] ou \\[ x_{2} = \\frac{ $b+"."\\sqrt{$delta}}{{$a}} " . " \\]</div>
          <p>Les racines complexes calculées sont : z1 = $z2 et z2 = $z1</p>
          </div>";
        }

        $resultat_str = implode(', ', $resultat);
        ?>

        <div class="button-group">
            <a href="module4.php"> <button type="button" id="polynome-submit">Retour</button></a>
        </div>
        <?php
    }
    else {
        if (isset($_GET['error'])) {
        echo "<p class='error-message'>Le coefficient à ne peut pas être égal à 0 pour une équation du second degré</p>";
        }
        ?>
        <div class="form-container">
            <form action="actions/calcul_polynome.php" method="post">
                <div class="form-group">
                    <label for="coef_a">Coefficient a :</label>
                    <input type="number" step="any" id="coef_a" name="coef_a" min="-1000" max="1000" required>
                </div>

                <div class="form-group">
                    <label for="coef_b">Coefficient b :</label>
                    <input type="number" step="any" id="coef_b" name="coef_b"  min="-1000" max="1000" required>
                </div>

                <div class="form-group">
                    <label for="coef_c">Coefficient c :</label>
                    <input type="number" step="any" id="coef_c" name="coef_c"  min="-1000" max="1000" required>
                </div>

                <div class="form-group">
                    <button type="submit" id="polynome-submit">Résoudre</button>
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
