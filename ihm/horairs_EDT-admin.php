    <?php
    include_once 'ihm/header.php';
    $ligne = footer($fichier);
    $edts = getPdfs($fichier);
    ?>



    <div id="modal-conseil" class="modal-custom">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form id="form-conseil" class="form-horizontal well" method="post" action="" enctype="multipart/form-data">
                <fieldset>
             

                    <div class="form-group">
                        <label for="contenu" class="col-lg-2 control-label">Titre</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="1" id="contenu_titre" name="titre" placeholder="Titre de votre fichier"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contenu" class="col-lg-2 control-label">Document PDF</label>
                        <div class="col-lg-10">
                            <input id="pdf" type="file" class="form-control" name="pdf" accept="application/pdf">
                        </div>
                    </div>
                    <div class="form-group">
                        <a id="link-pdf" target="_blank" href="">Voir le document actuel</a>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>

                    <input id="id_hidden" type="hidden" name="id_edt" />
                    <input id="pdf-actuel" type="hidden" name="pdf-actuel" />

                </fieldset>
            </form>
            <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
        </div>
    </div>





    <div class="container container_edt">
      
        <?php  foreach($edts as $edt){  ?>
        
        <h3> <?php echo $edt[0] ?>  <img id="edt_ajout" class="ajout" src="donnees/img/plus.png" /></h3>
                 
        <iframe id="src"  src="<?php echo $edt[1]  ?>" alt=”pdf” ></iframe>
<img   class="edit_pdf" src="donnees/img/small_edit.png" />
        <br>
        <hr>
        <br>

                <?php } ?>
     </div>
        </div>


    <?php
    include_once 'ihm/footer_admin.php';
