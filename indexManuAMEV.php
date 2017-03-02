<?php
/* Manu - Index perso pour faire des tests */


session_start();
require_once 'php/fonctions.php';
$fichier = recupXml();
$lignesAccueil = accueil($fichier);
$estConnecte = estConnecte();
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