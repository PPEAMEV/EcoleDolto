<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet"> 
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="src/css/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="src/css/style.css">
        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="src/js/jquery-ui.min.js"></script>
        <script src="src/js/fonctions.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Schoolbell" rel="stylesheet"> 
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
                                <li><a href="index.php?uc=petite_section">Petite section</a></li>
                                <li><a href="#">Moyenne section</a></li>
                                <li><a href="#">Grande section</a></li>
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
