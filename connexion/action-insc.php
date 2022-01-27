<?php
if(isset($_POST['login'],$_POST['mdp'],$_POST['mdpConfirm'])){
    foreach ($_POST as $k => $v){
        $$k=$v;
    }

    if ($mdp==$mdpConfirm){

      $file="../data/users.csv";
      $fp=fopen($file,"a") or die("impossible de trouver le fichier");
      fputcsv($fp,[$login,md5($mdp)]);
      fclose($fp);
        header('location: inscription.php');
    }
    else {
        header('location: inscription.php?id=1');
    }
}

?>
