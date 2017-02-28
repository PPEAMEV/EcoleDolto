<?php
if(!isset($_GET['action'])){
    $_GET['action'] = 'accueil';
}
$action = $_GET['action'];
switch($action) {
    case 'accueil': {
        if($estConnecte) {
            include_once("ihm/accueil_admin.php");
        } else {
            include_once("ihm/accueil.php");
        }
        break;
    }
    case 'majXml': {
        $contenu = $_POST['content'];
        $id = $_POST['id_ligne'];
        modifXml($id,$contenu);
        break;
    }
}


?>

