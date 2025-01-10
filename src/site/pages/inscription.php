<?php include "../includes/header.php"; ?>

<title>Inscription</title>
</head>

<?php include "../includes/navbar.php";
include "../includes/profil.php"?>

<body class="body_form">
<div class="form-container">
    <div class="titre">
        <h2a>{</h2a>
        <h2b style="color: orange;">Inscription</h2b>
        <h2c>}</h2c>
    </div>

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

    <!-- FORMULAIRE D'INSCRIPTION-->
    <form action="actions/actionInscription.php" method="POST" class="formulaire">

        <!--Quand on affiche le captcha le login et le mot de passe on ne peut plus les modifier même dans l'url-->
        <label for="login" style="cursor: pointer">Login</label>
        <input type="text" name="login" id="login" required />
        <br><br>

        <label for="pass" style="cursor: pointer">Mot de passe</label>
        <input type="password" name="pass" id="pass" maxlength="11" minlength="2" required />
        <br><br>

        <label for="verifPass" style="cursor: pointer">Vérifier le mot de passe</label>
        <input type="password" name="verifPass" id="verifPass" required />
        <br><br>

        <button type="submit" name="ok" value="ok" class="form_button">S'inscrire</button>
    </form>
</div>
</body>

<?php include "../includes/footer.php"; ?>
