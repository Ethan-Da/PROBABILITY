<?php
# Liste des questions
$liste_questions = array(
    'question1' => array(
        'question' => "Quelle est la couleur du cheval blanc ?",
        'reponses' => array('blanc', 'blanche', 'neige', 'clair')
    ),
    'question2' => array(
        'question' => "Combien font deux + quatre ?",
        'reponses' => array('6', 'six')
    )
);

# Activation des sessions pour récuperer des variables de sessions
session_start();

$affiche_captcha = false;
$error_message = '';
$filtre= '';
$entree = '';

# Vérif du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ok'])) {
        #Variable pour afficher le CATPCHA
        $affiche_captcha = true;

        #Pour conserver les valeurs du filtre et du champ
        $filter = $_POST['filter'];
        $entree = $_POST['input'];

        #Selectinne une question au hasard dans la liste des questions
        $id_question_posee = array_rand($liste_questions);

        #variable de session
        $_SESSION['captcha']['id_question_posee'] = $id_question_posee;
    }

    #Vérif de la réponse au CAPTCHA et du filtre
    if (isset($_POST['submit_captcha'])) {
        $reponse = $_POST['captcha_reponse'];
        $id_question_posee = $_SESSION['captcha']['id_question_posee'];

        #Validation de la réponse au CAPTCHA
        $captcha_correct = in_array(($reponse),$liste_questions[$id_question_posee]['reponses']);

        #Validation du filtre
        $filter_correct = false;

        switch ($_POST['filter']) {
            case 'email':
                $filter_correct = filter_var($_POST['input'], FILTER_VALIDATE_EMAIL);
                break;

            case 'prenom':
                $filter_correct = preg_match('/^[a-zA-Z]{1,30}$/', $_POST['input']);
                break;

            case 'id':
                $filter_correct = is_numeric($_POST['input']);
                break;
        }

        if ($captcha_correct && $filter_correct) {
            header('Location:verifier.php');
            exit();
        } else {
            $error_message = "Réponse incorrecte au CAPTCHA ou filtre invalide. Réessayez.";
            $affiche_captcha = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        /* Style général de la page */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #89CFF0, #FADADD);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* Conteneur du formulaire */
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        /* Style du titre */
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Champs de saisie et select */
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        /* Focus sur les champs */
        input[type="text"]:focus,
        select:focus {
            border-color: #89CFF0;
            outline: none;
        }

        /* Bouton de connexion */
        button {
            background-color: #89CFF0;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #7BBEEB;
        }

        /* Message d'erreur */
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Vérification</h2>

    <!-- Afficher un message d'erreur si nécessaire -->
    <?php if ($error_message): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <!-- Formulaire de vérification -->
    <form action="" method="POST">
        <label for="filter" text="Sélectionner un filtre">Choisir ce que vous voulez vérifier :</label>
        <select name="filter" id="filter" required>
            <option value="email" <?php echo ($filtre === 'email'); ?>>Email</option>
            <option value="prenom" <?php echo ($filtre === 'prenom'); ?>>Prénom</option>
            <option value="id" <?php echo ($filtre === 'id'); ?>>ID</option>
        </select>

        <label for="input" text="Champ d'entrée">Entrée à vérifier :</label>
        <input type="text" name="input" id="input" value="<?php echo htmlspecialchars($entree); ?>" required>

        <button type="submit" name="ok" value="ok">Vérifier</button>

        <!-- Affichage du CAPTCHA si requis -->
        <?php if ($affiche_captcha): ?>
            <div>
                <h3>Etes-vous un robot ?</h3>
                Question : <?php echo $liste_questions[$_SESSION['captcha']['id_question_posee']]['question']; ?>
                <br>
                Réponse : <input type="text" name="captcha_reponse" value=""/>
                <br><br>
                <button type="submit" name="submit_captcha">Soumettre le CAPTCHA</button>
            </div>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
