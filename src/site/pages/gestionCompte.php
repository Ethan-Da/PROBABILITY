
<?php include '../includes/header.php'; ?>
<title>Proβability - Accueil</title>
</head>
<body>
<?php
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';
include '../includes/profil.php';
include '../includes/navbar.php';

addAdminWebCheck();
?>



<div class="container">
    <?php
        $database = new Database();

        if(isset($_POST['supprimerCompte'])) {
            $login = $_POST['login'];
            if($login == 'adminweb' || $login == 'adminsys' ) {
                header('Location: gestionCompte.php');
            }else {
                $database->deleteAccount($login);
                header("Location: gestionCompte.php");
            }
        }

        if(isset($_POST['creerCompte'])) {
            $database->addNewAccount($_POST['login'], $_POST['pass']);
            header("Location: gestionCompte.php");
        }

        if (isset($_POST['creerCompteCSV'])){
            $tmpName = $_FILES['csv']['tmp_name'];
            $csvAsArray = array_map('str_getcsv', file($tmpName));
            echo "Comptes ajoutés";
            foreach($csvAsArray as $row) {
                foreach($row as $column => $value) {
                    $strArray = explode(";",$value);
                    $database->addNewAccount($strArray[0], $strArray[1]);
                }
            }
        }

        $allAccount = $database->getAllAccount();

        echo "<form action='gestionCompte.php' method='post'>
            <input type='text' name='login' placeholder='login'>
            <input type='text' name='pass' placeholder='mdp'>
            <input type='submit' name='creerCompte' value='Ajouter un nouveau compte'>
            </form>
            <form action='gestionCompte.php' method='post' enctype='multipart/form-data'>
            <input type='file' name='csv' value='' />
            <input type='submit' name='creerCompteCSV' value='Ajouter plusieurs comptes avec un fichier csv' /></form>";

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

