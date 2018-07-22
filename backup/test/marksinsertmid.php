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
<form method="post" action="marksinsertmid1.php">
<table width = "60%">
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
Enter Batch and Course:
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
</form>