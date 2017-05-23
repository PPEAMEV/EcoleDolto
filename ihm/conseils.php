

<div class="container">
    <table>
        <tr>
          <th>Date du conseil</th> 
          <th>Télécharger</th>
        </tr>
        <?php
        foreach ($conseils as $conseil) {?>
            <tr>
                <td><?php echo $conseil[0]?></td>  
                <td><a target="_blank" href="<?php echo LIEN_PDF.$conseil[1]?>"><?php echo $conseil[1]; ?></a></td>
            </tr> <?php
        }
        ?>
      </table>
</div>
