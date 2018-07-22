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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<h1><center>Repeater Students Edit</center></h1>
<h2><center>List of Repeater Students</center></h2>
<form method="post" action="repeatermanage1.php">
<table border class="nal">
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
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include("footer.php");
?>
</body>
</html>