<?php


if (!isset($_GET['action'])) {
    $_GET['action'] = 'activites';
}
$action = $_GET['action'];
switch ($action) {
    case 'activites':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        include_once("ihm/activites.php");
        include_once 'ihm/footer.php';
        
        break;
   
}
