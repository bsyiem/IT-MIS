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
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Repeater Management</center></h1>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="center">
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
</div>
</div>
<?php
mysql_close();
include("footer.php");
?>
</div>
</body>
</html>

