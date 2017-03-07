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
                    <label for="contenu" class="col-lg-2 control-label">Nom</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="1" id="contenu_nom" name="nom" placeholder="Nom du fichier"></textarea>
                    </div>
                </div>
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

<div class="container container_conseils">
    <div>
        <img id="conseil_ajout" class="ajout" src="donnees/img/plus.png" />
    </div>
    <table>
        <tr>
            <th>Nom du fichier</th>
            <th>Date</th> 
            <th>Télécharger</th>
        </tr>
        <?php foreach ($conseils as $conseil) { ?>
            <tr>
                <td><?php echo $conseil[0] ?></td>  
                <td><?php echo $conseil[1] ?></td>  
                <td><a href="<?php echo $conseil[2] ?>.pdf">Fichier</a></td> 
            </tr> <?php
        }
        ?>
    </table>
</div>



<?php
include_once 'ihm/footer_admin.php';
