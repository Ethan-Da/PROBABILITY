<?php
session_start();
function addAdminCheck(){
            if (isset($_SESSION["login"])){
                if ($_SESSION["login"] == "admin"){
                    
                }
                else{
                    header('location:index.php');
                }
            }
            else{
                header('location:index.php?error=1');
                exit();
            }
}



function addSubscribedUserCheck(){
    if (isset($_SESSION["login"])){
    }
    else{
        header('location:index.php?error=1');
        exit();
    }
}

