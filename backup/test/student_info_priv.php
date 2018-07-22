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
</head> 
<body>
<h1>Student Information</h1>
<br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr>
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
</body>
</html>
