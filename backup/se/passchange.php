<?php
session_start();
include "db.php";
include "checker.php";
if($cv==0 && $av==0 && $tv==0 && $sv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
<title>Change Password</title>
<script>
function val()
{
	var x = document.getElementById("new1").value;
	var y = document.getElementById("new2").value;
	var z = document.getElementById("old").value;
	if(x=="" || y=="" || z=="" || x== null || y==null || z==null )
	{
		alert("All Fields are Mandatory!");
		return false;
	}
	if(x!=y)
	{
		alert("Passwords do not match");
		return false;
	}
	return true;
}
</script>
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
<form name="form1" action="passchange1.php" method="post" onsubmit="return val()">
<h1>Change Password</h1>
<div class="inset">
<p>
<label for="old">Enter Old Password</label>
<input type="password" name="old" id="old"></p>
<p><label for="new1">Enter New Password</label>
<input type="password" name="new1" id="new1"></p>
<p><label for="new2">Confirm Password</label>
<input type="password" name="new2" id="new2"></p>
</div>
  <p class="p-container">
<span><input type="submit" value="Change"></span></p>
</form>
</div>
</div>
<?php
mysql_close($conn);
include("footer.php");
?>
</div>
</body>
</html>