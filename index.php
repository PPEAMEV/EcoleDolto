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
      case 'plan_d_acces': {
        include("controleurs/c_plan_d_acces.php");
      break;
    }
    case 'HEDT': {
        include("controleurs/c_horairs_EDT.php");
      break;
    }
    case 'activites': {
        include("controleurs/c_activites.php");
        break;
    }
    case 'petite_section': {
        include("controleurs/c_petite_section.php");
        break;
    }
    case 'inscription': {
        include("controleurs/c_inscription.php");
    }
    
}

?>
