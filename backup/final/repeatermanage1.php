<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
$sql=mysql_query("select * from repeater",$conn);
while($res=mysql_fetch_array($sql))
{ 
	$c=0;
	if(isset($_POST["$res[0]_$res[1]_$res[2]"]) && $_POST["$res[0]_$res[1]_$res[2]"]=='yes')
	{
		mysql_query("delete from repeater where rollno='$res[0]' and scode='$res[1]' and revision_year='$res[2]'",$conn) or die("ERROR: ".mysql_error());
		echo "<br><br>";
		echo "<h2><center>The data has been deleted</center></h2>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		$c+=1;
	}
	if($c==0)
	{
		$tries=$_POST["$res[0]_$res[1]_$res[2]_1"];
		if($tries<1)
		{
			echo "<br><br>";
			echo "<h2><center>Number of tries has to be greater than 1 rollno:$res[0] scode:$res[1] revision year:$res[2].</center></h2>";
			echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
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
echo "<br><br>";
echo "<h2><center>The data has been changed</center></h2>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
mysql_close();
include("footer.php");
?>
</body>
</html>