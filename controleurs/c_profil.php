
<?php

if (!isset($_GET['profil'])) {
    $_GET['action'] = 'profil';
}
$action = $_GET['action'];
switch ($action) {
    case 'profil':
        include_once 'ihm/header.php';
        $ligne = footer($fichier);
        $url = "index.php?uc=profil&action=majXml";
        include_once ('ihm/modification_mdp.php');
        include_once 'ihm/footer.php';

        break;
    case 'majXml':
        if (isset($_POST['nmdp'])) {
            $mdp = $_POST['nmdp'];
            $id = "mdp";
            $mdpactuel = user_passe($fichier);
            $contenu = CrypterMDP($mdp, $mdpactuel);
            if ($contenu == "") {
                $errlog = 1;
                include_once ('ihm/modification_mdp.php');
            } else {

                modifXml($id, $contenu);
                $fichier = recupXml();
                include_once("ihm/header.php");
                $ligne = footer($fichier);
                $url = "index.php?uc=accueil&action=majXml";
                include_once ('src/modals/modal_text.php');
                include_once ('src/modals/modal_doc.php');
                include_once("ihm/accueil.php");
                include_once("ihm/footer.php");
            }
        }
}

