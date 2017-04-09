
<?php
include_once("header.php");
$listeItems = getItems($fichier);
?>
<html>
    <head>

    </head>
    <body>
        <div class="container">
            <div class="ligne ligne-rouge">
                <div id="slide" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="center-block" src="<?php echo$listeItems[0][0]; ?>"
                                 style="" alt="activité">
                            <div class="carousel-caption">
                                <h3><?php echo$listeItems[0][1]; ?></h3>
                                <p class="lead"><?php echo$listeItems[0][2]; ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img class="center-block" src="<?php echo$listeItems[1][0]; ?>" style=""
                                 alt="activité">
                            <div class="carousel-caption">
                                <h1><?php echo$listeItems[1][1]; ?></h1>
                                <p class="lead"><?php echo$listeItems[1][2]; ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img class="center-block" src="<?php echo$listeItems[2][0]; ?>"
                                 style=""  alt="activité">
                            <div class="carousel-caption">
                                <h1><?php echo $listeItems[2][1]; ?></h1>
                                <p class="lead"><?php echo$listeItems[2][2]; ?></p>
                            </div>
                        </div>
                        <div class="item">
                            <img class="center-block" src="<?php echo$listeItems[3][0]; ?>" style=""
                                 alt="vacances">
                            <div class="carousel-caption">
                                <h1><?php echo$listeItems[3][1]; ?></h1>
                                <p class="lead"><?php echo$listeItems[3][2]; ?></p>
                            </div>

                        </div>



                    </div>


                </div> </div>
        </div>

    </body>
</html>


<?php include_once("footer.php"); ?>