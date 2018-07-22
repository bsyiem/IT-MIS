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
<title>Debarred Students Edit</title>
</head>
<body>
<h1>Debarred Students Edit</h1>
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
List of Debarred Students.
<form method="post" action="debarred3.php">
<table border>
<tr><th>Select</th><th>Roll No.</th><th>Subject Code</th><th>Revision Year</th></tr>
<?php
	$sql=mysql_query("select * from debarred",$conn);
	while($res=mysql_fetch_array($sql))
	{
		echo "<tr><td><input type=\"checkbox\" value=\"yes\" name=\"$res[0]_$res[1]_$res[2]\"></td><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td></tr>";
	}
mysql_close();
?>
</table><br>
<input type="submit" value="Delete Selected">
</form>