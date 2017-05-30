
<?php


if (!isset($_GET['action'])) {
    $_GET['action'] = 'plan_d_acces';
}
$action = $_GET['action'];
switch ($action) {
    case 'plan_d_acces':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $url = "index.php?uc=plan_d_acces&action=majXml";
        if ($estConnecte) {
            include_once ('src/modals/modal_text.php');
            include_once("ihm/plan_d_acces.php");
            include_once 'ihm/footer.php';
        } else {
            include_once("ihm/plan_d_acces.php");
            include_once 'ihm/footer.php';
        }
        break;
    case 'majXml':
        if (isset($_POST['content']) && isset($_POST['id_ligne'])) {
            $contenu = $_POST['content'];
            $id = $_POST['id_ligne'];
            modifXml($id, $contenu);
            $fichier = recupXml(); //récupération du fichier xml pour qu'il s'affiche instantanément dans la page suite à la modif
        }
        include_once("ihm/header.php");
        $ligne = footer($fichier);
        $url = "index.php?uc=plan_d_acces&action=majXml";
        include_once ('src/modals/modal_text.php');
        include_once ('src/modals/modal_doc.php');
        include_once("ihm/plan_d_acces.php");
        include_once("ihm/footer.php");
        break;
}

