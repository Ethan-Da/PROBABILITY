<?php

require_once '../../fonctions/Database.php';
require_once '../../fonctions/fonctionsLogs.php';
require_once '../../fonctions/RC4Cipher.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'], $_POST['pass'], $_POST['verifPass'])){

        if($_POST['verifPass'] != $_POST['pass']){
            $error = 1;
            header('Location: ../inscription.php?error=' . $error);
        }

        else {
            // Création d'une instance RC4 avec une clé secrète
            $key = "Key"; // Insérer une clé sécurisée !
            $rc4 = new RC4Cipher($key);

            // Chiffrement du mot de passe avec RC4
            $encryptedPassword = $rc4->encrypt($_POST['pass']);

            $connexionDB = new Database();
            // Utilisation du mot de passe chiffré avec RC4 au lieu de md5
            if ($connexionDB->addNewAccount($_POST['login'], $encryptedPassword)) {
                session_start();
                $_SESSION["login"] = $_POST['login'];
                $_SESSION["pass"] = $_POST['pass']; // Stockage du mot de passe non chiffré en session
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