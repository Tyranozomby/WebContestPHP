<?php
    require("data/fpdf184/fpdf.php");

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
        $pdf = new FPDF();

        $pdf -> Addpage();
        $pdf->SetFont('Arial','B',16);

        $x=$pdf->GetX();
        $pdf -> MultiCell(100,10,utf8_decode("Libellé"),"T",'C');
        $y=$pdf->GetY();
        $pdf -> SetXY($x+100,$y-10);

        $x=$pdf->GetX();
        $pdf -> MultiCell(50,10,utf8_decode("Dénomination"),"T",'C');
        $y=$pdf->GetY();
        $pdf -> SetXY($x+50,$y-10);

        $pdf -> MultiCell(40,10,utf8_decode("Réserver \npar"),"T",'C');

        $pdf -> line(10,30,200,30);

        $f = fopen("data/elements.csv", "r");fgetcsv($f,1000,",");
        $pdf->SetFont('Arial',"",16);
        $y=0;
        while (($row = fgetcsv($f,1000,","))) {
            $posy=$pdf->GetY();;

            $x=$pdf->GetX();
            $pdf -> MultiCell(100,10,utf8_decode($row[0]),"",'C');
            if($posy<($pdf->GetY()-$y))$posy = $pdf->GetY();
            $y=$pdf->GetY();
            $pdf -> SetXY($x+100,$y-10);
            
            $x=$pdf->GetX();
            $pdf -> MultiCell(50,10,utf8_decode($row[1]),"",'C');
            if($posy<($pdf->GetY()-$y))$posy = $pdf->GetY();
            $y=$pdf->GetY();
            $pdf -> SetXY($x+50,$y-10);
            
            if($row[2] == "") $pdf -> MultiCell(40,10,"personne","",'C');
            else $pdf -> MultiCell(40,10,utf8_decode($row[2]),"",'C');

            $pdf -> line(10,$posy,200,$posy);
        }
        fclose($f); 

        $pdf -> line(10,$y,200,$y);
        $pdf -> line(10,10,10,$y);
        $pdf -> line(110,10,110,$y);
        $pdf -> line(160,10,160,$y);
        $pdf -> line(200,10,200,$y);

        $pdf->Output("D","Donnee_du_".date("d.m.y-g.i").".pdf");
    }
    //header('Location: admin.php');
?>