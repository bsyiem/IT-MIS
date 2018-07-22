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
}
?>
<html>
<head> 
<title>Attendance Insertion</title>
</head>
<body>
<h1>Attendance Insertion</h1>
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
<form method="post" action="atninsertses2.php">
<input type="checkbox" style = "display:none;" name = "scode" value ="<?php echo $scode; ?>" checked>
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<table border>
<tr><th>Roll No.</th><th>Name</th><th>Attendance 1</th><th>Attendance 2</th><th>Attendance 3</th></tr>
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
		$atn1=mysql_result(mysql_query("select atn1 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_1\" value=\"".$atn1."\"></td>";
		$atn2=mysql_result(mysql_query("select atn2 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_2\" value=\"".$atn2."\"></td>";
		$atn3=mysql_result(mysql_query("select atn3 from sessional where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_3\" value=\"".$atn3."\"></td>";
	}
}
else
{
	$sql=mysql_query("select rollno from elective where scode='$scode' and revision_year='$revision_year'",$conn);
	while($chkroll=mysql_fetch_array($sql))
	{
		echo $chkroll[0];
		$res=mysql_fetch_array(mysql_query("select fname,lname from student where rollno='$chkroll[0]' and batch='$batch'",$conn));
		
		if($res)
		{
			echo "<tr><td>".$chkroll[0]."</td><td>".$res[0]." ".$res[1]."</td>";
		
			$chkpresent=mysql_num_rows(mysql_query("select * from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn));
			if($chkpresent==0)
			{
				mysql_query("insert into sessional(rollno,scode,revision_year) values('$chkroll[0]','$scode','$revision_year')",$conn) or die("Error: ".mysql_error());
			}
			$atn1=mysql_result(mysql_query("select atn1 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_1\" value=\"".$atn1."\"></td>";
			$atn2=mysql_result(mysql_query("select atn2 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_2\" value=\"".$atn2."\"></td>";
			$atn3=mysql_result(mysql_query("select atn3 from sessional where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_3\" value=\"".$atn3."\"></td>";
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

