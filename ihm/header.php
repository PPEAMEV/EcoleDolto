<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>François Dolto</title>
            <!--CSS-->
        <link rel="stylesheet" type="text/css" href="src/css/jquery-ui.min.css" >
        <link rel="stylesheet" type="text/css" href="src/css/bootstrap.min.css" >
        <link rel="stylesheet" href="src/css/bootstrap-theme.min.css.map">
        <link rel="stylesheet" href="src/css/bootstrap-theme.min.css">
        
         <!--FONT-->
         <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 
         <link href="https://fonts.googleapis.com/css?family=Schoolbell" rel="stylesheet"> 
        <link href="src/css/font_AmaticSC-blod.css" rel="stylesheet" type="text/css"> 
        <link href="src/css/font_AmaticSC-Regular.css" rel="stylesheet" type="text/css"> 
        <link href="src/css/glyphicons-halflings-regular.css" rel="stylesheet" type="text/css"> 
        
          <!--Fichier css principale-->
        <link rel="stylesheet" type="text/css" href="src/css/style.css">
        
        
        <!--JSS-->
          <script src="src/js/jquery-3.1.1.min.js"></script>  
         <script src="src/js/bootstrap.min.js" ></script>
        <script src="src/js/fonctions.js"></script>
      
    </head>
    <body>
        <header class="container">
            <h1><span class="lettre-bleu">É</span>cole <span class="lettre-orange">é</span>lémentaire <span class="lettre-rouge">F</span>rançoise <span class="lettre-bleu">D</span>olt<span class="lettre-orange">o</span></h1>
            <!--            <h3>Séné</h3>-->
        </header>


        <nav class="navbar navbar-default">
            <div class="navcontainer container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#barre-nav">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Ecole Dolto</a>
                </div>
                <div class="collapse navbar-collapse" id="barre-nav">
                    <ul class="nav navbar-nav">
                        <li class="rouge"><a href="index.php?uc=accueil">Accueil</a></li>
                        <li class="dropdown bleu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Présentation<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--                                <li><a href="#">Classe passerelle</a></li>-->
                                <li><a href="index.php?uc=petite_section">Petite section</a></li>
                                <li><a href="index.php?uc=moyenne_section">Moyenne section</a></li>
                                <li><a href="index.php?uc=grande_section">Grande section</a></li>
                                <li><a href="index.php?uc=cantine">Cantine</a></li>
                                <li><a href="index.php?uc=activites">Activités</a></li>
                            </ul>
                        </li>
                        <li><a class="orange" href="index.php?uc=HEDT">Horaires et emplois du temps</a></li>
                        <li><a class="rouge" href="index.php?uc=inscription">Inscriptions</a></li>
                        <li><a class="bleu" href="index.php?uc=conseils">Conseils d'école</a></li>
                        <li><a class="orange fin-nav" href="index.php?uc=plan_d_acces">Plan d'accès</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="rouge fin-nav"><a href="index.php?uc=connexion&action=demandeConnexion"><span class="glyphicon glyphicon-log-in"></span> <?php
                                if (estConnecte()) {
                                    echo "Déconnexion";
                                } else {
                                    echo "Admin";
                                };
                                ?> </a></li>
                    </ul>
                </div>
            </div>
        </nav>
