<?php


if($estConnecte){
    include_once 'ihm/contact_admin.php';
}else{
    include_once 'ihm/cantine.php';
}

if (!isset($_GET['action'])) {
    $_GET['action'] = 'cantine';
}
$action = $_GET['action'];
switch ($action) {
    case 'cantine':
        if ($estConnecte) {
            include_once("ihm/cantine.php");
        } else {
            include_once("ihm/cantine.php");
        }
        break;
   
}
