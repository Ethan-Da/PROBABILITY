<?php

require_once "../../fonctions/Database.php";

session_start();
if (isset($_GET["module"])) {
    $resultat = $_GET["resultat_str"];
    $M = $_GET["module"];
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];
    $login = $_SESSION["login"];
    $connexionDB = new Database();
    if ($connexionDB->saveFiche($M, $a, $b, $c, $resultat, $login)) {
        header("location: ../gestionFiche.php");
    } else {
        header("location: ../module4.php");
    }


} else {
    echo "vous ne venez pas d'un module";
}
