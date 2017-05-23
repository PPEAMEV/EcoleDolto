

<section class="container_petite_section">
    <div class="section">
        <h1>          
            <?php echo nl2br($lignes[3]); ?>
            <img id="ps_presentation_section" class="edit_text" src="donnees/img/edit.png" />
        </h1>
        <p>
            <?php echo nl2br($lignes[4]); ?>
            <img id="ps_phrase_section" class="edit_text" src="donnees/img/edit.png" />
        </p>       
    </div>
    <div class="center-block">
        <div class="maitresse">
            <img id="ps_image_maitresse" class="edit_doc edit_block" src="donnees/img/edit.png" />
            <img src="donnees/img/<?php echo $images[0] ?>" alt="" />
            <p>
                <?php echo nl2br($lignes[0]); ?>
                <img id="ps_maitresse" class="edit_text" src="donnees/img/edit.png" />      
            </p>
            
        </div>
    </div>
    <div class="container container_accueil">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <img id="ps_ligne1" class="edit_text edit_block" src="donnees/img/edit.png" />
                <p><?php echo nl2br($lignes[1]); ?></p>
            </div>
            <div class="right">
                <img id="ps_image_ligne1" class="edit_doc edit_block" src="donnees/img/edit.png" />
                <img src="donnees/img/<?php echo $images[1] ?>" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <img id="ps_image_ligne2" class="edit_doc edit_block" src="donnees/img/edit.png" />
                <img src="donnees/img/<?php echo $images[2] ?>" alt="" />
            </div>
            <div class="right texte">
                <img id="ps_ligne2" class="edit_text edit_block" src="donnees/img/edit.png" />
                <p><?php echo nl2br($lignes[2]); ?></p>
            </div>
        </div>
    </div>
</section>