
<section>


    <div id="modal-conseil" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Un Conseil</h4>
            </div>
            <form id="form-conseil" class="form-horizontal well" method="post" action="" enctype="multipart/form-data">
                <fieldset>
                    <!--<legend>Ajouter un conseil d'école</legend>-->

                    <div class="form-group">
                        <label for="contenu" class="col-lg-2 control-label">Date</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="1" id="contenu_date" name="date" placeholder="Date du conseil d'école"></textarea>
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

                    <input id="id_hidden" type="hidden" name="id-conseil" />
                    <input id="pdf-actuel" type="hidden" name="pdf-actuel" />

                </fieldset>
            </form>
            <div id="result"><pre>Veuillez remplir le formulaire et cliquer sur "Envoyer".</pre></div>
        </div>
    </div>





    <div class="container container_conseils">
        <div>
            <img id="conseil_ajout" class="ajout_conseil" src="donnees/img/plus.png" />
        </div>
        <table>
            <tr>
                <th>Date du conseil</th> 
                <th>Télécharger</th>
                <th><img src="donnees/img/settings_icon.png"/></th>
            </tr>
            <?php foreach ($conseils as $conseil) { ?>
                <tr>
                    <td><?php echo $conseil[0] ?></td>  
                    <td><a target="_blank" href="<?php echo LIEN_PDF . $conseil[1] ?>"><?php echo $conseil[1]; ?></a></td>
                    <td>
                        <img id="<?php echo $conseil[1]; ?>" class="edit_conseil" src="donnees/img/edit.png" />
                        <a class="confirmModalLink" href="index.php?uc=conseils&action=supprimer&id='<?php echo $conseil[1]; ?>'">
                            <img src="donnees/img/delete_icon.png" />
                        </a>
                    </td>
                </tr> <?php
            }
            ?>
        </table>
    </div>




</section>

<div class="modal fade" id="confirmModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Confirmation de la suppression</h3>
            </div>
            <div class="modal-body">
                <p>Etes-vous sûr de vouloir supprimer cet élément ?</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" id="confirmModalNo">Non</a>
                <a href="#" class="btn btn-primary" id="confirmModalYes">Oui</a>
            </div>
        </div>
    </div>
</div>

