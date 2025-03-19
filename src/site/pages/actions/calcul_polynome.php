<?php
include '../../includes/header.php';
require_once '../../fonctions/fonctions_polynome.php';
require_once '../../fonctions/fonctionsDroits.php';
include '../../includes/profil.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = $_POST['coef_a'];
    $b = $_POST['coef_b'];
    $c = $_POST['coef_c'];

    //erreur lors de a = 0
    if ($a == 0) {
        header("Location: ../module4.php?error=1");
        exit();
    }

    $delta = calculerDiscri($a, $b, $c);

    if ($delta > 0) {
        list($x1, $x2) = calculerRacinesR($a, $b, $delta);
        header("Location: ../module4.php?delta=$delta&x1=$x1&x2=$x2&a=$a&b=$b");
    }
    elseif ($delta == 0) {
        $x = calculerRacineUnique($a, $b);
        header("Location: ../module4.php?delta=$delta&x=$x&a=$a&b=$b");
    }
    else {
        $racinesCmp = calculerRacinesCmp($a, $b, $delta);
        header("Location: ../module4.php?delta=$delta&z1={$racinesCmp['z1']}&z2={$racinesCmp['z2']}&a=$a&b=$b");
    }
}
?>
