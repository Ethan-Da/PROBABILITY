<?php
/*
require_once '../fonctions/Database.php';


if(!isset($_GET["code"])) {
    exit("Page introuvable");
}

else{
    $code = $_GET["code"];
}

$connexionDB = new Database();
//recupere l'email à modifier qui correspond au code
$emailQuery = $connexionDB -> getEmail($code);

if(!mysqli_num_rows($emailQuery)) {
    exit("mail non trouvé");
}

if(isset($_POST["password"])) {
    $pw = $_POST["password"];
    $pw = md5($pw);

    $row = mysqli_fetch_array($emailQuery);
    $email = $row["email"];

    $updatePassquery = $connexionDB -> updatePassword($email, $pw);

    if($updatePassquery) {
        $deleteQuery = $connexionDB -> deleteEmail($email, $code);
        exit("Mot de passe mis à jour");
    }
    else {
        exit("Une erreur s'est produite");
    }
}
?>
<form method="POST">
    <input type="password" name="password" placeholder="Nouveau mot de passe">
    <br>
    <input type="submit" name="submit" value ="Mettre à jour le mot de passe">

</form>
*/