<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$user=$_SESSION['username'];
$eid=mysql_result(mysql_query("select eid from employee where email_add = '$user'",$conn),0);
?>
<html>
<head> 
<title>Attendance Generation</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
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
<h1><center>Attendance Generation</center></h1>
<form method="post" action="attendance_gen1.php" target="_blank">
<table width = "60%" class="nal">
<tr><th align="left"><u>Subject</u></th><th align="left"><u>Student</u></th></tr>
<tr><td>Enter Subject Code:
<select name="scode">
<?php
$sql=mysql_query("select scode from teaches where eid = '$eid'",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	
	echo "<option value=\"".$res[0]."\">".$res[0]."</option>";
}
?>
</select>
</td>
<td>
Enter Semester and Course:
<select name="sem">
<?php
$sql=mysql_query("select sem,course from semester where sem < 9",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	
	echo "<option value=\"".$res[0]." ".$res[1]."\">".$res[0]."(".$res[1].")</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>
Enter Course Revision Year:
<select name="revision_year">
<?php
$sql=mysql_query("select distinct(revision_year) from subject",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	
	echo "<option value=\"".$res[0]."\">".$res[0]."</option>";
}
mysql_close();
?>
</select>
</td>
<td>
</td>
</tr>
</table>
<input type="submit" value="Go">
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>