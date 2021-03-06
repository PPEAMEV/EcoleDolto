<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'conseils';
}
$action = $_GET['action'];
switch ($action) {
    case 'conseils':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $conseils = getConseils($fichier);
        include_once("ihm/conseils.php");
        include_once 'ihm/footer.php';

        break;
    case 'ajoutXml':
        if (isset($_POST['date']) && isset($_FILES['doc']) && ($_FILES['doc']['error'] == 0)) {
            $date = $_POST['date'];
            $fichierIni = $_FILES['doc']['name'];
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
                upload_pdf();
                        $contenu = preg_replace("` `i", "", $fichier);
                        $contenu = "donnees/pdf/" . $contenu;
            ajoutXml($date, $fichier);
            $fichier = recupXml();
        }
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $conseils = getConseils($fichier);
        include_once("ihm/conseils.php");
        include_once 'ihm/footer.php';
        break;
    case 'supprimer':
        $id = $_GET['id'];
        supprXmlConseils($id);
        $fichier = recupXml();
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $conseils = getConseils($fichier);
        include_once("ihm/conseils.php");
        include_once 'ihm/footer.php';
        break;
    case 'modifXml':
        if (isset($_POST['date']) && isset($_POST['id-conseil'])) {
            if (isset($_FILES['doc']) && ($_FILES['doc']['error'] == 0)) {
                $fichierIni = $_FILES['doc']['name'];
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
                upload_file();
            } else {
                $fichier = $_POST['pdf-actuel'];
            }
            $id = $_POST['id-conseil'];
            $date = $_POST['date'];
            modifXmlConseils($id, $date, $fichier);
            $fichier = recupXml();
        }
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $conseils = getConseils($fichier);
        include_once("ihm/conseils.php");
        include_once 'ihm/footer.php';
}

