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
$chksem=mysql_num_rows(mysql_query("select * from subject where scode='$scode' and revision_year='$revision_year' and sem='$sem' and course='$course'",$conn));
if($chksem==0)
{
	header("Location:attnerror.php");
	exit;
}
$chkprac=mysql_result(mysql_query("select theory_practical from subject where scode= '$scode' and revision_year='$revision_year'",$conn),0);
if($chkprac=='p')
{
	header("Location:marksinsertmidprac1.php?scode=$scode&revision_year=$revision_year&sem=$sem&course=$course&batch=$batch");
	exit;
}
?>
<html>
<head> 
<title>Attendance Insertion</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Attendance Insertion</center></h1>
<h2><center><?php echo "$sem semester $course Subject code: $scode($revision_year)"; ?></center></h2>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="center">

<form method="post" action="marksinsertmid2.php">
<input type="checkbox" style = "display:none;" name = "scode" value ="<?php echo $scode; ?>" checked>
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<div id="tbscroll">
<table border class="nal">
<tr><th>Roll No.</th><th>Name</th><th>Marks</th><th>Assessment 1</th><th>Assessment 2</th><th>Assessment 3</th><th>Attendance Marks</th></tr>
<?php
$chkelective=mysql_num_rows(mysql_query("select * from elective where scode = '$scode' and revision_year='$revision_year'",$conn));
if($chkelective==0)
{
	$sql=mysql_query("select fname,lname,rollno from student where batch='$batch' and course = '$course'",$conn) or die("ERROR: ".mysql_error());
	while($res=mysql_fetch_array($sql,MYSQL_NUM))
	{
		echo "<tr><td>".$res[2]."</td><td>".$res[0]." ".$res[1]."</td>";
		$chkpresent=mysql_num_rows(mysql_query("select * from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn));
		if($chkpresent==0)
		{
			mysql_query("insert into midterm(rollno,scode,revision_year) values('$res[2]','$scode','$revision_year')",$conn) or die("Error: ".mysql_error());
		}
		$mid=mysql_result(mysql_query("select mid from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_1\" value=\"".$mid."\"></td>";
		$c1=mysql_result(mysql_query("select c1 from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_2\" value=\"".$c1."\"></td>";
		$c2=mysql_result(mysql_query("select c2 from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_3\" value=\"".$c2."\"></td>";
		$c3=mysql_result(mysql_query("select c3 from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_4\" value=\"".$c3."\"></td>";
		$atn_marks=mysql_result(mysql_query("select atn_marks from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
		echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_5\" value=\"".$atn_marks."\"></td>";
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
		
			$chkpresent=mysql_num_rows(mysql_query("select * from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn));
			if($chkpresent==0)
			{
				mysql_query("insert into midterm(rollno,scode,revision_year) values('$chkroll[0]','$scode','$revision_year')",$conn) or die("Error: ".mysql_error());
			}
			$mid=mysql_result(mysql_query("select mid from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_1\" value=\"".$mid."\"></td>";
			$c1=mysql_result(mysql_query("select c1 from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_2\" value=\"".$c1."\"></td>";
			$c2=mysql_result(mysql_query("select c2 from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_3\" value=\"".$c2."\"></td>";
			$c3=mysql_result(mysql_query("select c3 from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_4\" value=\"".$c3."\"></td>";
			$atn_marks=mysql_result(mysql_query("select atn_marks from midterm where rollno='$chkroll[0]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
			echo "<td><input type=\"textbox\" name = \"".$chkroll[0]."_".$scode."_".$revision_year."_5\" value=\"".$atn_marks."\"></td>";
		}	
		else
		{
			header("Location:attnerror.php");
			exit;
		}	
	}
}
mysql_close();
?>
</table>
<input type="submit" value="submit">
</div>
</form>
</div>
</div>
<br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>