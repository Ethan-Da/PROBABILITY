<?php include '../includes/header.php'; ?>

<title>Connexion</title>
</head>

<?php
include '../includes/navbar.php';
require_once "../fonctions/captcha.php";
?>

<body class="body_form">
<div class="form-container" style="background-color: #666666">
    <div class="titre">
        <h2a>{</h2a>
        <h2b>Connexion</h2b>
        <h2c>}</h2c>
    </div>

    <!-- GESTION DES ERREURS-->
    <?php
    if (isset($_GET["error"])) {
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
    <form action="actions/actionConnexion.php" method="POST" class="formulaire">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" <?php if (isset($_GET['login'])) {
            echo "value=" . htmlspecialchars($_GET['login']) . " readonly";
        } ?> required/>

        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass" <?php if (isset($_GET['pass'])) {
            echo "value=" . htmlspecialchars($_GET['pass']) . " readonly";
        } ?> required/>

        <button type="submit" name="ok" value="ok" class="form_button">Se connecter</button>

        <!-- Affichage du CAPTCHA si requis -->
        <?php if (isset($_GET['captcha'])):
            $captcha = htmlspecialchars($_GET['captcha']); ?>
            <div class="captcha-container">
                <h3>Etes-vous un robot ?</h3>
                <p>Question : <?php echo recupQuestionCaptcha($captcha); ?></p>
                <label for="captcha_reponse">Réponse : </label>
                <input type="text" name="captcha_reponse" class="form_input" value=""/>
                <button type="submit" name="submit_captcha" value="<?php echo $captcha; ?>" class="form_button">Soumettre le CAPTCHA</button>
            </div>
        <?php endif; ?>
    </form>

    <div class="inscription-link-container">
        <p>Tu n'as pas de compte ? <a href="inscription.php" class="inscription-link">INSCRIS TOI !!</a></p>
    </div>
</div>
</body>

<?php include '../includes/footer.php'; ?>
