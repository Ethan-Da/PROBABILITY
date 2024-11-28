<?php
session_start();
function addAdminWebCheck(){
            if (isset($_SESSION["login"])){
                if ($_SESSION["login"] == "adminweb" && $_SESSION["password"] == "adminweb"){
                    
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

function addAdminSysCheck(){
    if (isset($_SESSION["login"])){
        if ($_SESSION["login"] == "adminsys" && $_SESSION["login"] == "adminsys"){

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

