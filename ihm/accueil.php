<?php 

include_once("header.php");
$lignes = accueil($fichier);

?>

        <div class="container">
            <div class="ligne ligne-rouge">
                <div class="left texte">
                    <p><?php echo $lignes[0];?></p>
                </div>
                <div class="right">
                    <img src="http://lorempixel.com/640/480/" alt="" />
                </div>
            </div>
            <div class="ligne ligne-bleu">
                <div class="left">
                    <img src="http://lorempixel.com/640/480/" alt="" />
                </div>
                <div class="right texte">
                    <p><?php echo $lignes[1];?></p>
                </div>
            </div>
            <div class="ligne ligne-orange">
                <div class="left texte">
                    <p><?php echo $lignes[2];?></p>
                </div>
                <div class="right">
                    <img src="http://lorempixel.com/640/480/" alt="" />
                </div>
            </div>
        </div>

<?php include_once("footer.php");?>