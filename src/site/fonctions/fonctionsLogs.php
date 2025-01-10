<?php


function logConnec($succes){
    $fcsv = fopen("../logs/activites.csv", "w");
    $array = [$_SERVER['REMOTE_ADDR'],date("Y-m-d H:i:s") ,$_SESSION['login'],"Tentative de connexion",$succes];
    fputcsv($fcsv, $array);
    fclose($fcsv);
}

function logSignIn($succes){
    $fcsv = fopen("../logs/activites.csv", "w");
    $array = [$_SERVER['REMOTE_ADDR'],date("Y-m-d H:i:s") ,$_SESSION['login'],"Tentative d'inscription",$succes];
    fputcsv($fcsv, $array);
    fclose($fcsv);
}

function logUseModule($succes, $module){
    $fcsv = fopen("../logs/activites.csv", "w");
    $array = [$_SERVER['REMOTE_ADDR'],date("Y-m-d H:i:s") ,$_SESSION['login'],"Utilisation du module $module",$succes];
    fputcsv($fcsv, $array);
    fclose($fcsv);
}

function logViewHistory($succes){
    $fcsv = fopen("../logs/activites.csv", "w");
    $array = [$_SERVER['REMOTE_ADDR'],date("Y-m-d H:i:s") ,$_SESSION['login'],"Utilisation de l'historique",$succes];
    fputcsv($fcsv, $array);
    fclose($fcsv);
}

function logDeleteChart($succes){
    $fcsv = fopen("../logs/activites.csv", "w");
    $array = [$_SERVER['REMOTE_ADDR'],date("Y-m-d H:i:s") ,$_SESSION['login'],"Suppression d'une fiche de calcul",$succes];
    fputcsv($fcsv, $array);
    fclose($fcsv);
}