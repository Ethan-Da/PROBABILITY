<?php include '../includes/header.php';
include '../includes/navbar.php';

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

    #si le bouton est cliqué
    if (isset($_POST['ok'])) {
        #Variable pour afficher le CATPCHA
        $affiche_captcha = true;

        #Pour garder les valeurs du filtre et du champ
        $filter = $_POST['filter'];
        $entree = $_POST['input'];

        #Selectinne une question au hasard dans la liste des questions
        $id_question_posee = array_rand($liste_questions);

        #variable de session
        $_SESSION['captcha']['id_question_posee'] = $id_question_posee;
    }

    #Si le bouton de vérif de CAPTCHA est cliqué
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
</head>
<body class="body_form">

<div class="form-container">
    <h2 class="form_h2">Vérification</h2>

    <!-- Afficher un message d'erreur si nécessaire -->
    <?php if ($error_message): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <!-- Formulaire de vérification -->
    <form action="" method="POST">
        <label for="filter" text="Sélectionner un filtre">Choisir ce que vous voulez vérifier :</label>
        <select name="filter" id="filter" required class="form_select">
            <option value="email">Email</option>
            <option value="prenom" >Prénom</option>
            <option value="id" >ID</option>

        </select>

        <label for="input" text="Champ d'entrée">Entrée à vérifier :</label>
        <input type="text" name="input" id="input" class="form_input" value="<?php echo ($entree); ?>" required>


        <button type="submit" name="ok" value="ok" class="form_button">Vérifier</button>

        <!-- Affichage du CAPTCHA si requis -->
        <?php if ($affiche_captcha): ?>
            <div>
                <h3>Etes-vous un robot ?</h3>
                Question : <?php echo $liste_questions[$_SESSION['captcha']['id_question_posee']]['question']; ?>
                <br>
                <br>
                Réponse : <input type="text" name="captcha_reponse" class="form_input" value=""/>
                <br><br>
                <button type="submit" name="submit_captcha" class="form_button" >Soumettre le CAPTCHA</button>
            </div>
        <?php endif; ?>
    </form>
</div>

</body>
</html>
