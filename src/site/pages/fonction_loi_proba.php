<?php
################################## Fonction Inverse de Gauss
    function inv_gauss($esp, $lambda, $x) {
        if ($x <= 0) {
        return 0;
        }
        return sqrt($lambda / (2 * pi() * pow($x, 3))) * exp(-$lambda * pow($x - $esp, 2) / (2 * pow($esp, 2) * $x));
        }

################################## Méthodes de calcul d'intégrales

    function  rectangles_gauche($esp, $lambda, $n, $b) {
        $proba_fin = [];
        $intervalle = ($b / $n); // pas besoin de définir a car on commence toujours à 0
        $h = $b / $n;
        $proba = 0;
        for ($i = 1; $i <= $n; $i++) { // Commence à 1 pour éviter la division par zéro
            $x = $intervalle * $i;
            $proba += $intervalle * inv_gauss($esp, $lambda, $x);
            $proba_fin = [$proba]; //On ajoute les valeurs dans une liste pour pouvoir les afficher plus tard
        }

        return $proba_fin;
    }

    function  rectangles_median($esp, $lambda, $n, $b) {
        $intervalle = $b / $n;
        $proba = 0;
        for ($i = 0; $i < $n; $i++) {
            $x = ($i + 0.5) * $intervalle;
            $proba += $intervalle * inv_gauss($esp, $lambda, $x);
        }
        return $proba;
    }

    function  trapezes($esp, $lambda, $n, $b) {
        $intervalle = ($b) / $n;
        $sum = inv_gauss($esp, $lambda,$b);

        for ($i = 1; $i < $n; $i++) {
            $x = $i * $intervalle;
            $sum += 2 * inv_gauss($esp,$lambda,$x);
        }

        return $intervalle * $sum / 2;
    }




?>