<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0)
{
	header("location:index.php");
	exit;
}
$batch=$_POST['batch'];
$course=$_POST['course'];
$sql=mysql_query("select rollno from student where batch='$batch' and course = '$course'",$conn);
while($res=mysql_fetch_array($sql))
{
	if(isset($_POST["$res[0]"]) && $_POST["$res[0]"]=='yes')
	{
		mysql_query("update fee set payed = 'yes' where rollno = '$res[0]'",$conn);
	}
	else
	{
		mysql_query("update fee set payed = 'no' where rollno = '$res[0]'",$conn);
	}
}
echo "Changes have been saved";
mysql_close();
?>