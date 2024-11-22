<?php
include "../includes/header.php";
?>
<title>Inscription</title>
</head>
<?php
include "../includes/navbar.php";
?>

<body class="body_form">
    <div class="form-container">
    <h2 class="form_h2">Inscription</h2>

        <!-- GESTION DES ERREURS-->
        <?php

        if (isset($_GET["error"])) {
            switch ($_GET["error"]) {
                case 1:
                    $error_msg = "Les mots de passe ne sont pas les mêmes";
                    break;
                case 2:
                    $error_msg = "Login déjà existant";
                    break;
            }
            echo "<p class='error-message'> $error_msg </p>";
        }
        ?>

    <form action="actionInscription.php" method="POST" class="formulaire"

    <!--Quand on affiche le captcha le login et le mot de passe on ne peut plus les modifier même dans l'url-->
    <label for="login" >Login : </label>
    <input type="text" name="login" id="login" required />

    <label for="pass" >Mot de passe : </label>
    <input type="password" name="pass" id="pass" required />

    <label for="verifPass" >Verifier le mot de passe : </label>
    <input type="password" name="verifPass" id="verifPass" required />

    <button type="submit" name="ok" value="ok" class="form_button" >S'inscrire</button>
    </form>
</div>
</body>


<?php
include "../includes/footer.php";
?>