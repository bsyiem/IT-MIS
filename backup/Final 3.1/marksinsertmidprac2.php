<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
include("header.php");
?>
<h1><center>Internal Marks Insertion</center></h1>
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
$sql=mysql_query("select rollno from midterm where scode='$scode' and revision_year='$revision_year'",$conn);
$i=0;
while($res=mysql_fetch_array($sql))
{
	$marks=$_POST[$res[0]."_".$scode."_".$revision_year."_1"];

	$atn_marks=$_POST[$res[0]."_".$scode."_".$revision_year."_2"];
	if(!is_nan($atn1) && !is_nan($atn2))
	{ 
		mysql_query("update midterm set mid =".$marks." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
		mysql_query("update midterm set atn_marks =".$atn_marks." where rollno= '$res[0]'",$conn) or die("Error: ".mysql_error()); 
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
?>
</div>
</div>
<br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>

