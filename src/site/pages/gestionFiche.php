
<?php include '../includes/header.php';
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';
require '../fonctions/fonction_loi_proba.php';
include '../includes/profil.php'
?>

<title>Mes fiches de calcul</title>
</head>
<body>
<?php include '../includes/navbar.php';


addSubscribedUserCheck();
?>

<?php
    $login = $_SESSION['login'];
    $connexionDb = new Database();
    if(isset($_POST['idFiche'])){
        $connexionDb->deleteFiche($_POST['idFiche']);
    }else {
        echo "<p class='none-connection-message eb-garamond-text'>Vous ne diposez pas de fiche, $login</p>";
    }

    echo "<div class='container'>
            <div class='titre'>
        <h2>Historique calcul</h2>
        <p></p>
         </div>";

    if ($allFiche = $connexionDb->getAllFicheFrom($login)) {
        echo "<table class='historique'>";
        echo "<tr><th>Date</th><th>module</th><th>Esperance</th><th>Forme</th><th>T</th><th>Résultat</th><th>Actions</th></tr>";
        while ($row = $allFiche->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $attribut=>$value) {
                if ($attribut=='module'){
                    switch ($value){
                        case 3: $value='Proba'; break;
                    }
                }
                if ($attribut == 'id_fiche'){
                    continue;
                }
                echo "<td>" . (!empty($value) ? htmlspecialchars($value) : "<span class='non-renseigne'>non renseigné</span>") . "</td>";
            }
            $idFiche = $row['id_fiche'];
            $E = $row['esperance'];
            $F = $row['forme'];
            $T = $row['T'];
            $resultat = $row['resultat'];
            $xValues = implode(',',valeursXY(100, $E, $F)[0]);
            $yValues = implode(',',valeursXY(100, $E, $F)[1]);
            echo "<td><div class='boutonAfficherCourbe'>
            <form action='module3.php' method='post'>
            <input type='hidden' name='xValues' value=$xValues>
            <input type='hidden' name='yValues' value=$yValues>
            <input type='hidden' name='E' value=$E>
            <input type='hidden' name='F' value=$F>
            <input type='hidden' name='T' value=$T>
            <input type='hidden' name='N' value=100>
            <input type='hidden' name='proba_val' value=$resultat>
            <input type='submit' name='consulterCourbe' value='Consulter la courbe'>
            </form>
            <form action='gestionFiche.php' method='post'>
            <input type='hidden' name='idFiche' value=$idFiche>
            <input type='submit' name='supprimerFiche' value='Supprimer la fiche'>
            </form>
            </div></td>
            </table>";
        }

    }

    echo "</div>";
?>


</body>


<?php include '../includes/footer.php'; ?>
