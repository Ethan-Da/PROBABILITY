<?php
require_once "../../fonctions/fonction_loi_proba.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["btn-calcul"])) {
        // Récupérer les données du formulaire
        $E = $_POST["E"];
        $F = $_POST["F"];
        $T = $_POST["T"];
        $N = $_POST["N"];
        $methode = $_POST["methode"]; // Méthode sélectionnée

        if ($E >= 0 && $F >= 0 && $T >= 0 && $N >= 1) {

            // Appelle des méthodes de calculs en fonction de la selection
            $resultat = [];
            switch ($methode) {
                case 'trapeze':
                    $resultat = trapezes($E, $F, $T, $N);
                    break;
                case 'rectangle_median':
                    $resultat = rectangles_median($E, $F, $T, $N);
                    break;
                case 'rectangle_gauche':
                    $resultat = rectangles_gauche($E, $F, $T, $N);
                    break;
                default:
                    echo "Méthode non valide.";
                    exit;
            }

            //les valeurs d'ordonnées pour la fonction de densité

            $valeurs = valeursXY($N, $E, $F,$T);
            $xValues = $valeurs[0];
            $yValues = $valeurs[1];
            $ecartType = ecartType($E,$F);

            //Formulare caché pour pouvoir envoyer les données en POST(pas possible en GET car URL trop long)
            echo '<form id="redirectForm" action="../module3.php" method="POST">';

            //implode pour mettre le tableau sous form de string et l'envoyer en POST
            echo '<input type="hidden" name="xValues" value="' . implode(',', $xValues) . '">';
            echo '<input type="hidden" name="yValues" value="' . implode(',', $yValues) . '">';
            echo '<input type="hidden" name="E" value="' . $E . '">';
            echo '<input type="hidden" name="F" value="' . $F . '">';
            echo '<input type="hidden" name="T" value="' . $T . '">';
            echo '<input type="hidden" name="N" value="' . $N . '">';
            echo '<input type="hidden" name="M" value="' . $methode . '">';
            echo '<input type="hidden" name="ET" value="' . $ecartType . '">';
            echo '<input type="hidden" name="proba_val" value="' . $resultat . '">';
            echo '</form>';

            //execute automatiquement le formulaire avec submit()
            echo '<script>document.getElementById("redirectForm").submit();</script>';
            exit;
        } else {
            echo "Erreur : valeurs invalides.";
        }
    }
}
?>
