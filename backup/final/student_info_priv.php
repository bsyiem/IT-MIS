<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
?>
<html>
<head> 
<title>Student Information Index</title>
<script>
function al()
{
	for(i=0;i<24;i++)
	{
		document.getElementById(i).checked=true;
	}
}
function dal()
{
	for(i=0;i<24;i++)
	{
		document.getElementById(i).checked=false;
	}
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head> 
<body>
<?php
include("header.php");
?>
<h1><center>Student Information</center></h1>
<form name="form1" method="post" action="student_info_priv1.php">
<p>Select the batch year:
<select name = "batch">
<?php
$q=mysql_query("select distinct batch,course from semester",$conn);
while($res=mysql_fetch_array($q))
{
	echo "<option value=\"$res[0] $res[1]\">$res[0] $res[1]</option>";
}
?>			
</select>
</p>
<p></p>
<p>
Select the Attributes:<br> 
<input type="button" name="all" value="All" onClick="return al()"><br>
<input type="button" name="all" value="Deselect All" onClick="return dal()"><br>
<?php
$i=0;
$sql=mysql_query("show columns from student",$conn);
while($res1=mysql_fetch_array($sql))
{
	echo "<input type=\"checkbox\" name=\"$i\" value=\"$res1[0]\" id=\"$i\"> $res1[0]<br>";
	$i+=1;
}
mysql_close($conn);
?>
</p>
<input type="submit">
</form>
<?php
include("footer.php");
?>
</body>
</html>
