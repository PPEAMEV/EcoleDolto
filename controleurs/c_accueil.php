<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'accueil';
}
$action = $_GET['action'];
switch ($action) {
    case 'accueil': {
            include_once("ihm/header.php");
            $lignes = accueil($fichier);
            $images = images_accueil($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=accueil&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
            }
            include_once("ihm/accueil.php");
            include_once 'ihm/footer.php';
            break;
        }
    case 'majXml': {
            if ((isset($_POST['content']) || isset($_FILES['doc']['tmp_name']) ) && isset($_POST['id_ligne'])) {
                if (isset($_POST['content'])) {
                    $contenu = $_POST['content'];
                }
                $id = $_POST['id_ligne'];
                if (isset($_FILES['doc']['tmp_name'])) {
                    if (is_uploaded_file($_FILES['doc']['tmp_name'])) {
                        $fichier = $_FILES['doc']['name'];
                        $contenu = upload_img();
                    }
                }
                modifXml($id, $contenu);
                $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
            }
            include_once("ihm/header.php");
            $lignes = accueil($fichier);
            $images = images_accueil($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=accueil&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/accueil.php';
            include_once 'ihm/footer.php';
            break;
        }
}
?>

