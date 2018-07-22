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
<title>Repeater Management</title>
</head>
<body>
<h1>Repeater Management</h1>
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
<table align="center" width="80%">
<tr><th align="center"><u>To Add a Repeater</u></th><th align="center"> <u>To Manage Repeater list</u></th></tr> 
<tr><th><form method="post" action="repeateradd.php"><input type="submit" value="Add"></form></th><th><form method="post" action="repeatermanage.php"><input type="submit" value="Manage"></form></th></tr>
</table>
</body>
</html>
<?php
mysql_close();
?>
