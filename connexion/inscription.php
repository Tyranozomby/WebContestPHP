
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Mes outils - inscription</title>
</head>
<body>

<h1>Inscription professeur</h1>

<?php
    if(isset($_GET['id'])){
        switch  ($_GET['id']){
            case '1':
                echo"<p style='color: red;'>Mot de passe incorrect</p>";
                break;
            case '2':
                echo"<p style='color: red;'>Login déjà existant</p>";
                break;
            case '3':
                echo"<p style='color: red;'>Captcha incorrect</p>";
                break;
        }
    }
?>

<form action='action-insc.php' method='post'>
    <table>
        <tr>
        <td>Identifiant</td>
        <td><input type='text' name='login'></td>
        <tr>
          <td>Mot de passe</td>
          <td><input type='password' name='mdp'></td>
        </tr>
        <tr>
          <td>Confirmer votre mot de passe</td>
          <td><input type='password' name='mdpConfirm'></td>
        </tr>

        <tr>
            <td>
<!--        <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
<!--        <div class="g-recaptcha" data-sitekey="6LfQ4T4eAAAAAJcnH3h8L7ruen23i-T4jHuIZkEF"></div>-->
<!--        <button class="g-recaptcha" data-sitekey="6LfQ4T4eAAAAAJPodQ0tmgGKRf778KcM-lh3cJrx" data-callback='onReCaptchaValid'>Inscription</button>-->
<!---->
<!--        <script type="text/javascript">-->
<!--        function onReCaptchaValid(token) {-->
<!--            document.getElementById('id_du_formulaire').submit();-->
<!--        }-->
<!--        </script>-->
                <label>5 + 2</label>
            </td>
            <td>
                <input type="text" name="rep">
            </td>
        </tr>

    </table>
    <br>
    <input type="submit" value="Inscription">
</form>

</body>
</html>
