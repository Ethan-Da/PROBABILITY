
<?php include '../includes/header.php';
require_once '../fonctions/fonctionsDroits.php';
require_once '../fonctions/fonctionsLogs.php';
require_once '../fonctions/RC4Cipher.php';
include '../includes/footer.php';
addUserCheck();
?>
    <title>Cryptographie</title>
</head>
<body>

<?php include '../includes/navbar.php';
include '../includes/profil.php';
?>

<div class="container" id="index-container">

    <div class="content eb-garamond-text" >
        <h1>Module cryptographie</h1>
        <p>Ce module permet le chiffrement et déchiffrement par la fonction RC4</p>
    </div>

    <div>
        <form action="moduleCrypto.php" method="post">
            <label for="clef" style="color: black">Entrez une clé : </label>
            <input type="text" id="clef" name="clef" >
            <br>
            <label style="color: black" for="message">Message :</label>
            <input type="text" id="message" name="message">

            <input type="submit" name="submitChiffrer" value="Chiffrer le message">
            <input type="submit" name="submitDechiffrer" value="Déchiffrer le message">
        </form>

        <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cle = $_POST['clef'];
            $msg = $_POST["message"];
            $cipher = new RC4Cipher($cle);
            if(isset($_POST["submitChiffrer"])){

                $signature = $cipher->encrypt($msg);

                echo "<p style='color: black'>Avec la clé : $cle</p>";
                echo "<p style='color: black'>Et le message : $msg</p>";
                echo "<p style='color: black' > Mot chiffré : $signature</p>";
            }

            if(isset($_POST["submitDechiffrer"])){

                $entree = $cipher->decrypt($msg);

                echo "<p style='color: black'>Avec la clé : $cle</p>";
                echo "<p style='color: black'>Et la signature : $msg</p>";
                echo "<p style='color: black' > Message décrypté : $entree</p>";
            }
        }


        ?>
    </div>



</div>




</body>


