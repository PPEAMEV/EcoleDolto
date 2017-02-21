<?php
session_start();
require_once 'php/fonctions.php';
$fichier = recupXml();
$lignesAccueil = accueil($fichier);
$estConnecte = estConnecte();
//echo $_SESSION['user'];
if(!isset($_REQUEST['uc']) && !$estConnecte){
    $_REQUEST['uc'] = 'accueil';
}
$controleur = $_REQUEST['uc'];
switch($controleur) {
    case 'accueil': {
        include("controleurs/c_accueil.php");
        break;
    }
    case 'connexion': {
        include("controleurs/c_connexion.php");
        break;
    }
}

?>