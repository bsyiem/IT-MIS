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
if($res==1)
{
	$new=$_POST['new1'];
	$sql=mysql_query("update user set password=md5('$new') where username='$user'");
	echo "Password has been successfully changed<br>";
	echo "<a href =\"index.php\">Back to Menu</a>";
}
else
{
	echo "Wrong password<br>";
	echo "<a href =\"passchange.php\">Back</a>";
}
?>
