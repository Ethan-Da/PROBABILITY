<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damier - Mon site web</title>
    <link rel="stylesheet" href="../css/style.css">


</head>
<body>

<?php include '../includes/header.php';
?>

<div class="container">
    <div class="content">
        <h2>Générateur de Damier</h2>
        <form method="POST" action="">
            <label for="longueur">Longueur du damier :</label>
            <input type="number" name="longueur" id="longueur" required><br><br>

            <label for="hauteur">Hauteur du damier :</label>
            <input type="number" name="hauteur" id="hauteur" required><br><br>

            <label for="couleur1">Couleur 1 :</label>
            <input type="color" name="couleur1" id="couleur1" required><br><br>

            <label for="couleur2">Couleur 2 :</label>
            <input type="color" name="couleur2" id="couleur2" required><br><br>

            <button type="submit">Générer le damier</button>
        </form>

        <!-- Code PHP pour générer le damier -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs soumises
            $longueur = $_POST['longueur'];
            $hauteur = $_POST['hauteur'];
            $couleur1 = $_POST['couleur1'];
            $couleur2 = $_POST['couleur2'];

            // Générer le damier
            echo "<table class='table-damier'>";
            for ($i = 0; $i < $hauteur; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $longueur; $j++) {
                    // Alterner les couleurs
                    $couleur = (($i + $j) % 2 == 0) ? $couleur1 : $couleur2;
                    echo "<td style='background-color: $couleur;'></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
