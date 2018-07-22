<?php
	session_start();
	include_once("db.php") ;
	include 'checker.php';
	require('fpdf.php');
	include_once('libphp/sem_to_word.php');
	if($av==0 && $cv==0)
	{
		header("location:index.php");
		exit;
	}

	$repeat_sub[0]="";
	$repeat_year[0]="";
	$debarred_sub[0]="";
	$debarred_year[0]="";
//gathering required info

	$rollno = $_POST['rollno'];
	$exam=$_POST['exam'];
//checking if student has payed fees
	$fee=mysql_num_rows(mysql_query("select * from fee where rollno='$rollno' and payed='yes' ",$conn));
	if($fee==0)
	{
		header("Location:feeerror.php");
		exit;
	}
//gathering repeating subjects
	$sql=mysql_query("select scode,revision_year from repeater where rollno='$rollno' and tries <4 and applied='yes' ",$conn);
	$i=0;
	while($res=mysql_fetch_array($sql))
	{
		$repeat_sub[$i]=$res[0];
		$repeat_year[$i]=$res[1];
		$i++;
	}

//gathering repeating subjects
	$sql=mysql_query("select scode,revision_year from debarred where rollno='$rollno'",$conn);
	$i=0;
	while($res=mysql_fetch_array($sql))
	{
		$debarred_sub[$i]=$res[0];
		$debarred_year[$i]=$res[1];
		$i++;
	}
//gather name,registration number,batch and sem
	$res = mysql_fetch_array(mysql_query("select fname,lname,regno,regyear,batch,course from student where rollno='$rollno'",$conn)) or die("ERROR : ".mysql_error());
	$name=$res[0]." ".$res[1];
	$regno=$res[2];
	$regyear=$res[3];
	if($regyear!=0)
	{
		$regyear=substr($regyear,2);
	}
	$batch=$res[4];
	$course=$res[5];
	$sem=mysql_result(mysql_query("select sem from semester where batch=$batch and course='$course'",$conn),0);
	$sem=sem_NumToWord($sem);
//actual generation of admit card
	$pdf=new FPDF();
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(55,5,"");
	$pdf->MultiCell(220,3,"                      ");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
//-----------------------------------------------------------------
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,3,"                       ");
	$pdf->Cell(30,3,"$name");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(60,3,"         ");
	$pdf->Cell(22,3,"$rollno");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(60,3,"              ");
	$pdf->Cell(53,3,"$regno");
	$pdf->Cell(14,3,"  ");
	$pdf->Cell(24,3,"$regyear");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(60,3,"              ");
	$pdf->Cell(15,3,"$sem");

	$pdf->Cell(65,3,"    ");
	$pdf->Cell(30,3,"$exam");
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(60,3,"                       ");
	$pdf->Cell(15,3,"INFORMATION TECHNOLOGY");

	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(20,3," ");
    $pdf->Cell(35,3," Debarred Subject: ");
	$pdf->Cell(4,3," ");
	
	for($i=0;$i<count($debarred_sub);$i++)
	{	
		if($debarred_sub[$i]!="")
		{
			$pdf->Cell(12,3,$debarred_sub[$i]."(".$debarred_year[$i].")" ,0,0,'C');
			$pdf->Cell(10,3," ");
		}
	} 


	$pdf->Ln();
	$pdf->Ln();
	
	$pdf->Cell(20,3," ");
	$pdf->Cell(38,3," Repeater Subject:");
	
	

	for($i=0;$i<count($repeat_sub);$i++)
	{
		if($repeat_sub[$i]!="")
		{
			$pdf->Cell(12,3,$repeat_sub[$i]."(".$repeat_year[$i].")" ,0,0,'C');
			$pdf->Cell(10,3," ");
		}
	}
	$pdf->Output();

	mysql_close();

?>

