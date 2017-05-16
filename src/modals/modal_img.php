
<!-- Fenêtre modale générale pour l'image et une previsualisation -->
<div id="modal_img" class="modal"> 
    <!-- Modal content -->
   <div class="modal-content">
        <span class="close">&times;</span>
        <!--<div class="col-md-8">-->
            <div class="row">
                <form id="my_form_img" class="form-horizontal well" method="post" action="index.php?uc=accueil&action=majXml" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Modifier l'image</legend>
                        <div class="form-group">
                            <label for="image" class="col-lg-2 control-label">Illustration</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                        </div>

                        <!-- image preview -->

                       <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>

                        <input id="id_hidden_img" type="hidden" name="id_ligne" />

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
