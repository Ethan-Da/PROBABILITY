<?php include '../includes/header.php';?>

    <title>Connexion</title>
</head>

<?php
include '../includes/navbar.php';

require_once "captcha.php";

$login = '';
$pass = '';

?>


<body class="body_form">
<div class="form-container">
    <h2 class="form_h2">Connexion</h2>


    <!-- GESTION DES ERREURS-->
    <?php

    if (isset($_GET["error"])){
        switch ($_GET["error"]) {
            case 1:
                $error_msg = "Mauvais identifiant ou mot de passe";
                break;
            case 2:
                $error_msg = "Réponse incorrecte au CAPTCHA, Réessayez.";
                break;
        }

        echo "<p class='error-message'> $error_msg </p>";
    }
    ?>


    <!-- FORMULAIRE DE CONNEXION-->
    <form action="actionConnexion.php" method="GET">

    <?php if (!isset($_GET['captcha'])):
            if (isset($_GET["login"], $_GET["pass"])) {
            $login = $_GET['login'];
            $pass = $_GET['pass'];
            }
    ?>


            <label for="login" >Login : </label>
            <input type="text" name="login" id="login" value="<?php echo ($login); ?>" required/>

            <label for="pass" >Mot de passe : </label>
            <input type="password" name="pass" id="pass"  value="<?php echo ($pass); ?>" required/>

            <button type="submit" name="ok" value="ok" class="form_button" >Se connecter</button>
    <?php endif; ?>

        <!-- Affichage du CAPTCHA si requis -->
    <?php if (isset($_GET['captcha'])):
    $captcha = $_GET['captcha']; ?>

                <div>
                    <h3>Etes-vous un robot ?</h3>
                    Question : <?php echo recupQuestionCaptcha($captcha); ?>
                    <br>
                    <br>
                    <label for="captcha_reponse">Réponse : </label>
                    <input type="text" name="captcha_reponse" class="form_input" value=""/>
                    <br><br>
                    <button type="submit" name="submit_captcha" <?php echo"value = $captcha";?> class="form_button" >Soumettre le CAPTCHA</button>
                </div>
            </form>
    <?php endif; ?>

</div>

<?php include '../includes/footer.php';?>
