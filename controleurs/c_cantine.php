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
        include_once("ihm/header.php");
        if ($estConnecte) {
            include_once("ihm/cantine.php");
            include_once 'ihm/footer_admin.php';
        } else {
            include_once("ihm/cantine.php");
            include_once 'ihm/footer.php';
        }
        break;
   
}
