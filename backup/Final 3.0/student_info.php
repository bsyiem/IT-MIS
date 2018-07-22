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
<br>
<div id="body">
<h1><center>Student Information</center></h1>
<form name="form1" method="post" action="student_info1.php">
Select the batch year:
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

<input type="submit">
</form>
<br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>
<?php
include("footer.php");
?>

</div>
</body>
</html>
