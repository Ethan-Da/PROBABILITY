<?php

function calculerDiscri($a, $b, $c) {
    return ($b * $b) - (4 * $a * $c);
}

function calculerRacinesR($a, $b, $delta) {
    $x1 = round((-$b - sqrt($delta)) / (2 * $a),3);
    $x2 = round((-$b + sqrt($delta)) / (2 * $a),3);

    return [$x1,$x2];
}
function calculerRacineUnique($a, $b) {
    return round(-$b / (2 * $a),3) ;
}
function calculerRacinesCmp($a, $b, $delta) {
    $partieR = round(-$b / (2 * $a));
    $partieIm = round(sqrt(abs($delta)) / (2 * $a), 3);

    // Construction des chaînes représentant les nombres complexes
    $z1 = $partieR . ' + ' . $partieIm . 'i';
    $z2 = $partieR . ' - ' . $partieIm . 'i';

    return [
        'z1' => $z1,
        'z2' => $z2
    ];
}
?>

