<?php include "../includes/header.php"; ?>

<title>Inscription</title>
</head>

<?php include "../includes/navbar.php";
include "../includes/profil.php";
?>

<body class="body_form">
<div class="form-container">
    <div class="titre">
        <h2a>{</h2a>
        <h2b>Inscription</h2b>
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
        echo "<h1 class='error-message'>$error_msg</h1>";
    }
    ?>

    <!-- FORMULAIRE D'INSCRIPTION-->
    <form action="actions/actionInscription.php" method="POST" class="formulaire" onsubmit="return validatePassword()">

        <!-- Login -->
        <label for="login" style="cursor: pointer">Login</label>
        <input type="text" name="login" id="login" minlength="3" maxlength="11" required title="Merci de suivre les instructions ci-dessous"/>
        <small>
            Le login doit contenir entre 3 et 11 caractères.
        </small>


        <!-- Mot de passe -->
        <label for="pass" style="cursor: pointer">Mot de passe</label>
        <div class="password-container">
            <input type="password" name="pass" id="pass" minlength="12" maxlength="15" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{12,}" title="Merci de suivre les instructions ci-dessous"/>
            <button type="button" class="toggle-password" aria-label="Afficher/Masquer le mot de passe" onclick="togglePassword('pass')">
                👁
            </button>
        </div>
        <small>
            Le mot de passe doit contenir au moins 12 caractères, incluant des majuscules, des minuscules, des chiffres et des caractères spéciaux.
        </small>

        <!-- Vérifier le mot de passe -->
        <label for="verifPass" style="cursor: pointer">Vérifier le mot de passe</label>
        <div class="password-container">
            <input type="password" name="verifPass" id="verifPass" required/>
            <button type="button" class="toggle-password" aria-label="Afficher/Masquer la vérification du mot de passe" onclick="togglePassword('verifPass')">
                👁
            </button>
        </div>
        <small>
            Veuillez saisir à nouveau votre mot de passe.
        </small>

        <!-- Bouton de soumission -->
        <button type="submit" name="ok" value="ok" class="form_button">S'inscrire</button>
    </form>
</div>

<script>
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;

        // Mise à jour du label pour l'accessibilité
        const button = input.nextElementSibling;
        button.setAttribute('aria-label',
            `${type === 'password' ? 'Afficher' : 'Masquer'} le mot de passe`
        );
    }
</script>

<?php include "../includes/footer.php"; ?>
