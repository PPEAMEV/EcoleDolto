<?php 

include_once("header.php");

?>

<div class="container">
    <form id="formConnexion" name="formConnexion" action="index.php?uc=connexion&action=valideConnexion" method="POST">
        <p>
            <label for="user">Utilisateur: </label>
            <input id="login" type="text" name="login">
        </p>
        <p>
            <label for="mdp">Mot de passe: </label>
            <input id="mdp" type="password" name="mdp">
        </p>
        <input type="submit" value="Valider" name="valider">
        <input type="reset" value="Annuler" name="annuler">
    </form>
</div>

<?php
if ($err_connexion) {
    ?> <div id="err_connexion">Erreur de mot de passe ou/et de login, veuillez réessayez.</div><?php
}



include_once("footer.php");

?>