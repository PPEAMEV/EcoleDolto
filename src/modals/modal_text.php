
<!-- Fenêtre modale générale pour le texte -->
<!-- The Modal -->
<div id="modal_texte" class="modal-custom"> 
    <!-- Modal content -->
   <div class="modal-content">
        <span class="close">&times;</span>
<!--    <div class="col-md-12">
            <div class="row"> -->
                <form id="my_form" class="form-horizontal well" method="post" action="index.php?uc=accueil&action=majXml" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Modifier l'article</legend>

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

                        <input id="id_hidden" type="hidden" name="id_ligne" />

                    </fieldset>
                </form>
                <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
    <!--        </div>
        </div> -->
    </div>
</div>
