<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
?>
<html>
<head> 
<title>Student Information Index</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<br>
<h1><center>Student Information</center></h1>
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
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include("footer.php");
?>
</body>
</html>
