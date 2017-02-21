<?php
if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
if (estConnecte()) {
    $action = "déconnexion";
}
switch($action) {
    case 'demandeConnexion': {
        include_once("ihm/connexion.php");
        break;
    }
    case 'valideConnexion': {
        $login = $_REQUEST['login'];
	$mdp = $_REQUEST['mdp'];
        connexion($fichier, $mdp);
        include_once 'ihm/accueil_admin.php';
        break;
    }
    case 'déconnexion': {
        echo "ici";
        include_once 'ihm/accueil.php';
        break;
    }
}


?>