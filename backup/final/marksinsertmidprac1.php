<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$scode=$_GET['scode'];
$revision_year=$_GET['revision_year'];

$sem=$_GET['sem'];
$course=$_GET['course'];
$batch=$_GET['batch'];
if($revision_year>$batch)
{
	header("Location:attnerror.php");
	exit;
}
?>
<html>
<head> 
<title>Internal Marks Insertion</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<h1 align="center">Internal Marks Insertion</h1>
<h2 align="center"><?php echo "$sem semester $course Subject code: $scode($revision_year)"; ?></h2><br>
<form method="post" action="marksinsertsesprac2.php">
<input type="checkbox" style = "display:none;" name = "scode" value ="<?php echo $scode; ?>" checked>
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<table border class="nal">
<tr><th>Roll No.</th><th>Name</th><th>Marks</th><th>Attendance Marks</th></tr>

<?php

$sql=mysql_query("select fname,lname,rollno from student where batch='$batch' and course = '$course'",$conn) or die("ERROR: ".mysql_error());
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	echo "<tr><td>".$res[2]."</td><td>".$res[0]." ".$res[1]."</td>";
	$chkpresent=mysql_num_rows(mysql_query("select * from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn));
	if($chkpresent==0)
	{
		mysql_query("insert into midterm(rollno,scode,revision_year) values('$res[2]','$scode','$revision_year')",$conn) or die("Error2: ".mysql_error());
	}
	$marks=mysql_result(mysql_query("select mid from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
	
	echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_1\" value=\"".$marks."\"></td>";
	
	$atn_marks=mysql_result(mysql_query("select atn_marks from midterm where rollno='$res[2]' and scode='$scode' and revision_year='$revision_year'",$conn),0);
	echo "<td><input type=\"textbox\" name = \"".$res[2]."_".$scode."_".$revision_year."_2\" value=\"".$atn_marks."\"></td>";
}
mysql_close();
?>
</table>
<input type="submit" value="submit">
</form>
<?php
include("footer.php");
?>
</body>
</html>