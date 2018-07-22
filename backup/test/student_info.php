<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
?>
<html>
<head> 
<title>Student Information Index</title>
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
<form name="form1" method="post" action="student_info1.php">
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
<?php
mysql_close($conn);
?>
</select>
</p>
<input type="submit">
</form>
</body>
</html>
