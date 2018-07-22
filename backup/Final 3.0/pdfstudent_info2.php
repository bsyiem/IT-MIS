<?php
include_once "db.php";
include_once "pdftable.php";

$pdf=new tableGen('P');
$pdf->AddPage();
$batch=$_POST['batch'];
$course=$_POST['course'];
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,"$course I.T Batch $batch",0,1,'L'); 
$pdf->SetFont('Arial','',9);
$header=array('Roll Number','First Name','Last Name');
$w=array(21,41,24);
$sql=mysql_query("select * from student where batch='$batch' and course='$course'",$conn);

$i=0;
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	$data[$i]=$res[0];
	$i++;
	$data[$i]=$res[4];
	$i++;
	$data[$i]=$res[5];
	$i++;
}
$no=count($data);
$pdf->buildTable($w,4,$header,$data);
$pdf->Output();
mysql_close($conn);
?>

