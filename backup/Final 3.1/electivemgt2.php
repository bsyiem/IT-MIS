<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<?php
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$elective_no=$_POST['elective_no'];
$sem=$_POST['sem'];
$batch=$_POST['batch'];
$course=$_POST['course'];
$sql=mysql_query("select rollno from student where batch='$batch' and course='$course'",$conn);
while($res = mysql_fetch_array($sql))
{
	if(isset($_POST["$res[0]"]) && $_POST["$res[0]"]=='yes')
	{
		$chkstudent=mysql_num_rows(mysql_query("select * from elective where rollno='$res[0]' and elective_no='$elective_no' and sem='$sem'",$conn));
		if($chkstudent==0)
		{
			mysql_query("insert into elective values('$res[0]','$scode','$revision_year','$elective_no','$sem')",$conn) or die("Error :".mysql_error());
		}
		else
		{
			$chkel=mysql_num_rows(mysql_query("select * from elective where rollno='$res[0]' and scode='$scode' and revision_year='$revision_year' and elective_no='$elective_no' and sem='$sem'",$conn));
			if($chkel==0)
			{
				echo "Roll No:$res[0] is already enrolled in Elective Number:$elective_no <br>";
			}
		}
	}
	else
	{
		$chkstudent=mysql_num_rows(mysql_query("select * from elective where rollno='$res[0]' and scode='$scode' and revision_year='$revision_year' and elective_no='$elective_no' and sem='$sem'",$conn));
		if($chkstudent>0)
		{
			mysql_query("delete from elective where rollno='$res[0]' and scode='$scode' and revision_year='$revision_year' and elective_no='$elective_no' and sem='$sem'",$conn) or die("Error :".mysql_error());
		}
	}
}
echo "<h1 align=\"center\">changes have been saved</h1>";
mysql_close();
?>
</div>
</div>
<br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>
