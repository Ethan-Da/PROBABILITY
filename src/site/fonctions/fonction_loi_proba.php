<?php
################################## Fonction Inverse de Gauss
function inv_gauss($esp, $lambda, $x) {
    if ($x <= 0) {
        return 0;
    }
    return sqrt($lambda / (2 * pi() * pow($x, 3))) * exp(-$lambda * pow($x - $esp, 2) / (2 * pow($esp, 2) * $x));
}

################################## Méthodes de calcul d'intégrales

function rectangles_gauche($esp, $lambda, $b,$n) {
    $proba= 0;
    $intervalle = $b / $n;

    for ($i = 1; $i <= $n; $i++) {
        $x = $intervalle * $i;
        $proba += $intervalle * inv_gauss($esp, $lambda, $x); // On doit additioner la val de proba avec l'intervalle et la hauteur (inv_gauss)
    }
    return round($proba,3);
}



function  rectangles_median($esp, $lambda, $b, $n) {
    $intervalle = $b / $n;
    $proba = 0;

    for ($i = 0; $i < $n; $i++) {
        $x = ($i + 0.5) * $intervalle;
        $proba += $intervalle * inv_gauss($esp, $lambda, $x);
    }
    return round($proba, 3);
}

function trapezes($esp, $lambda,$b,$n) {
    $intervalle = $b / $n;
    $proba = 0;
    $a = 0;

    for ($i = 1; $i < $n; $i++) {
        $proba += ((inv_gauss($esp, $lambda, $a) + inv_gauss($esp, $lambda, $a+$intervalle))*$intervalle)/2;
        $a+=$intervalle;
    }

    return round($proba,3);
}

function valeursXY($N, $E, $F, $T) {
    $yValues = [];
    $xValues = [];
    for ($i = 0; $i < $N+1 ; $i++) {
        $x = $i * $T / $N;
        $yValues[] = inv_gauss($E, $F, $x);
        $xValues[] = $x;
    }
    return array($xValues, $yValues);
}

function ecartType($esp, $F){
    $variance = pow($esp,3)/$F;
    return round(sqrt($variance),2);
}


?>