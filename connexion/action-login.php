<?php

if (isset($_POST['login'], $_POST['mdp'])) {
    $login = $_POST['login'];
    $mdp = md5($_POST['mdp']);

    $file = fopen("../data/users.csv", "r") or die("Impossible de trouver le fichier");
    $line = fgetcsv($file);

    $flag = false;
    while ($line = fgetcsv($file)) {
        if ($login == $line[0] and $mdp == $line[1]) {
            $flag = true;
            session_start();
            $_SESSION['login'] = $login;
            fclose($file);
            if ($login == 'admin')
                header('Location: ../admin.php');
            else
                header('Location: ../prof.php');
        }
    }

    fclose($file);
    if ($flag == false) {
        header('Location: index.php?id=wrong');
    }
} else {
    header('Location: index.php');
}

?>
