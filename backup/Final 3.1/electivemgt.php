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
<title>Elective Subject Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<script>
function chk()
{
	return(confirm("Please Make sure that the subject code,revision year and the Elective Number you have selected is Correct"));
}
</script>
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<br>
<h1><center>Elective Subject Management</center></h1>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<form method="post" action="electivemgt1.php" onsubmit="return chk()">
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
<tr>
<td>
Enter Elective Number:<select name="elective_no"><option value="1">1</option><option value="2">2</option></select>
</td>
<td>
</td>
</tr>
</table>
<input type="submit" value="Go">
</form>
</div>
</div>
<br><br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>