<section class="container" >
    <div id="container_inscription">
        <div id='corps_inscription'>
            <h2>Comment s'inscrire</h2>
            <div>
                <?php if ($estConnecte) {
                    ?><img id="text_inscription" class="edit_text edit_block" src="donnees/img/edit.png" /><?php }
                ?>
                <p><?php echo nl2br($lignes[0]); ?></p>
            </div>
        </div>
        <div id="img_inscription">
            <a target="_blank" href="<?php echo $lignes[1]; ?>"><img src='donnees/img/arrow_icon.png'/></a>
            <?php if ($estConnecte) {
                ?><img id="lien_inscription" class="edit_text" src="donnees/img/edit.png" /><?php }
            ?>
        </div>
    </div>
</section>
