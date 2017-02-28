<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function recupXml() {
    $fichier = simplexml_load_file('donnees/xml/bdd.xml');
    return $fichier;
}
function accueil ($fichier) {
    $lignes[0] = (string)$fichier->accueil->ligne[0];
    $lignes[1] = (string)$fichier->accueil->ligne[1];
    $lignes[2] = (string)$fichier->accueil->ligne[2];
    return $lignes;
}

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

function estConnecte() {
    return isset($_SESSION['user']);
}

//Fonction permettant de modifier le fichier xml - à vérifier (M)
function modifXml($id,$contenu){
    //$fichier = recupXml();
    $dom = new DOMDocument();
    $dom->load('donnees/xml/bdd.xml');
//    $fichier = $dom->importNode($fichier, true);
//    $fichier = $dom->appendChild($fichier);
    // on crée le nouvel élément
    $newNode = $dom->createElement('ligne', $contenu);
    $newNode->setAttribute('id', $id);
    // on récupère et on remplace l'ancien élément
    $xp = new DOMXPath($dom);
    //$oldNode = $dom->getElementById($id)->item[0];
    $oldNode = $xp->query('//ligne[@id="'.$id.'"]')->item(0);
    $oldNode->parentNode->replaceChild($newNode, $oldNode);
    //$element->parentNode->replaceChild($new_tag, $element);
//    $result = $dom->getElementsByTagName("accueil");
//    $result->parentNode->replaceChild($new_tag,$element);
    //echo $dom->saveXML();
    $dom->save('donnees/xml/bdd.xml');
}
	

?>