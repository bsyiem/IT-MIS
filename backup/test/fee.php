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
</head>

<body>
<h1>Fee Information</h1>
<br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr>
<form action="fee2.php" method="post">
Choose Batch:<select name="batch">
<?php
$sql=mysql_query("select distinct batch,course from semester",$conn);
while($res=mysql_fetch_array($sql))
{
	echo "<option value=\"$res[0] $res[1]\">$res[0] $res[1]</option>";
}
mysql_close();
?>
</select><br>

<input type="submit" value="GO">
</form>
</body>
</html>
