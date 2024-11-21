
<?php include '../includes/header.php'; ?>
<title>Proβability - Accueil</title>
</head>
<body>
<?php include '../includes/navbar.php';
    require 'Database.php';
/*if (!isset($_SESSION['login']) || $_SESSION['login'] != "login") {
    header("Location: index.php");
}*/
?>



<div class="container">
    <?php
        $database = new Database();
        $allAccount = $database->getAllAccount();

        $compte = true;
        $ficheCalcul = false;
        $activite = false;


        if(isset($_POST['supprimerCompte'])) {
            $database->deleteAccount($_POST['login']);
            header("Location: gestionCompte.php");
        }
        if(isset($_POST['consulterActivite'])) {
            $login = $_POST['login'];
            $activite = true;
            $compte = false;
        }
        if(isset($_POST['consulterFiche'])) {
            $ficheCalcul = true;
            $compte = false;
            $login = $_POST['login'];
        }

        echo "<form action='gestionCompte.php' method='post'>
            <input type='submit' name='creerCompte' value='Ajouter un nouveau compte'>
            <input type='submit' name='creerCompteCSV' value='Ajouter plusieurs comptes avec un fichier csv'>
            </form>";

        if ($compte) {
            echo "<table class='historique'>";
            echo "<tr><th>Login</th><th>Mot de passe</th><th>Ip utilisé</th><th>Dernière connexion</th><th>Action</th></tr>";
            while ($rowAccount = $allAccount->fetch_assoc()) {
                echo "<tr>";
                $login = $rowAccount['login'];
                foreach ($rowAccount as $attribut) {
                    echo "<td>" . (!empty($attribut) ? htmlspecialchars($attribut) : "<span class='non-renseigne'>non renseigné</span>") . "</td>";
                }
                echo "<td><div class='boutonSupprCompte'>
            <form action='gestionCompte.php' method='post'>
            <input type='hidden' name='login' value='$login'>
            <input type='submit' name='supprimerCompte' value='Supprimer le compte'>
            <input type='submit' name='consulterActivite' value='Consulter activité du compte'>
            <input type='submit' name='consulterFiche' value='Consulter fiche de calcul'>
            </form></div></td>";

                echo "</tr>";
            }
            echo "</table>";


        }
        if ($activite) {
            echo "<p>table des activités $login</p>";
        }

        if ($ficheCalcul) {
            echo "<p>table des fiches de calcul $login</p>";
        }












    ?>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>
