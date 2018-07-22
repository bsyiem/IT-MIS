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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Debarred Students Edit</center></h1>
<h2><center>List of Debarred Students</center></h2>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="center">
<form method="post" action="debarred3.php">
<div id="tbscroll">
<table border class="nal">
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
<input type="submit" value="Delete Selected"></div>
</form>
</div>
</div>
<br><br><br><br><br><br><br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>