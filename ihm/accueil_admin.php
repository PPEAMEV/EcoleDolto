<?php
include_once("header.php");
$lignes = accueil($fichier);
$images = images_accueil($fichier);
$ligne = footer($fichier);

include_once ('src/modals/modal_text.php');
include_once ('src/modals/modal_img.php');
?>
    
    <div class="container container_accueil">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <img id="accueil_ligne1" class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo nl2br($lignes[0]);?>
                </p>
            </div>
            <div class="right">
                <img id="accueil_image_ligne1" class="img" src="donnees/img/edit.png" />
                <img src="donnees/img/<?php echo $images[0]?>" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <img id="accueil_image_ligne2" class="img" src="donnees/img/edit.png" />
                <img src="donnees/img/<?php echo $images[1]?>" alt="" />
            </div>
            <div class="right texte">
                <img id="accueil_ligne2" class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo nl2br($lignes[1]);?>
                </p>
            </div>
        </div>
        <div class="ligne ligne-orange">
            <div class="left texte">
                <img id="accueil_ligne3" class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo nl2br($lignes[2]);?>
                </p>
            </div>
            <div class="right">
                <img id="accueil_image_ligne3" class="img" src="donnees/img/edit.png" />
                <img src="donnees/img/<?php echo $images[2]?>" alt="" />
            </div>
        </div>
    </div>

    <?php include_once("footer_admin.php");?>
