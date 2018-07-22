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
<title>Admit Card Generation</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<h1><center>Admit Card Generation</center></h1>
<form method="post" action="admitsingle.php">
<div class="inset">
<p><label for="add">To Generate Admit Card for A Single Student</label></p>
</div>
<p class="p-container">  
<span><input type="submit" value="Generate Single"></span>
</p></form>

<form method="post" action="admitmultiple.php">
<div class="inset">
<p><label for="manage">To Generate Admit Card for A Batch</label></p>
</div>
<p class="p-container">
<span><input type="submit" value="Generate Batch"></span>
</p>
</form>
<?php
mysql_close();
include("footer.php");
?>
</body>
</html>