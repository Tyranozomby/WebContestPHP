<?php
session_start();


if (!isset($_SESSION["login"])) {
    header("location: ./");
}

function get_reservation()
{
    $f = fopen("data/elements.csv", "r") or die("Aucun fichier trouvé");

    fgetcsv($f) or die("Fichier vide");
    while ($line = fgetcsv($f)) {
        if ($line[2] == $_SESSION["login"]) {
            fclose($f);
            return $line[0];
        }
    }
    fclose($f);
    return false;
}

function get_all_elements()
{
    $f = fopen("data/elements.csv", "r") or die("Aucun fichier trouvé");

    fgetcsv($f) or die("Fichier vide");
    while ($elements = fgetcsv($f)) {
        $total[] = $elements;
    }
    fclose($f);
    return $total ?? false;
}

function print_elements($elements)
{

    echo "<table class='table'>";
    echo "<thead><tr><th>Libellé</th><th>Dénomination</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    foreach ($elements as $line) {
        echo "<tr>";
        echo "<td>$line[0]</td>";
        echo "<td>$line[1]</td>";

        echo "<td>";
        if (!get_reservation()) {
            if (!$line[2]) {
                echo "<button class='btn btn-primary' type='submit' name='reservation' value='$line[1]'>Réserver</button>";
            } else {
                echo "<p>Déjà réservé</p>";
            }
        } else {
            if ($line[2] == $_SESSION["login"]) {
                echo "<p><b>Votre réservation</b></p>";
            } else {
                echo "<p>Vous avez déjà réservé</p>";
            }
        }
        echo "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}


$elements = get_all_elements() or die("Aucun élément réservable ou réservé");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mes Outils - Prof</title>
    <link rel="stylesheet" href="bootstrap.css"/>
    <script>
        function close_alert(alert) {
            alert.parentNode.remove();
        }
    </script>
</head>
<body>

<?php
if (isset($_GET["id"]) and $_GET["id"] == 1) {
    ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" onclick="close_alert(this)"></button>
        <a><strong>Réservé !</strong> Votre réservation a bien été effectuée</a>
    </div>
    <?php
}
?>
<button onclick="location.href = 'connexion/logout.php'" class="btn btn-secondary float-end m-3">Se Déconnecter</button>

<div class="m-5 mt-2">

    <form action="action-prof.php" method="post">
        <?php
        print_elements($elements);
        ?>
    </form>
</div>

<?php
if ($res = get_reservation()) {
    ?>
    <div class="text-center">
        <form action="action-prof.php" method="post">
            <h2>Votre réservation :</h2>
            <?php
            echo "<strong>$res</strong>";
            ?>
            <br/>
            <button class="btn btn-primary mt-3" type="submit" name="rendre">Rendre</button>
        </form>
    </div>
    <?php
}
?>
</body>
</html>

