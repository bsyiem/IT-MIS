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
$sql=mysql_query("select rollno from sessional where scode='$scode' and revision_year='$revision_year'",$conn);
$i=0;
while($res=mysql_fetch_array($sql))
{
	$s1=$_POST[$res[0]."_".$scode."_".$revision_year."_1"];
	$s2=$_POST[$res[0]."_".$scode."_".$revision_year."_2"];
	$s3=$_POST[$res[0]."_".$scode."_".$revision_year."_3"];
	$q1=$_POST[$res[0]."_".$scode."_".$revision_year."_4"];
	$q2=$_POST[$res[0]."_".$scode."_".$revision_year."_5"];
	$q3=$_POST[$res[0]."_".$scode."_".$revision_year."_6"];
	$a1=$_POST[$res[0]."_".$scode."_".$revision_year."_7"];
	$a2=$_POST[$res[0]."_".$scode."_".$revision_year."_8"];
	$a3=$_POST[$res[0]."_".$scode."_".$revision_year."_9"];
	$atn_marks=$_POST[$res[0]."_".$scode."_".$revision_year."_10"];
	if(!is_nan($atn1) && !is_nan($atn2))
	{ 
		mysql_query("update sessional set s1 =".$s1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set s2 =".$s2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set s3 =".$s3." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set q1 =".$q1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set q2 =".$q2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set q3 =".$q3." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set a1 =".$a1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set a2 =".$a2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set a3 =".$a3." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set atn_marks =".$atn_marks." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		$i+=1;
	}
}
if($i==0)
{
	echo "The marks should be a number..<a href=\"atninsertmid1.php\">Back</a>"; 
}
else
{
	echo "Marks has been Entered<br><a href=\"index.php\">Back To Menu</a>";
}
mysql_close();

