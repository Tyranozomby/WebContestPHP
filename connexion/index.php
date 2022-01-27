<!DOCTYPE html>
<html lang="fr">
<head>
    <link href='../bootstrap.css' rel='stylesheet' type='text/css' media='all'/>
    <title>Mes Outils - Connexion</title>
</head>
<body class="ms-5 mt-4">
<h1 class="mb-4">Connexion</h1>

<form method='post' action='action-login.php'>
    <div class="flex-wrap justify-content-center">
        <div class="form-floating">
            <input type='text' class='form-control w-25' id='login' placeholder=' ' name='login'>
            <label for='login'>Identifiant</label>
        </div>
        <div class="form-floating mt-3">
            <input type='password' class='form-control w-25' id='mdp' placeholder=' ' name='mdp'>
            <label for='mdp'>Mot de passe</label>
        </div>
        <button class='btn btn-primary btn-lg mt-4' type='submit'>Connexion</button>
    </div>
</form>

<br>
<p>Première fois ? <a href='inscription.php'>Inscrivez-vous</a></p>

</body>
</html>