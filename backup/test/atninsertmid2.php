<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$sql=mysql_query("select rollno from midterm where scode='$scode' and revision_year='$revision_year'",$conn);
$i=0;
while($res=mysql_fetch_array($sql))
{
	$atn1=$_POST[$res[0]."_".$scode."_".$revision_year."_1"];
	$atn2=$_POST[$res[0]."_".$scode."_".$revision_year."_2"];
	if(!is_nan($atn1) && !is_nan($atn2))
	{ 
		mysql_query("update midterm set atn1 =".$atn1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update midterm set atn2 =".$atn2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		$i+=1;
	}
}
if($i==0)
{
	echo "The attendance should be a number..<a href=\"atninsertmid1.php\">Back</a>"; 
}
else
{
	echo "Attendance has been Entered<br><a href=\"index.php\">Back To Menu</a>";
}
mysql_close();
