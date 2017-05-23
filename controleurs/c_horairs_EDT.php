<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'horairs_EDT';
}
$action = $_GET['action'];
switch ($action) {
    case 'horairs_EDT':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $LES_EDT = getPdfs($fichier);
        if ($estConnecte) {
            include_once("ihm/horairs_EDT_admin.php");
            include_once 'ihm/footer_admin.php';
        } else {
            include_once("ihm/horairs_EDT.php");
            include_once 'ihm/footer.php';
        }
        break;
    case 'updateXml':
        if (isset($_POST['titre']) && isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
            $titre = $_POST['titre'];
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
            upload_file();
            updateXml($titre, $fichier);
        }
        include_once("ihm/horairs_EDT.php");
        break;
    case 'modif_EDT':
        if (isset($_POST['titre']) && isset($_POST['$id_edt '])) {
            if (isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
                $fichierIni = $_FILES['pdf']['name'];
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
                upload_file();
            } else {
                $fichier = $_POST['pdf-actuel'];
            }
            $id = $_POST['$id_edt '];
            $titre = $_POST['titre'];
            modif_EDT($id_edt, $titre, $fichier);
            $fichier = recupXml();
        }
        include_once("ihm/horairs_EDT-admin.php");
        break;
}