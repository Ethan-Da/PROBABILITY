<?php
<<<<<<< HEAD
function calculerDiscri($a, $b, $c) {
    return ($b * $b) - (4 * $a * $c);
}

function calculerRacinesR($a, $b, $delta) {
    $x1 = (-$b + sqrt($delta)) / (2 * $a);
    $x2 = (-$b - sqrt($delta)) / (2 * $a);

    return [$x1,$x2];
}
function calculerRacineUnique($a, $b) {
    return -$b / (2 * $a) ;
}
function calculerRacinesCmp($a, $b, $delta) {
    $partieR = -$b / (2 * $a);
    $partieIm = sqrt(abs($delta)) / (2 * $a);

    // Construction des chaînes représentant les nombres complexes
    $z1 = $partieR . ' + ' . $partieIm . 'i';
    $z2 = $partieR . ' - ' . $partieIm . 'i';

    return [
        'z1' => $z1,
        'z2' => $z2
    ];
}
?>
=======
>>>>>>> 52e487e5efb37643c199f3138831be87aef243e0
