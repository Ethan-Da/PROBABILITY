
<?php include '../includes/header.php'; ?>
<title>Proβability - Accueil</title>
</head>
<body>
<?php
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';

include '../includes/navbar.php';

addAdminCheck();

?>



<div class="container">
    <?php
        $database = new Database();
        $allAccount = $database->getAllAccount();

        if(isset($_POST['supprimerCompte'])) {
            $database->deleteAccount($_POST['login']);
            header("Location: gestionCompte.php");
        }

        echo "<form action='gestionCompte.php' method='post'>
            <input type='submit' name='creerCompte' value='Ajouter un nouveau compte'>
            <input type='submit' name='creerCompteCSV' value='Ajouter plusieurs comptes avec un fichier csv'>
            </form>";

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
            </form></div></td>";

                echo "</tr>";
            }
            echo "</table>";



    ?>
</div>

</body>
<?php include '../includes/footer.php'; ?>

