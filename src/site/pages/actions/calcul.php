<?php
require_once "../fonctions/fonction_loi_proba.php";

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
                    $resultat = trapezes($E, $F, $N, $T);
                    break;
                case 'rectangle_median':
                    $resultat = rectangles_median($E, $F, $N, $T);
                    break;
                case 'rectangle_gauche':
                    $resultat = rectangles_gauche($E, $F, $N, $T);
                    break;
                default:
                    echo "Méthode non valide.";
                    exit;
            }

            //les valeurs d'ordonnées pour la fonction de densité
            $yValues = $resultat['proba_vals'];
            //la valeur résultat
            $proba_val = $resultat['proba_fin'];

            // valeurs de l'abscisse
            $xValues = [];
            $intervalle = $T / $N;
            for ($i = 1; $i <= $N; $i++) {
                $xValues[] = $i * $intervalle;
            }

            //Formulare caché pour pouvoir envoyer les données en POST(pas possible en GET car URL trop long)
            echo '<form id="redirectForm" action="../module3.php" method="POST">';

            //implode pour mettre le tableau sous form de string et l'envoyer en POST
            echo '<input type="hidden" name="xValues" value="' . implode(',', $xValues) . '">';
            echo '<input type="hidden" name="yValues" value="' . implode(',', $yValues) . '">';
            echo '<input type="hidden" name="E" value="' . $E . '">';
            echo '<input type="hidden" name="F" value="' . $F . '">';
            echo '<input type="hidden" name="T" value="' . $T . '">';
            echo '<input type="hidden" name="N" value="' . $N . '">';
            echo '<input type="hidden" name="proba_val" value="' . $proba_val . '">';
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
