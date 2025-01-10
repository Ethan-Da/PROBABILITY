<?php


function logConnec($succes){
    $login = $_SESSION['login'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    error_log("$ip;$date;$login;Tentative de connexion;$succes",0,"../logs/activites.csv");
}

function logSignIn($succes){
    $login = $_SESSION['login'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    error_log("$ip;$login;Tentative d'inscription;$succes",0,"../logs/activites.csv");
}

function logUseModule($succes, $module){
    $login = $_SESSION['login'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    error_log("$ip;$login;Utilisation du module $module;$succes",0,"../logs/activites.csv");
}

function logViewHistory($succes){
    $login = $_SESSION['login'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    error_log("$ip;$login;Utilisation de l'historique;$succes",0,"../logs/activites.csv");
}

function logDeleteChart($succes){
    $login = $_SESSION['login'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");
    error_log("$ip;$login;Suppression d'une fiche de calcul;$succes",0,"../logs/activites.csv");
}