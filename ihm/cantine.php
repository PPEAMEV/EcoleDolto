
<div class="container">
    <div class="ligne ligne-rouge">
        <div class="left texte">

            <h2>

                <?php echo $titres[0]; ?>  </h2>
               
                
                <?php modeAdmin($estConnecte, "cantine_text_1", "edit_text") ?>
            
            <P>

                <?php echo $texts[0]; ?>  
                <?php modeAdmin($estConnecte, "cantine_text_1", "edit_text") ?>
            </p>    
        </div>

        <div class="right">
            <?php modeAdmin($estConnecte, "cantine_image_1", "edit_doc edit_block") ?>
            <img id="image_cantine" src=" <?php echo $images[0]; ?>" alt="cantine" />
            
        </div>
    </div>
    <div id="img_inscription">
<a target="_blank" href=" <?php echo $line; ?>"><img src='donnees/img/arrow_icon.png'/></a>
<?php modeAdmin($estConnecte, "cantine_line", "edit_text") ?>  
</div>


</div>
