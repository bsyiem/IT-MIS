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
$sql=mysql_query("select * from debarred",$conn);
while($res=mysql_fetch_array($sql))
{ 
	if(isset($_POST["$res[0]_$res[1]_$res[2]"]) && $_POST["$res[0]_$res[1]_$res[2]"]=='yes')
	{
		mysql_query("delete from debarred where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn) or die("ERROR: ".mysql_error());
		echo "<br><br>";
		echo "<h2><center>The data has been deleted</center></h2>";
		echo "<br><br><br><br><br><br><br><br>";
	}
}
mysql_close();
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>