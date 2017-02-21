<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function accueil () {
    $parametres = simplexml_load_file('donnees/xml/bdd.xml');
    $lignes[0] = $parametres->accueil->ligne[0];
    $lignes[1] = $parametres->accueil->ligne[1];
    $lignes[2] = $parametres->accueil->ligne[2];
    return $lignes;
}

?>