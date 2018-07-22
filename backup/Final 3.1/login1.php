<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<?php 
session_start();
include_once("db.php");
$user=$_POST['username'];
$pass=md5($_POST['password']);
$login=mysql_query("select count(*) from user where (username = '$user') and (password = '$pass')",$conn);
$result=mysql_result($login,0);
?>
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
<div id="body">
<?php
if($result==1)
{
	$_SESSION['username']=$user;
	header("location:index.php");
	exit;
}
else
{
	echo "<br><br>";
	echo "<h2><center>INVALID username or password<br><a href=\"login.php\">Go back to Login</a></center></h2>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
}
mysql_close($conn);
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>