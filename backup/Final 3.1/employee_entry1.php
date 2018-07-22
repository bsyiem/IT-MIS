<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0)
{
	header("location:index.php");
	exit;
}
$efname= $_POST['First_Name'];
$elname= $_POST['Last_Name'];
$eid= $_POST['Eid'];
$phone_no= $_POST['Phone_No'];
$email_add= $_POST['Email_Add'];
$category=$_POST['Category'];
$role= $_POST['Role'];
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
$chk=mysql_result(mysql_query("select count(*) from employee where eid=\"$eid\"",$conn),0);
$chk1=mysql_result(mysql_query("select count(*) from user where username=\"$email_add\"",$conn),0);
if($chk==0 && $chk1==0)
{
	$sql="insert into employee(eid,efname,elname,phone_no,email_add,category,role) values('$eid','$efname','$elname','$phone_no','$email_add','$category','$role')";
	$result=mysql_query($sql,$conn) or die("error ".mysql_error());
	if($category=="teaching")
	{
		$sql="insert into user(username,password,teacher_view) values('$email_add',md5('password'),'yes')";
	}
	else
	{
		$sql="insert into user(username,password,clerk_view) values('$email_add',md5('password'),'yes')";
	}
	$result=mysql_query($sql,$conn);
	echo "<br><br>";
	echo("<h2><center>Records are added successfully</center></h2>");
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	if($chk>0)
	{
		echo "<br><br>";
		echo "<h2><center>Employee with same employee id already exists!</center></h2><br>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	if($chk1>0)
	{
		echo "<br><br>";
		echo "<h2><center>User with same email already exists!</center></h2>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
}
mysql_close($conn);
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html> 
