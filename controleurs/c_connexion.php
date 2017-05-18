<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];
if (estConnecte() && $action != "valideConnexion") {
    $action = "déconnexion";
}
$err_connexion = false;
switch ($action) {
    case 'demandeConnexion': {
            include_once("ihm/connexion.php");
            break;
        }
    case 'valideConnexion': {
            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            include_once("ihm/header.php");

            if (connexion($fichier, $mdp)) {
                $lignes = accueil($fichier);
                $images = images_accueil($fichier);
                $ligne = footer($fichier);
                include_once 'ihm/accueil_admin.php';
                include_once 'ihm/footer_admin.php';
            } else {
                $ligne = footer($fichier);
                $err_connexion = true;
                include_once("ihm/connexion.php");
                include_once 'ihm/footer.php';
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