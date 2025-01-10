<?php

require_once '../../fonctions/Database.php';
require_once '../../fonctions/fonctionsLogs.php';

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
                //logSignIn("success");
                $connexionDB->updateLastConnectionLastIp($_POST['login']);
                header('Location: ../index.php');
            } else {
                $error = 2;
                //logSignIn("failure");
                header('Location: ../inscription.php?error=' . $error);
            }
        }


    }




}