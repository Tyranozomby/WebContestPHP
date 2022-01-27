<!--Connexion prof/admin + création compte + captcha-->

<?php

echo "<head><link href='bootstrap.css' rel='stylesheet' type='text/css' media='all'/></head>";

echo "<h1>Connexion</h1>";

echo "<form method='post' action='action-login.php'>
<div class='form-group row'>
<label class='col-sm-2 col-form-label'>Identifiant</label><input type='text' name='login'><br><br>
<label>Mot de passe</label><input type='password' name='mdp'><br><br>
<input class='m-2' type='submit' value='Connexion'>
</div>
</form>";

echo "<br><br><p>Première connexion ? <a href='inscription.php'>Incrivez-vous</a></p>";

?>