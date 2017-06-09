
<div class="container container_edt">

    <h3> <?php
        echo $titres[0];
        modeAdmin($estConnecte, "HEDT_pdf_1", "edit_doc");
        ?></h3>

    <iframe id="src"  src="<?php echo $pdfs[0] ?>" alt=”pdf” ></iframe>

    <!--    <br>
        <hr>
        <br>-->

    <h3> <?php echo $titres[1];
        modeAdmin($estConnecte, "HEDT_pdf_2", "edit_doc");
        ?> </h3>

    <iframe id="src"  src="<?php echo $pdfs[1] ?>" alt=”pdf” ></iframe>

</div>