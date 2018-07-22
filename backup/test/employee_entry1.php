<?php
session_start(); 
include_once("db.php");
$efname= $_POST['First_Name'];
$elname= $_POST['Last_Name'];
$eid= $_POST['Eid'];
$phone_no= $_POST['Phone_No'];
$email_add= $_POST['Email_Add'];
$category=$_POST['Category'];
$role= $_POST['Role'];

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
	echo("Records are added successfully");
}
else
{
	if($chk>0)
	{
		echo "Employee with same employee id already exists!<br>";
	}
	if($chk1>0)
	{
		echo "user with same email already exists!";
	}
}
mysql_close($conn);
?>
<html>
<a href="employee_entry.php">Back</a>
</html> 
