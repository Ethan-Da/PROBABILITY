<?php
#require_once 'RC4Cipher.php';

#Classe permettant la connexion avec la base de données et d'effectuer des rêquetes utilisant les bons user mysql plus rapidement
#La séparation des droits par opération sur la base de données permet de sécuriser en quelque sorte l'accés a la base.
#utilisation de rêquete préparé pour éviter les injections sql.

class Database{

    private $database;

    private function connexion($user, $pass){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try{
            $this->database = mysqli_connect("localhost",$user,$pass,"probability_db");
        }catch(mysqli_sql_exception $e){
            //return !error_log("ERREUR 0 : Connexion à la base de données impossible $e \n", 3, 'erreurBD.log');
        }
        return $this->database;
    }

    //On sépare par type de requetes avec différent user dans la base de données.

    //L'admin a les droits d'INSERT, d'UPDATE, de SELECT et de DELETE sur toutes les tables de la base.
    private function adminQuery($query){
        if ($this->connexion("ADMIN_USER", "!*ADMIN*!")){
            return mysqli_query($this->database, $query);
        }
        return false;
    }

    // ici la méthode utiliser par l'utilisateur lorsqu'il veut accéder à la base
    private function userQuery($query, $types, $args){

        $typeQuery = mb_substr($query, 0, 6);

        switch ($typeQuery){
            case "SELECT":
                $user = "SELECT_USER";
                $pass = "!*SELECT*!";
                break;
            case "INSERT":
                $user = "INSERT_USER";
                $pass = "!*INSERT*!";
                break;
            case "UPDATE":
                $user = "UPDATE_USER";
                $pass = "!*UPDATE*!";
                break;
            default:
                //return error_log("ERREUR : Mauvais type de requete, (INSERT, UPDATE ou SELECT) \n", 3, '../pages/logs/erreurBD.log');
        }

        if ($this->connexion($user, $pass)){
            $stmt = mysqli_prepare($this->database, $query);
            mysqli_stmt_bind_param($stmt, $types, ...$args);
            mysqli_stmt_execute($stmt);
            if ($typeQuery == "SELECT"){
                return mysqli_stmt_get_result($stmt);
            }
            return true;
        }
        return false;
    }

    public function isValidAccount($user){
        $result = $this->userQuery("SELECT * FROM compte WHERE login = ?","s",array($user));
        if ($result){
            return mysqli_num_rows($result) > 0;
        }
        return false;
    }

    public function updateLastConnectionLastIp($user){
        $date = date("Y-m-d H:i:s");
        $ip= $_SERVER['REMOTE_ADDR'];
        return $this->userQuery("UPDATE compte SET last_ip = ?, last_connection = ? WHERE login = ? ","sss",array($ip,$date,$user));
    }

    public function addNewAccount($user, $pass){
        $verifLogin = $this->userQuery("SELECT login FROM compte WHERE login = ?","s",array($user));
        if ($verifLogin->num_rows > 0){
            return false;
        }
        else{
            $this->userQuery("INSERT INTO compte (login, password) VALUES (?,?)","ss",array($user,$pass));
            return true;
        }
    }
    
    /*

    //fonction pour ajoute le mail de l'utilisateur qui veut reset son password
    public function addNewResetPassword($code, $email){
        $this->userQuery("INSERT INTO resetPasswords(code, email) VALUES (?, ?)" ,"ss",array($code,$email));
        return true;

    }

    public function getEmail($code){
        $result = $this->userQuery("SELECT email FROM resetPasswords WHERE code = ?", "s", array($code));

        if ($result === false) {
            error_log("Erreur de requête SQL dans getEmail pour le code : $code", 3, 'erreurBD.log');
            return false;
        }

        return $result;
    }


    public function updatePassword($user,$pass){
        return $this->userQuery("UPDATE compte SET password = ? WHERE login = ?" ,"ss",array($pass,$user));

    }

    public function deleteEmail($email,$code) {
        return $this->userQuery("UPDATE resetPasswords SET email = '' WHERE code = ?", "s", array($email,$code));
    }
    */



    public function getAllAccount(){
        return $this->adminQuery("SELECT * FROM compte");
    }
    public function deleteAccount($user){
        if ($user != 'admin'){
            if ($this->connexion("ADMIN_USER", "!*ADMIN*!")){
                $this->adminQuery("DELETE FROM compte WHERE login = '$user';");
            }
        }
    }

    public function getAllFicheFrom($user){
        return $this -> userQuery("SELECT date, module, esperance, forme, T, EcartT, resultat, id_fiche FROM fiche_calcul WHERE login = ?","s",array($user));
    }


    public function saveFiche($M, $E, $F, $T, $ecartType, $resultat, $login){
        return $this-> userQuery("INSERT INTO `fiche_calcul` (`id_fiche`, `date`, `module`, `esperance`, `forme`, `T`,`EcartT`, `resultat`, `login`) 
                                        VALUES (NULL, current_timestamp(),?, ?, ?, ?, ?,?,?);",
                                        "iddddds",array($M, $E, $F, $T,$ecartType, $resultat, $login));
    }

    public function deleteFiche($id_fiche){
        return $this->adminQuery("DELETE FROM `fiche_calcul` WHERE `fiche_calcul`.`id_fiche` = $id_fiche;");
    }
    /*
    function hashPassword($password, $key) {
        $rc4 = new RC4Cipher($key);
        return $rc4->encrypt($password);
    }

    function verifyPassword($inputPassword, $storedHash, $key) {
        $rc4 = new RC4Cipher($key);
        $encryptedInput = $rc4->encrypt($inputPassword);
        return $encryptedInput === $storedHash;
    }

    // Exemple d'utilisation pour stocker un mot de passe
    function storeUserPassword($username, $password)
    {
        $key = "VotreClefSecrete"; // Utilisez une clé sécurisée !
        $hashedPassword = hashPassword($password, $key);

        // Stockez $username et $hashedPassword dans votre base de données
        // ou fichier texte

    }
    */
}