<?php 

include_once("header.php");
$lignes = accueil($fichier);
$images = images_accueil($fichier);
$ligne = footer($fichier);

?>

        <div class="container">
            <div class="ligne ligne-rouge">
                <div class="left texte">
                    <p><?php echo nl2br($lignes[0]);?></p>
                </div>
                <div class="right">
                    <img src="donnees/img/<?php echo $images[0]?>" alt="" />
                </div>
            </div>
            <div class="ligne ligne-bleu">
                <div class="left">
                    <img src="donnees/img/<?php echo $images[1]?>" alt="" />
                </div>
                <div class="right texte">
                    <p><?php echo nl2br($lignes[1]);?></p>
                </div>
            </div>
            <div class="ligne ligne-orange">
                <div class="left texte">
                    <p><?php echo nl2br($lignes[2]);?></p>
                </div>
                <div class="right">
                    <img src="donnees/img/<?php echo $images[2]?>" alt="" />
                </div>
            </div>
        </div>

<?php include_once("footer.php");?>