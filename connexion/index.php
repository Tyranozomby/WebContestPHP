<!--Connexion prof/admin + création compte + captcha-->

<?php

echo "<h1>Connexion</h1>";

echo "<form method='post' action='action-login.php'>
<label>Identifiant</label><input type='text' name='login'><br><br>
<label>Mot de passe</label><input type='password' name='mdp'><br><br>
<input type='submit' value='Connexion'>
</form>";

echo "<br><br><p>Première connexion ? <a href='inscription.php'>Incrivez-vous</a></p>";

?>