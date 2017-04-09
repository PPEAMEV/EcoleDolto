
<?php

if($estConnecte){
    include_once 'ihm/contact_admin.php';
}else{
    include_once 'ihm/plan_d_acces.php';
}

if (!isset($_GET['action'])) {
    $_GET['action'] = 'plan_d_acces';
}
$action = $_GET['action'];
switch ($action) {
    case 'plan_d_acces':
        if ($estConnecte) {
            include_once("ihm/plan_d_acces.php");
        } else {
            include_once("ihm/plan_d_acces.php");
        }
        break;
   
}

