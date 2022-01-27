<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./");
}
$login = $_SESSION["login"];

if (isset($_POST["reservation"])) {
    $f = fopen("data/elements.csv", "r") or die("Aucun fichier trouvé");

    $content = "";
    while ($line = fgetcsv($f)) {
        if ($line[1] == $_POST["reservation"]) {
            if ($line[2] == "") {
                $content .= $line[0] . "," . $line[1] . "," . $login . "\n";
            }
        } else {
            $content .= $line[0] . "," . $line[1] . "," . $line[2] . "\n";
        }
    }
    fclose($f);
    print_r($content);

    $f = fopen("data/elements.csv", "w");
    fputs($f, $content);
    fclose($f);

} elseif (isset($_POST["rendre"])) {
    $f = fopen("data/elements.csv", "r") or die("Aucun fichier trouvé");

    $content = "";
    while ($line = fgetcsv($f)) {
        if ($line[2] == $login) {
            $content .= $line[0] . "," . $line[1] . ",\n";
        } else {
            $content .= $line[0] . "," . $line[1] . "," . $line[2] . "\n";
        }
    }
    fclose($f);
    print_r($content);

    $f = fopen("data/elements.csv", "w");
    fputs($f, $content);
    fclose($f);
}
header("Location: prof.php?id=1");
