<?php
require_once 'php/fonctions.php';
$lignesAccueil = accueil();
$estConnecte = false;
if($estConnecte) {
    include("ihm/accueil_admin.php");
} else {
    include("ihm/accueil.php");
}
?>