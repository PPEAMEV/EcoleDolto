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
    $reussite;
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
function modifXml(){
$xmlDoc = new DOMDocument();
$xmlDoc->recupXml();
$xml = $xmlDoc->documentElement;
foreach($xml->childNodes as $ligne){
        $ligne->setAttribute("contenu", data);
	$xmlDoc->save("donnees/xml/bdd.xml");

	break;
}
}
	

?>