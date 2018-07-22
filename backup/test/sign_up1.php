<?php
session_start(); 
include_once("db.php");
 
$user=$_POST['username'];
$passwd=$_POST['password'];
$epass=md5($passwd);
$sq="select count(*) from user where username='$user'";
$coun=mysql_query($sq,$conn);
$count=mysql_result($coun,0);
if($count>0)
{
	echo("Username already exists");
}
else
{
	$sql="insert into user(username,password) values('$user','$epass')";
	$result=mysql_query($sql,$conn);
	mysql_close($conn);
	echo("Records are added successfully");
}
?> 
<html>
<body>
<a href ="sign_up.php">Back</a>
</body>
</html>