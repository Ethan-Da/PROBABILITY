<?php include '../includes/header.php';
require '../fonctions/Database.php';
require '../fonctions/fonctionsDroits.php';
require '../fonctions/fonction_loi_proba.php';
require '../fonctions/fonctionsLogs.php';
include '../includes/navbar.php';
include '../includes/profil.php';
?>

<title>Mes fiches de calcul</title>
</head>
<body>
<?php
addSubscribedUserCheck();
?>

<?php
$login = $_SESSION['login'];
$connexionDb = new Database();
//logViewHistory("success");
if(isset($_POST['idFiche'])){
    //logDeleteFiche("success");
    $connexionDb->deleteFiche($_POST['idFiche']);
}

echo "<div class='container'>
            <div class='titre'>
                <h2>Historique calcul</h2>
            </div>";

if ($allFiche = $connexionDb->getAllFicheFrom($login)) {
    echo "<table class='historique'>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Module</th>
                        <th>Espérance</th>
                        <th>Forme</th>
                        <th>T</th>
                        <th>Écart Type</th>
                        <th>Résultat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";

    while ($row = $allFiche->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $attribut => $value) {
            if ($attribut == 'module') {
                switch ($value) {
                    case 3: $value = 'Proba'; break;
                }
            }
            if ($attribut == 'id_fiche') {
                continue;
            }
            echo "<td>" . (!empty($value) ? htmlspecialchars($value) : "<span class='non-renseigne'>non renseigné</span>") . "</td>";
        }
        $idFiche = $row['id_fiche'];
        $E = $row['esperance'];
        $F = $row['forme'];
        $T = $row['T'];
        $ET = $row['EcartT'];
        $resultat = $row['resultat'];
        $xValues = implode(',', valeursXY(100, $E, $F)[0]);
        $yValues = implode(',', valeursXY(100, $E, $F)[1]);
        echo "<td>
                    <div class='boutonAfficherCourbe'>
                        <form action='module3.php' method='post'>
                            <input type='hidden' name='xValues' value='$xValues'>
                            <input type='hidden' name='yValues' value='$yValues'>
                            <input type='hidden' name='E' value='$E'>
                            <input type='hidden' name='F' value='$F'>
                            <input type='hidden' name='T' value='$T'>
                            <input type='hidden' name='ET' value='$ET'>
                            <input type='hidden' name='N' value='100'>
                            <input type='hidden' name='proba_val' value='$resultat'>
                            <input type='submit' name='consulterCourbe' value='Consulter la courbe'>
                        </form>
                        <form action='gestionFiche.php' method='post'>
                            <input type='hidden' name='idFiche' value='$idFiche'>
                            <input type='submit' name='supprimerFiche' value='Supprimer la fiche'>
                        </form>
                    </div>
                  </td>";
    }
    echo "</tbody>
              </table>";
} else {
    echo "<p class='error-message eb-garamond-text'>Vous ne disposez pas de fiche, $login</p>";
}
echo "</div>";
?>

<?php include '../includes/footer.php'; ?>
</body>

