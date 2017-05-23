<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'cantine';
}
$action = $_GET['action'];
switch ($action) {
    case 'cantine':
        $ligne = footer($fichier);
        if ($estConnecte) {
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
        }
        include_once("ihm/header.php");
        include_once("ihm/cantine.php");
        include_once ("ihm/footer.php");
        break;
}
