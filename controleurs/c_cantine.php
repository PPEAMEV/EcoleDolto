
<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'cantine';
}
$action = $_GET['action'];
switch ($action) {
    case 'cantine': {
            include_once("ihm/header.php");
            $texts = cantine_text($fichier);
            $images = cantine_image($fichier);
            $titres = cantine_titre($fichier);
            $pdfs = cantine_pdf($fichier);
            $line = cantine_line($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=cantine&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
            }
            include_once("ihm/cantine.php");
            include_once("ihm/footer.php");
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
                        upload_img();
                        $contenu = preg_replace("` `i", "", $fichier);
                        $contenu = "donnees/img/" . $contenu;
                    }
                }
                modifXml($id, $contenu);
                $fichier = recupXml();
            }
            include_once("ihm/header.php");
            $texts = cantine_text($fichier);
            $images = cantine_image($fichier);
            $titres = cantine_titre($fichier);
            $line = cantine_line($fichier);
            $pdfs = cantine_pdf($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=cantine&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/cantine.php';
            include_once("ihm/footer.php");
            break;
        }
}
?>


