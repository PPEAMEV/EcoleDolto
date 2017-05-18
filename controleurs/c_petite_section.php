<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'petite_section';
}
$action = $_GET['action'];
switch ($action) {
    case 'petite_section': {
            include_once("ihm/header.php");
            $lignes = ps($fichier);
            $images = images_ps($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=petite_section&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                include_once("ihm/petite_section_admin.php");
                include_once("ihm/footer_admin.php");
            } else {
                include_once("ihm/petite_section.php");
                include_once("ihm/footer.php");
            }
            break;
        }
    case 'majXml': {
        if ((isset($_POST['content']) || isset($_FILES['doc']['tmp_name'] ) ) && isset($_POST['id_ligne'])) {
                if (isset($_POST['content'])) {
                    $contenu = $_POST['content'];
                }
                $id = $_POST['id_ligne'];
                if (isset($_FILES['doc']['tmp_name'])) {
                    if (is_uploaded_file($_FILES['doc']['tmp_name'])) {
                        $fichier = $_FILES['doc']['name'];
                        upload_img();
                        $contenu = preg_replace("` `i", "", $fichier);
                    }
                }
                modifXmlAccueil($id, $contenu);
                $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
            }
            include_once("ihm/header.php");
            $lignes = ps($fichier);
            $images = images_ps($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=petite_section&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/petite_section_admin.php';
            include_once("ihm/footer_admin.php");
            break;
        }
}
?>

