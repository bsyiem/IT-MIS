<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$sql=mysql_query("select * from debarred",$conn);
while($res=mysql_fetch_array($sql))
{ 
	if(isset($_POST["$res[0]_$res[1]_$res[2]"]) && $_POST["$res[0]_$res[1]_$res[2]"]=='yes')
	{
		mysql_query("delete from debarred where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn) or die("ERROR: ".mysql_error());
		echo "The data has been deleted";
	}
}
mysql_close();
?>