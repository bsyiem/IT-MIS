<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<title>Fee</title>
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
<div id="center">
<form action="fee2.php" method="post">
<h1>Fee Information</h1>
<div id="inset">
<p><label for="batch">Choose Batch </label><select name="batch">
<?php
$sql=mysql_query("select distinct batch,course from semester",$conn);
while($res=mysql_fetch_array($sql))
{
	echo "<option value=\"$res[0] $res[1]\">$res[0] $res[1]</option>";
}
mysql_close();
?>
</select>
</div>
<p class="p-container"><span>
<input type="submit" value="GO"></span></p>
</form>
</div></div>
<br><br><br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>
