
<section class="container_moyenne_section">
    <div class="section">
        <h1>
            <?php echo nl2br($lignes[3]); ?>
            <?php modeAdmin($estConnecte, "ms_presentation_section", "edit_text") ?>
        </h1>
        <p>
            <?php echo nl2br($lignes[4]); ?>
            <?php modeAdmin($estConnecte, "ms_phrase_section", "edit_text") ?>
        </p>
    </div>
    <div class="center-block">
        <div class="maitresse">
            <?php modeAdmin($estConnecte, "ms_image_maitresse", "edit_doc") ?>
            <img src="donnees/img/<?php echo $images[0] ?>" alt="" />
            <p>
                <?php echo nl2br($lignes[0]); ?>
                <?php modeAdmin($estConnecte, "ms_maitresse", "edit_text") ?>
            </p>
        </div>
    </div>
    <div class="container container_accueil">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <?php modeAdmin($estConnecte, "ms_ligne1", "edit_text edit_block") ?>
                <p><?php echo nl2br($lignes[1]); ?></p>
            </div>
            <div class="right">
                <?php modeAdmin($estConnecte, "ms_image_ligne1", "edit_doc edit_block") ?>
                <img src="donnees/img/<?php echo $images[1] ?>" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <?php modeAdmin($estConnecte, "ms_image_ligne2", "edit_doc edit_block") ?>
                <img src="donnees/img/<?php echo $images[2] ?>" alt="" />
            </div>
            <div class="right texte">
                <?php modeAdmin($estConnecte, "ms_ligne2", "edit_text edit_block") ?>
                <p><?php echo nl2br($lignes[2]); ?></p>
            </div>
        </div>
    </div>
</section>
