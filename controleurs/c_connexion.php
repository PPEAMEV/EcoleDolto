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
            $ligne = footer($fichier);
            include_once("ihm/header.php");
            include_once("ihm/connexion.php");
            include_once 'ihm/footer.php';
            break;
        }
    case 'valideConnexion': {
            if (isset($_POST['login']) && isset($_POST['mdp'])) {
                $login = $_POST['login'];
                $mdp = $_POST['mdp'];
                $_SESSION['mdp'] = $mdp;
                $_SESSION['login'] = $login;
            } else {
                $login = $_SESSION['login'];
                $mdp = $_SESSION['mdp'];
            }
            if (connexion($fichier, $mdp)) {
                $lignes = accueil($fichier);
                $images = images_accueil($fichier);
                $ligne = footer($fichier);
                $url = "index.php?uc=accueil&action=majXml";
                $estConnecte = estConnecte();
                include_once("ihm/header.php");
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                include_once 'ihm/accueil.php';
                include_once 'ihm/footer.php';
            } else {
                $ligne = footer($fichier);
                $err_connexion = true;
                include_once("ihm/header.php");
                include_once("ihm/connexion.php");
                include_once 'ihm/footer.php';
            }
            break;
        }
    case 'déconnexion': {
            $_SESSION = array();
            session_destroy();
            include_once("ihm/header.php");
            $lignes = accueil($fichier);
            $images = images_accueil($fichier);
            $ligne = footer($fichier);
            $estConnecte = estConnecte();
            include_once 'ihm/accueil.php';
            include_once 'ihm/footer.php';
            break;
        }
}
?>
