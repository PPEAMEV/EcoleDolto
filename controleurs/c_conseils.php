<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'conseils';
}
$action = $_GET['action'];
switch ($action) {
    case 'conseils':
        if ($estConnecte) {
            include_once("ihm/conseils_admin.php");
        } else {
            include_once("ihm/conseils.php");
        }
        break;
    case 'ajoutXml':
        if (isset($_POST['date']) && isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
            $date = $_POST['date'];
            $fichierIni = $_FILES['pdf']['name'];
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
            upload_file();
            ajoutXml($date,$fichier);
            $fichier = recupXml();
        }
        include_once("ihm/conseils_admin.php");
        break;
    case 'supprimer':
        $id = $_GET['id'];
        supprXmlConseils($id);
        $fichier = recupXml();
        include_once("ihm/conseils_admin.php");
        break;
    case 'modifXml':
        if (isset($_POST['date']) && isset($_POST['id-conseil'])) {
            if (isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
                $fichierIni = $_FILES['pdf']['name'];
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierIni);
                upload_file();
            } else {
                $fichier = $_POST['pdf-actuel'];
            }
            $id = $_POST['id-conseil'];
            $date = $_POST['date'];
            modifXmlConseils($id,$date,$fichier);
            $fichier = recupXml();
        }
        include_once("ihm/conseils_admin.php");
        
}

