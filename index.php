<?php
session_start();
define("LIEN_PDF","donnees/pdf/");
require_once 'php/fonctions.php';
$fichier = recupXml();
$lignesAccueil = accueil($fichier);
$estConnecte = estConnecte();
if(!isset($_GET['uc'])){
    $_GET['uc'] = 'accueil';
}
$controleur = $_GET['uc'];
switch($controleur) {
    case 'accueil': {
        include("controleurs/c_accueil.php");
        break;
    }
    case 'connexion': {
        include("controleurs/c_connexion.php");
        break;
    }
    case 'conseils': {
        include("controleurs/c_conseils.php");
        break;
    }
}

?>
