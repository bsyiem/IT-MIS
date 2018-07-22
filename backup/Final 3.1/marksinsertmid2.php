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
<link href="css/table.css" rel="stylesheet" type="text/css" />
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
	$mid=$_POST[$res[0]."_".$scode."_".$revision_year."_1"];
	$c1=$_POST[$res[0]."_".$scode."_".$revision_year."_2"];
	$c2=$_POST[$res[0]."_".$scode."_".$revision_year."_3"];
	$c3=$_POST[$res[0]."_".$scode."_".$revision_year."_4"];
	$atn_marks=$_POST[$res[0]."_".$scode."_".$revision_year."_5"];
	if(!is_nan($atn1) && !is_nan($atn2))
	{ 
		mysql_query("update sessional set mid =".$mid." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set c1 =".$c1." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set c2 =".$c2." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set c3 =".$c3." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update sessional set atn_marks =".$atn_marks." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		$i+=1;
	}
}
if($i==0)
{
	echo "<br><br><br><br>";
	echo "<h2><center>The marks should be a number..<a href=\"atninsertmid1.php\">Back</a></center></h2>"; 
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	echo "<br><br><br><br>";
	echo "<h2><center>Marks has been Entered</center></h2>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
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