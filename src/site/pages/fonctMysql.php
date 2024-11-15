<?php


#Classe permettant la connexion avec la base de données et d'effectuer des rêquetes utilisant les bons user mysql plus rapidement
#La séparation des droits par opération sur la base de données permet de sécuriser en quelque sorte l'accés a la base.
#utilisation de rêquete préparé pour éviter les injections sql.

class Database{

    private static function connexion($user, $pass){
        if(gettype($user) == "string" && gettype($pass) == "string" ){
            $database = mysqli_connect("localhost",$user,$pass,"PROBABILITY");
            return $database;
        }else{
            error_log("Mauvais user ou mot de passe, impossible de se connecter à la base de données");
            return false;
        }
    }

    //On sépare par type de requetes avec différent user dans la base de données.

    //L'admin a les droits d'INSERT, d'UPDATE, et de SELECT sur toutes les tables de la base.
    public static function adminQuery($query, $type, $args){
        $database = Database::connexion("ADMIN", "??");
        $stmt = mysqli_prepare($database, $query);
        mysqli_stmt_bind_param($stmt, $type, ...$args);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    // ici la méthode utiliser par l'utilisateur lorsqu'il veut accéder à la base
    public static function userQuery($query, $type, $args){

        $typeQuery = mb_substr($query, 0, 5);

        switch ($typeQuery){
            case "SELECT":
                $user = "SELECT_USER";
                $pass = "??";
                break;
            case "INSERT":
                $user = "INSERT_USER";
                $pass = "??";
                break;
            case "UPDATE":
                $user = "UPDATE_USER";
                $pass = "??";
                break;
            default:
                return error_log("Mauvais type de requete, (INSERT, UPDATE ou SELECT)");
        }

        $database = Database::connexion($user, $pass);
        $stmt = mysqli_prepare($database, $query);
        mysqli_stmt_bind_param($stmt, $type, ...$args);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    public static function isValidAccount($user, $pass){
        $result = Database::userQuery("SELECT * FROM compte WHERE login = ? AND password = ?","ss",array($user, $pass));
        return mysqli_num_rows($result) === 1;
    }

}