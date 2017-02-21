<?php
require_once 'php/fonctions.php';
$lignesAccueil = accueil();
$estConnecte = false;
if(!isset($_REQUEST['action']) && !$estConnecte){
    $_REQUEST['action'] = 'accueil';
}
$controleur = $_REQUEST['action'];
switch($controleur) {
    case 'accueil': {
        include("controleurs/c_accueil.php");
    }
    case 'demandeConnexion': {
        include("controleurs/c_connexion.php");
    }
}

?>