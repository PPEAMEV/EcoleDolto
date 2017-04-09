<?php
include_once 'ihm/header.php';
$ligne = footer($fichier);
$LES_EDT = getPdfs($fichier);
?>


        <div class="container">

        <?php  foreach($LES_EDT as $edt){  ?>
        <h3><?php echo $edt[0] ?></h3>
                
        <iframe id="edt"  src="<?php echo $edt[1]  ?>" alt=”pdf” ></iframe>

        <br>
        <hr>
        <br>

                <?php } ?>
     </div>




<?php
include_once 'ihm/footer.php';