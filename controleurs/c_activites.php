
<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'activites';
}
$action = $_GET['action'];
switch ($action) {
    case 'activites': {
            include_once("ihm/header.php");
            $titres = slide_titre($fichier);
            $images = slide_image($fichier);
            $texts= slide_text($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=activites&action=majXml";
            if ($estConnecte) {
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                
            }
            include_once("ihm/activites.php");
                include_once("ihm/footer.php");
            break;
        }
    case 'majXml': {
        if ((isset($_POST['content']) || isset($_FILES['doc']['tmp_name'] ) ) && isset($_POST['id_ligne'])) {
                if (isset($_POST['content'])) {
                    $contenu = $_POST['content'];
                }
                $id = $_POST['id_ligne'];
                if (isset($_FILES['doc']['tmp_name'])) {
                    if (is_uploaded_file($_FILES['doc']['tmp_name'])) {
                        $fichier = $_FILES['doc']['name'];
                        upload_img();
                        $contenu = preg_replace("` `i", "", $fichier);
                        $contenu="donnees/img/".$contenu;
                    }
                }
                modifXml($id, $contenu);
                $fichier = recupXml(); 
            }
            include_once("ihm/header.php");
            $titres = slide_titre($fichier);
            $images = slide_image($fichier);
            $texts= slide_text($fichier);
            $ligne = footer($fichier);
            $url = "index.php?uc=activites&action=majXml";
            include_once ('src/modals/modal_text.php');
            include_once ('src/modals/modal_doc.php');
            include_once 'ihm/activites.php';
            include_once("ihm/footer.php");
            break;
        }
}
?>
