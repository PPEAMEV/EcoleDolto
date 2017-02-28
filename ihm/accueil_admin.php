<?php
include_once("header.php");
$lignes = accueil($fichier);

?>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="col-md-8">
                <div class="row">
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
                                <label for="contenu" class="col-lg-2 control-label">Illustration</label>
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

                            <input id="id_hidden" type="hidden" name="id_ligne" />
                            
                        </fieldset>
                    </form>
                    <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
            </div>
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
    
    <div class="container">
        <div class="ligne ligne-rouge">
            <div class="left texte">
                <img id="accueil_ligne1" class="edit" src="donnees/img/edit.png" />
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
                <img id="accueil_ligne2" class="edit" src="donnees/img/edit.png" />
                <p>
                    <?php echo $lignes[1];?>
                </p>
            </div>
        </div>
        <div class="ligne ligne-orange">
            <div class="left texte">
                <img id="accueil_ligne3" class="edit" src="donnees/img/edit.png" />
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
