<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'horairs_EDT';
}
$action = $_GET['action'];
switch ($action) {
    case 'horairs_EDT':
        if ($estConnecte) {
            include_once("ihm/horairs_EDT-admin.php");
        } else {
            include_once("ihm/horairs_EDT.php");
        }
        break;
    case 'updateXml':
        if (isset($_POST['titre'])  && isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
            $titre = $_POST['titre'];
            $src = $_FILES['pdf']['name'];
            updateXml($titre,$src);
            $fichier=recupXml();
        }
           include_once("ihm/horairs_EDT-admin.php");
        break;
}