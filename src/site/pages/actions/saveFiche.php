<?php
require_once "../../fonctions/Database.php";

session_start();
if (isset($_GET["module"])) {
    $resultat = $_GET["resultat"];
    $M = $_GET["module"];
    $E = $_GET["E"];
    $F = $_GET["F"];
    $T = $_GET["T"];
    $ET = $_GET["ET"];
    $login = $_SESSION["login"];
    $connexionDB = new Database();
    if ($connexionDB-> saveFiche($M, $E, $F, $T,$ET,$resultat, $login)){
        header("location: ../gestionFiche.php");
    }else{
        header("location: ../module3.php");
    }

        
}else{
    echo"vous ne venez pas d'un module";
}
