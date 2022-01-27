<?php
    require("data/fpdf184/fpdf.php");

    session_start();
    if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "admin")){
        header('Location: admin.php');
    }
    if(isset($_POST["ajout"])){
        foreach($_POST as $k => $v) $$k = htmlspecialchars($v);
        $f = fopen("data/elements.csv", "a");
        fputcsv($f, array($id,$descr,""));
        fclose($f); 
    }elseif(isset($_GET["createPDF"])){
        $pdf = new FPDF();

        $pdf -> Addpage();
        $pdf->SetFont('Arial','B',16);

        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf -> MultiCell(100,10,utf8_decode("Lebellé"),1,'C');
        $pdf -> SetXY($x+100,$y);

        $x=$pdf->GetX();
        $y=$pdf->GetY();
        $pdf -> MultiCell(50,10,utf8_decode("Dénomination"),1,'C');
        $pdf -> SetXY($x+50,$y);

        $pdf -> MultiCell(40,10,utf8_decode("Réserver \npar"),1,'C');

        $f = fopen("data/elements.csv", "r");fgetcsv($f,1000,",");
        $pdf->SetFont('Arial',"",16);
        while (($row = fgetcsv($f,1000,","))) {
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf -> MultiCell(100,10,utf8_decode($row[0]),1,'C');
            $pdf -> SetXY($x+100,$y);
            
            $x=$pdf->GetX();
            $y=$pdf->GetY();
            $pdf -> MultiCell(50,10,utf8_decode($row[1]),1,'C');
            $pdf -> SetXY($x+50,$y);
            
            if($row[2] == "") $pdf -> MultiCell(40,10,"personne",1,'C');
            else $pdf -> MultiCell(40,10,utf8_decode($row[2]),1,'C');
        }
        fclose($f); 

        $pdf->Output("D","Donnee_du_".date("d.m.y-g.i").".pdf");
    }
    header('Location: admin.php');
?>