<?php
if(!isset($_GET['action'])){
    $_GET['action'] = 'petite_section';
}
$action = $_GET['action'];
switch($action) {
    case 'petite_section': {
        if($estConnecte) {
            include_once("ihm/petite_section_admin.php");
        } else {
            include_once("ihm/petite_section.php");
        }
        break;
    }
    case 'majXml': {
        if (isset($_POST['content']) && isset($_POST['id_ligne']) || isset($_FILES['image']['tmp_name'])) {
            $contenu = $_POST['content'];
            $id = $_POST['id_ligne'];
            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                $fichier = $_FILES['image']['name'];
                upload_img();
                $contenu = preg_replace("` `i", "", $fichier);
            }
            modifXmlAccueil($id,$contenu);
            $fichier= recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
        }
        include_once 'ihm/petite_section_admin.php';
        break;
    }
}


?>

