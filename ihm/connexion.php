

<div id="connexion" class="container">
    <h1>Connexion</h1>
    <form id="formConnexion" name="formConnexion" action="index.php?uc=connexion&action=valideConnexion" method="POST">
        <p>
            <label for="user" form="formConnexion">Utilisateur: </label>
            <input id="login" type="text" name="login">
        </p>
        <p>
            <label for="mdp" form="formConnexion">Mot de passe: </label>
            <input id="mdp" type="password" name="mdp">
        </p>
        <input class="bouton" type="submit" value="Valider" name="valider">
        <input class="bouton" type="reset" value="Annuler" name="annuler">
    </form>
</div>

<?php
if ($err_connexion) {
    ?> <div id="err_connexion">Erreur de mot de passe ou de login, veuillez réessayez.</div><?php
}


