<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mes outils - Administrateur</title>
    </head>
    <?php
        session_start();
        if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "admin")){
            //header('Location: connexion/index.php');
        }
    ?>
    <body>
        <header>
            <a href="connexion/logout.php">
                <input type="button" value="Deconnexion">
            </a>
        </header>
        <main>
            <table>
                <tr>
                    <th>Libellé</th>
                    <th>Dénomination</th>
                    <th>Est réservé par</th>
                </tr>
                <?php
                    $f = fopen("data/elements.csv", "r");fgetcsv($f,1000,",");
                    while (($row = fgetcsv($f,1000,","))) {
                        echo"<tr>";
                        foreach ($row as $cell) {
                            if($row[2] == "" && $cell=="") echo"<td>Personne</td>";
                            else echo"<td>".$cell."</td>";
                        }
                        echo"</tr>";
                    }
                    fclose($f);
                ?>
            </table>
            <a href='actionAdmin.php?createPDF'>
                <input type="button" value="Télécharger">
            </a>
            <div>
                <div>Ajouter un élément :</div>
                <form action="actionAdmin.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="ident">Identifiant</label></td>
                            <td><label for="descr">Descriptif</label></td>
                        </tr>
                        <tr>
                            <td><input type="text" id="ident" name="id"></td>
                            <td><input type="text" id="descr" name="descr"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="ok" value="Créer">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
    </body>
</html>