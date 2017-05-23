<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'grande_section';
}
$action = $_GET['action'];
switch ($action) {
    case 'grande_section': {
            include_once("ihm/header.php");
            $lignes = gs($fichier);
            $images = images_gs($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=grande_section&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                
            }
            include_once("ihm/grande_section.php");
                include_once("ihm/footer.php");
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
                modifXml($id, $contenu);
                $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
            }
            include_once("ihm/header.php");
            $lignes = gs($fichier);
            $images = images_gs($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=grande_section&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/grande_section.php';
            include_once("ihm/footer.php");
            break;
        }
}
?>

