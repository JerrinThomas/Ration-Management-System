<?php
include('includes/fpdf.php');
require_once('config.php');
if(!isset($_GET["rno"]))
    die("Error");
$rno=$_GET["rno"];
$sql1="SELECT hof_img,ration_card_no,hofamily,Aadhar_no,shopno,add1,add2,add3,pan_mun_cor,pincode,wardno,house_no,monthly_in,mob_no,taluk,category,no_of_mem from rationcard_holder where ration_card_no='$rno'";
$result=mysqli_query($dbC,$sql1);
$count=mysqli_num_rows($result);
$pt=mysqli_fetch_row($result);




$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',25);
$pdf->setMargins(10,10,10,10);
#$pdf->Cell(40,10,'digital Ration Management System');
$pdf->Cell(0,10,'digital Ration Management System','B',1,'C');

$pdf->SetFont('Times','B',20);
$pdf->Cell(0,15,'Ration Card',0,1,'C');

$pdf->SetFont('Times','B',15);
$pdf->image($pt[0],155,55,30);

$pdf->Cell(20,10,'Ration Card Number : ',0,0,'L');
$pdf->Cell(70,10,$pt[1],0,1,'R');

$pdf->Cell(20,10,'Head of Family : ',0,0,'L');

$pdf->SetFont('Times','',12);
$pdf->Cell(100,10,$pt[2],0,0,'R');
$pdf->SetFont('Times','B',12);
$pdf->Cell(46,10,'Photo',0,1,'R');

$pdf->SetFont('Times','B',15);
$pdf->Cell(20,10,'Aadhar Number : ',0,0,'L');
$pdf->Cell(70,10,$pt[3],0,1,'R');

$pdf->Cell(20,10,'Ration Shop Number : ',0,0,'L');
$pdf->Cell(70,10,$pt[4],0,1,'R');

$pdf->Cell(140,10,'Address 1 : ',0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(140,10,$pt[5],'B',1,'');

$pdf->SetFont('Times','B',15);
$pdf->Cell(0,10,'Address 2 : ',0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[6],'B',1,'');

$pdf->SetFont('Times','B',15);
$pdf->Cell(0,10,'Address 3 : ',0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[7],'B',1,'');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Panchayat/Munpipality/Coorperation : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[8],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Pincode : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[9],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Ward Number : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[10],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'House Number : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[11],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Monthly Income : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[12],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Mobile Number : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[13],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Taluk : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[14],0,1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Category : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[15],'B',1,'R');

$pdf->SetFont('Times','B',12);
$pdf->Cell(0,10,'Number Of Family Members : ','B',0,'L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,$pt[16],0,1,'R');


    $sql="SELECT mem_name,age,Aadhar_no FROM cardholder_and_mem WHERE ration_card_no='$rno'";
    $re=mysqli_query($dbC,$sql);
  if(mysqli_num_rows($re)>4)
      $pdf->AddPage();
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,15,'Details Of Members',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(63,7,'Name Of Member',1);
$pdf->Cell(63,7,'Age',1);
$pdf->Cell(63,7,'Aadhar Number',1);
$pdf->ln();
$pdf->SetFont('Times','',12);
  while($r=mysqli_fetch_row($re)){
                 $pdf->Cell(63,6,$r[0],1);
                 $pdf->Cell(63,6,$r[1],1);
                 $pdf->Cell(63,6,$r[2],1);
                 $pdf->ln();
}


$pdf->Output();
?>
