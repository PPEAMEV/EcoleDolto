<form id="formConnexion" method="post" action="" onsubmit="return verification()">
    Nouveau mot de passe : <input type="password" name="nmdp" id="nouveau1">
    Verification mot de passe : <input type="password" name="vmdp" id="nouveau2">
    <input type="submit" name="submit" value=" Envoyer ">
</form>

<?php if (isset($errlog)): ?>
    <div>Veuillez changer de mot de passe!</div>
<?php endif;