<?php
require_once "../../fonctions/captcha.php";
require_once "../../fonctions/Database.php";
require_once "../../fonctions/fonctionsLogs.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # login et mot de passe rentré, on vérifie dans la base de données si le compte existe
    # si oui on redirige sur le formulaire avec l'affichage du captcha
    # sinon on redirige avec une erreur
    if (isset($_POST["ok"])) {
        if (isset($_POST["login"], $_POST["pass"])) {
            $login = $_POST["login"];
            $pass = md5($_POST["pass"]);
            $connexionDB = new Database();
            if ($connexionDB->isValidAccount($login)) {
                $captcha = randomIdCaptcha();
                header('Location: ../connexion.php?login=' . $login . '&pass=' . $pass . '&captcha=' . $captcha);
            }else{
                $error = 1;
                header('Location: ../connexion.php?error=' . $error);

            }
        }
    }


    # une fois le captcha réalisé, si il est correct on commence une nouvelle session
    # sinon on redirige avec une erreur
    if (isset($_POST["submit_captcha"])) {
        $captcha = $_POST["submit_captcha"];
        $login = $_POST["login"];
        $pass = $_POST["pass"];
        if (captchaCorrect($captcha, $_POST["captcha_reponse"])) {
            session_start();
            setcookie("cookieLogin", $login, time() + 3600, "/login", "", false, true);
            setcookie("cookiePass", $pass, time() + 3600, "/login", "", false, true);
            $_SESSION["login"] = $login;
            $_SESSION["pass"] = $pass;
            $connexionDB = new Database();
            $connexionDB->updateLastConnectionLastIp($login);
            //logConnec("success");
            header('Location: ../index.php');
        } else {
            $error = 2;
            logConnec("failure");
            header('Location: ../connexion.php?login=' . $login . '&pass=' . $pass . '&captcha=' . $captcha . '&error=' . $error);
        }
    }
}