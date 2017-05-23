
<!-- Fenêtre modale générale pour le texte -->
<!-- The Modal -->
<div id="modal_texte" class="modal" > 
    <!-- Modal content -->
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Modifier l'article</h4>
       </div>
<!--    <div class="col-md-12">
            <div class="row"> -->
                <form id="form_text" class="form-horizontal well" action="<?php echo $url;?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="form-group">
                            <label for="contenu" class="col-lg-2 control-label">Contenu</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="contenu" name="content" placeholder="Contenu de l'article"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>

                        <input id="id_hidden_text" type="hidden" name="id_ligne" />

                    </fieldset>
                </form>
                <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
    <!--        </div>
        </div> -->
    </div>
</div>
