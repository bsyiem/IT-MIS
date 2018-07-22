<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
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
if($revision_year>$batch)
{
	header("Location:attnerror.php");
	exit;
}
$chksem=mysql_num_rows(mysql_query("select * from subject where scode ='$scode' and revision_year ='$revision_year' and sem='$sem'",$conn));
if($chksem==0)
{
	header("Location:attnerror.php");
	exit;
}

$chkprac=mysql_result(mysql_query("select theory_practical from subject where scode= '$scode' and revision_year='$revision_year'",$conn),0);
if($chkprac=='p')
{
	header("Location:marksinsertsesprac1.php?scode=$scode&revision_year=$revision_year&sem=$sem&course=$course&batch=$batch");
	exit;
}
?>
<html>
<head> 
<title>Internal Marks Insertion</title>
</head>
<body>
<h1>Internal Marks Insertion</h1>
<br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr width="100%">
<b><?php echo "$sem semester $course Subject code: $scode($revision_year)"; ?></b><br><br>
<form method="post" action="marksinsertses2.php">
<input type="checkbox" style = "display:none;" name = "scode" value ="<?php echo $scode; ?>" checked>
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<table border>
<tr><th>Roll No.</th><th>Name</th><th>Sessional 1</th><th>Sessional 2</th><th>Sessional 3</th><th>Quiz 1</th><th>Quiz 2</th><th>Quiz 3</th><th>Assignment 1</th><th>Assignment 2</th><th>Assignment 3</th><th>Attendance Marks</th></tr>
<?php
$chkelective=mysql_num_rows(mysql_query("select * from elective where scode = '$scode' and revision_year='$revision_year'",$conn));
if($chkelective==0)
{
	$sql=mysql_query("select fname,lname,rollno from student where batch='$batch' and course = '$course'",$conn) or die("ERROR: ".mysql_error());
	while($res=mysql_fetch_array($sql,MYSQL_NUM))
	{
		echo "<tr><td>".$res[2]."</td><td>".$res[0]." ".$res[1]."</td>";
		$chkpresent=mysql_num_rows(mysql_query("select * from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn));
		if($chkpresent==0)
		{
			mysql_query("insert into sessional(rollno,scode,revision_year) values('$res[2]','$scode','$revision_year')",$conn) or die("Error: ".mysql_error());
		}
		$s1=mysql_result(mysql_query("select s1 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_1\" value=\"".$s1."\"></td>";
		$s2=mysql_result(mysql_query("select s2 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_2\" value=\"".$s2."\"></td>";
		$s3=mysql_result(mysql_query("select s3 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_3\" value=\"".$s3."\"></td>";
		$q1=mysql_result(mysql_query("select q1 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_4\" value=\"".$q1."\"></td>";
		$q2=mysql_result(mysql_query("select q2 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_5\" value=\"".$q2."\"></td>";
		$q3=mysql_result(mysql_query("select q3 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_6\" value=\"".$q3."\"></td>";
		$a1=mysql_result(mysql_query("select a1 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_7\" value=\"".$a1."\"></td>";
		$a2=mysql_result(mysql_query("select a2 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_8\" value=\"".$a2."\"></td>";
		$a3=mysql_result(mysql_query("select a3 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_9\" value=\"".$a3."\"></td>";
		$atn_marks=mysql_result(mysql_query("select atn_marks from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_10\" value=\"".$atn_marks."\"></td>";
	}
}
else
{
	$sql=mysql_query("select rollno from elective where scode='$scode' and revision_year='$revision_year'",$conn);
	while($chkroll=mysql_fetch_array($sql))
	{
		
		$res=mysql_fetch_array(mysql_query("select fname,lname from student where rollno='$chkroll[0]' and batch='$batch'",$conn));
		
		if($res)
		{
			echo "<tr><td>".$chkroll[0]."</td><td>".$res[0]." ".$res[1]."</td>";
		
			$chkpresent=mysql_num_rows(mysql_query("select * from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn));
			if($chkpresent==0)
			{
				mysql_query("insert into sessional(rollno,scode,revision_year) values('$chkroll[0]','$scode','$revision_year')",$conn) or die("Error: ".mysql_error());
			}
			$s1=mysql_result(mysql_query("select s1 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_1\" value=\"".$s1."\"></td>";
			$s2=mysql_result(mysql_query("select s2 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_2\" value=\"".$s2."\"></td>";
			$s3=mysql_result(mysql_query("select s3 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_3\" value=\"".$s3."\"></td>";
			$q1=mysql_result(mysql_query("select q1 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_4\" value=\"".$q1."\"></td>";
			$q2=mysql_result(mysql_query("select q2 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_5\" value=\"".$q2."\"></td>";
			$q3=mysql_result(mysql_query("select q3 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_6\" value=\"".$q3."\"></td>";
			$a1=mysql_result(mysql_query("select a1 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_7\" value=\"".$a1."\"></td>";
			$a2=mysql_result(mysql_query("select a2 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_8\" value=\"".$a2."\"></td>";
			$a3=mysql_result(mysql_query("select a3 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_9\" value=\"".$a3."\"></td>";
			$atn_marks=mysql_result(mysql_query("select atn_marks from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_10\" value=\"".$atn_marks."\"></td>";		
		}	
		else
		{
			header("Location:attnerror.php");
		}	
	}
}
mysql_close();
?>
</table>
<input type="submit" value="submit">
</form>

