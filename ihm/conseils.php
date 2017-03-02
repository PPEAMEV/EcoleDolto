<?php
include_once 'ihm/header.php';
$ligne = footer($fichier);
$conseils = getConseils($fichier);
?>

<div class="container">
    <table>
        <tr>
          <th>Nom du fichier</th>
          <th>Date</th> 
          <th>Télécharger</th>
        </tr>
        <?php
        foreach ($conseils as $conseil) {?>
            <tr>
                <td><?php echo $conseil[0]?></td>  
                <td><?php echo $conseil[1]?></td>  
                <td><a href="<?php echo $conseil[2]?>.pdf">Fichier</a></td> 
            </tr> <?php
        }
        ?>
      </table>
</div>



<?php
include_once 'ihm/footer.php';
