<?php

require_once '../../fonctions/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'], $_POST['pass'], $_POST['verifPass'])){

        if($_POST['verifPass'] != $_POST['pass']){
            $error = 1;
            header('Location: ../inscription.php?error=' . $error);
        }

        else {
            $connexionDB = new Database();
            if ($connexionDB->addNewAccount($_POST['login'], md5($_POST['pass']))) {
                session_start();
                $_SESSION["login"] = $_POST['login'];
                $_SESSION["pass"] = $_POST['pass'];
                $connexionDB->updateLastConnectionLastIp($_POST['login']);
                header('Location: ../index.php');
            } else {
                $error = 2;
                header('Location: ../inscription.php?error=' . $error);
            }
        }


    }




}