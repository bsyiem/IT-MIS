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

$chkelective=mysql_num_rows(mysql_query("select * from elective where scode='$scode' and revision_year='$revision_year'",$conn));

if($chkelective>0)
{
	$chkstudent=mysql_num_rows(mysql_query("select * from elective where rollno='$rollno' and scode='$scode' and revision_year='$revision_year'",$conn));
	if($chkstudent==0)
	{
		header("Location:repeatererror.php");
		exit;
	}
}
$chk=mysql_result(mysql_query("select count(*) from repeater where rollno='$rollno' and scode='$scode' and revision_year='$revision_year'",$conn),0);
if($chk==0)
{
	mysql_query("insert into repeater values('$rollno','$scode','$revision_year',2,'yes')",$conn)or die("Error:".mysql_error());
	echo "The data has been entered";
}
else
{
	echo "The Entered Data already Exists!";
}