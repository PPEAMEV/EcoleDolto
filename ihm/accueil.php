
    
    <div class="container container_accueil">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <?php modeAdmin($estConnecte, "accueil_ligne1", "edit_text edit_block") ?>
                <p>
                    <?php echo nl2br($lignes[0]);?>
                </p>
            </div>
            <div class="right">
                <?php modeAdmin($estConnecte, "accueil_image_ligne1", "edit_doc edit_block") ?>
                <img src="donnees/img/<?php echo $images[0]?>" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <?php modeAdmin($estConnecte, "accueil_image_ligne2", "edit_doc edit_block") ?>
                <img src="donnees/img/<?php echo $images[1]?>" alt="" />
            </div>
            <div class="right texte">
                <?php modeAdmin($estConnecte, "accueil_ligne2", "edit_text edit_block") ?>
                <p>
                    <?php echo nl2br($lignes[1]);?>
                </p>
            </div>
        </div>
        <div class="ligne ligne-orange">
            <div class="left texte">
                <?php modeAdmin($estConnecte, "accueil_ligne3", "edit_text edit_block") ?>
                <p>
                    <?php echo nl2br($lignes[2]);?>
                </p>
            </div>
            <div class="right">
                <?php modeAdmin($estConnecte, "accueil_image_ligne3", "edit_doc edit_block") ?>
                <img src="donnees/img/<?php echo $images[2]?>" alt="" />
            </div>
        </div>
    </div>
