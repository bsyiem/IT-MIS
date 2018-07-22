<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$rollno=$_POST['rollno'];
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$chk=mysql_result(mysql_query("select count(*) from debarred where rollno='$rollno' and scode='$scode' and revision_year='$revision_year'",$conn),0);
if($chk==0)
{
	mysql_query("insert into debarred values('$rollno','$scode','$revision_year')",$conn)or die("Error:".mysql_error());
	echo "The data has been entered";
}
else
{
	echo "The Entered Data already Exists!";
}
mysql_close();
?>