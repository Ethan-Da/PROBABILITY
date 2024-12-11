<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require_once '../fonctions/Database.php';


if (isset($_POST['email'])) {

    $emailTo = $_POST['email'];
    //genere un id unique par demande de reset
    $code = uniqid(true);

    $connexionDB = new Database();
    //ajoute le mail dont le password va etre modifie, avec un code unique pour l'identifier
    $connexionDB -> addNewResetPassword($code, $emailTo);

    if (!$connexionDB) {
        exit("Erreur");
    }

    //desactive le certificat SSL
    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    try {

        //Config serveur SMTP pour envoi sécurisé
        $mail->isSMTP();                                            
        $mail->SMTPAuth   = true;                                   
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'leblondromeo@gmail.com';
        $mail->Password = 'laal igho zpmn dxeh';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Utilisation de SSL
        $mail->Port = 465; // Port pour SSL

        //receveur du mail
        $mail->setFrom('leblondromeo@gmail.com', 'from');
        $mail->addAddress($emailTo);
        $mail->addReplyTo('no_reply@example.com', 'No Reply');

        //contenu
        $url = "http://" .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/resetPassword.php?code=$code";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Lien de réinitialisation du mot de passe';
        $mail->Body    = "<h1>Votre demande de réinitialisation de mot de passe</h1>
                            Cliquez sur<a href='$url'>ce lien</a> pour procéder à la réinitialisation du mot de passe";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Le lien de réinitialisation du mot de passe a été envoyé à votre adresse email';
    } catch (Exception $e) {
        echo "Message non envoyé, erreur envoyeur: {$mail->ErrorInfo}";
    }
}


?>
<form method="POST">
    <input type="text" name="email" placeholder="Email" autocomplete="off">
    <br>
    <input type="submit" name="submit" value="Réinitialiser le mot de passe">
</form>
