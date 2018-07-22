<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
include_once "pdftable.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$sem1=$_POST['sem'];
$sem=strtok($sem1," ");
$course=strtok(" ");
$batch=mysql_result(mysql_query("select batch from semester where sem = '$sem' and course = '$course'",$conn),0);
$chksem=mysql_num_rows(mysql_query("select * from subject where scode='$scode' and revision_year='$revision_year' and sem='$sem' and course='$course'",$conn));
if($chksem==0)
{
	header("Location:attnerror.php");
}

$pdf=new tableGen('P');
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,"$course I.T Semester $sem Subject code: $scode($revision_year)",0,1,'L'); 
$pdf->SetFont('Arial','',9);
$header=array('Roll Number','Name',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ');
$w=array(21,60,10,10,10,10,10,10,10,10,10,10);

$chkelective=mysql_num_rows(mysql_query("select * from elective where scode = '$scode' and revision_year='$revision_year'",$conn));
if($chkelective==0)
{
	$sql=mysql_query("select * from student where batch='$batch' and course='$course'",$conn);

	$i=0;
	while($res=mysql_fetch_array($sql,MYSQL_NUM))
	{
		$data[$i]=$res[0];
		$i++;
		$data[$i]=$res[4].' '.$res[5];
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]='';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
	}
}
else
{
	$sql=mysql_query("select rollno from elective where scode='$scode' and revision_year='$revision_year'",$conn);
	$i=0;
	while($chkroll=mysql_fetch_array($sql))
	{
		$temp = mysql_fetch_array(mysql_query("select fname,lname from student where rollno='$chkroll[0]' and batch='$batch'",$conn));
		if($temp)
		{
			$data[$i]=$chkroll[0];
			$i++;
			$data[$i]=$temp[0]." ".$temp[1];
			$i++;
		}
		else
		{
			$data[$i]=' ';
			$i++;
			$data[$i]=' ';
			$i++;
		}
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]='';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
		$data[$i]=' ';
		$i++;
	}
}
$no=count($data);
$pdf->buildTable($w,4,$header,$data);
$pdf->Output();
mysql_close($conn);
?>

