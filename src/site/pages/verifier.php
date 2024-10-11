<?php
if (isset($_POST['ok'])) {
    $filter = $_POST['filter'];  // Le filtre sélectionné
    $input = $_POST['input'];    // L'entrée à vérifier

    if ($filter == "email") {
        // Vérifier que l'email est valide et a un maximum de 50 caractères
        if (!filter_var($input, FILTER_VALIDATE_EMAIL) || strlen($input) > 50) {
            header("Location: formulaire.php?erreur=1");
            exit();
        }
    } elseif ($filter == "prenom") {
        // Vérifier que le prénom ne contient que des lettres et a un maximum de 30 caractères
        if (!preg_match("/^[a-zA-Z]+$/", $input) || strlen($input) > 30) {
            header("Location: formulaire.php?erreur=2");
            exit();
        }
    } elseif ($filter == "id") {
        // Vérifier que l'ID est un nombre entre 100 et 900
        if (!filter_var($input, FILTER_VALIDATE_INT) || $input < 1000 || $input > 9000) {
            header("Location: formulaire.php?erreur=3");
            exit();
        }
    }

    // Si tout est correct
    echo "<div class='success-message'>";
    echo "<p>La vérification a réussi pour le filtre <strong>" . htmlspecialchars($filter) . "</strong> !</p>";
    echo "<div class='checkmark-container'><span class='checkmark'>&#10003;</span></div>";
    echo "</div>";
}
?>

<style>
    /* Conteneur pour le message de succès */
    .success-message {
        background-color: #D4EDDA; /* Vert clair */
        color: #155724; /* Vert foncé pour le texte */
        padding: 20px;
        margin: 20px 0;
        border-radius: 8px;
        text-align: center;
        border: 1px solid #C3E6CB;
        font-size: 18px;
        position: relative;
        animation: fadeIn 0.5s ease-in-out;
    }

    /* Style pour le symbole de validation (checkmark) */
    .checkmark-container {
        margin-top: 10px;
    }

    .checkmark {
        display: inline-block;
        font-size: 30px;
        color: #28A745; /* Couleur verte pour la coche */
        animation: scaleIn 0.5s ease-in-out;
    }

    /* Animation pour faire apparaître le message progressivement */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animation pour agrandir la coche */
    @keyframes scaleIn {
        from {
            transform: scale(0);
        }
        to {
            transform: scale(1);
        }
    }
</style>
