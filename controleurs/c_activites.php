<?php


if($estConnecte){
    include_once 'ihm/contact_admin.php';
}else{
    include_once 'ihm/activites.php';
}

if (!isset($_GET['action'])) {
    $_GET['action'] = 'activites';
}
$action = $_GET['action'];
switch ($action) {
    case 'activites':
        if ($estConnecte) {
            include_once("ihm/activites.php");
        } else {
            include_once("ihm/activites.php");
        }
        break;
   
}
