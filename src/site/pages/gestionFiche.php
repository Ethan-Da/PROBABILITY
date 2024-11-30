
<?php include '../includes/header.php';
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';?>
<title>Mes fiches de calcul</title>
</head>
<body>
<?php include '../includes/navbar.php';


addSubscribedUserCheck();
?>

<?php

    $login = $_SESSION['login'];

    $connexionDb = new Database();

    if ($allFiche = $connexionDb->getAllFicheFrom($_SESSION['login'])) {

        echo "<table class='historique'>";
        echo "<tr><th>Date</th><th>module</th><th>Esperance</th><th>Forme</th><th>T</th><th>Résultat</th></tr>";
        while ($row = $allFiche->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $attribut) {
                echo "<td>" . (!empty($attribut) ? htmlspecialchars($attribut) : "<span class='non-renseigne'>non renseigné</span>") . "</td>";
            }
        }

    }else{
        echo "pas de fiche pour $login";
    }


?>