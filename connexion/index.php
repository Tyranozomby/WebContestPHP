<!--Connexion prof/admin + création compte + captcha-->

<?php

echo "<head><link href='bootstrap.css' rel='stylesheet' type='text/css' media='all'/></head>";

echo "<h1>Connexion</h1>";

echo "<form method='post' action='action-login.php'>
<label for='login' class='form-label mt-4'>Identifiant</label>
<input type='text' class='form-control' id='login' placeholder='Login' name='login'>
<br><br>
<label for='mdp'>Mot de passe</label>
<input type='password' class='form-control' id='mdp' placeholder='Mot de passe' name='mdp'>
<br><br>
<input class='btn btn-primary' type='submit' value='Connexion'>
</form>";

echo "<br><br><p>Première connexion ? <a href='inscription.php'>Incrivez-vous</a></p>";

?>
