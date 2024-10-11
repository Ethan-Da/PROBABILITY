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
            background: linear-gradient(120deg, #89CFF0, #FADADD); /* Dégradé de bleu et rose */
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
        input[type="password"],
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
        input[type="password"]:focus,
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

        /* Style pour le select */
        select {
            appearance: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Ajouter une icône pour indiquer que c'est un select */
        select {
            background-image: url('data:image/svg+xml;charset=US-ASCII,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4 5"><path fill="%23999" d="M2 0L0 2h4z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 10px 10px;
        }

        /* Rendre le select plus fluide sur mobile */
        select:focus {
            border-color: #89CFF0;
        }

        /* Ajustement sur les petits écrans */
        @media (max-width: 400px) {
            .form-container {
                padding: 15px;
                width: 100%;
            }

            h2 {
                font-size: 18px;
            }

            input[type="text"],
            input[type="password"],
            select,
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Vérification</h2>

    <!-- Afficher un message d'erreur en fonction du paramètre GET 'erreur' -->
    <?php
    if (isset($_GET['erreur'])) {
        $erreur = $_GET['erreur'];
        if ($erreur == 1) {
            echo "<p class='error-message'>Veuillez entrer un email valide avec un maximum de 50 caractères.</p>";
        } elseif ($erreur == 2) {
            echo "<p class='error-message'>Le prénom ne doit contenir que des lettres et avoir un maximum de 30 caractères.</p>";
        } elseif ($erreur == 3) {
            echo "<p class='error-message'>L'ID doit être un nombre entre 1000 et 9999.</p>";
        }
    }

    ?>

    <!-- Formulaire de vérification -->
    <form action="verifier.php" method="POST">
        <label for="filter" aria-label="Sélectionner un filtre">Choisir ce que vous voulez vérifier :</label>
        <select name="filter" id="filter" required>
            <option value="email">Email</option>
            <option value="prenom">Prénom</option>
            <option value="id">ID</option>
        </select>

        <label for="input" aria-label="Champ d'entrée">Entrée à vérifier :</label>
        <input type="text" name="input" id="input" required>

        <button type="submit" name="ok" value="ok">Vérifier</button>
    </form>
</div>

</body>
</html>
