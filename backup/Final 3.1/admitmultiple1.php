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
	
	$pdf=new FPDF();
	
	$batch1=$_POST['batch'];
	$exam=$_POST['exam'];
	
	$course=strtok($batch1," ");
	$batch=strtok(" ");
	$sql1=mysql_query("select rollno,fname,lname,regno,regyear from student where batch='$batch' and course='$course'",$conn);
	while($stures=mysql_fetch_array($sql1))
	{
			unset($repeat_sub);
			unset($repeat_year);
			$repeat_sub[0]="";
			$repeat_year[0]="";
			unset($debarred_sub);
			unset($debarred_year);
			$debarred_sub[0]="";
			$debarred_year[0]="";
		$rollno=$stures[0];
		$fee=mysql_num_rows(mysql_query("select * from fee where rollno='$rollno' and payed ='yes'",$conn));
		if($fee>0)
		{
			if($batch<2010)
			{
				$sql=mysql_query("select scode,revision_year from repeater where rollno='$rollno' and tries <7 and applied='yes' ",$conn);
			}
			else
			{
				$sql=mysql_query("select scode,revision_year from repeater where rollno='$rollno' and tries <4 and applied='yes' ",$conn);
			}
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
			$name=$stures[1]." ".$stures[2];
			$regno=$stures[3];
			$regyear=$stures[4];
			if($regyear!=0)
			{
				$regyear=substr($regyear,2);
			}
			$sem=mysql_result(mysql_query("select sem from semester where batch=$batch and course='$course'",$conn),0);
			$sem=sem_NumToWord($sem);
//actual generation of admit card
			$pdf->AddPage();

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(55,5,"");
			$pdf->MultiCell(220,3,"                      ");
			//$pdf->Ln();$pdf->Ln();			
			//$pdf->Ln();
			//$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Ln();
			//$pdf->Ln();
			//$pdf->Ln();
			//$pdf->Ln();
			//$pdf->Ln();
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
			$pdf->Cell(16,3,"  ");
			$pdf->Cell(24,3,"$regyear");
			$pdf->Ln();
			$pdf->Ln();
			//$pdf->Ln();
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
			$pdf->Cell(20,3," ");
			$pdf->Cell(33,3," Debarred Subject: ");
			//$pdf->Cell(4,3," ");
			
			
			for($i=0;$i<count($debarred_sub);$i++)
			{	
				if($debarred_sub[$i]!="")
				{
					$pdf->Cell(21,3,$debarred_sub[$i]."(".$debarred_year[$i].")" ,0,0,'C');
					//$pdf->Cell(10,3," ");
					if($i!=count($debarred_sub)-1)
					{
						$pdf->Cell(3,3,",");
					}
					if($i!=0 && ($i+1)%6==0)
					{
						$pdf->Ln();
						$pdf->Cell(53,3," ");
					}

				}
			} 
		
		
			$pdf->Ln();
			$pdf->Ln();
			
			$pdf->Cell(20,3," ");
			$pdf->Cell(33,3," Repeater Subject:");
			
			
		
			for($i=0;$i<count($repeat_sub);$i++)
			{
				if($repeat_sub[$i]!="")
				{
					$pdf->Cell(21,3,$repeat_sub[$i]."(".$repeat_year[$i].")" ,0,0,'C');
					//$pdf->Cell(1,3," ");
					if($i!=count($repeat_sub)-1)
					{
						$pdf->Cell(3,3,",");
					}
					if($i!=0 && ($i+1)%6==0)
					{
						$pdf->Ln();
						$pdf->Cell(53,3," ");
					}
				}
			}
		}
	}
	$pdf->Output();
	
?>
