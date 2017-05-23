<section class="container" >
    <div id="container_inscription">
        <div id='corps_inscription'>
            <h2>Comment s'inscrire</h2>
            <div>
                <?php modeAdmin($estConnecte, "text_inscription", "edit_block") ?>
                <p><?php echo nl2br($lignes[0]); ?></p>
            </div>
        </div>
        <div id="img_inscription">
            <a target="_blank" href="<?php echo $lignes[1]; ?>"><img src='donnees/img/arrow_icon.png'/></a>
            <?php modeAdmin($estConnecte, "lien_inscription", "") ?>        
        </div>
    </div>
</section>
