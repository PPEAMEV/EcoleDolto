<?php
if(!isset($_GET['action'])){
    $_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
if (estConnecte() && $action != "valideConnexion") {
    $action = "déconnexion";
}
$err_connexion = false;
switch($action) {
    case 'demandeConnexion': {
        include_once("ihm/connexion.php");
        break;
    }
    case 'valideConnexion': {
        $login = $_POST['login'];
	$mdp = $_POST['mdp'];
        if (connexion($fichier, $mdp)) {
            include_once 'ihm/accueil_admin.php';
        } else {
            $err_connexion = true;
            include_once("ihm/connexion.php");
        }
        
        break;
    }
    case 'déconnexion': {
        $_SESSION = array();
        session_destroy();
        include_once 'ihm/accueil.php';
        break;
    }
}


?>