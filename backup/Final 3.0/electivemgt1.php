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
$elective_no=$_POST['elective_no'];
$sem1=$_POST['sem'];
$sem=strtok($sem1," ");
$course=strtok(" ");
//getting Batch of students 
$batch=mysql_result(mysql_query("select batch from semester where sem = '$sem' and course = '$course'",$conn),0);
if($revision_year>$batch)
{
	header("Location:attnerror.php");
	exit;
}
//checking if students are in the semester where the subject is taught
$chksem=mysql_num_rows(mysql_query("select * from subject where scode='$scode' and revision_year='$revision_year' and sem='$sem' and course='$course'",$conn));

if($chksem==0)
{
	header("Location:attnerror.php");
}
?>
<html>
<head> 
<title>Elective Subject Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Elective Subject Management</center></h1>
<br>
<h2><center><?php echo "$sem semester $course Subject code: $scode($revision_year)"; ?></center></h2>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<form method="post" action="electivemgt2.php">
<input type="checkbox" style = "display:none;" name = "scode" value ="<?php echo $scode; ?>" checked>
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<input type="checkbox" style = "display:none;" name = "elective_no" value ="<?php echo $elective_no; ?>" checked>
<input type="checkbox" style = "display:none;" name = "sem" value ="<?php echo $sem; ?>" checked>
<input type="checkbox" style = "display:none;" name = "batch" value ="<?php echo $batch; ?>" checked>
<input type="checkbox" style = "display:none;" name = "course" value ="<?php echo $course; ?>" checked>
<table border class="nal">
<tr><th>Roll No.</th><th>Name</th><th>Select</th></tr>
<?php
	//select students from student with selected batch and course
	$sql=mysql_query("select rollno,fname,lname from student where batch='$batch' and course='$course'",$conn);
	while($res=mysql_fetch_array($sql))
	{
		echo "<tr><td>".$res[0]."</td><td>".$res[1]." ".$res[2]."</td>";
		$chkstudent=mysql_num_rows(mysql_query("select * from elective where rollno='$res[0]' and scode='$scode' and revision_year='$revision_year' and elective_no='$elective_no' and sem='$sem'",$conn));
		if($chkstudent>0)
		{	
			echo "<td><input type=\"checkbox\" name=\"$res[0]\" value=\"yes\" checked></td></tr>";
		}
		else
		{
			echo "<td><input type=\"checkbox\" name=\"$res[0]\" value=\"yes\"></td></tr>";
		}
	}
	mysql_close();
?>
</table>
<input type="submit" value="submit">
</form>
</div></div>
<?php
include("footer.php");
?>
</div>
</body>
</html>