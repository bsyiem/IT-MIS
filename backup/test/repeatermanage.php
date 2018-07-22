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
<title>Repeater Students Edit</title>
</head>
<body>
<h1>Repeater Students Edit</h1>
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
List of Repeater Students.
<form method="post" action="repeatermanage1.php">
<table border>
<tr><th>Select to Delete</th><th>Roll No.</th><th>Subject Code</th><th>Revision Year</th><th>Attempt no.</th><th>Applied</th></tr>
<?php
	$sql=mysql_query("select * from repeater",$conn);
	while($res=mysql_fetch_array($sql))
	{
		if($res[4]=='yes')
		{
			echo "<tr><td><input type=\"checkbox\" value=\"yes\" name=\"$res[0]_$res[1]_$res[2]\"></td><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td><input type=\"textbox\" value=\"$res[3]\" name=\"$res[0]_$res[1]_$res[2]_1\"></td><td><input type=\"checkbox\" value=\"yes\" name=\"$res[0]_$res[1]_$res[2]_2\" checked></td></tr>";
		}
		else
		{
			echo "<tr><td><input type=\"checkbox\" value=\"yes\" name=\"$res[0]_$res[1]_$res[2]\"></td><td>$res[0]</td><td>$res[1]</td><td>$res[2]</td><td><input type=\"textbox\" value=\"$res[3]\" name=\"$res[0]_$res[1]_$res[2]_1\"></td><td><input type=\"checkbox\" value=\"yes\" name=\"$res[0]_$res[1]_$res[2]_2\"></td></tr>";
		}
	}
mysql_close();
?>
</table><br>
<input type="submit" value="Save Changes">
</form>
