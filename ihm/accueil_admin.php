<?php
include_once("header.php");
$lignes = accueil($fichier);

?>
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
 <!--           <form id="my_form" method="post" action="process_form.php" enctype="multipart/form-data">
                <h2> Modifiez le titre</h2>
                <input type="text" name="title">
                <h2> Modifier le descriptif<h2>
                <textarea name="content"></textarea>
                <h2> Sélectionner un image</h2>
                <input type="file" name="image" accept="image/*">
                <button type="submit">OK</button>
            </form>     -->
 <?php include_once 'test/upload-apercu_image.html'; ?>
        </div>

    </div>
    <div class="container">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <img id="edit1" class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo $lignes[0];?>
                </p>
            </div>
            <div class="right">
                <img src="http://lorempixel.com/640/480/" alt="" />
            </div>
        </div>
        <div class="ligne ligne-bleu">
            <div class="left">
                <img src="http://lorempixel.com/640/480/" alt="" />
            </div>
            <div class="right texte">
                <img class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo $lignes[1];?>
                </p>
            </div>
        </div>
        <div class="ligne ligne-orange">
            <div class="left texte">
                <img class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo $lignes[2];?>
                </p>
            </div>
            <div class="right">
                <img src="http://lorempixel.com/640/480/" alt="" />
            </div>
        </div>
    </div>

    <?php include_once("footer.php");?>