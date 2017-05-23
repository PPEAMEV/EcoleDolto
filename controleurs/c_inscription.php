<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'inscription';
}
$action = $_GET['action'];
switch ($action) {
    case 'inscription': {
            include_once("ihm/header.php");
            $lignes = inscription($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=inscription&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                include_once("ihm/inscription.php");
                include_once 'ihm/footer_admin.php';
            } else {
                include_once("ihm/inscription.php");
                include_once 'ihm/footer.php';
            }

            break;
        }
    case 'majXml': {
            if (isset($_POST['content']) && isset($_POST['id_ligne'])) {
                $contenu = $_POST['content'];
                $id = $_POST['id_ligne'];
                modifXml($id, $contenu);
                $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
            }
            include_once("ihm/header.php");
            $lignes = inscription($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=accueil&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/inscription.php';
            include_once 'ihm/footer_admin.php';
            break;
        }
}
?>

