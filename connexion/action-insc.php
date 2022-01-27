<?php
if (isset($_POST['login'], $_POST['mdp'], $_POST['mdpConfirm'])) {

//    if (isset ($_POST['g-recaptcha-response']) &&! empty ($_POST ['g-recaptcha-response'])) {
//        $secret = '6LfQ4T4eAAAAAJPodQ0tmgGKRf778KcM-lh3cJrx';
//        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
//        $responseData = json_decode ($verifyResponse);
//        if ($responseData-> success) {
//            header('Location: inscription.php?id=3');
//        }
//        else {header('Location: inscription.php?id=4'); }
//    }

    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $mdpConfirm = $_POST['mdpConfirm'];
    $rep = $_POST['rep'];

//    echo $login, $mdp, $mdpConfirm, $rep;

    if ($rep != 7) {
        header('Location: inscription.php?id=3');
    }

    if ($mdp != $mdpConfirm) {
        header('Location: inscription.php?id=1');
    }

    $file = fopen("../data/users.csv", "a") or die("Impossible de trouver le fichier");
    $flag = true;
    while ($line = fgetcsv($file)) {
        if ($login == $line[0])
            $flag = false;
    }
    fclose($file);

    if ($flag) {
        $file = fopen("../data/users.csv", "a") or die("Impossible de trouver le fichier");
        fputcsv($file, [$login, md5($mdp)]);
        fclose($file);
        header('Location: inscription.php');
    } else
        header('Location: inscription.php?id=2');

} else
    header('Location: inscription.php?id=4');

?>
