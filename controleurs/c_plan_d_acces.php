
<?php

//if($estConnecte){
//    include_once 'ihm/contact_admin.php';
//}else{
//    include_once 'ihm/plan_d_acces.php';
//}

if (!isset($_GET['action'])) {
    $_GET['action'] = 'plan_d_acces';
}
$action = $_GET['action'];
switch ($action) {
    case 'plan_d_acces':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $url = "index.php?uc=plan_d_acces&action=majXml";
        if ($estConnecte) {
            include_once ('src/modals/modal_text.php');
            include_once("ihm/plan_d_acces.php");
            include_once 'ihm/footer_admin.php';
        } else {
            include_once("ihm/plan_d_acces.php");
            include_once 'ihm/footer.php';
        }
        break;
}

