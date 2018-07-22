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
$scode=$_POST['scode'];
$revision_year=$_POST['revision_year'];
$sql=mysql_query("select rollno from sessional where scode='$scode' and revision_year='$revision_year'",$conn);
$i=0;
while($res=mysql_fetch_array($sql))
{
	$atn1=$_POST[$res[0]."_".$scode."_".$revision_year."_1"];
	$atn2=$_POST[$res[0]."_".$scode."_".$revision_year."_2"];
	$atn3=$_POST[$res[0]."_".$scode."_".$revision_year."_3"];
	if(!is_nan($atn1) && !is_nan($atn2))
	{ 
		mysql_query("update sessional set atn1 =".$atn1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set atn2 =".$atn2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set atn3 =".$atn3." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		$i+=1;
	}
}
if($i==0)
{	
	echo "<br><br>";
	echo "<h2><center>The attendance should be a number..<a href=\"atninsertmid1.php\">Back</a></center></h2>"; 
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	echo "<br><br>";
	echo "<h2><center>Attendance has been Entered<br></center></h2>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
mysql_close();
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>