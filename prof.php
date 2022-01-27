<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: ./");
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
    $a_emprunt = a_emprunt();

    echo "<table class='table'>";
    echo "<thead><tr><th>Libellé</th><th>Dénomination</th><th>Action</th></tr></thead>";
    echo "<tbody>";
    foreach ($elements as $line) {
        echo "<tr>";
        echo "<td>$line[0]</td>";
        echo "<td>$line[1]</td>";

        echo "<td>";
        if (!$a_emprunt) {
            if (!$line[2]) {
                echo "<button class='btn btn-primary'>Réserver</button>";
            } elseif ($line[2] == $_SESSION["login"]) {
                echo "<p>Déjà à vous</p>";
            } else {
                echo "<p>Déjà réservé</p>";
            }
        } else {
            echo "<p>Vous avez déjà réservé</p>";
        }
        echo "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

function a_emprunt()
{
    $f = fopen("data/elements.csv", "r") or die("Aucun fichier trouvé");

    fgetcsv($f) or die("Fichier vide");
    while ($elements = fgetcsv($f)) {
        if ($elements[2] == $_SESSION["login"]) {
            fclose($f);
            return true;
        }
    }
    fclose($f);
    return false;
}

$elements = get_all_elements() or die("Aucun élément réservable ou réservé");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mes Outils - Prof</title>
    <link rel="stylesheet" href="bootstrap.css"/>
</head>
<body>
<button onclick="location.href = 'connexion/logout.php'" class="btn btn-secondary float-end m-3">Se Déconnecter</button>

<div class="m-5">
    <?php
    print_elements($elements);
    ?>
</div>
</body>
</html>

