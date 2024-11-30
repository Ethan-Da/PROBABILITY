<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';

addSubscribedUserCheck();
?>

<title>Module1</title>
</head>
<body>

<?php include '../includes/navbar.php'; ?>


<div class="container">
    <div class="content">
        <div class="titre" id="m3">
            <h2a style="color: cornflowerblue;">{</h2a>
            <h2b style="color:cornflowerblue;">Damier</h2b>
            <h2c style="color: cornflowerblue;">}</h2c>
        </div>
        <form method="POST" action="" class="form">
            <label for="longueur">Longueur du damier :</label>
            <input type="number" name="longueur" id="longueur" required><br><br>

            <label for="hauteur">Hauteur du damier :</label>
            <input type="number" name="hauteur" id="hauteur" required><br><br>

            <label style="cursor: pointer" for="couleur1">Couleur 1 :</label>
            <input style="cursor: pointer" type="color" name="couleur1" id="couleur1" required><br><br>

            <label style="cursor:pointer;" for="couleur2">Couleur 2 :</label>
            <input style="cursor: pointer" type="color" name="couleur2" id="couleur2" required><br><br>

            <button class="button" type="submit">Générer</button>
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
            echo"<div style='box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                             display: inline-block;'>";
            echo "<table class='table' >";
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
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include '../includes/footer.php';

/**
if (!isset($_SESSION["login"])) {
    header("location:index.php");
}
 */
?>

</body>
</html>
