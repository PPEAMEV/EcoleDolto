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
    $lignes[0] = $fichier->accueil->ligne[0];
    $lignes[1] = $fichier->accueil->ligne[1];
    $lignes[2] = $fichier->accueil->ligne[2];
    return $lignes;
}

function connexion($fichier, $mdp) {
    $user = $fichier->admin->user;
    $hash = $fichier->admin->mdp;
    if (password_verify($mdp, $hash)) {
        $_SESSION['user'] = $user;
        //echo $_SESSION['user'];
    } else {
        echo "erreur";
    }
    
}

function estConnecte() {
    return isset($_SESSION['user']);
}

?>