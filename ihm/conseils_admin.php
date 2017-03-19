<?php
include_once 'ihm/header.php';
$ligne = footer($fichier);
$conseils = getConseils($fichier);
?>


<div id="modal_ajout" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="my_form" class="form-horizontal well" method="post" action="index.php?uc=conseils&action=ajoutXml" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajouter un conseil d'école</legend>

                <div class="form-group">
                    <label for="contenu" class="col-lg-2 control-label">Date</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="1" id="contenu_date" name="date" placeholder="Date du conseil d'école"></textarea>
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


<div id="dialog-confirm" title="Confirmation de la suppression" style="display:none;">
  <p>
    <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
    Etes-vous sûr de vouloir supprimer cet élément ?
    </p>
</div>


<div class="container container_conseils">
    <div>
        <img id="conseil_ajout" class="ajout" src="donnees/img/plus.png" />
    </div>
    <table>
        <tr>
            <th>Date du conseil</th> 
            <th>Télécharger</th>
            <th><img src="donnees/img/settings_icon.png"/></th>
        </tr>
        <?php foreach ($conseils as $conseil) { ?>
            <tr>
                <td><?php echo $conseil[0]?></td>  
                <td><a href="<?php echo LIEN_PDF.$conseil[1]?>"><?php echo $conseil[1]; ?></a></td>
                <td><img id="<?php echo $conseil[1];?>" class="edit" src="donnees/img/edit.png" /><a class="confirmModal" href="index.php?uc=conseils&action=supprimer&id='<?php echo $conseil[1];?>'"><img class="edit" src="donnees/img/delete_icon.png" /></a></td>
            </tr> <?php
        }
        ?>
            
    </table>
</div>



<?php
include_once 'ihm/footer_admin.php';
