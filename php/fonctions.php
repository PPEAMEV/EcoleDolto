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
 * récupère les données modifiables de l'accueil
 * @param type $fichier
 * @return type
 */
function accueil($fichier) {
    $lignes[0] = (string)$fichier->accueil->ligne[0];
    $lignes[1] = (string)$fichier->accueil->ligne[2];
    $lignes[2] = (string)$fichier->accueil->ligne[4];
    return $lignes;
}

function images_accueil($fichier){
    $images[0] = (string)$fichier->accueil->ligne[1];
    $images[1] = (string)$fichier->accueil->ligne[3];
    $images[2] = (string)$fichier->accueil->ligne[5];
    return $images;
}

/**
 * récupère les données modifiables du footer
 * @param type $fichier
 * @return type
 */
function footer($fichier) {
    $ligne = (string)$fichier->footer->ligne[0];
    return $ligne;
}

/**
 * gère la connexion de l'admin
 * @param type $fichier
 * @param type $mdp
 * @return boolean
 */
function connexion($fichier, $mdp) {
    $user = (string)$fichier->admin->user;
    $hash = (string)$fichier->admin->mdp;
    if ($user=="admin" && password_verify($mdp, $hash)) {
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
function up_error($code,$nom) {
	switch ($code) {
		case UPLOAD_ERR_OK : $erreur = 'Pas d\'erreur';$valid = true;break;
		case UPLOAD_ERR_INI_SIZE : $erreur = 'Votre fichier `'.$nom.'` dépasse la taille maximale d\'upload autorisée par PHP( '.get_cfg_var('upload_max_filesize').' )';$valid = false;break;
		case UPLOAD_ERR_FORM_SIZE : $erreur = 'Votre fichier dépasse la taille maximale demandée par le Webmestre';$valid = false;break;
		case UPLOAD_ERR_PARTIAL : $erreur = 'Le fichier n\'a été que partiellement téléchargé. !!!';$valid = false;break;
		case UPLOAD_ERR_NO_FILE : $erreur = 'Aucun fichier téléchargé !!!';$valid = false;break;
		case UPLOAD_ERR_NO_TMP_DIR : $erreur = 'Un dossier temporaire est manquant.';$valid = false;break;
		case UPLOAD_ERR_CANT_WRITE : $erreur = 'Échec de l\'écriture du fichier sur le disque.';$valid = false;break;
		case UPLOAD_ERR_EXTENSION : $erreur = 'Une extension PHP a arrété l\'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L\'examen du phpinfo() peut aider.';$valid = false;break;
		default : $erreur = 'L\'upload a rencontré une erreur inconnue !!!';$valid = false; break;
	}

	$return[] = $valid;
	$return[] = $erreur;
	return $return;
}

// Fonction d'upload des images
/*Le fichier final sera copié dans le répertoire './donnees/img/' 
Dans index.php?uc=accueil&action=majXml nous récupérons les informations de notre fichier dans un tableau super global $_FILES ! celui ci contient :

name : le nom de l'image sur l'ordinateur du client
tmp_name : le nom temporaire de l'image sur le serveur (depuis la racine du disque)
size : la taille en octets du fichier
type : le type mime du fichier sélectionné par le client
error : l'erreur rapportée par php lors de l'upload de l'image */
function upload_img(){
if (isset($_FILES['image']))
{
	//$_FILES existe on récupère les infos qui nous intéressent
	$fichier=$_FILES['image']['name'];//nom réel de l'image
	$size=$_FILES['image']['size']; //poid de l'image en octets
	$tmp=$_FILES['image']['tmp_name'];//nom temporaire de l'image (sur le serveur)
	$type=$_FILES['image']['type'];//type de l'image
	$error = $_FILES['image']['error'];
	$retour = up_error($error,$fichier);
        //$nom_final=" ";
	if ($retour[0] === true) {
		//On récupère la taille de l'image
		list($width,$height)=getimagesize($tmp);
		if (is_uploaded_file($tmp)) //permet de vérifier si le fichier a été uploadé via http
		{
			//vérification du type de l'img, son poids et sa taille
			if ($type=="image/jpeg" | $type=="image/png" | $type=="image/gif" && $size<="26214400" && $width<="4000" && $height<="4000" )
			{
				// type tout type d'images, poids < à 26214400 octets soit environ 25Mo, largeur = hauteur = 4000px
				//Pour supprimer les espaces dans les noms de fichiers car celà entraîne une erreur lorsque vous voulez l'afficher
				$fichier = preg_replace ("` `i","",$fichier);//ligne facultative :)
				//On vérifie s'il existe une image qui a le même nom dans le répertoire
				if (file_exists('./donnees/img/'.$fichier))
				{
					//Le fichier existe on rajoute dans son nom le timestamp du moment pour le différencier de la première (comme cela on est sur de ne pas avoir 2 images avec le même nom :) )
					$nom_final= preg_replace("`.*`is",date("U").".*",$fichier);
				}
				else {
					$nom_final=$fichier; //l'image n'existe pas on garde le même nom
				}
				//on déplace l'image dans le répertoire final
				move_uploaded_file($tmp,'./donnees/img/'.$nom_final);
				//Message indiquant que tout s'est bien passé
				echo "L'image a été uploadée avec succès<br/>";
			}
			else {
				//Le type mime, ou la taille ou le poids est incorrect
				echo 'Votre image a été rejetée (poids, taille ou type incorrect)';
			}
		}
		else {
			echo $retour[1],'<br />';
		}
	}
}
//Pour tester si l'image est bien à sa place
echo '<img src="./donnees/img/'.$nom_final.'" border="0" />';
echo '<br/>';
echo '<a href="javascript:history.back();">Retour</a>';
}

//Fonction permettant de modifier le fichier xml - Actualisation du bdd.xml en fonction de la modification réalisée par l'admin (M)
// NE FAUT-IL PAS MIEUX SEPARER LE FORMULAIRE DE TEXTE ET D'IMAGE???
    //création d'un objet DOM
/**
 * modifie l'xml et le sauvegarde
 * @param type $id
 * @param type $contenu
 */
function modifXml($id,$contenu){
    $dom = new DOMDocument();
    //chargement de la bdd
    $dom->load('donnees/xml/bdd.xml');
    
    //création d'un noeud ligne dans le xml
    $newNode = $dom->createElement('ligne', $contenu);
    //modification du noeud ligne avec les infos renseignées par l'admin dans le formulaire
    $newNode->setAttribute('id', $id);
    
/*   //création d'un noeud image dans le xml
    $newNodeImg = $dom->createElement('image', $nom_final);
    //modification du noeud image avec le nom final de l'image rajoutée par l'admin dans le formulaire
    $newNodeImg->setAttribute('id', $id);*/
    
    //recherche de la ligne concernée dans le xml avec le DOMPath(requete)
    $xp = new DOMXPath($dom);
    //Remplacement du noeud pour le texte
    $oldNode = $xp->query('//*[@id="'.$id.'"]')->item(0);
    $oldNode->parentNode->replaceChild($newNode, $oldNode);
    
/*   //Remplacement du noeud pour l'image
    $oldNodeImg = $xp->query('//image[@id="'.$id.'"]')->item(0);
    $oldNodeImg->parentNode->replaceChild($newNodeImg, $oldNodeImg);*/
    
    // Sauvegarde des modification dans le fichier xml
    $dom->save('donnees/xml/bdd.xml');
}

function getConseils($fichier) {
    $i = 0;
    foreach($fichier->xpath('//conseils') as $conseils) {
        $listeConseils[$i][0] = $conseils->conseil->nom;
        $listeConseils[$i][1] = $conseils->conseil->date;
        $listeConseils[$i][2] = $conseils->conseil->lien;
        $i++;
    }
    return $listeConseils;
}