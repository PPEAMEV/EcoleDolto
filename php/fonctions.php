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
function accueil($fichier) {
    $lignes[0] = (string)$fichier->accueil->ligne[0];
    $lignes[1] = (string)$fichier->accueil->ligne[1];
    $lignes[2] = (string)$fichier->accueil->ligne[2];
    return $lignes;
}

function footer($fichier) {
    $ligne = (string)$fichier->footer->ligne[0];
    return $ligne;
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
    $dom = new DOMDocument();
    $dom->load('donnees/xml/bdd.xml');
    $newNode = $dom->createElement('ligne', $contenu);
    $newNode->setAttribute('id', $id);
    $xp = new DOMXPath($dom);
    $oldNode = $xp->query('//ligne[@id="'.$id.'"]')->item(0);
    $oldNode->parentNode->replaceChild($newNode, $oldNode);
    $dom->save('donnees/xml/bdd.xml');
}
	

?>