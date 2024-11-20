<?php
    function inv_gauss($esp, $lambda, $x) {
        if ($x <= 0) {
        return 0;
        }
        return sqrt($lambda / (2 * pi() * pow($x, 3))) * exp(-$lambda * pow($x - $esp, 2) / (2 * pow($esp, 2) * $x));
        }

    function  rectangles_gauche($esp, $lambda, $n, $b) {
        $intervalle = ($b / $n);
        $h = $b / $n;
        $proba = 0;
        for ($i = 1; $i <= $n; $i++) { // Commence à 1 pour éviter la division par zéro
            $x = $intervalle * $i;
            $proba += $intervalle * inv_gauss($esp, $lambda, $x);
        }

        return $proba;
    }

    function  rectangles_median($esp, $lambda, $n, $b) {
        $intervalle = $b / $n;
        $proba = 0;
        for ($i = 0; $i < $n; $i++) {
            $x = ($i + 0.5) * $$intervalle;
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