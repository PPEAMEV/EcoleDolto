    <?php
    include_once 'ihm/header.php';
    $ligne = footer($fichier);
    $LES_EDT = getPdfs($fichier);
    ?>


    <div id="modal_ajout" class="modal">
        <!-- Modal content -->
        <div class="modal-content">

            <span class="close">&times;</span>
            <form id="my_form" class="form-horizontal well" method="post" action="index.php?uc=horairs_EDT&action=updateXml" enctype="multipart/form-data">
                <fieldset>
                    <legend>Ajouter votre pdf</legend>


                    <div class="form-group">
                        <label for="contenu" class="col-lg-2 control-label">Titre</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="1" id="contenu_nom" name="titre" placeholder="Titre"></textarea>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="contenu" class="col-lg-2 control-label">Document PDF</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="pdf" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>

                    <input id="id_hidden" type="hidden" name="id_ligne" />

                </fieldset>
            </form>
            <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
        </div>
    </div>
  

    <div class="container container_conseils">
      
        <?php  foreach($LES_EDT as $edt){  ?>
        
        <h3> <?php echo $edt[0] ?><img id="ajoute_pdf" class="ajout" src="donnees/img/small_edit.png" /> </h3>
                 
        <iframe id="src"  src="<?php echo $edt[1]  ?>" alt=”pdf” ></iframe>

        <br>
        <hr>
        <br>

                <?php } ?>
     </div>
        </div>


    <?php
    include_once 'ihm/footer_admin.php';
