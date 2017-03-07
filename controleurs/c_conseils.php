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
        if (isset($_POST['nom']) && isset($_POST['date']) && isset($_FILES['pdf']) && ($_FILES['pdf']['error'] == 0)) {
            $nom = $_POST['nom'];
            $date = $_POST['date'];
            $fichier = $_FILES['pdf']['name'];
            ajoutXml($nom,$date,$fichier);
        }
        break;
}

