<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes outils - Administrateur</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<?php
session_start();
if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "admin")) {
    header('Location: connexion/index.php');
}
?>
<body>
<button onclick="location.href = 'connexion/logout.php'" class="btn btn-secondary float-end m-3">Se
    Déconnecter
</button>
<main>
    <div class="m-5">
        <table class="table">
            <thead>
            <tr>
                <th>Libellé</th>
                <th>Dénomination</th>
                <th>Est réservé par</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $f = fopen("data/elements.csv", "r");
            fgetcsv($f, 1000, ",");
            while (($row = fgetcsv($f, 1000, ","))) {
                echo "<tr>";
                foreach ($row as $cell) {
                    if ($row[2] == "" && $cell == "") echo "<td>Personne</td>";
                    else echo "<td>" . $cell . "</td>";
                }
                echo "</tr>";
            }
            fclose($f);
            ?>
            </tbody>
        </table>
    </div>
    <a href='actionAdmin.php?createPDF'>
        <input type="button" class="btn btn-secondary ms-5" value="Télécharger">
    </a>
    <div class="ms-5">
        <p>Ajouter un élément :</p>
        <form action="actionAdmin.php" method="POST">
            <table style="border: 1px solid black;" class="table w-25">
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
                        <button type="submit" name="ajout" class="btn btn-primary">Créer</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
</body>
</html>