<?php
session_start();
include_once "db.php";
include_once "pdftable.php";
include_once "checker.php";

if($av==0 && $cv==0 && $tv==0)
{
	header("location:index.php");
	exit;
}

$pdf=new tableGen('L');
$pdf->AddPage();
$batch=$_POST['batch'];
$course=$_POST['course'];
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,"$course I.T Batch $batch",0,1,'L'); 
$pdf->SetFont('Arial','',9);
$header=array('Roll Number','Student ID Number','First Name','Last Name','Gender','Date_of_Birth(yyyy/mm/dd)','Nationality','Religion','Caste');
$w=array(21,37,41,24,16,43,60,18,10);
$sql=mysql_query("select * from student where batch='$batch' and course='$course'",$conn);

$i=0;
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	for($j=0;$j<24;$j++)
	{
		if($j==0 || $j==1 || $j==4 || $j==5 || $j==6 || $j==7 || $j==18 || $j==19 || $j==20)
		{
			$data[$i]=$res[$j];
			$i++;
		}
	}
}
$no=count($data);
$pdf->buildTable($w,4,$header,$data);
$pdf->Output();
mysql_close($conn);
?>

