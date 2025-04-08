<?php

require_once('../site/fonctions/Database.php');

# Pour executer les tests assurez vous que vous avez une bd lancé avec la bonne configuration
# si lancer sur le rpi les tests sont effectués sur la vrai bd, il n'y pas de copie pour les tests




#quand vous lancer une fonction allez vérifier sur la base de données avec phpmyadmin par exemple

$db = new Database();

function test_addNewAccount(){
    global $db;
    $added = $db->addNewAccount("toto", "titi");
    echo $added ? "Compte ajouté avec succès\n" : "Échec de l'ajout du compte\n";
}

function test_isValidAccount(){
    global $db;
    $isValid = $db->isValidAccount("toto", "titi");
    echo "L'utilisateur toto avec mdp titi est " . ($isValid ? "valide" : "invalide") . "\n";
    # compte n'existant pas (renvoie false)
    assert($db->isValidAccount("azsdjs", "azeaz"));
}

function test_updateIpConnection(){
    global $db;
    $db->updateLastConnectionLastIp("toto");
    # compte n'existant pas (ne doit rien faire sur la bd)
    $db->updateLastConnectionLastIp("azsdjs");
}

function test_saveFiche(){
    global $db;
    $db->saveFiche(1, "trapezes", 3,4.0,4.0, 2.817, 0.625, "toto");
    # compte n'existant pas (ne doit rien faire sur la bd)
    $db->saveFiche(1, "trapezes", 3,4.0,4.0, 2.817, 0.625, "fdsfazee");
}

function test_deleteFiche(){
    global $db;
    $db->deleteFiche(1);
}

function test_deleteAccount(){
    global $db;
    $db->deleteAccount("toto");
    # compte n'existant pas (ne doit rien faire sur la bd)
    $db->deleteAccount("azsdjs");
}

