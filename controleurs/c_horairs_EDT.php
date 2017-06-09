<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'HEDT';
}
$action = $_GET['action'];
switch ($action) {
    case 'HEDT':
        include_once 'ihm/header.php';
        $pdfs = edt_pdf($fichier);
        $titres = edt_titre($fichier);
        $ligne = footer($fichier);
        $url = "index.php?uc=HEDT&action=majXml";
        if ($estConnecte) {
            include_once ('src/modals/modal_doc.php');
        }
        include_once("ihm/horairs_EDT.php");
        include_once 'ihm/footer.php';
        break;

    case 'majXml': {
            if ((isset($_POST['content']) || isset($_FILES['pdf']['tmp_name']) ) && isset($_POST['id_ligne'])) {
                if (isset($_POST['content'])) {
                    $contenu = $_POST['content'];
                }
                $id = $_POST['id_ligne'];
                if (isset($_FILES['pdf']['tmp_name'])) {
                    if (is_uploaded_file($_FILES['pdf']['tmp_name'])) {
                        $fichierIni = $_FILES['pdf']['name'];
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
                        upload_file();
                        $contenu = preg_replace("` `i", "", $fichier);
                        $contenu = "donnees/pdf/" . $contenu;
                    }
                }
                modifXml($id, $contenu);
                $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
            }
            include_once("ihm/header.php");
            $pdfs = edt_pdf($fichier);
            $titres = edt_titre($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=HEDT&action=majXml";
            include_once ('src/modals/modal_doc.php');
            include_once("ihm/horairs_EDT.php");
            include_once("ihm/footer.php");
            break;
        }
}