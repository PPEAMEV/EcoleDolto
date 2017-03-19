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
            $fichier = $_FILES['pdf']['name'];
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
}

