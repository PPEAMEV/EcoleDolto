
<!-- Fenêtre modale générale pour l'image et une previsualisation -->
<div id="modal_doc" class="modal" > 
    <!-- Modal content -->
   <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier l'article</h4>
        </div>
        <!--<div class="col-md-8">-->
            <div class="row">
                <form id="form_doc" class="form-horizontal well" method="post" action="<?php echo $url;?>" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="content"   class="col-lg-2 control-label">Fichier</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control"  name="pdf" accept="image/*,application/pdf">
                            </div>
                        </div>

                        <!-- image preview -->

                       <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>

                        <input id="id_hidden_doc" type="hidden" name="id_ligne" />

                    </fieldset>
                </form>
            <!--</div>-->
        </div>
        <div class="col-md-4">
            <div class="form-group" style="margin-bottom: 0;">
                <div id="image_preview" class="col-lg-10 col-lg-offset-2">
                    <div class="thumbnail hidden">
                        <img src="http://placehold.it/5" alt="">
                        <div class="caption">
                            <h4></h4>
                            <p></p>
                            <p><button type="button" class="btn btn-default btn-danger">Annuler</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
