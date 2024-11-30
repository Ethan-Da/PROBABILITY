<?php
require_once "../../fonctions/Database.php";

session_start();
if (isset($_GET["module"])) {
    $resultat = $_GET["resultat"];
    $M = $_GET["module"];
    $E = $_GET["E"];
    $F = $_GET["F"];
    $T = $_GET["T"];
    $login = $_SESSION["login"];
    $connexionDB = new Database();
    $connexionDB-> saveFiche($M, $E, $F, $T,$resultat, $login);
    header("location: ../gestionFiche.php");
        
}else{
    echo"pas de M";
}
