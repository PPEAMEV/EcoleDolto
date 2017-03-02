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
    $lignes[1] = (string)$fichier->accueil->ligne[1];
    $lignes[2] = (string)$fichier->accueil->ligne[2];
    return $lignes;
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

/**
 * modifie l'xml et le sauvegarde
 * @param type $id
 * @param type $contenu
 */
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
	
