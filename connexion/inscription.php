
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Mes outils - inscription</title>
</head>
<body>

  <?php
  if(isset($_GET['id'])){
      switch  ($_GET['id']){
          case '1':
              echo"<p style='color: red;'>mot de passe incorecte</p>";
              break;
    }
  }
  ?>



    <form action='action-insc.php' method='post'>
    <table >
      <tr>
        <td>Identifiant :</td>
        <td><input type='text' name='login'></td>
        <tr>
          <td>mot de passe : </td>
          <td><input type='password' name='mdp'></td>
        </tr>
        <tr>
          <td>confirmer votre mot de passe : </td>
          <td><input type='password' name='mdpConfirm'></td>
        </tr>
        <td><script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <div class="g-recaptcha" data-sitekey="6LfQ4T4eAAAAAJcnH3h8L7ruen23i-T4jHuIZkEF"></div>
        <td><button class="g-recaptcha" data-sitekey="6LfQ4T4eAAAAAJPodQ0tmgGKRf778KcM-lh3cJrx" data-callback='onReCaptchaValid'>Envoyer</button></td>
        <script type="text/javascript">
      function onReCaptchaValid(token) {
        document.getElementById('id_du_formulaire').submit();
      }
    </script>
    
      </tr>
      <tr>
        <td></td>
        <td> <input type='submit' name='bouton' value='Inscrit'></td>
  </td>

      </tr>
    </table>

  </form>
</body>
