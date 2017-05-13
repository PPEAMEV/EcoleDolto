<?php
include_once("header.php");
$lignes = ps($fichier);
$images = images_ps($fichier);
$ligne = footer($fichier);
?>

<div id="section">
     <h1><span class="lettre-bleu">P</span>etite <span class="lettre-orange">s</span>ection</h1>
</div>
<div class="maitresse">
    <img src="donnees/img/<?php echo $images[0]?>" alt="" />
    <p><?php echo nl2br($lignes[0]);?></p>
</div>
<div class="container">
    <div class="ligne ligne-rouge">
        <div class="left texte">
            <p><?php echo nl2br($lignes[1]);?></p>
        </div>
        <div class="right">
             <img src="donnees/img/<?php echo $images[1]?>" alt="" />
        </div>
    </div>
    <div class="ligne ligne-bleu">
        <div class="left">
            <img src="donnees/img/<?php echo $images[2]?>" alt="" />
        </div>
        <div class="right texte">
            <p><?php echo nl2br($lignes[2]);?></p>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>