<?php
require_once "captcha.php";
require_once "fonctMysql.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    # login et mot de passe rentré, on vérifie dans la base de données si le compte existe
    # si oui on redirige sur le formulaire avec l'affichage du captcha
    # sinon on rdirige avec une erreur
    if (isset($_GET["ok"])) {
        if (isset($_GET["login"], $_GET["pass"])) {
            $login = htmlspecialchars($_GET["login"]);
            $pass = md5(htmlspecialchars($_GET["pass"]));
            if (true) { ## Database::isValidAccount($login, $_pass)
                $captcha = randomIdCaptcha();
                header('Location: formConnexion.php?login=' . $login . '&pass=' . $pass . '&captcha=' . $captcha);
            }else{
                $error = 1;
                header('Location: formConnexion.php?error=' . $error);
            }
        }
    }


    # une fois le captcha réalisé, si il est correct on commence une nouvelle session
    # sinon on redirige avec une erreur
    if (isset($_GET["submit_captcha"])) {
        $captcha = $_GET["submit_captcha"];
        $login = $_GET["login"];
        $pass = $_GET["pass"];
        if (captchaCorrect($captcha, $_GET["captcha_reponse"])) {
            session_start();
            $_SESSION["login"] = $login;
            $_SESSION["pass"] = $pass;
            header('Location: index.php');
        } else {
            $error = 2;
            header('Location: formConnexion.php?login=' . $login . '&pass=' . $pass . '&captcha=' . $captcha . '&error=' . $error);
        }
    }
}