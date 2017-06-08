<form method="post" action="">
    Nouveau mot de passe : <input type="password" name="nmdp" >
    Verification mot de passe : <input type="password" name="vmdp" >
    <input type="submit" name="submit" value=" Envoyer ">
</form>

<?php if (isset($errlog)): ?>
    <div>Veuillez changer de mot de passe!</div>
<?php endif;
    
