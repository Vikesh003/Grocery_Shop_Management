<?php 
       require "fpdf/fpdf.php";
       $con =  mysqli_connect("localhost","root","","project1");
     
       class myPDF extends FPDF{    
        function header(){
            $this->Image('images/icon/loginlogo.png',10,6);
            $this->SetFont('Helvetica','B',45);
            $this->Cell(280,20,'Dealer Details',0,0,'C');
            $this->Ln();
            $this->Ln();
            
        } 

        function footer(){
            $this->SetY(-15);
            $this->SetFont('Helvetica','',8);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        
        function headerTable(){
            $this->SetFont('Times','B',12);
            $this->Cell(40,10,'Sr. No',1,0,'C');
            $this->Cell(80,10,'Name',1,0,'C');
            $this->Cell(70,10,'Email',1,0,'C');
            $this->Cell(50,10,'Category',1,0,'C');
            $this->Cell(40,10,'Status',1,0,'C');
            $this->Ln();
        }

        function viewTable($con){
           $this->SetFont('Arial','I',10);
           $q = "SELECT * FROM `tbl_dealer`";

           $res = mysqli_query($con,$q);
           $a=0;
           while($data = mysqli_fetch_assoc($res)){
            $a+=1;
                $this->Cell(40,10,$a,1,0,'C');
                $this->Cell(80,10,$data["DEALER_NAME"],1,0,'C');
                $this->Cell(70,10,$data["DEALER_EMAIL"],1,0,'C');
                $this->Cell(50,10,$data["DEALER_CATEGORY"],1,0,'C');
                $this->Cell(40,10,$data["DEALER_STATUS"],1,0,'C');
                $this->Ln();
           }
        }
    }
       $pdf = new myPDF();
       $pdf->AliasNbPages();
       $pdf->AddPage('L','A4',0);
       $pdf->headerTable();
       $pdf->viewTable($con);
       $pdf->Output();
?>