<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<title>Fee</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Fee Information</center></h1>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<?php
$batch1=$_POST['batch'];
$batch=strtok($batch1," ");
$course=strtok(" ");
 echo "<h2><center>Students of Batch: $batch $course</center></h2>"; 
?>

<form action="fee3.php" method="post">
<?php
	echo "<input type=\"hidden\" value = \"$batch\" name=\"batch\">";
	echo "<input type=\"hidden\" value = \"$course\" name=\"course\">";
?>
<table border class="nal">
<tr><th>Roll No</th><th>Name</th><th>Fee status(check if payed)</th></tr>
<?php
	$sql=mysql_query("select rollno,fname,lname from student where batch='$batch' and course='$course'",$conn);
	while($res=mysql_fetch_array($sql))
	{ // get all student record bybatch and course name
		$sql1=mysql_query("select count(*) from fee where rollno='$res[0]'",$conn);
		$chkpresent=mysql_result($sql1,0);
		if($chkpresent==0)
		{
			mysql_query("insert into fee(rollno) values('$res[0]')",$conn);
		}
		$sql2=mysql_query("select payed from fee where rollno='$res[0]'",$conn);
		$chkpayed=mysql_result($sql2,0);
		if($chkpayed=='yes')
		{
			echo "<tr><td>".$res[0]."</td><td>".$res[1]." ".$res[2]."</td><td><input type=\"checkbox\" value=\"yes\" name = \"".$res[0]."\" checked></td></tr>";
		}
		else
		{
			echo "<tr><td>".$res[0]."</td><td>".$res[1]." ".$res[2]."</td><td><input type=\"checkbox\" value=\"yes\" name = \"".$res[0]."\"></td></tr>";
		}
	}
mysql_close();
?>
</table>
<p id="p-container">
<span><input type="submit" value="Save"></span>
</p>
</form>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
