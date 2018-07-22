<?php
session_start();
include_once "db.php";
include_once "checker.php";
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include "header.php";
?>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<h1 align="center"><u>ERROR</u></h1>
<br><font size='+2'>This student has not payed his fees.</font><br><br><br><br><br><br><br>
</div>
</div>
<?php
include "footer.php"
?>
</div>
</body>
</html>