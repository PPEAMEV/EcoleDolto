<?php


if (!isset($_GET['action'])) {
    $_GET['action'] = 'activites';
}
$action = $_GET['action'];
switch ($action) {
    case 'activites':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        if ($estConnecte) {
            include_once("ihm/activites.php");
            include_once 'ihm/footer_admin.php';
        } else {
            include_once("ihm/activites.php");
            include_once 'ihm/footer.php';
        }
        
        break;
   
}
