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
<?php
include("header.php");
$rollno=$_POST['rollno'];
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$chk=mysql_result(mysql_query("select count(*) from debarred where rollno='$rollno' and scode='$scode' and revision_year='$revision_year'",$conn),0);
if($chk==0)
{
	mysql_query("insert into debarred values('$rollno','$scode','$revision_year')",$conn)or die("Error:".mysql_error());
	echo "<br><br>";
	echo "<h2><center>The data has been entered</center></h2>";
	echo "<br><br><br><br><br><br><br><br>";
}
else
{
	echo "<br><br>";
	echo "<h2><center>The Entered Data already Exists!</center></h2>";
	echo "<br><br><br><br><br><br><br><br>";
}
mysql_close();
include("footer.php");
?>
</body>
</html>