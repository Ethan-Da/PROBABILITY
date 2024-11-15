<?php

class Database{
    private $database;



    function connexion($user, $pass){
        if(gettype($user) == "string" && gettype($pass) == "string" ){
            $this->database = mysqli_connect("localhost",$user,$pass,"PROBABILITY");
        }else{
            error_log("Mauvais user ou mot de passe, impossible de se connecter à la base de données");
        }
    }

    //On sépare par type de requetes avec différent user dans la base de données.

    //L'admin a les droits d'INSERT, d'UPDATE, et de SELECT sur toutes les tables de la base.
    function adminQuery($query, $type, $args){
        $this->connexion("ADMIN", "??");
        $stmt = mysqli_prepare($this->database, $query);
        mysqli_stmt_bind_param($stmt, $type, ...$args);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    // ici la méthode utiliser par l'utilise lorsqu'il veut accéder a la base
    function userQuery($typeQuery, $query, $type, $args){
        switch ($typeQuery){
            case "SELECT":
                $this->connexion("SELECT_USER", "");
                $stmt = mysqli_prepare($this->database, $query);
                mysqli_stmt_bind_param($stmt, $type, ...$args);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            case "INSERT":
                $this->connexion("INSERT_USER", "");
                $stmt = mysqli_prepare($this->database, $query);
                mysqli_stmt_bind_param($stmt, $type, ...$args);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            case "UPDATE":
                $this->connexion("UPDATE_USER", "");
                $stmt = mysqli_prepare($this->database, $query);
                mysqli_stmt_bind_param($stmt, $type, ...$args);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                return $result;
            default:
                return error_log("Mauvais type de requete, (INSERT, UPDATE ou SELECT)");
        }
    }

}



//$requete = "Select * from $table where login = ? and password = ?";
//
//        $stmt = mysqli_prepare($database, $requete);
//        mysqli_stmt_bind_param($stmt, "ss", $login, $password);
//        mysqli_stmt_execute($stmt);
//        $result = mysqli_stmt_get_result($stmt);