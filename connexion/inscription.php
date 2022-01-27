<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Mes outils - inscription</title>
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>


<?php
if (isset($_GET['id'])) {
    switch ($_GET['id']) {
        case '1':
            echo "<p style='color: red;'>Mot de passe incorrect</p>";
            break;
        case '2':
            echo "<p style='color: red;'>Login déjà existant</p>";
            break;
        case '3':
            echo "<p style='color: red;'>Captcha incorrect</p>";
            break;
    }
}
?>
<div class="m-5">
    <h1 class="mb-4">Inscription professeur</h1>
    <form action='action-insc.php' method='post'>
        <div class="form-floating w-25 mt-2">
            <input type='text' id="login" name='login' class="form-control" placeholder=" ">
            <label for="login">Identifiant</label>
        </div>
        <div class="form-floating w-25 mt-2">
            <input type='password' id="mdp" name='mdp' class="form-control" placeholder=" ">
            <label for="mdp">Mot de passe</label>
        </div>
        <div class="form-floating w-25 mt-2">
            <input type='password' id="mdpConfirm" name='mdpConfirm' class="form-control" placeholder=" ">
            <label for="login">Confirmer le mot de passe</label>
        </div>
        <div class="form-floating w-25 mt-2">
            <input type='number' id="rep" name='rep' class="form-control" placeholder=" ">
            <label for="login">Captcha (5 + 2)</label>
        </div>
        <br>
        <button type="submit" name="Inscription" class="btn btn-primary btn-lg">Inscription</button>
    </form>
</div>
</body>
</html>
