<?php
session_start();
include "db.php";
include "checker.php";
if($cv==0 && $av==0 && $tv==0 && $sv==0)
{
	header("location:index.php");
	exit;
}
$old=$_POST['old'];
$user=$_SESSION['username'];
$sql=mysql_query("select count(*) from user where username='$user' and password=md5('$old')");
$res=mysql_result($sql,0);
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
if($res==1)
{
	$new=$_POST['new1'];
	$sql=mysql_query("update user set password=md5('$new') where username='$user'");
	echo "<br><br>";
	echo "<h2><center>Password has been successfully changed</center></h2><br>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	echo "<a href =\"index.php\">Back to Menu</a>";
}
else
{
	echo "<br><br>";
	echo "<h2><center>Wrong password</center></h2><br>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	echo "<a href =\"passchange.php\">Back</a>";
}
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>