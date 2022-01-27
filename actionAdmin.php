<?php
    session_start();
    if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "admin")){
        //header('Location: admin.php');
    }
    if(isset($_POST["ajout"])){
        foreach($_POST as $k => $v) $$k = htmlspecialchars($v);
        $f = fopen("data/elements.csv", "a");
        fputcsv($f, array($id,$descr,""));
        fclose($f); 
    }elseif(isset($_GET["createPDF"])){

        require("data/fpdf184/fpdf.php");
        $pdf = new FPDF();

        $pdf -> Addpage();
        $pdf->SetFont('Arial','B',16);
        
        $pdf -> MultiCell(100,20,"Lebellé",1,'C');
        $pdf -> MultiCell(50,20,"Dénomination",1,'C');
        $pdf -> MultiCell(30,20,"Réserver \n par",1,'C');
        
        $f = fopen("data/elements.csv", "r");fgetcsv($f,1000,",");
        $pdf->SetFont('Arial',"",16);
        while (($row = fgetcsv($f,1000,","))) {
            $pdf -> MultiCell(100,10,$row[0],1,0,'C');
            $pdf -> MultiCell(50,10,$row[1],1,0,'C');
            if($row[2] == "") $pdf -> MultiCell(30,10,"personne",1,1,'C');
            else $pdf -> MultiCell(30,10,$row[2],1,1,'C');
        }

        fclose($f); 

        $pdf->Output("D","Donnee_du_".date("d.m.y-g.i").".pdf");
    }
    //header('Location: admin.php');
?>