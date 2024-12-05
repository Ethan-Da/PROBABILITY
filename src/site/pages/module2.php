<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';

//addSubscribedUserCheck();  Vérification des droits d'accès?>

<title>Module2</title>
</head>
<body>

<?php include '../includes/navbar.php';
include '../includes/profil.php'?>


<div class="container">
    <div class="content">
        <div class="titre" id="m3">
            <h2a style="color: #21bd23;">{</h2a>
            <h2b style="color:#21bd23;">Tableau des notes</h2b>
            <h2c style="color: #21bd23;">}</h2c>
        </div>
        <?php
        $fichier_csv = 'notes.csv';

        if (file_exists($fichier_csv)) {
            echo "<table class='historique'>";
            echo "<tr><th>Nom</th><th>Prénom</th><th>Groupe</th><th>Note</th><th>Date</th><th>Heure</th></tr>";
            if (($handle = fopen($fichier_csv, 'r')) !== false) {
                $first_row = true;
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    if ($first_row) {
                        $first_row = false;
                        continue;
                    }
                    echo "<tr>";
                    foreach ($data as $cell) {
                        echo "<td>" . (!empty($cell) ? htmlspecialchars($cell) : "<span class='non-renseigne'>non renseigné</span>") . "</td>";
                    }
                    echo '</tr>';
                }
                fclose($handle);
            }
            echo "</table>";
        } else {
            echo "<p>Le fichier CSV n'a pas été trouvé.</p>";
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
