
<div class="container">
    <div class="ligne ligne-rouge">
        <div class="left texte">

            <h2>

                <?php echo $titres[0]; ?>  
                <?php modeAdmin($estConnecte, "cantine_text_1", "edit_text") ?>
            </h2>
            <P>

                <?php echo $texts[0]; ?>  
                <?php modeAdmin($estConnecte, "cantine_text_1", "edit_text") ?>
            </p>    
        </div>

        <div class="right">
            <?php modeAdmin($estConnecte, "cantine_image_1", "edit_doc") ?>
            <img id="image_cantine" src=" <?php echo $images[0]; ?>" alt="cantine" />
            
        </div>
    </div>





</div>
