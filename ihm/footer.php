        <footer>
            <div class="container">
                <h1>Coordonnées:</h1><br>
                Rue des écoles<br>
                56860 Séné<br>
                <span id="tel"><?php echo $ligne; ?>
                    <?php if ($estConnecte) {
                        ?><img id="footer_tel" class="edit_text" src="donnees/img/small_edit.png" /><?php
                    }?>
                </span>
            </div>
        </footer>
    </body>
</html>