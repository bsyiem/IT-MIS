<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$sql=mysql_query("select * from repeater",$conn);
while($res=mysql_fetch_array($sql))
{ 
	$c=0;
	if(isset($_POST["$res[0]_$res[1]_$res[2]"]) && $_POST["$res[0]_$res[1]_$res[2]"]=='yes')
	{
		mysql_query("delete from repeater where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn) or die("ERROR: ".mysql_error());
		echo "The data has been deleted<br>";
		$c+=1;
	}
	if($c==0)
	{
		$tries=$_POST["$res[0]_$res[1]_$res[2]_1"];
		if($tries<1 || $tries>3)
		{
			echo "Number of tries has to be between 1 and 3 for rollno:$res[0] scode:$res[1] revision year:$res[2].<br> ";
			exit;
		}
		else
		{
			mysql_query("update repeater set tries='$tries' where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn);
		}
		if(isset($_POST["$res[0]_$res[1]_$res[2]_2"]) && $_POST["$res[0]_$res[1]_$res[2]_2"]=='yes')
		{
			mysql_query("update repeater set applied='yes' where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn);
		}
		else
		{
			mysql_query("update repeater set applied='no' where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn);
		}
	}
}
echo "The data has been changed<br>";
mysql_close();
?>