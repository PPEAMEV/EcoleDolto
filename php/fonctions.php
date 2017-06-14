<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * récupère le fichier xml sous forme SimpleXML
 * @return type
 */
function recupXml() {
    $fichier = simplexml_load_file('donnees/xml/bdd.xml');
    return $fichier;
}

/**
 * récupère les données modifiables
 * @param type $fichier
 * @return type
 */
// Accueil
function accueil($fichier) {
    $lignes[0] = (string) $fichier->accueil->ligne[0];
    $lignes[1] = (string) $fichier->accueil->ligne[2];
    $lignes[2] = (string) $fichier->accueil->ligne[4];
    return $lignes;
}

function images_accueil($fichier) {
    $images[0] = (string) $fichier->accueil->ligne[1];
    $images[1] = (string) $fichier->accueil->ligne[3];
    $images[2] = (string) $fichier->accueil->ligne[5];
    return $images;
}

//Petite section
function ps($fichier) {
    $lignes[0] = (string) $fichier->petite_section->ligne[0];
    $lignes[1] = (string) $fichier->petite_section->ligne[2];
    $lignes[2] = (string) $fichier->petite_section->ligne[4];
    $lignes[3] = (string) $fichier->petite_section->ligne[6];
    $lignes[4] = (string) $fichier->petite_section->ligne[7];
    return $lignes;
}

function images_ps($fichier) {
    $images[0] = (string) $fichier->petite_section->ligne[1];
    $images[1] = (string) $fichier->petite_section->ligne[3];
    $images[2] = (string) $fichier->petite_section->ligne[5];
    return $images;
}

//Moyenne section
function ms($fichier) {
    $lignes[0] = (string) $fichier->moyenne_section->ligne[0];
    $lignes[1] = (string) $fichier->moyenne_section->ligne[2];
    $lignes[2] = (string) $fichier->moyenne_section->ligne[4];
    $lignes[3] = (string) $fichier->moyenne_section->ligne[6];
    $lignes[4] = (string) $fichier->moyenne_section->ligne[7];
    return $lignes;
}

function images_ms($fichier) {
    $images[0] = (string) $fichier->moyenne_section->ligne[1];
    $images[1] = (string) $fichier->moyenne_section->ligne[3];
    $images[2] = (string) $fichier->moyenne_section->ligne[5];
    return $images;
}

//Grande section
function gs($fichier) {
    $lignes[0] = (string) $fichier->grande_section->ligne[0];
    $lignes[1] = (string) $fichier->grande_section->ligne[2];
    $lignes[2] = (string) $fichier->grande_section->ligne[4];
    $lignes[3] = (string) $fichier->grande_section->ligne[6];
    $lignes[4] = (string) $fichier->grande_section->ligne[7];
    return $lignes;
}

function images_gs($fichier) {
    $images[0] = (string) $fichier->grande_section->ligne[1];
    $images[1] = (string) $fichier->grande_section->ligne[3];
    $images[2] = (string) $fichier->grande_section->ligne[5];
    return $images;
}

// données de l'inscription
function inscription($fichier) {
    $inscription[0] = (string) $fichier->inscription->ligne[0];
    $inscription[1] = (string) $fichier->inscription->ligne[1];
    return $inscription;
}

/**
 * récupère les données modifiables du footer
 * @param type $fichier
 * @return type
 */
function footer($fichier) {
    $ligne = (string) $fichier->footer->ligne[0];
    return $ligne;
}

/**
 * gère la connexion de l'admin
 * @param type $fichier
 * @param type $mdp
 * @return boolean
 */
function connexion($fichier, $mdp) {
    $user = (string) $fichier->admin->ligne[0];
    $hash = (string) $fichier->admin->ligne[1];
    if ($user == "admin" && password_verify($mdp, $hash)) {
        $_SESSION['user'] = $user;
        $reussite = true;
    } else {
        $reussite = false;
    }
    return $reussite;
}

/**
 * vérifie si l'admin est connecté
 * @return boolean
 */
function estConnecte() {
    return isset($_SESSION['user']);
}

//Fonction de gestion des erreurs d'upload de l'image
function up_error($code, $nom) {
    switch ($code) {
        case UPLOAD_ERR_OK : $erreur = 'Pas d\'erreur';
            $valid = true;
            break;
        case UPLOAD_ERR_INI_SIZE : $erreur = 'Votre fichier `' . $nom . '` dépasse la taille maximale d\'upload autorisée par PHP( ' . get_cfg_var('upload_max_filesize') . ' )';
            $valid = false;
            break;
        case UPLOAD_ERR_FORM_SIZE : $erreur = 'Votre fichier dépasse la taille maximale demandée par le Webmestre';
            $valid = false;
            break;
        case UPLOAD_ERR_PARTIAL : $erreur = 'Le fichier n\'a été que partiellement téléchargé. !!!';
            $valid = false;
            break;
        case UPLOAD_ERR_NO_FILE : $erreur = 'Aucun fichier téléchargé !!!';
            $valid = false;
            break;
        case UPLOAD_ERR_NO_TMP_DIR : $erreur = 'Un dossier temporaire est manquant.';
            $valid = false;
            break;
        case UPLOAD_ERR_CANT_WRITE : $erreur = 'Échec de l\'écriture du fichier sur le disque.';
            $valid = false;
            break;
        case UPLOAD_ERR_EXTENSION : $erreur = 'Une extension PHP a arrété l\'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L\'examen du phpinfo() peut aider.';
            $valid = false;
            break;
        default : $erreur = 'L\'upload a rencontré une erreur inconnue !!!';
            $valid = false;
            break;
    }

    $return[] = $valid;
    $return[] = $erreur;
    return $return;
}

/*
 *  Fonction d'upload des images
 * Le fichier final sera copié dans le répertoire './donnees/img/' 
 * Dans index.php?uc=accueil&action=majXml nous récupérons les informations de notre fichier dans un tableau super global $_FILES ! celui ci contient :
 *
 * @param name : le nom de l'image sur l'ordinateur du client
 * @param tmp_name : le nom temporaire de l'image sur le serveur (depuis la racine du disque)
 * @param size : la taille en octets du fichier
 * @param type : le type mime du fichier sélectionné par le client
 * @param error : l'erreur rapportée par php lors de l'upload de l'image 
 */

function upload_img() {
    //$_FILES existe on récupère les infos qui nous intéressent
    $fichier = $_FILES['doc']['name']; //nom réel de l'image
    $size = $_FILES['doc']['size']; //poid de l'image en octets
    $tmp = $_FILES['doc']['tmp_name']; //nom temporaire de l'image (sur le serveur)
    $type = $_FILES['doc']['type']; //type de l'image
    $error = $_FILES['doc']['error'];
    $retour = up_error($error, $fichier);
    $nom_final = " ";
    if ($retour[0] === true) {
        //On récupère la taille de l'image
        list($width, $height) = getimagesize($tmp);
        if (is_uploaded_file($tmp)) { //permet de vérifier si le fichier a été uploadé via http
            //vérification du type de l'img, son poids et sa taille
            if ($type == "image/jpeg" | $type == "image/png" | $type == "image/gif" && $size <= "26214400" && $width <= "4000" && $height <= "4000") {
                // type tout type d'images, poids < à 26214400 octets soit environ 25Mo, largeur = hauteur = 4000px
                //Pour supprimer les espaces dans les noms de fichiers car celà entraîne une erreur lorsque vous voulez l'afficher
                $fichier = preg_replace("` `i", "", $fichier); //ligne facultative :)
                //On vérifie s'il existe une image qui a le même nom dans le répertoire
                if (file_exists('./donnees/img/' . $fichier)) {
                    /*    touch($fichier);
                      } */
                    /* Le fichier existe on rajoute dans son nom le timestamp du moment pour le différencier de la première 
                     * (comme cela on est sur de ne pas avoir 2 images avec le même nom :) ) */
                    $timestamp = time();
                    $nomFichier = explode(".",$fichier);
                    $extension = explode("/",$type);
                    $nom_final = $nomFichier[0].$timestamp.".".$extension[1];
                } else {
                    $nom_final = $fichier; //l'image n'existe pas on garde le même nom
                }

                //on déplace l'image dans le répertoire final
                move_uploaded_file($tmp, './donnees/img/' . $nom_final);

            } else {
                //Le type mime, ou la taille ou le poids est incorrect
                echo 'Votre image a été rejetée (poids, taille ou type incorrect)';
            }
        } else {
            echo $retour[1], '<br />';
        }
    }
    return $nom_final;
}

// AhMaD: pour upload les pdfs dans la page HEDT
function upload_pdf() {
    $fichier = $_FILES['doc']['name'];
    $size = $_FILES['doc']['size'];
    $tmp = $_FILES['doc']['tmp_name'];
    $type = $_FILES['doc']['type'];
    $error = $_FILES['doc']['error'];
    $extensions = array('.docx', '.txt', '.pdf');
    $extension = strrchr($_FILES['doc']['name'], '.');
    $retour = up_error($error, $fichier);
    if ($retour[0] === true) {
        if (is_uploaded_file($tmp)) {
            if (in_array($extension, $extensions) && $size <= "96214400") {
                $fichier = preg_replace("` `i", "", $fichier);
             
                move_uploaded_file($tmp, './donnees/pdf/' . $fichier);
            } else {
                echo 'Votre image a été rejetée (poids, taille ou type incorrect)';
            }
        } else {
            echo $retour[1], '<br />';
        }
    }
}
function upload_file() {
    $dossier = './donnees/pdf/';
    $fichier = basename($_FILES['pdf']['name']);
    $taille_maxi = 26214400;
    $taille = filesize($_FILES['pdf']['tmp_name']);
    $extensions = array('.docx', '.txt', '.pdf');
    $extension = strrchr($_FILES['pdf']['name'], '.');
//Début des vérifications de sécurité...
    if (!in_array($extension, $extensions)) { //Si l'extension n'est pas dans le tableau
        $erreur = 'Vous devez uploader un fichier de type pdf, txt ou doc...';
    }
    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }
    if (!isset($erreur)) { //S'il n'y a pas d'erreur, on upload
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], $dossier . $fichier)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            echo 'Upload effectué avec succès !';
        } else { //Sinon (la fonction renvoie FALSE).
            echo 'Echec de l\'upload !';
        }
    } else {
        echo $erreur;
    }
}

//Fonction permettant de modifier le fichier xml - Actualisation du bdd.xml en fonction de la modification réalisée par l'admin (M)
//création d'un objet DOM
/**
 * modifie l'xml et le sauvegarde
 * @param type $id
 * @param type $contenu
 */
function modifXml($id, $contenu) {
    $dom = new DOMDocument();
    //chargement de la bdd
    $dom->load('donnees/xml/bdd.xml');
    //création d'un noeud ligne dans le xml
    $newNode = $dom->createElement('ligne', $contenu);
    //on ajoute l'id du noeud actuel dans le nouveau noeud
    $newNode->setAttribute('id', $id);
    $xp = new DOMXPath($dom);
    //on récupère l'ancien noeud
    $oldNode = $xp->query('//*[@id="' . $id . '"]')->item(0);
    // on le remplace par le nouveau noeud
    $oldNode->parentNode->replaceChild($newNode, $oldNode);
    // Sauvegarde des modification dans le fichier xml
    $dom->save('donnees/xml/bdd.xml');
}

/* * ***********************************************
 * ----------GESTION CONSEILS----------------------
 * ------------------------------------------------/

  /**
 * ajout d'un nouveau conseil
 * @param type $date
 * @param type $fichier
 */

function ajoutXml($date, $fichier) {
    $dom = new DOMDocument();
    $dom->load('donnees/xml/bdd.xml');
    $newNode = $dom->createElement('conseil');
    $newNode->setAttribute("id", $fichier);
    $subNodesDate = $dom->createElement('date', $date);
    $subNodesFichier = $dom->createElement('fichier', $fichier);
    $newNode->appendChild($subNodesDate);
    $newNode->appendChild($subNodesFichier);
    $conseils = $dom->getElementsByTagName('conseils')[0];
    $conseils->appendChild($newNode);
    $dom->save('donnees/xml/bdd.xml');
}

/**
 * récupération des conseils pour l'affichage
 * @param type $fichier
 * @return type
 */
function getConseils($fichier) {
    $i = 0;
    $listeConseils = array();
    foreach ($fichier->xpath('//conseil') as $conseil) {
        $listeConseils[$i][0] = $conseil->date;
        $listeConseils[$i][1] = $conseil->fichier;
        $i++;
    }
    return $listeConseils;
}

/**
 * modification d'un conseil déjà présent
 * @param type $id
 * @param type $date
 * @param type $fichier
 */
function modifXmlConseils($id, $date, $fichier) {
    $dom = new DOMDocument();
    //chargement de la bdd
    $dom->load('donnees/xml/bdd.xml');
    //création d'un noeud conseil dans le xml
    $newNode = $dom->createElement('conseil');
    // on ajoute l'id, et tous les éléments qui vont constituer ce noeud
    $newNode->setAttribute("id", $fichier);
    $subNodesDate = $dom->createElement('date', $date);
    $subNodesFichier = $dom->createElement('fichier', $fichier);
    $newNode->appendChild($subNodesDate);
    $newNode->appendChild($subNodesFichier);
    $xp = new DOMXPath($dom);
    //on récupère l'ancien noeud
    $oldNode = $xp->query('//*[@id="' . $id . '"]')->item(0);
    // on le remplace par le nouveau noeud
    $oldNode->parentNode->replaceChild($newNode, $oldNode);
    // Sauvegarde des modification dans le fichier xml
    $dom->save('donnees/xml/bdd.xml');
}

/**
 * suppression d'un conseil
 * @param type $id
 */
function supprXmlConseils($id) {
    $id = str_replace("'", "", $id);
    $dom = new DOMDocument();
    $dom->load('donnees/xml/bdd.xml');
    $xp = new DOMXPath($dom);
    $nodeToDel = $xp->query('//*[@id="' . $id . '"]')->item(0);
    $conseils = $dom->getElementsByTagName('conseils')[0];
    if ($nodeToDel != null) {
        $conseils->removeChild($nodeToDel);
        $dom->save('donnees/xml/bdd.xml');
    }
}

/* -------------------FIN CONSEILS */

//ahmad pour la page HEDT
function edt_titre($fichier) {
    $titres[0] = (string) $fichier->edts->ligne[0];
    $titres[1] = (string) $fichier->edts->ligne[2];
    return $titres;
}

function edt_pdf($fichier) {
    $pdfs[0] = (string) $fichier->edts->ligne[1];
    $pdfs[1] = (string) $fichier->edts->ligne[3];
    return $pdfs;
}

//ahmad pour la mot de passe
function user_name($fichier) {
    return (string) $fichier->admin->ligne[0];
}

function user_passe($fichier) {
    return (string) $fichier->admin->ligne[1];
}

//ahmad pour crypter la mot de passe
function CrypterMDP($mdp, $mdp_Actuel) {

    //La fonction password_hash() est predéfini pour crypter la mot de passe, 
    //il prend deux paramètre s le première la mote de passe et la douxième  PASSWORD_DEFAULT c'est une constante de l'algorithme predéfini.
    $nouvelle_passe = password_hash("$mdp", PASSWORD_DEFAULT);
    $rep = "";
    if ($nouvelle_passe != $mdp_Actuel) {
        $rep = $nouvelle_passe;
    }
    return $rep;
}

//ahmad pour la page cantine
function cantine_titre($fichier) {
    $titres[0] = (string) $fichier->cantine->ligne[2];
    return $titres;
}

function cantine_image($fichier) {
    $images[0] = (string) $fichier->cantine->ligne[0];
    return $images;
}
function cantine_line($fichier) {
    $line= (string) $fichier->cantine->ligne[3];
     return $line;
}


function cantine_text($fichier) {
    $texts[0] = (string) $fichier->cantine->ligne[1];
    return $texts;
}

function cantine_pdf($fichier) {
    $pdf[0] = (string) $fichier->cantine->ligne[2];
    return $pdf;
}

//ahmad pour la page activite
function slide_titre($fichier) {
    $titres[0] = (string) $fichier->items_activite->ligne[1];
    $titres[1] = (string) $fichier->items_activite->ligne[4];
    $titres[2] = (string) $fichier->items_activite->ligne[7];
    $titres[3] = (string) $fichier->items_activite->ligne[10];
    return $titres;
}

function slide_image($fichier) {
    $images[0] = (string) $fichier->items_activite->ligne[0];
    $images[1] = (string) $fichier->items_activite->ligne[3];
    $images[2] = (string) $fichier->items_activite->ligne[6];
    $images[3] = (string) $fichier->items_activite->ligne[9];
    return $images;
}

function slide_text($fichier) {
    $texts[0] = (string) $fichier->items_activite->ligne[2];
    $texts[1] = (string) $fichier->items_activite->ligne[5];
    $texts[2] = (string) $fichier->items_activite->ligne[8];
    $texts[3] = (string) $fichier->items_activite->ligne[11];
    return $texts;
}

/*
 * fonction permettant d'ajouter les boutons edit si l'utilisateur est connecté en tant qu'Administrateur
 * @param $estConnecte : indique si l'utilisateur est connecté
 * @param $id : id de l'endroit l'on se trouve pour l'identification para rapport au XML
 * @param $typeCss : prend la valeur edit_block si l'on veut que le bouton applique le style edit texte edit_block || edit_texte || edit_doc || edit_doc edit_block
 */

function modeAdmin($estConnecte, $id, $typeCss) {
    if ($estConnecte) {
        ?>
        <img id="<?= $id ?>" class="<?= $typeCss ?>" src="donnees/img/edit.png" />
        <?php
    }
}
