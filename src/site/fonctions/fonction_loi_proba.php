<?php
################################## Fonction Inverse de Gauss
function inv_gauss($esp, $lambda, $x) {
    if ($x <= 0) {
        return 0;
    }
    return sqrt($lambda / (2 * pi() * pow($x, 3))) * exp(-$lambda * pow($x - $esp, 2) / (2 * pow($esp, 2) * $x));
}

################################## Méthodes de calcul d'intégrales

#proba_vals --> les valeurs pour la fonction de densité
#proba_fin --> la valeur du resultat

function rectangles_gauche($esp, $lambda, $n, $b) {
    $proba_vals = [];
    $proba_fin = 0;
    $intervalle = $b / $n;

    for ($i = 1; $i <= $n; $i++) {
        $x = $intervalle * $i;
        $proba = $intervalle * inv_gauss($esp, $lambda, $x); // On doit additioner la val de proba avec l'intervalle et la hauteur (inv_gauss)
        $proba_vals[] = $proba;
        $proba_fin += $proba;
    }

    return [
        'proba_vals' => $proba_vals,
        'proba_fin' => $proba_fin
    ];
}



function  rectangles_median($esp, $lambda, $n, $b) {
    $proba_vals = [];
    $intervalle = $b / $n;
    $proba = 0;
    $proba_fin = 0;

    for ($i = 0; $i < $n; $i++) {
        $x = ($i + 0.5) * $intervalle;
        $proba += $intervalle * inv_gauss($esp, $lambda, $x);
        $proba_vals[] = $proba;
        $proba_fin += $proba;
    }
    return [
        'proba_vals' => $proba_vals,
        'proba_fin' => $proba_fin
    ];
}

function trapezes($esp, $lambda, $n, $b) {
    $proba_vals = [];
    $intervalle = $b / $n;
    $proba = 0;
    $proba_fin = 0;

    $proba += 0.5 * inv_gauss($esp, $lambda, 0);
    $proba += 0.5 * inv_gauss($esp, $lambda, $b);

    for ($i = 1; $i < $n; $i++) {
        $x = $i * $intervalle;
        $proba += $intervalle * inv_gauss($esp, $lambda, $x);
        $proba_vals[] = $proba;
        $proba_fin += $proba;
    }

    return [
        'proba_vals' => $proba_vals,
        'proba_fin' => $proba_fin
    ];
}




?>