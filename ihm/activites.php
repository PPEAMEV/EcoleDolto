

<div class="container">
    <div class="ligne ligne-rouge">
        <div id="slide" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#slide" data-slide-to="0" class="active"></li>
                <li data-target="#slide" data-slide-to="1"></li>
                <li data-target="#slide" data-slide-to="2"></li>
                <li data-target="#slide" data-slide-to="3"></li>
            </ol>  
            <div class="carousel-inner" role="listbox">
                <div class="item active">
              <?php modeAdmin($estConnecte, "slide_image_1", "edit_doc") ?>
                    <img class="center-block" src="<?php echo $images[0]; ?>"
                         style="" alt="activité" />

                    <div class="carousel-caption">
                        <h2><?php echo $titres[0]; ?>
                            <?php modeAdmin($estConnecte, "slide_titre_1", "edit_text") ?></h2>
                        <p class="lead"><?php echo $texts[0]; ?>
                            <?php modeAdmin($estConnecte, "slide_text_1", "edit_text") ?></p>
                    </div>
                </div>

                <div class="item">
                    <?php modeAdmin($estConnecte, "slide_image_2", "edit_doc") ?>
                    <img class="center-block" src="<?php echo $images[1]; ?>" style=""
                         alt="activité">
                    <div class="carousel-caption">
                        <h1><?php echo$titres[1]; ?>
                            <?php modeAdmin($estConnecte, "slide_titre_2", "edit_text") ?></h1>
                        <p class="lead"><?php echo $texts[1]; ?>
                            <?php modeAdmin($estConnecte, "slide_text_2", "edit_text") ?></p>
                    </div>
                </div>

                <div class="item">
                    <?php modeAdmin($estConnecte, "slide_image_3", "edit_doc") ?>
                    <img class="center-block" src="<?php echo $images[2]; ?>"
                         style=""  alt="activité">
                    <div class="carousel-caption">
                        <h1><?php echo $titres[2]; ?>
                            <?php modeAdmin($estConnecte, "slide_titre_3", "edit_text") ?></h1>
                        <p class="lead"><?php echo $texts[2]; ?>
                            <?php modeAdmin($estConnecte, "slide_text_2", "edit_text") ?></p>
                    </div>
                </div>

                <div class="item">
                    <?php modeAdmin($estConnecte, "slide_image_4", "edit_doc") ?>
                    <img class="center-block" src="<?php echo $images[3]; ?>" style=""
                         alt="vacances">
                    <div class="carousel-caption">
                        <h1><?php echo $titres[3]; ?>
                            <?php modeAdmin($estConnecte, "slide_titre_4", "edit_text") ?></h1>
                        <p class="lead"><?php echo $texts[3]; ?>
                            <?php modeAdmin($estConnecte, "slide_text_3", "edit_text") ?></p>
                    </div>

                </div>


            </div>


        </div> 
    </div>
</div>


