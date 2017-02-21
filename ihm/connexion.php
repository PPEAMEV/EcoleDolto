<?php 

include_once("header.php");

?>

<form name="formConnexion" action="demandeConnexion" method="POST">
    <p>
        <label for="user"></label>
        <input id="login" type="text" name="login">
    </p>
    <p>
        <label for="mdp"></label>
        <input id="mdp" type="text" name="mdp">
    </p>
    <input type="submit" value="Valider" name="valider">
    <input type="reset" value="Annuler" name="annuler">
</form>

<?php

include_once("footer.php");

?>