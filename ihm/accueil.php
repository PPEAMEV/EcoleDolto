
    
    <div class="container container_accueil">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <?php if ($estConnecte) {
                    ?><img id="accueil_ligne1" class="edit_text edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <p>
                    <?php echo nl2br($lignes[0]);?>
                </p>
            </div>
            <div class="right">
                <?php if ($estConnecte) {
                    ?><img id="accueil_image_ligne1" class="edit_doc edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <img src="donnees/img/<?php echo $images[0]?>" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <?php if ($estConnecte) {
                    ?><img id="accueil_image_ligne2" class="edit_doc edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <img src="donnees/img/<?php echo $images[1]?>" alt="" />
            </div>
            <div class="right texte">
                <?php if ($estConnecte) {
                    ?><img id="accueil_ligne2" class="edit_text edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <p>
                    <?php echo nl2br($lignes[1]);?>
                </p>
            </div>
        </div>
        <div class="ligne ligne-orange">
            <div class="left texte">
                <?php if ($estConnecte) {
                    ?><img id="accueil_ligne3" class="edit_text edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <p>
                    <?php echo nl2br($lignes[2]);?>
                </p>
            </div>
            <div class="right">
                <?php if ($estConnecte) {
                    ?><img id="accueil_image_ligne3" class="edit_doc edit_block" src="donnees/img/edit.png" /><?php
                }?>
                <img src="donnees/img/<?php echo $images[2]?>" alt="" />
            </div>
        </div>
    </div>
