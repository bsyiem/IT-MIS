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
<title>Repeater Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<h1><center>Repeater Management</center></h1>
<form method="post" action="repeateradd.php">
<div class="inset">
<p><label for="add">To Add a Repeater</label></p>
</div>
<p class="p-container">  
<span><input type="submit" value="Add"></span>
</p></form>

<form method="post" action="repeatermanage.php">
<div class="inset">
<p><label for="manage">To Manage Repeater list</label></p>
</div>
<p class="p-container">
<span><input type="submit" value="Manage"></span>
</p>
</form>
<?php
mysql_close();
include("footer.php");
?>
</body>
</html>

